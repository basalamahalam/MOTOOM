<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>MOTOOM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/img/logo/logo.png" />
    <!-- Place favicon.ico in the root directory -->


    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-beta2.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/m-p.css" />
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- ========================= header start ========================= -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/img/logo/logo.png" alt="Logo" />
                            </a>
                            <h3 class="success">Mot</h3>
                            <h3>oom</h3>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll active" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">Services</a>
                                    </li>
                                    <!-- <li class="nav-item">
										<a class="" href="#0">Team</a>
									</li> -->
                                    <li class="nav-item">
                                        <a href="login-form.php">Login</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="" href="#0">Contact</a>
                                    </li> -->
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- ========================= header end ========================= -->

    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft" data-wow-delay=".2s">Welcome To Motoom</span>
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">
                            Tempatmu, tamanmu.
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Cinta itu seperti tanaman yang berharga. Kau harus teratur menyiraminya, sungguh-sungguh
                            merawatnya, dan memupuknya..
                        </p>
                        <a href="login-form.php" class="main-btn btn-hover wow fadeInUp" data-wow-delay=".6s">Sign
                            Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/hero/hero2.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= hero-section end ========================= -->

    <!-- ========================= about-section start ========================= -->
    <section id="about" class="about-section pt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img mb-50">
                        <img src="assets/img/about/about-pl.jpg" alt="about" class="rounded">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mb-50">
                        <div class="section-title mb-50">
                            <h1 class="mb-25">Read more about our Digital Agency</h1>

                        </div>
                        <div class="accordion pb-15" id="accordionExample">
                            <div class="single-faq">
                                <button class="w-100 text-start" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu Motoom?
                                </button>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        Motoom adalah sebuah alat bantu untuk memudahkan user memonitoring tanamannya
                                        berbasis mikrokontroller yang dapat mendeteksi kelembapan tanah, sebagai tanda
                                        peringatan berupa notifikasi yang dikirimkan dari sistem web kepada user bahwa
                                        tanah dalam keadaan kering.
                                    </div>
                                </div>
                            </div>
                            <div class="single-faq">
                                <button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apa yang kami berikan?
                                </button>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        Menjadi mitra vendor yang paling dihormati dan di percaya dengan memberikan
                                        solusi inovatif dan layanan berkualitas tinggi.
                                    </div>
                                </div>
                            </div>
                            <div class="single-faq">
                                <button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bagaimana proses rancangannya?
                                </button>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch.
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about-section end ========================= -->

    <!-- ========================= service-section start ========================= -->
    <section id="service" class="service-section img-bg pt-100 pb-100 mt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-50">
                        <h1>Our services</h1>
                        <p>Anda nyaman kami senang</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <!-- <i class="lni lni-layers"></i> -->
                            <i class="lni lni-signal"></i>
                        </div>
                        <div class="content">
                            <h3>Monitoring</h3>
                            <p>Melaporkan perkembangan tanaman tiap harinya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <!-- <i class="lni lni-code-alt"></i> -->
                            <i class="lni lni-dashboard"></i>
                        </div>
                        <div class="content">
                            <h3>Real Time</h3>
                            <p>Pemantauan secara real time sesuai keadaan dari tanaman
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <!-- <i class="lni lni-pallet"></i> -->
                            <i class="lni lni-hand"></i>
                        </div>
                        <div class="content">
                            <h3>Easy Control</h3>
                            <p>Mudah mengontrol / memonitoring tanaman
                            </p>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- ========================= service-section end ========================= -->

    <!-- ========================= cta-section start ========================= -->
    <section class="cta-section img-bg pt-110 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title mb-50">
                        <h1 class="mb-20 wow fadeInUp" data-wow-delay=".2s">Ingin Mulai Merawat Tanaman?
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Berada di sekitar tanaman membantu semua orang berkonsentrasi lebih bak, dirumah ataupun di tempat kerja.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="cta-btn text-lg-end mb-50">
                        <a href="daftar.php" class="main-btn btn-hover text-uppercase">DAFTAR SEKARANG</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= cta-section end ========================= -->

    <!-- ========================= footer start ========================= -->
    <footer class="footer">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <div class="logo">
                                <a><img src="assets/img/logo/logo.png" alt="Logo" />
                                    <h3><span class="success">Mo</span>toom</h3>
                                </a>

                            </div>
                            <p class="desc mb-35">MOTOOM (Monitoring Tumbuhan) membantu anda dalam mengurus tanaman.</p>
                            <ul class="socials">
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-facebook-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-twitter-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-instagram-filled"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-linkedin-original"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 offset-xl-1 col-md-5 offset-md-1 col-sm-6">
                        <div class="footer-widget">
                            <h3>Link</h3>
                            <ul class="links">
                                <li> <a href="#home">Home</a> </li>
                                <li> <a href="#about">About</a> </li>
                                <li> <a href="#service">Services</a> </li>
                                <li> <a href="login-form.php">Login</a> </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3>Services</h3>
                            <ul class="links">
                                <li> <a href="javascript:void(0)">Monitoring</a> </li>
                                <li> <a href="javascript:void(0)">Real Time</a> </li>
                                <li> <a href="javascript:void(0)">Easy Control</a> </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <h3>Contact</h3>
                            <ul>
                                <!-- <li>+003894372632</li> -->
                                <li>basalamahalam@upi.edu</li>
                                <li>Bandung, Indonesia</li>
                            </ul>
                            <div class="contact_map" style="width: 100%; height: 150px; margin-top: 25px;">
                                <div class="gmap_canvas">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.245708932937!2d107.59216121400202!3d-6.861128569031982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6b943c2c5ff%3A0xee36226510a79e76!2sUniversitas%20Pendidikan%20Indonesia!5e0!3m2!1sen!2sus!4v1653172777453!5m2!1sen!2sus"
                                        style="width: 100%;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="copy-right">
                <p>Design and Developed by <a href="#" rel="nofollow" target="_blank"> Motoom Team </a></p>
            </div>

        </div>
    </footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap-5.0.0-beta2.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/polifill.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>