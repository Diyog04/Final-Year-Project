<!DOCTYPE html>
<html lang="en">
<head>
    @include('user/head')
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            scroll-behavior: smooth;
            line-height: 1.6;
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
            transition: all 0.3s ease;
            position: relative;
        }

        header nav a:hover {
            color: #ffdd57;
        }

        header nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #ffdd57;
            transition: width 0.3s ease;
        }

        header nav a:hover::after {
            width: 100%;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(129, 5, 5, 0.8), rgba(129, 5, 5, 0.9)), 
                        url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 150px 0;
            text-align: center;
            position: relative;
            margin-bottom: 40px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-out;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto;
            animation: fadeIn 2s ease-out;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
            background: #fff;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #810505;
            margin-bottom: 15px;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: #810505;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 40px;
            margin-bottom: 60px;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
        }

        .about-image {
            flex: 1;
            min-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .highlight {
            color: #810505;
            font-weight: 600;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .mission-card, .vision-card {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .mission-card:hover, .vision-card:hover {
            transform: translateY(-10px);
        }

        .mission-card h3, .vision-card h3 {
            font-size: 1.8rem;
            color: #810505;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .mission-card h3::after, .vision-card h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: #810505;
            bottom: -8px;
            left: 0;
        }

        /* Stats Section */
        .stats-section {
            background: #810505;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .stat-item {
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ffdd57;
        }

        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Team Section */
        .team-section {
            padding: 80px 0;
            background: #f9f9f9;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .team-member {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .member-image {
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .team-member:hover .member-image img {
            transform: scale(1.1);
        }

        .member-info {
            padding: 25px 20px;
        }

        .member-info h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: #333;
        }

        .member-info p {
            color: #810505;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .member-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .member-social a {
            color: #666;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .member-social a:hover {
            color: #810505;
        }

        /* Values Section */
        .values-section {
            padding: 80px 0;
            background: #fff;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .value-card {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid #810505;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            font-size: 2.5rem;
            color: #810505;
            margin-bottom: 20px;
        }

        .value-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        /* CTA Section */
        .cta-section {
            background: #810505;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            background: white;
            color: #810505;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .cta-button:hover {
            background: #ffdd57;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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
            text-align: left;
        }

        footer h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        footer h3::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background: white;
            bottom: -8px;
            left: 0;
        }

        footer p {
            font-size: 1rem;
            color: #eee;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        footer a {
            color: #eee;
            text-decoration: none;
            transition: color 0.3s ease;
            display: block;
            margin-bottom: 0.5rem;
        }

        footer a:hover {
            color: #ffdd57;
        }

        footer .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        footer .social-links a {
            font-size: 1.2rem;
            color: #eee;
            transition: color 0.3s ease;
        }

        footer .social-links a:hover {
            color: #ffdd57;
        }

        footer .footer-bottom {
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1.5rem;
            font-size: 0.9rem;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .about-content {
                flex-direction: column;
            }
            
            .mission-vision {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user/header')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Our Story</h1>
            <p>Discover the passion and people behind Venue Sathi - your trusted partner in finding the perfect event spaces</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="section-title">
                <h2>Who We Are</h2>
                <p>Connecting people with perfect venues since 2024</p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <p>Founded in 2024, <span class="highlight">Venue Sathi</span> began as a simple idea to solve a common problem: finding affordable, quality venues for events shouldn't be so difficult. What started as a small project has grown into Nepal's most trusted venue booking platform, serving thousands of happy customers.</p>
                    <p>Our team comes from diverse backgrounds in event planning, technology, and hospitality, united by a shared vision to make venue discovery effortless and enjoyable. We understand that every event is unique, and we're committed to helping you find the perfect space that matches your vision and budget.</p>
                    <p>Today, we partner with hundreds of venues across major cities, offering transparent pricing, verified reviews, and personalized recommendations to ensure your event planning journey is smooth from start to finish.</p>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Venue Sathi Team">
                </div>
            </div>
            
            <div class="mission-vision">
                <div class="mission-card">
                    <h3>Our Mission</h3>
                    <p>To revolutionize venue booking by creating a seamless, transparent platform that connects event planners with the perfect spaces while supporting venue owners in showcasing their properties effectively.</p>
                </div>
                <div class="vision-card">
                    <h3>Our Vision</h3>
                    <p>To become Nepal's most comprehensive venue marketplace, where anyone can easily find, compare, and book event spaces for any occasion, anytime, anywhere.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="section-title">
                <h2 style="color: white;">By The Numbers</h2>
                <p style="color: #ffdd57;">Our impact in the venue booking industry</p>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Venues Listed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Cities Covered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Customer Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-title">
                <h2>Meet The Team</h2>
                <p>The passionate people behind Venue Sathi</p>
            </div>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="John Doe">
                    </div>
                    <div class="member-info">
                        <h3>John Doe</h3>
                        <p>CEO & Founder</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Jane Smith">
                    </div>
                    <div class="member-info">
                        <h3>Jane Smith</h3>
                        <p>Chief Technology Officer</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Emily Johnson">
                    </div>
                    <div class="member-info">
                        <h3>Emily Johnson</h3>
                        <p>Head of Customer Experience</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Michael Brown">
                    </div>
                    <div class="member-info">
                        <h3>Michael Brown</h3>
                        <p>Venue Partnerships Manager</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Customer First</h3>
                    <p>We prioritize our customers' needs above all else, ensuring every interaction leaves them feeling valued and supported.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We constantly seek better ways to solve problems and improve the venue booking experience for everyone.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3>Transparency</h3>
                    <p>Honest pricing, genuine reviews, and clear communication form the foundation of all our relationships.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>We believe in building strong connections between venue owners and event planners to create a thriving ecosystem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Find Your Perfect Venue?</h2>
            <p>Join thousands of happy customers who've found their ideal event spaces through Venue Sathi</p>
            <a href="/" class="cta-button">Browse Venues Now</a>
        </div>
    </section>

    <!-- Footer -->
    @include('user/footer')
</body>
</html>