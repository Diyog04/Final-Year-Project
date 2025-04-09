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
            align-items: center;
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

        .notification-bell {
            position: relative;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .notification-bell:hover {
            transform: scale(1.1);
        }

        .notification-bell .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff4d4d;
            color: white;
            font-size: 0.75rem;
            padding: 3px 6px;
            border-radius: 50%;
        }

        .notification-dropdown {
            position: absolute;
            top: 50px;
            right: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            opacity: 0;
            z-index: 1000;
        }

        .notification-dropdown.active {
            max-height: 400px; /* Adjust based on content */
            opacity: 1;
        }

        .notification-dropdown .notification-header {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            font-weight: 600;
            color: #333;
        }

        .notification-dropdown .notification-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .notification-dropdown .notification-item {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            color: #555;
            transition: background-color 0.3s ease;
        }

        .notification-dropdown .notification-item:hover {
            background-color: #f9f9f9;
        }

        .notification-dropdown .notification-item:last-child {
            border-bottom: none;
        }


        .notification-dropdown {
    width: 350px;
    max-height: 500px;
    overflow-y: auto;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1000;
    display: none;
}

.notification-header {
    padding: 12px 16px;
    font-weight: bold;
    border-bottom: 1px solid #eee;
}

.notification-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.notification-item {
    padding: 12px 16px;
    border-bottom: 1px solid #f5f5f5;
}

.notification-item:hover {
    background-color: #f9f9f9;
}

.confirmed-notification {
    border-left: 3px solid #4CAF50;
}

.cancelled-notification {
    border-left: 3px solid #F44336;
}

.pending-notification {
    border-left: 3px solid #FFC107;
}

.notification-content h3 {
    margin: 0 0 4px 0;
    font-size: 14px;
}

.notification-meta {
    margin: 0;
    font-size: 12px;
    color: #666;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #F44336;
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-icon {
    position: relative;
    margin-right: 20px;
}

        /* Hero Section */
        .carousel {
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .carousel img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            animation: zoomIn 10s infinite alternate;
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

        /* Search Filters */
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
            animation: fadeInUp 1s ease-out;
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

        /* Venues Section */
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
            animation: fadeInUp 1s ease-out;
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
            animation: fadeInUp 1s ease-out;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: white;
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

        @keyframes zoomIn {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.1);
            }
        }

        .fade-in {
            animation: fadeInUp 1s ease-out;
        }

        .dropdown-item:hover {
            background: gray;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">VenueSathi</div>
        <nav>
            <ul class="navbar-nav d-flex flex-row align-items-center" style="gap: 20px;">
        
                <!-- Other nav links -->
                <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('user.recent-bookings') }}">My Bookings</a></li>
                <!-- Notification -->
                <li class="nav-item dropdown">
                    <button class="btn nav-link position-relative text-white" id="notificationDropdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fa-lg"></i>
                        @php
                            $unreadCount = auth()->user()->unreadNotifications->count() + count($calls);
                        @endphp
                        @if($unreadCount > 0)
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                            {{ $unreadCount }}
                        </span>
                        @endif
                    </button>
                
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notificationDropdownBtn"
                        style="width: 350px; max-height: 500px; overflow-y: auto; background-color: rgba(0, 0, 0, 0.9); color: white; border: none;">
                        <li class="px-3 py-2 d-flex justify-content-between align-items-center border-bottom border-secondary">
                            <span>Notifications ({{ $unreadCount }})</span>
                            <form action="{{ route('notifications.markAllRead') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 text-white text-decoration-none">Mark All</button>
                            </form>
                        </li>
                
                        <!-- Booking Status Notifications -->
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="{{ $notification->data['url'] }}" class="dropdown-item text-white">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <strong>{{ $notification->data['message'] }}</strong><br>
                                            <small class="text-light">
                                                {{ $notification->data['product_name'] }}
                                                <span class="float-end">{{ \Carbon\Carbon::parse($notification->data['time'])->diffForHumans() }}</span>
                                            </small>
                                        </div>
                                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" class="ms-2">
                                            @csrf
                                            <button type="submit" class="btn btn-sm p-0 text-white-50"><i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                </a>
                            </li>
                        @empty
                        @endforelse
                
                        <!-- Call Notifications -->
                        @forelse ($calls as $call)
                            <li>
                                <a href="#" class="dropdown-item text-white">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <strong>{{ $call->title1 }}</strong><br>
                                            <small class="text-light">{{ $call->description1 }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                        @endforelse
                
                        @if(auth()->user()->unreadNotifications->count() == 0 && count($calls) == 0)
                            <li><span class="dropdown-item text-muted">No new notifications</span></li>
                        @endif
                    </ul>
                </li>

            </ul>
        </nav>
        
        
        
        <!-- Notification Dropdown -->

        

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
            <button type="submit">Search</button>
        </div>
    </form>

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
    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>

</html>