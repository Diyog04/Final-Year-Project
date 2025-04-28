
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
         /* Custom Styles */
         :root {
            --wedding-gold: #d4a762;
            --wedding-maroon: #800020;
            --wedding-blush: #f8e5e5;
            --wedding-dark: #222222;
        }
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

        .hero-section {
            position: relative;
        }

        carousel-caption {
            bottom: 30%;
            text-align: left;
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
        }
        
        .carousel-caption h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Search Filters */
        .search-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 1rem;
    }

    .search-filters {
        display: flex;
        gap: 10px;
        width: 100%;
    }

    .location-select {
        flex: 1;
        padding: 12px 20px;
        border: 1px solid #e0e0e0;
        border-radius: 30px;
        font-size: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }

    .location-select:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
    }

    .search-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background-color: #4a90e2;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(74, 144, 226, 0.3);
    }

    .search-button:hover {
        background-color: #3a7bc8;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
    }

    .search-button:active {
        transform: translateY(0);
    }

    @media (max-width: 576px) {
        .search-filters {
            flex-direction: column;
        }
        
        .search-button {
            justify-content: center;
        }
    }

          /* Venue Cards */
        .venue-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background: white;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .venue-card:hover {
            transform: translateY(-10px);
        }
        
        .venue-img-container {
            position: relative;
            height: 250px;
            overflow: hidden;
        }
        
        .venue-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .venue-card:hover .venue-img {
            transform: scale(1.05);
        }
        
        .venue-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ff6b6b;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .venue-details {
            padding: 20px;
        }
        
        .venue-meta {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        .venue-price {
            font-weight: bold;
            color: var(--wedding-gold);
            font-size: 1.2rem;
        }
        
        /* Testimonials */
        .testimonials-section {
            background: var(--wedding-blush);
        }
        
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        .testimonial-rating {
            color: var(--wedding-gold);
            margin-bottom: 15px;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        
        /* Section Titles */
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            font-weight: 600;
            color: var(--wedding-maroon);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--wedding-gold);
        }
        
        /* Buttons */
        .btn-primary {
            background-color: var(--wedding-gold);
            border-color: var(--wedding-gold);
            color: #fff;
        }
        
        .btn-primary:hover {
            background-color: var(--wedding-maroon);
            border-color: var(--wedding-maroon);
        }
        
        .btn-outline-primary {
            color: var(--wedding-gold);
            border-color: var(--wedding-gold);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--wedding-gold);
            color: white;
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
