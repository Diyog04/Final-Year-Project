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