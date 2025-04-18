<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking Web App</title>
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
        }

        header {
            background-color: #810505;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        header nav {
            display: flex;
            gap: 1.5rem;
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

        .hero {
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 1rem;
        }

        .carousel-controls button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 1rem;
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .carousel-controls button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .search-filters {
            margin: 2rem auto;
            max-width: 1200px;
            padding: 1rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .search-filters select,
        .search-filters input,
        .search-filters button {
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-filters select:focus,
        .search-filters input:focus {
            border-color: #007BFF;
        }

        .search-filters button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-filters button:hover {
            background-color: #0056b3;
        }

        .venues {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .venue-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .venue-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .venue-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .venue-card .details {
            padding: 1.5rem;
        }

        .venue-card h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        .venue-card p {
            margin: 0.75rem 0;
            color: #666;
            line-height: 1.5;
        }

        .venue-card button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            cursor: pointer;
            border-radius: 8px;
            width: 100%;
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .venue-card button:hover {
            background-color: #0056b3;
        }

        /* Testimonials Section */
        .testimonials {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 2rem;
            background-color: #810505;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: #333;
        }

        .testimonial-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .testimonial-card {
            background-color: #f9f9f9;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .testimonial-card p {
            font-size: 1rem;
            color: #666;
            line-height: 1.5;
        }

        .testimonial-card h4 {
            margin: 1rem 0 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .testimonial-card span {
            font-size: 0.875rem;
            color: #888;
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
    <header>
        <div class="logo">VenueSathi</div>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/blog">Blog</a>
            <a href="/login">Login</a>
        </nav>
    </header>

    <!-- Hero Section with Carousel -->

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/banner-1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/banner-2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/banner-3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <h1 class="m-4 text-center" style="font-size: 2.5rem; font-weight: 600; color: #333;">Our Venues</h1>

    <!-- Search Filters -->
    <form action="{{ route('event.search') }}" method="GET">
    <div class="search-filters">
        <select name="location">
            <option value="">Select Location</option>
            <option value="new-york">Itahari</option>
            <option value="los-angeles">Damak</option>
            <option value="los-angeles">Biratnagar</option>
            <option value="los-angeles">Dharan</option>
        </select>
        <select name="event_type">
            <option value="">Event Type</option>
            <option value="wedding">Wedding</option>
            <option value="party">Party</option>
            <option value="party">Birthday</option>
            <option value="party">Meeting</option>
        </select>
        <input type="date" name="date" />
        <input type="number" name="max_price" placeholder="Max Price" />
        <button type="submit">Search</button>
    </div>
</form>

<!-- Ensure $events exists before accessing it -->
@if(isset($events) && $events->isNotEmpty())
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->location }} - ${{ $event->price }}</li>
        @endforeach
    </ul>
@else
   <!-- <p>No events found.</p> -->
@endif


    <!-- Venues Section -->
    <section>
    <div class="venues">
        @foreach ($products as $index => $product)
        <div class="venue-card fade-in">
            <img src="{{ asset('storage/' . $product->image2) }}" alt="Venue Image">
            <div class="details">
                <h3>{{ $product->title2 }}</h3>
                <p>{{ $product->description2 }}</p>
                <a href="{{ route('product.detail', $product->id) }}" class="btn">View more</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

    <!-- Testimonials Section -->
    <div class="testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-cards">
            <div class="testimonial-card fade-in">
                <p>"Amazing service! The venue was perfect for our wedding. Highly recommended!"</p>
                <h4>John Doe</h4>
                <span>Wedding Client</span>
            </div>
            <div class="testimonial-card fade-in">
                <p>"Great experience! The team was very professional and accommodating."</p>
                <h4>Jane Smith</h4>
                <span>Corporate Event Client</span>
            </div>
            <div class="testimonial-card fade-in">
                <p>"The best venue booking platform I've ever used. Easy and hassle-free!"</p>
                <h4>Michael Brown</h4>
                <span>Party Organizer</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <script>
        // Carousel Functionality
        const carousel = document.getElementById('carousel');
        const slides = carousel.children;
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let currentIndex = 0;

        function showSlide(index) {
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        prev.addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
            showSlide(currentIndex);
        });

        next.addEventListener('click', () => {
            currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
            showSlide(currentIndex);
        });

        // Fade-in Animation on Scroll
        const fadeElements = document.querySelectorAll('.fade-in');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, { threshold: 0.5 });

        fadeElements.forEach(element => {
            observer.observe(element);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>

</html>

 

