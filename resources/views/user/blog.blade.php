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
            transition: color 0.3s ease;
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
                        url('https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 120px 0;
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
            margin: 0 auto 30px;
            animation: fadeIn 2s ease-out;
        }

        .search-bar {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            animation: fadeIn 2.5s ease-out;
        }

        .search-bar input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .search-bar button {
            position: absolute;
            right: 5px;
            top: 5px;
            background: #810505;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-bar button:hover {
            background: #6a0404;
        }

        /* Blog Section */
        .blog-section {
            padding: 60px 0;
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

        .section-title p {
            color: #666;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .blog-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .blog-img {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-card:hover .blog-img img {
            transform: scale(1.1);
        }

        .blog-date {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(129, 5, 5, 0.9);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .blog-content {
            padding: 25px;
        }

        .blog-content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .blog-content p {
            color: #666;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: #888;
        }

        .read-more {
            display: inline-block;
            padding: 10px 20px;
            background: #810505;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .read-more:hover {
            background: #6a0404;
            transform: translateY(-2px);
        }

        .categories {
            margin-bottom: 50px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .category-btn {
            padding: 8px 20px;
            background: #f1f1f1;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .category-btn:hover, .category-btn.active {
            background: #810505;
            color: white;
        }

        /* Newsletter Section */
        .newsletter {
            background: #f5f5f5;
            padding: 60px 0;
            text-align: center;
            margin-top: 60px;
        }

        .newsletter h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .newsletter p {
            max-width: 600px;
            margin: 0 auto 30px;
            color: #666;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
        }

        .newsletter-form button {
            background: #810505;
            color: white;
            border: none;
            padding: 0 25px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .newsletter-form button:hover {
            background: #6a0404;
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
            
            .blog-grid {
                grid-template-columns: 1fr;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                border-radius: 5px;
                margin-bottom: 10px;
            }
            
            .newsletter-form button {
                border-radius: 5px;
                padding: 15px;
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
            <h1>VenueVista Blog</h1>
            <p>Discover expert tips, latest trends, and insider knowledge to make your next event unforgettable.</p>
           
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="section-title">
                <h2>Latest Articles</h2>
                <p>Explore our collection of articles to help you plan your perfect event</p>
            </div>
            
            
            
            <div class="blog-grid">
                <!-- Blog Post 1 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Wedding Venue">
                        <span class="blog-date">June 15, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Weddings</span>
                            <span><i class="far fa-clock"></i> 5 min read</span>
                        </div>
                        <h3>Top 10 Wedding Venue Selection Mistakes to Avoid</h3>
                        <p>Discover the common pitfalls couples encounter when choosing their wedding venue and how to steer clear of them for your special day.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                
                <!-- Blog Post 2 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Corporate Event">
                        <span class="blog-date">June 10, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Corporate</span>
                            <span><i class="far fa-clock"></i> 7 min read</span>
                        </div>
                        <h3>The Ultimate Guide to Hybrid Event Planning</h3>
                        <p>Learn how to seamlessly blend in-person and virtual experiences for your next corporate event with our comprehensive guide.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                
                <!-- Blog Post 3 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Event Themes">
                        <span class="blog-date">June 5, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Planning Tips</span>
                            <span><i class="far fa-clock"></i> 4 min read</span>
                        </div>
                        <h3>2024 Event Design Trends You Need to Know</h3>
                        <p>From sustainable decor to immersive experiences, explore the top design trends that will dominate events this year.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                
                <!-- Blog Post 4 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Outdoor Venues">
                        <span class="blog-date">May 28, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Venue Spotlights</span>
                            <span><i class="far fa-clock"></i> 6 min read</span>
                        </div>
                        <h3>Hidden Gem: The Riverside Pavilion</h3>
                        <p>Take an exclusive look at one of our most picturesque venues, perfect for weddings, corporate retreats, and special celebrations.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                
                <!-- Blog Post 5 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Budget Planning">
                        <span class="blog-date">May 20, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Planning Tips</span>
                            <span><i class="far fa-clock"></i> 8 min read</span>
                        </div>
                        <h3>How to Stretch Your Event Budget Further</h3>
                        <p>Smart strategies to maximize your event budget without compromising on quality or guest experience.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                
                <!-- Blog Post 6 -->
                <div class="blog-card fade-in">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1492681290082-e932832941e6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80" alt="Party Planning">
                        <span class="blog-date">May 15, 2024</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-folder"></i> Parties</span>
                            <span><i class="far fa-clock"></i> 5 min read</span>
                        </div>
                        <h3>Themed Party Ideas That Will Wow Your Guests</h3>
                        <p>Creative theme ideas and execution tips to make your next party the talk of the town.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 50px;">
                <button style="padding: 12px 30px; background: #810505; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; transition: all 0.3s ease;">
                    Load More Articles
                </button>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <h3>Stay Updated</h3>
            <p>Subscribe to our newsletter for the latest event planning tips, venue spotlights, and exclusive offers.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    @include('user/footer')
    
    <script>
        // Simple category filter functionality
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                // Here you would typically filter blog posts
                // For demo purposes, we'll just log the category
                console.log('Filter by:', this.textContent);
            });
        });
    </script>
</body>
</html>