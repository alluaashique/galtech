<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Medilix - Healthcare & Medical Bootstrap HTML5 Template</title>
    <meta name="description" content="Medilix - Healthcare & Medical Bootstrap HTML5 Template">
    <meta name="author" content="ahmmedsabbirbd">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user_assets/imgs/favicon.svg') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/vendor/fontawesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/vendor/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugins/odometer-theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/main.css') }}">
</head>
<body class="body-1">

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- preloader start -->
<div id="preloader">
    <div class="preloader-close">x</div>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- preloader start -->
<div class="loading-form">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- Backtotop start -->
<div id="scroll-percentage">
    <span id="scroll-percentage-value" data-default-color="var(--rr-color-900)" data-scroll-color="var(--rr-theme-primary)"></span>
</div>
<!-- Backtotop end -->

<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{route('index')}}">
                            <img src="{{ asset('user_assets/imgs/logo/logo-white.svg') }}" alt="logo not found">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas-close-icon animation--flip">
                                <span class="offcanvas-m-lines">
                              <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                                </span>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>
                <div class="offcanvas__social">
                    <h4 class="offcanvas__title mb-20">Subscribe & Follow</h4>
                    <p class="mb-30">Medical practices evolved over millennia, from ancient civilizations like Egypt and Mesopotamia to the groundbreaking</p>
                    <ul class="header-top-socail-menu d-flex">
                        <li><a href="{{config('projectConfig.project_facebook')}}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{config('projectConfig.project_twitter')}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{config('projectConfig.project_pinterest')}}"><i class="fa-brands fa-pinterest-p"></i></a></li>
                        <li><a href="{{config('projectConfig.project_vimeo')}}"><i class="fa-brands fa-vimeo-v"></i></a></li>
                    </ul>
                </div>
                <div class="offcanvas__btn d-sm-none">
                    <div class="header__btn-wrap">
                        <a href="https://themeforest.net/user/rrdevs/portfolio" class="rr-btn rr-btn__theme rr-btn__theme-white mt-40 mt-sm-35 mt-xs-30">
                            <span class="btn-wrap">
                                <span class="text-one">Purchase Now</span>
                                <span class="text-two">Purchase Now</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<div class="offcanvas__overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    @if(isset($index))
    <div id="header-sticky" class="header__area header-1">
    @else

    <div class="header-4-top theme-bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-8 d-none d-lg-block">
                    <div class="header-4-top__menu d-flex">
                        <a href="{{config('projectConfig.project_location')}}" target="_blank"><i class="fa-solid fa-location-dot"></i> {{config('projectConfig.project_address')}}</a>
                        <a href="tel:{{config('projectConfig.project_phone')}}"><i class="fa-solid fa-phone"></i> {{config('projectConfig.project_phone')}}</a>
                        <a href="mailto:{{config('projectConfig.project_email')}}"><i class="fa-solid fa-envelope"></i> {{config('projectConfig.project_email')}}</a>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="header-4-top__menu-social d-flex justify-content-lg-end justify-content-center">
                        <a href="{{config('projectConfig.project_facebook')}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{config('projectConfig.project_instagram')}}"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{config('projectConfig.project_twitter')}}">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0596 6.77295L15.8879 -0.00195312H14.5068L9.44607 5.8806L5.40411 -0.00195312H0.742188L6.85442 8.89352L0.742188 15.998H2.12338L7.4676 9.78587L11.7362 15.998H16.3981L10.0593 6.77295H10.0596ZM8.16787 8.97189L7.54857 8.0861L2.62104 1.03779H4.74248L8.71905 6.726L9.33834 7.61179L14.5074 15.0056H12.386L8.16787 8.97223V8.97189Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="{{config('projectConfig.project_linkedin')}}"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="header__area header-4__background header-4">
    @endif
        <div class="container">
            <div class="mega__menu-wrapper p-relative">
                <div class="header__main">
                    <div class="header__logo">
                        <a href="{{route('index')}}">
                            <div class="logo">
                                <img src="{{ asset('user_assets/imgs/logo/logo.svg') }}" alt="logo not found">
                            </div>
                        </a>
                    </div>

                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{route('index')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{route('departments.index')}}">Departments</a>
                                    </li>
                                    <li class="has-dropdown ">
                                        <a href="javascript:void(0)">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="about-us.html">About us</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="pricing-2.html">Pricing 2</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                            <li><a href="appoinment.html">Appointment</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="service.html">Services</a>
                                        <ul class="submenu">
                                            <li><a href="service.html">Service</a></li>
                                            <li><a href="service-2.html">Service 2</a></li>
                                            <li><a href="service-details.html">Services Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="doctor.html">Doctor</a>
                                        <ul class="submenu">
                                            <li><a href="doctor.html">Doctor</a></li>
                                            <li><a href="doctor-2.html">Doctor 2</a></li>
                                            <li><a href="doctor-details.html">Doctor Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="portfolio.html">Portfolio</a>
                                        <ul class="submenu">
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-2.html">Portfolio 2</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="header__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="header__btn-wrap d-none d-sm-inline-flex">
                                <a href="contact.html" class="rr-btn rr-btn__primary">
                                    <span class="btn-wrap">
                                        <span class="text-one">Read More <i class="fa-solid fa-plus"></i></span>
                                        <span class="text-two">Read More <i class="fa-solid fa-plus"></i></span>
                                    </span>
                                </a>
                            </div>

                            <div class="header__hamburger ml-20 d-xl-none">
                                <div class="sidebar__toggle">
                                    <a class="bar-icon" href="javascript:void(0)">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->


@yield('content')

<section class="footer__cta footer__cta-bottom-up theme-bg-1">
    <div class="container">
        <div class="row mb-minus-30">
            <div class="col-md-6">
                <div class="footer__cta-item mb-30 theme-bg-primary d-flex flex-lg-row flex-column align-items-lg-center">
                    <div class="footer__cta-item-icon d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset('user_assets/imgs/footer__cta/footer__cta-item-1.png') }}" alt="icon not found">
                    </div>

                    <div class="footer__cta-item-text">
                        <h4 class="color-white mb-15 mb-10">Expert Eye Care</h4>
                        <p class="color-white mb-0">Et purus duis sollicitudin dignissim habitant. Egestas nulla quis venenatis cras sed eu massa eu faucibus</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="footer__cta-item mb-30 theme-bg-glow d-flex flex-lg-row flex-column align-items-lg-center">
                    <div class="footer__cta-item-icon d-flex align-items-center justify-content-center">
                        <img class="img-fluid" src="{{ asset('user_assets/imgs/footer__cta/footer__cta-item-2.png') }}" alt="icon not found">
                    </div>

                    <div class="footer__cta-item-text">
                        <h4 class="color-white mb-15 mb-10">Eye Health Provider</h4>
                        <p class="color-white mb-0">Et purus duis sollicitudin dignissim habitant. Egestas nulla quis venenatis cras sed eu massa eu faucibus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer area start -->
<footer>
    <section class="footer__area-common white-bg overflow-hidden" data-background="{{ asset('user_assets/imgs/footer/background.png') }}">
        <div class="container">
            <div class="row mb-minus-50">
                <div class="col-lg-3 col-6">
                    <div class="footer__widget footer__widget-item-1">
                        <div class="footer__logo mb-30 mb-xs-25">
                            <a href="{{route('index')}}">
                                <img class="img-fluid" src="{{ asset('user_assets/imgs/logo/footer-logo.svg') }}" alt="logo not found">
                            </a>
                        </div>

                        <div class="footer__content">
                            <p class="mb-0">It is a long established fact that a reader will be distracted</p>
                        </div>
                        <div class="footer__social mt-30 mt-xs-30">
                            <a href="{{config('projectConfig.project_instagram')}}"  target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{config('projectConfig.project_facebook')}}"  target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{config('projectConfig.project_twitter')}}"  target="_blank">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0596 6.77295L15.8879 -0.00195312H14.5068L9.44607 5.8806L5.40411 -0.00195312H0.742188L6.85442 8.89352L0.742188 15.998H2.12338L7.4676 9.78587L11.7362 15.998H16.3981L10.0593 6.77295H10.0596ZM8.16787 8.97189L7.54857 8.0861L2.62104 1.03779H4.74248L8.71905 6.726L9.33834 7.61179L14.5074 15.0056H12.386L8.16787 8.97223V8.97189Z" fill="#071C3C"/>
                                </svg>
                            </a>
                            <a href="{{config('projectConfig.project_linkedin')}}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <div class="footer__widget footer__widget-item-2">
                        <div class="footer__widget-title">
                            <h4>Services</h4>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="about-us.html">Reliable Rentals</a></li>
                                <li><a href="about-us.html">Golden Key Properties</a></li>
                                <li><a href="about-us.html">Swift Home Sales</a></li>
                                <li><a href="about-us.html">Elite Realty Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="footer__widget footer__widget-item-3">
                        <div class="footer__widget-title">
                            <h4>Our newsletter</h4>
                        </div>

                        <div class="footer__subscribe-content">
                            <p class="mb-30 mb-xs-25">Custom Software Development Tailored Solutions for Your Business Custom </p>

                            <div class="footer__subscribe d-flex mt-30 mt-xs-25">
                            <input type="text" placeholder="Enter e-mail">
                            <button type="submit" class="rr-btn rr-btn__theme">
                                <span class="btn-wrap">
                                    <span class="text-one"><i class="fa-solid fa-paper-plane"></i></span>

                                    <span class="text-two"><i class="fa-solid fa-paper-plane"></i></span>
                                </span>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="footer__widget footer__widget-item-4">
                        <div class="footer__widget-title">
                            <h4>Our Office</h4>
                        </div>

                        <div class="footer__link footer__link-location">
                            <ul>
                                <li><a href="mailto:{{config('projectConfig.project_email')}}" target="_blank"><i class="fa-solid fa-envelope"></i> {{config('projectConfig.project_email')}}</a></li>
                                <li><a href="{{config('projectConfig.project_location')}}" target="_blank"><i class="fa-solid fa-location-dot"></i> {{config('projectConfig.project_address')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom-wrapper">
            <div class="container">
                <div class="footer__bottom">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer__copyright text-lg-start text-center">
                                <p class="mb-0">©
                                    <a href="{{route('index')}}">{{config('projectConfig.project_name')}}</a>  2024 | All Rights Reserved</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="footer__copyright-menu">
                                <ul>
                                    <li><a href="about-us.html">Trams & Condition</a></li>
                                    <li><a href="about-us.html">Privacy Policy</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Footer area end -->

<!-- JS here -->
<script src="{{ asset('user_assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/waypoints.min.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/meanmenu.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/odometer.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/magnific-popup.min.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/type.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/jquery.appear.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/parallax.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/parallax-scroll.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/gsap.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/SplitText.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/tween-max.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/draggable.min.js') }}"></script>
<script src="{{ asset('user_assets/js/plugins/smoothscroll.js') }}"></script>
<script src="{{ asset('user_assets/js/vendor/ajax-form.js') }}"></script>
<script src="{{ asset('user_assets/js/main.js') }}"></script>
</body>

</html>
