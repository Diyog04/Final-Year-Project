<!-- <h1>hello</h1>
<a href="/">Logout</a> -->
<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Diyog
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/">Logout</a></li>

        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html> -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

            <nav class="navbar navbar-expand-lg bg-body-tertiary ">
                <div class="container-fluid">

                    <div class="keii d-flex">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>



                    <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">

                        <div class="d-flex flex-wrap  justify-content-center">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/shop">shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/aboutus">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <section>
                            <div class="search d-flex flex-wrap justify-content-end p-2">
                                <div class="shown icon-cart me-4">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                                    </svg>
                                    <span>0</span>
                                </div>
                                <button
                                    class="btn btn-primary btn-md-square flex-shrink-0 mb-2 mb-lg-0 rounded-circle me-3 "
                                    data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search
                                        d-flex flex-wrap align-items-center justify-content-center"></i></button>
                        </section>

                    </div>

                </div>
            </nav>



            <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex align-items-center">
                            <div class="input-group w-75 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text btn border p-3"><i
                                        class="fa fa-search text-white"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </h2>
    </x-slot>

    <section>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/Screenshot 2024-07-20 at 02.03.39.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel1.png" class="d-block w-100" alt="...">
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



    <section>
        <h1 class="text text-center m-3 mt-5">Why Choose Us</h1>
        <div class="container justify-content-center align-items-center text-center">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3 p-2 m-4 shadow-sm" data-aos="fade-up">
                    <div class="feature-icon mb-3"><img src="images/license.png" width="150px" alt=""></div>
                    <!-- <img src="images/license.png" width="150px" alt=""> -->
                    <h3 class="fs-5 fw-bold">Licensed & Certified
                        Manufacturer</h3>
                    <p>As a certified and licensed mineral water producer based in Nepal, we strictly follow stringent
                        quality
                        standards to guarantee the purity and excellence of our every products.</p>
                </div>
                <div class="col-lg-3 p-2 m-4 shadow-sm" data-aos="fade-up">
                    <img src="images/quality.png" width="150px" alt="">
                    <h3 class="fs-5 fw-bold">Maintained Hygiene Standards</h3>
                    <p>We are dedicated to strict quality control and impeccable hygiene standards, ensuring that every
                        drop of our mineral water achieves the highest levels of purity and safety.</p>
                </div>
                <div class="col-lg-3 p-2 m-4 shadow-sm" data-aos="fade-up">
                    <img src="images/trust.png" width="150px" alt="">
                    <h3 class="fs-5 fw-bold">5 Years of
                        Trusted Reputation</h3>
                    <p>For more than five years, our dedication has established us as a dependable
                        partner, gaining the trust of long-term customers who depend on our expertise for outstanding
                        mineral water solutions.</p>
                </div>
            </div>
        </div>
    </section>




    <section class="products">
        <h1 class="text-center m-3 pt-5">Products & Services</h1>
        <div class="owl-carousel owl-theme p-1 product container">
            <div class="item">
                <div class="col col-ko-border">
                    <div class="card  border-0 h-100">
                        <img src="images/jar.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">19L Water Jar
                            </h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item ">
                <div class="col col-ko-border">
                    <div class="card border-0 h-100">
                        <img src="images/bottle.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">1L water Bottle
                            </h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col col-ko-border">
                    <div class="card border-0 h-100">
                        <img src="images/desp3.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">Hot Despencer
                            </h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col col-ko-border">
                    <div class="card border-0 h-100">
                        <img src="images/desp.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">Water Despencer
                            </h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col col-ko-border">
                    <div class="card border-0 h-100">
                        <img src="images/desp1.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">5L Water
                                Despencer</h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col col-ko-border">
                    <div class="card border-0 h-100">
                        <img src="images/desp4.png" class="card-img-top" alt="...">
                        <div class="card-body bg-info d-flex flex-column">
                            <h5 class="card-title text-light text-center fs-5 owl-text-h5 flex-grow-1">15L Cool Water
                                Jar</h5>
                            <a href="shop.html" class="btn text-light owl-butn px-3">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="calling">
        <div class="container-fluid">
            <div class="row justify-content-center row-cols-1 row-cols-md-1">
                <div class="col p-0">
                    <div class="calltoaction">
                        <img src="images/calling.png" alt="calltoaction">
                        <div class="container">
                            <div class="row">
                                <div class="loge col  text-center fs-5">
                                    <h3 class="align-text-center d-block ">A Trusted Name In <span class="d-block">
                                            Bottled Water Industry </span></h3>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <div class="container-fluid feature py-5">
        <h1 class="text-uppercase text-center">Our Feature</h1>
        <h3 class="text-center">Protect Your Family With Best Water</h3>
        <div class="container py-5">
            <div class="row g-4">
                <div class=" col-md-6 col-lg-6 col-xl-3 " data-aos="fade-up">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-hand-holding-water text-white fa-3x"></i></div>
                        <h5 class="h4 mb-3">Quality Check</h5>
                        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repellat
                            deleniti necessitatibus</p>
                        <a href="#" class="btn text-secondary">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 " data-aos="fade-up">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-filter text-white fa-3x"></i></div>
                        <h5 class="h4 mb-3">5 Steps Filtration</h5>
                        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repellat
                            deleniti necessitatibus</p>
                        <a href="#" class="btn text-secondary">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 " data-aos="fade-up">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-recycle text-white fa-3x"></i></div>
                        <h5 class="h4 mb-3">Composition</h5>
                        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repellat
                            deleniti necessitatibus</p>
                        <a href="#" class="btn text-secondary">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 " data-aos="fade-up">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-microscope text-white fa-3x"></i></div>
                        <h5 class="h4 mb-3">Lab Control</h5>
                        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repellat
                            deleniti necessitatibus</p>
                        <a href="#" class="btn text-secondary">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="testi container-fluid">
        <h1 class="text-dark pt-3 text-center">Here from our customers..</h1>
        <div class="owl-carousel owl-theme testimonial  container ">
            <div class="item mt-3">
                <div class="col col-ko-border">
                    <div class="card  border-0 shadow-sm mb-2">
                        <div class="card-body">
                            <img style="width: 150px;" class="testi mx-auto d-block" src="images/testimonial-1.jpg"
                                width="15%" alt="">
                            <p class="text-center">Everest Aqua Drop has provided us with user-friendly applications on
                                Web. Their service and quality are top-notch. For us, Everest Aqua
                                Drop is the best jar water supplier in town, and we highly recommend their services to
                                everyone.</p>
                            <p class="text-center pt-3"><i class="fa-solid fa-comment-dots"
                                    style="color: #12c2de; font-size:25px;"></i></p>
                            <h5 class="card-title text-center owl-text-h5">Jessica Carter</h5>
                            <p class="level text-center">Someone form somewhere</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item mt-3">
                <div class="col col-ko-border">
                    <div class="card  border-0 shadow-sm mb-2">
                        <div class="card-body">
                            <img style="width: 150px;" class="testi mx-auto d-block" src="images/testimonial-2.jpg"
                                width="15%" alt="">
                            <p class="text-center">Water must be of the highest quality to ensure good health, and for
                                that, Everest Aqua Drop has been our go-to supplier. Their water is top-notch, and the
                                jars are always clean and new. We are happy to be associated with Everest Aqua Drop.
                            </p>
                            <p class="text-center pt-3"><i class="fa-solid fa-comment-dots"
                                    style="color: #12c2de; font-size:25px;"></i></p>
                            <h5 class="card-title text-center owl-text-h5">Mark Zuckerburg</h5>
                            <p class="level text-center">Someone form somewhere</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item mt-3">
                <div class="col col-ko-border">
                    <div class="card  border-0 shadow-sm mb-2">
                        <div class="card-body">
                            <img style="width: 150px;" class="testi mx-auto d-block" src="images/testimonial-3.jpg"
                                width="15%" alt="">
                            <p class="text-center">We have been very happy customers of Everest Aqua Drop since 2018.
                                They are the best quality water suppliers we have come across in the Kathmandu Valley.
                                The jars are always in excellent condition, and deliveries are consistently prompt.</p>
                            <p class="text-center pt-3"><i class="fa-solid fa-comment-dots"
                                    style="color: #12c2de; font-size:25px;"></i></p>
                            <h5 class="card-title text-center owl-text-h5">Chris O'Conner</h5>
                            <p class="level text-center">Someone form somewhere</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item mt-3">
                <div class="col col-ko-border">
                    <div class="card  border-0 shadow-sm mb-2">
                        <div class="card-body">
                            <img style="width: 150px;" class="testi mx-auto d-block" src="images/testimonial-4.jpg"
                                width="15%" alt="">
                            <p class="text-center">Everest Aqua Drop has provided us with user-friendly applications on
                                Web. Their service and quality are top-notch. For us, Everest Aqua
                                Drop is the best jar water supplier in town, and we highly recommend their services to
                                everyone.</p>
                            <p class="text-center pt-3"><i class="fa-solid fa-comment-dots"
                                    style="color: #12c2de; font-size:25px;"></i></p>
                            <h5 class="card-title text-center owl-text-h5">Jession Carter</h5>
                            <p class="level text-center">Someone form somewhere</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div data-aos="fade-up">
        <img src="images/waves.png" width="100%" alt="">
    </div>



    <footer class="text-center text-lg-start text-light text-muted">

        <section>
            <div class="container text-center text-light text-md-start">
                <div class="row pt-5 ">
                    <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
                        <img src="images/logo.png" width="250px" alt="">
                        <p>
                            EVEREST AQUA DROP water is derived after undergoing Multi stage
                            Filtration system. The state of the art technology enables it to surpass all quality
                            standards.
                        </p>
                    </div>

                    <div class="links col-md-4 col-lg-2 col-xl-2 mx-auto mb-4 ">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="index.html" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="shop.html" class="text-reset">Shop</a>
                        </p>
                        <p>
                            <a href="contact.html" class="text-reset">Contact</a>
                        </p>
                        <p>
                            <a href="contact.html" class="text-reset">About Us</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>Somewhere in kathmandu</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +977 9813410467</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center text-light p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="#">EverestAquaDrop</a>
        </div>
    </footer>


    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="addtocart.js"></script>

    <script>
    $('.testimonial').owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    })
    </script>
    <script>
    var owl = $('.product');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 15,
        autoplay: true,
        responsiveClass: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,

            },
            480: {
                items: 2,

            },
            768: {
                items: 3,

            },
            1024: {
                items: 4,


            }
        }
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [2000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })
    </script>
    <script>
    AOS.init();
    </script>


</x-app-layout>