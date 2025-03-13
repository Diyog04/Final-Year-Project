const express = require('express');
const multer = require('multer');
const path = require('path');

const app = express();

// Set up storage configuration for multer
const storage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, 'uploads/'); // Folder to save images
    },
    filename: function (req, file, cb) {
        cb(null, file.fieldname + '-' + Date.now() + path.extname(file.originalname));
    }
});

const upload = multer({ storage: storage });

// Route to handle the image upload
app.post('/upload', upload.single('imageUpload'), (req, res) => {
    if (!req.file) {
        return res.status(400).send('No file uploaded.');
    }
    res.send(`Image uploaded successfully: ${req.file.filename}`);
});

app.listen(3000, () => {
    console.log('Server started on http://localhost:3000');
});
