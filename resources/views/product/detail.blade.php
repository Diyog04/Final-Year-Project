<!DOCTYPE html>
<html lang="en">
    @include('user/head')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title2 }} | VenueSathi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   <style>
        :root {
            --wedding-gold: #d4a762;
            --wedding-maroon: #800020;
            --wedding-blush: #f8e5e5;
            --wedding-dark: #222222;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background-color: #f9f9f9;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            color: var(--wedding-maroon);
        }
        
        /* Header */
        .main-header {
            background-color: var(--wedding-maroon);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: white;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--wedding-gold) !important;
        }
        
        /* Hero Section */
        .venue-hero {
            position: relative;
            height: 70vh;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
        }
        
        .venue-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 3rem;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero-content p {
            font-size: 1.2rem;
            max-width: 800px;
        }
        
        .back-btn {
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 1rem;
            transition: color 0.3s;
        }
        
        .back-btn:hover {
            color: var(--wedding-gold);
        }
        
        /* Main Content */
        .main-content {
            padding: 4rem 0;
        }
        
        /* Gallery */
        .gallery-section {
            margin-bottom: 4rem;
        }
        
        .gallery-img {
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        
        .gallery-img:hover {
            transform: scale(1.02);
        }
        
        /* Details Section */
        .details-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 3rem;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: var(--wedding-gold);
        }
        
        .detail-list {
            list-style: none;
            padding: 0;
        }
        
        .detail-list li {
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .detail-list li:last-child {
            border-bottom: none;
        }
        
        .detail-icon {
            color: var(--wedding-gold);
            margin-right: 1rem;
            font-size: 1.2rem;
            min-width: 30px;
        }
        
        .package-item {
            background: var(--wedding-blush);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .package-item i {
            margin-right: 0.8rem;
            color: var(--wedding-gold);
        }
        
        .amenity-badge {
            display: inline-block;
            background: var(--wedding-blush);
            color: var(--wedding-maroon);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            margin: 0.3rem;
            font-size: 0.9rem;
        }
        
        /* Booking Section */
        .booking-section {
            background: var(--wedding-maroon);
            color: white;
            padding: 3rem;
            border-radius: 10px;
            margin-bottom: 3rem;
        }
        
        .booking-section h2 {
            color: white;
        }
        
        .booking-section .section-title:after {
            background: var(--wedding-gold);
        }
        
        .booking-btn {
            background: var(--wedding-gold);
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .booking-btn:hover {
            background: white;
            color: var(--wedding-maroon);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .booking-btn i {
            margin-left: 0.5rem;
        }
        
        /* Map Section */
        .map-section {
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }
        
        /* Contact Form */
        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-control {
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        
        .form-control:focus {
            border-color: var(--wedding-gold);
            box-shadow: 0 0 0 0.25rem rgba(212, 167, 98, 0.25);
        }
        
        /* Footer */
        .main-footer {
            background: var(--wedding-dark);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--wedding-gold);
            margin-bottom: 1.5rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--wedding-gold);
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            margin-right: 0.8rem;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background: var(--wedding-gold);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            color: #999;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .venue-hero {
                height: 50vh;
            }
            
            .hero-content {
                padding: 2rem;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .details-section, .contact-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user/header')

    <!-- Hero Section -->
    <section class="venue-hero">
        <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->title2 }}">
        <div class="hero-content text-center">
            <div class="container">
                <h1>{{ $product->title2 }}</h1>
                <p">{{ $product->description2 }}</p>
                <a href="javascript:history.back()" class="back-btn">
                    <i class="fas fa-arrow-left me-2"></i> Back to Venues
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container my-4 mb-5">
            {{-- <!-- Gallery Section -->
            <section class="gallery-section">
                <div class="row g-4">
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8" alt="Venue Image" class="img-fluid gallery-img">
                    </div>
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed" alt="Venue Image" class="img-fluid gallery-img">
                    </div>
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf" alt="Venue Image" class="img-fluid gallery-img">
                    </div>
                </div>
            </section> --}}


            @if (isset($venueImages) && count($venueImages))
            <h4 class="mt-4 mb-3">Venue Image Gallery</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($venueImages as $image)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 class="card-img-top rounded" 
                                 alt="Venue Image" 
                                 style="object-fit: cover; height: 250px;">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

            <!-- Details Section -->
            <div class="row mt-5">
                <div class="col-lg-8">
                    <section class="details-section">
                        <h2 class="section-title">Venue Details</h2>
                        <ul class="detail-list">
                            <li>
                                <span class="detail-icon"><i class="fas fa-phone"></i></span>
                                <span>{{ $product->contact }}</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-users"></i></span>
                                <span>Indoor Seating Capacity: 300 per hall (2 halls available)</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-gift"></i></span>
                                <div>
                                    <strong>Packages:</strong>
                                    @php
                                        $packages = json_decode($product->packege);
                                    @endphp
                                    <div class="mt-2">
                                        @foreach ($packages as $package)
                                            <div class="package-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>{{ $package }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-paint-brush"></i></span>
                                <span>Decoration Service: Contact for pricing</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-rupee-sign"></i></span>
                                <span>Advance Payment: Rs.25,000</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-info-circle"></i></span>
                                <span>Cancellation Policy: Full refund for valid reasons</span>
                            </li>
                        </ul>
                    </section>

                    <!-- Amenities Section -->
                    <section class="details-section">
                        <h2 class="section-title">Amenities</h2>
                        <div>
                            @php
                                $amenities = json_decode($product->amenity);
                            @endphp
                            @foreach ($amenities as $amenity)
                                <span class="amenity-badge">
                                    <i class="fas fa-check me-1"></i> {{ $amenity }}
                                </span>
                            @endforeach
                        </div>
                    </section>
                </div>

                <div class="col-lg-4">
                    <!-- Booking Section -->
                    <section class="booking-section">
                        <h2 class="section-title">Book This Venue</h2>
                        <p>Ready to book this beautiful venue for your special day? Click below to start your booking process.</p>
                        <div class="text-center mt-4">
                            <a href="{{ route('bookings.create', ['product_id' => $product->id]) }}" class="booking-btn">
                                Book With Khalti <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </section>

                    <!-- Contact Info -->
                    <section class="details-section">
                        <h2 class="section-title">Quick Contact</h2>
                        <ul class="detail-list">
                            <li>
                                <span class="detail-icon"><i class="fas fa-phone"></i></span>
                                <span>{{ $product->contact }}</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-envelope"></i></span>
                                <span>info@venuesathi.com</span>
                            </li>
                            <li>
                                <span class="detail-icon"><i class="fas fa-clock"></i></span>
                                <span>Open: 9:00 AM - 7:00 PM (Daily)</span>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>

            <!-- Map Section -->
            <h4>Location Map</h4>
            <div id="venueMap" style="height: 300px; width: 100%; margin-top: 20px;"></div>


            <!-- Contact Form -->
            <section class="contact-form mt-5">
                <h2 class="section-title">Send Enquiry</h2>
                <form action="https://api.web3forms.com/submit" method="post">
                    <input type="hidden" name="access_key" value="22ff5fa7-e0b4-4911-80d1-d03c63f11a4f">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Submit Enquiry</button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">VenueSathi</div>
                    <p>Your trusted partner in finding the perfect wedding venues across India. We help couples create unforgettable memories.</p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Venues</a></li>
                        <li><a href="#">Destinations</a></li>
                        <li><a href="#">Wedding Tips</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>Wedding Services</h4>
                    <ul class="footer-links">
                        <li><a href="#">Banquet Halls</a></li>
                        <li><a href="#">Destination Weddings</a></li>
                        <li><a href="#">Wedding Planners</a></li>
                        <li><a href="#">Catering Services</a></li>
                        <li><a href="#">Photographers</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h4>Contact Us</h4>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Wedding Lane, Mumbai</p>
                        <p><i class="fas fa-phone me-2"></i> +91 98765 43210</p>
                        <p><i class="fas fa-envelope me-2"></i> info@venuesathi.com</p>
                    </address>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2025 VenueSathi. All rights reserved. | Made with <i class="fas fa-heart text-danger"></i> for couples in love
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var lat = {{ $product->latitude }};
        var lng = {{ $product->longitude }};
    
        var map = L.map('venueMap').setView([lat, lng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        L.marker([lat, lng]).addTo(map).bindPopup("Venue Location").openPopup();
    </script>
    <script>
        // Simple animation for elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.details-section, .booking-section, .contact-form');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if(elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        // Set initial state
        document.querySelectorAll('.details-section, .booking-section, .contact-form').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.6s ease-out';
        });
        
        // Run on load and scroll
        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>

</html>