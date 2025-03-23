<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binayak Multi Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 3rem;
            font-weight: 700;
            animation: fadeIn 1.5s ease-in-out;
        }

        header p {
            margin: 10px 0 0;
            font-size: 1.2rem;
            animation: fadeIn 2s ease-in-out;
        }
        .header {
            background-color: #810505;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

         .header nav {
            display: flex;
            gap: 1.5rem;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

       .header nav a:hover {
            color: #ffdd57;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Gallery Section */
        #gallery {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            flex-wrap: wrap;
        }

        #gallery img {
            width: 30%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Sections */
        section {
            padding: 30px;
            margin: 20px auto;
            max-width: 1000px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        h2 {
            font-size: 2rem;
            color: #2575fc;
            border-bottom: 3px solid #2575fc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #2575fc;
            transition: background 0.3s ease;
        }

        ul li:hover {
            background: #e0e7ff;
        }

        ul li ul li {
            background: #e0e7ff;
            border-left: 5px solid #6a11cb;
        }

        ul li ul li:hover {
            background: #d1d8f0;
        }

        /* Contact Form */
        #contact-form {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 40px;
            border-radius: 10px;
        }

        #contact-form h2 {
            color: white;
            border-bottom: 3px solid white;
        }

        #contact-form form {
            display: flex;
            flex-direction: column;
        }

        #contact-form label {
            margin-top: 10px;
            font-weight: 600;
        }

        #contact-form input,
        #contact-form textarea {
            padding: 12px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            transition: background 0.3s ease;
        }

        #contact-form input:focus,
        #contact-form textarea:focus {
            background: white;
            outline: none;
        }

        #contact-form button {
            margin-top: 20px;
            padding: 12px;
            background: white;
            color: #2575fc;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease;
        }

        #contact-form button:hover {
            background: #2575fc;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #gallery img {
                width: 45%;
            }

            header h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            #gallery img {
                width: 100%;
            }

            header h1 {
                font-size: 1.8rem;
            }

            h2 {
                font-size: 1.3rem;
            }
        }

        /* Footer */
        footer {
            background-color: #810505;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        footer .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        footer h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        footer p {
            font-size: 1rem;
            color: #ccc;
            line-height: 1.5;
        }

        footer a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #007BFF;
        }

        footer .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        footer .social-links a {
            font-size: 1.5rem;
            color: #ccc;
            transition: color 0.3s ease;
        }

        footer .social-links a:hover {
            color: #007BFF;
        }

        footer .footer-bottom {
            margin-top: 2rem;
            border-top: 1px solid #444;
            padding-top: 1rem;
            font-size: 0.875rem;
            color: #ccc;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body>
 <!-- Header -->
    <div class="header">
        <div class="logo">VenueSathi</div>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/blog">Blog</a>
            <a href="/login">Login</a>
        </nav>
    </div>
    <header>
        <div class="details">
            <h1>{{ $product->title2 }}</h1>
            <p>{{ $product->description2 }}</p>
            <a href="javascript:history.back()" class="back-button">← Back to Venues</a>
        </div>
    </header>
    <section>
        <div class="product-detail">
            <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->title2 }}" class="w-100">
        </div>
    </section>

    <div class="row row-col m-5">
        <section id="details" class="col me-2">
            <h2>Venue Details</h2>
            <ul>
                <li>Established: 2015</li>
                <li>{{ $product->contact }}</li>
                <li>Indoor Seating Capacity: 300 per hall (2 halls available)</li>
                <li>Per Plate Pricing:
                    <ul>
                        <li>{{ $product->packege }}</li>
                        <li>200 people: Starting at Rs.1900 each</li>
                        <li>300 people: Starting at Rs.1800 each</li>
                        <li>500 people: Starting at Rs.1600 each</li>
                    </ul>
                </li>
                <li>DJ Service: Starting at Rs.14000</li>
                <li>Decoration Service: Contact for pricing</li>
                <li>Advance Payment: Rs.25000</li>
                <li>Cancellation Policy: Full refund for valid reasons</li>
            </ul>
        </section>
        <section id="amenities" class="col ms-2">
            <h2>Amenities</h2>
            <ul>
                <li>Alcohol Service</li>
                <li>Allowed to bring own alcoholic beverages</li>
                <li>DJ Service</li>
                <li>Allowed to bring own DJ</li>
                <li>Private Parking for 30 Cars</li>
                <li>Changing Room</li>
                <li>Firecrackers Allowed</li>
                <li>Projectors</li>
                <li>Outside Catering Allowed</li>
                <li>Decoration Service</li>
                <li>Outside Decorator Allowed</li>
                <li>Renting Space without food</li>
            </ul>
        </section>
    </div>

    <!-- product/detail.blade.php -->
<form action="{{ route('initiate.payment', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn pay-now-btn">Book With Khalti</button>
</form>
    
    <section id="contact-form">
        <h2>Enquiry</h2>
        <form action="submit_enquiry.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h3>VenueSathi</h3>
                <p>Your one-stop solution for booking the perfect venue for any event.</p>
            </div>
            <div>
                <h3>Quick Links</h3>
                <a href="#">Home</a><br>
                <a href="#">About</a><br>
                <a href="#">Blog</a><br>
                <a href="#">Contact</a>
            </div>
            <div>
                <h3>Follow Us</h3>
                <div class="social-links">
                    <i class="fa-brands fa-facebook"></i> <!-- Facebook -->
                    <i class="fa-brands fa-instagram"></i> <!-- Instagram -->
                    <i class="fa-brands fa-twitter"></i> <!-- Twitter -->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 VenueSathi. All rights reserved.
        </div>
    </footer>
</body>
</html>