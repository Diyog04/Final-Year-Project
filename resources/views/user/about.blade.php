<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - VenueSathi</title>
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

        /* About Section Styles */
        .about-section {
            padding: 60px 0;
            background: #fff;
        }

        .about-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007BFF;
            animation: fadeInUp 1s ease-out;
        }

        .about-section p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease-out;
        }

        .about-section .highlight {
            color: #810505;
            font-weight: 600;
        }

        /* Team Section Styles */
        .team-section {
            padding: 60px 0;
            background: #f4f4f4;
        }

        .team-section h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 40px;
            color: #007BFF;
            animation: fadeInUp 1s ease-out;
        }

        .team-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .team-member {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 1s ease-out;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
            border: 4px solid #007BFF;
        }

        .team-member h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .team-member p {
            font-size: 1rem;
            color: #777;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .team-member {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .team-member {
                width: 100%;
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
            <a href="/About">About</a>
            <a href="/blog">Blog</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <header class="header">
        <div class="container">
            <h1>About Us</h1>
            <p>Learn more about our mission, team, and story.</p>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="about-section">
        <div class="container">
            <h2>Our Mission</h2>
            <p>At <span class="highlight">Venue Sathi</span>, our mission is to revolutionize the way people find and book venues. We aim to provide a seamless platform where users can discover affordable venues in their desired locations, making event planning easier and more accessible for everyone.</p>
            <h2>Who We Are</h2>
            <p>We are a team of passionate individuals dedicated to making event planning stress-free and enjoyable. With expertise in technology, customer service, and event management, we work tirelessly to ensure that our platform meets the needs of both venue owners and event planners. Our commitment to affordability, transparency, and user satisfaction drives everything we do.</p>
            <h2>Our Story</h2>
            <p>Founded in 2024, <span class="highlight">Venue Sathi</span> was born out of a simple idea: to connect people with the perfect venues for their events. Whether it's a wedding, corporate event, or a casual gathering, we understand how challenging it can be to find the right space at the right price. That's why we created a platform that simplifies the process, offering a wide range of venues in estimated locations at affordable rates.</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="John Doe">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Jane Smith">
                    <h3>Jane Smith</h3>
                    <p>Lead Developer</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/150" alt="Emily Johnson">
                    <h3>Emily Johnson</h3>
                    <p>Designer</p>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>