<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - VenueSathi</title>
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
            background-color: #f9f9f9;
            color: #333;
            scroll-behavior: smooth;
        }

        header {
            background-color: #810505;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .logo {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            animation: fadeInDown 1s ease-out;
        }

        header nav {
            display: flex;
            gap: 1.5rem;
            animation: fadeInDown 1s ease-out;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ffdd57;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .header {
            background: #810505;
            color: #fff;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            animation: fadeIn 1.5s ease-out;
        }

        .header p {
            font-size: 1.2rem;
            animation: fadeIn 2s ease-out;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .header .container {
            position: relative;
            z-index: 2;
        }

        /* Blog Section Styles */
        .blog-section {
            padding: 60px 0;
            background: #fff;
        }

        .blog-post {
            margin-bottom: 40px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 1s ease-out;
        }

        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .blog-post img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .blog-post:hover img {
            transform: scale(1.05);
        }

        .blog-post h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #007BFF;
        }

        .blog-post p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #555;
        }

        .blog-post a {
            display: inline-block;
            padding: 10px 20px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .blog-post a:hover {
            background: #0056b3;
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

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
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
    <header>
        <div class="logo">VenueSathi</div>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/blog">Blog</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <header class="header">
        <div class="container">
            <h1>Blog</h1>
            <p>Stay updated with the latest tips, trends, and insights about venue booking and event planning.</p>
        </div>
    </header>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <!-- Blog Post 1 -->
            <div class="blog-post fade-in">
                <img src="https://picsum.photos/id/1018/800/400" alt="Wedding Venue">
                <h2>Top 10 Tips for Choosing the Perfect Wedding Venue</h2>
                <p>Planning a wedding? Discover our top tips for selecting the ideal venue that fits your style, budget, and guest list.</p>
                <a href="#">Read More</a>
            </div>

            <!-- Blog Post 2 -->
            <div class="blog-post fade-in">
                <img src="https://picsum.photos/id/1025/800/400" alt="Corporate Event">
                <h2>How to Plan a Corporate Event on a Budget</h2>
                <p>Learn how to organize a successful corporate event without breaking the bank. From venue selection to catering, we've got you covered.</p>
                <a href="#">Read More</a>
            </div>

            <!-- Blog Post 3 -->
            <div class="blog-post fade-in">
                <img src="https://picsum.photos/id/1040/800/400" alt="Event Themes">
                <h2>Trending Event Themes for 2024</h2>
                <p>Explore the latest event themes that are making waves in 2024. From rustic weddings to futuristic corporate events, get inspired!</p>
                <a href="#">Read More</a>
            </div>

            <!-- Blog Post 4 -->
            <div class="blog-post fade-in">
                <img src="https://picsum.photos/id/1050/800/400" alt="Outdoor Venues">
                <h2>Why Outdoor Venues Are the New Trend</h2>
                <p>Outdoor venues are becoming increasingly popular for events. Find out why and how to make the most of them.</p>
                <a href="#">Read More</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div>
                <h3>VenueSathi</h3>
                <p>Your one-stop solution for booking the perfect venue for any event.</p>
            </div>
            <div>
                <h3>Quick Links</h3>
                <a href="/">Home</a><br>
                <a href="/about">About</a><br>
                <a href="/blog">Blog</a><br>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>