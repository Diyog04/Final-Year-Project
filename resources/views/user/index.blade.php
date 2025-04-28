<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/head')
</head>

<body>
    <!-- Header -->
    @include('user/header')

    <!-- Hero Section with Carousel -->
    <section class="hero-section">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner-1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h1>Your Dream Wedding Starts Here</h1>
                    <p class="fs-5">Discover the perfect venues for your special day</p>
                    <a href="#venues" class="btn btn-primary btn-lg mt-3">Explore Venues</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/banner-2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h1>Your Dream Wedding Starts Here</h1>
                    <p class="fs-5">Discover the perfect venues for your special day</p>
                    <a href="#venues" class="btn btn-primary btn-lg mt-3">Explore Venues</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/banner-3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h1>Your Dream Wedding Starts Here</h1>
                    <p class="fs-5">Discover the perfect venues for your special day</p>
                    <a href="#venues" class="btn btn-primary btn-lg mt-3">Explore Venues</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </section>


    <!-- Search Filters -->
    
    <form action="{{ route('event.search') }}" method="GET" class="search-form">
        <div class="search-filters">
            <select name="location" class="form-select location-select">
                <option value="">All Locations</option>
                @foreach ($locations as $location)
                    <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                        {{ $location }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                Search
            </button>
        </div>
    </form>




     <!-- Venues Section -->
     <section class="venues-section py-5" id="venues">
        <div class="container">
            <h2 class="section-title text-center mb-5">Our Venues</h2>
            <div class="row g-4">
                <!-- Venue 1 -->
                @foreach ($products as $index => $product)
                <div class="col-lg-4 col-md-6">
                    <div class="venue-card">
                        <div class="venue-img-container">
                            <img src="{{ asset('storage/' . $product->image2) }}" alt="venue image" class="venue-img">
                           
                        </div>
                        <div class="venue-details">
                            <h3>{{ $product->title2 }}</h3>
                            <div class="venue-meta justify-content-center">
                                <span><i class="fas fa-map-marker-alt"></i> {{ $product->location }}</span>
                                
                            </div>
                            <p class="venue-description">{{ $product->description2 }}</p>
                            <div class="venue-footer d-flex justify-content-center align-items-center">
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-outline-primary">View Venue Details</a>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
                @endforeach
              
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg">View All Venues</a>
            </div>
        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Bride & Groom Testimonials</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Our wedding was magical thanks to the perfect venue we found here. The staff went above and beyond to make our day special."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Priya" class="author-img">
                            <div>
                                <h5>Priya & Raj</h5>
                                <span>December 2023 Wedding</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"We were able to compare multiple venues and find exactly what we wanted within our budget. Highly recommend VenueSathi!"</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ananya" class="author-img">
                            <div>
                                <h5>Ananya & Vikram</h5>
                                <span>February 2024 Wedding</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="testimonial-text">"The venue was even more beautiful in person. The booking process was smooth and the team was very responsive to all our queries."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Neha" class="author-img">
                            <div>
                                <h5>Neha & Arjun</h5>
                                <span>November 2023 Wedding</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wedding Inspiration Section -->
    <section class="inspiration-section py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Wedding Inspiration</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="inspiration-card">
                        <img src="https://images.unsplash.com/photo-1519657337289-077653f724ed" alt="Wedding Theme" class="img-fluid rounded">
                        <div class="inspiration-overlay">
                            <h5>Royal Gold Theme</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inspiration-card">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed" alt="Wedding Theme" class="img-fluid rounded">
                        <div class="inspiration-overlay">
                            <h5>Floral Decor Ideas</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inspiration-card">
                        <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e" alt="Wedding Theme" class="img-fluid rounded">
                        <div class="inspiration-overlay">
                            <h5>Bridal Fashion</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="inspiration-card">
                        <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8" alt="Wedding Theme" class="img-fluid rounded">
                        <div class="inspiration-overlay">
                            <h5>Outdoor Weddings</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


    <script>
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('notificationDropdown');
            const bell = document.querySelector('.notification-bell');

            // Check if click is outside both dropdown and bell
            if (!dropdown.contains(event.target) && !bell.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
