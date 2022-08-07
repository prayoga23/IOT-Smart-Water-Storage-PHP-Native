<body>

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-logo" href="index.php">
                                <img src="assets/images/logo1.png" width="45%" alt="logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="admin/index.php">LOGIN</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/banner-bg.svg)">

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="header-hero-content text-center">
                            <?php if (!empty($_GET['notif'])) { ?>
                                <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                                    <div class="alert alert-success" role="alert">
                                        Terima Kasih. Pesan Anda Berhasil Masuk! Silahkan Mengecek dibawa form
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Welcome To Smart Water Storage</h3>
                            <!-- <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s"></h2> -->
                            <h3 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Let's Save Water Together</h3>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Tanpa Khawatir Mengisi Ulang Air Didalam Tandon</p>
                            <a href="#intro" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Introduction</a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="assets/images/mockup1.png" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== BRAMD PART START ======-->

    <div class="brand-area pt-90">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="logo-slider">
                        <?php
                        $sql_logo = "SELECT `id`,`nama_perusahaan`,`gambar_perusahaan` FROM `logobrand`";
                        $query_l = mysqli_query($koneksi, $sql_logo);
                        while ($data_logo = mysqli_fetch_row($query_l)) {
                            $id = $data_logo[0];
                            $nama_perusahaan = $data_logo[1];
                            $gambar_perusahaan = $data_logo[2];
                        ?>
                            <div class="item"><a href="#"><img src="admin/foto/<?php echo $gambar_perusahaan; ?>" alt=""></a></div>
                        <?php } ?>
                    </div>

                </div>

                <!-- row -->
            </div>

        </div><!-- container -->
    </div>

    <!--====== BRAMD PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="intro" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Hemat Listrik, Cepat, Akurat<span> Semuanya dalam satu genggam. Tidak akan pernah takut biaya listrik lagi!</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="assets/images/services-shape-1.svg" alt="shape">
                            <i class="lni lni-money-location"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Hemat Biaya</a></h4>
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.</p>
                            <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="assets/images/services-shape-3.svg" alt="shape">
                            <i class="lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Cepat</a></h4>
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.</p>
                            <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="assets/images/services-shape-2.svg" alt="shape">
                            <i class="lni-cog"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Akurat</a></h4>
                            <p class="text">Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod tempor invidunt labore.</p>
                            <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a>
                        </div>
                    </div> <!-- single services -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title" style="font-size:x-large">Apa Smart Water Storage itu? <span><br>Smart Water Storage</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Ialah Aplikasi yang dapat mengetahui seberapa banyak air yang masuk atau keluar untuk mengisi ulang air jika habis dan mampu mencegah kekurangan air yang mendadak di tempat yang jauh atau di tempat yang sangat tinggi. Dan dapat mencegah pengeluaran biaya pemasokan listrik yang besar.</p>
                        <a href="#" class="main-btn">LOGIN NOW</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="assets/images/about.png" alt="about" width="200px">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="assets/images/about-shape-1.png" alt="shape">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->
    <!--====== VIDEO COUNTER PART START ======-->

    <section id="facts" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <img src="admin/images/mockup2.png" alt="video">
                            </div>
                            <div class="video-icon">
                                <a href="https://www.youtube.com/watch?v=r44RKWyfcFw" class="video-popup"><i class="lni-play"></i></a>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Cool facts <span> this about app</span></h3>
                            </div> <!-- section title -->
                            <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, seiam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">125</span>K</span>
                                        <p class="text">Downloads</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">87</span>K</span>
                                        <p class="text">Active Users</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">4.8</span></span>
                                        <p class="text">User Rating</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== VIDEO COUNTER PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    <section id="team" class="team-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-30">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Meet Founder </span>Smart Water Storage</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-team text-center mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="team-image">
                            <img src="admin/images/Aku.png" alt="Team">
                            <div class="social">
                                <ul>
                                    <li><a href="https://www.facebook.com/prayoga009/"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="https://twitter.com/prayoganugroho2"><i class="lni-twitter-filled"></i></a></li>
                                    <li><a href="https://www.instagram.com/prayoga_nugroho09/"><i class="lni-instagram-filled"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/prayoga-nugroho-pangestu-aa0876147/"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="holder-name"><a href="#">Prayoga Nugroho Pangestu</a></h5>
                            <p class="text">Founder Smart Water Storage</p>
                        </div>
                    </div> <!-- single team -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->

    <section id="testimonial" class="testimonial-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section-title text-center pb-5">
                        <div class="line m-auto"></div>
                        <h3 class="title">Users Sharing<span> Their Experience</span></h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <?php include("includes/post.php") ?>

            <?php include("includes/slider.php") ?>

            <section id="testimonial" class="testimonial-area pt-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="section-title text-center pb-50">
                                <div class="line m-auto"></div>
                                <h3 class="title">Recognized By <span>Famous Companies</span></h3>
                            </div> <!-- section title -->
                        </div>
                    </div> <!-- row -->
                    <div class="logo-slider">
                        <?php
                        $sql_logo = "SELECT `id`,`nama_perusahaan`,`gambar_perusahaan` FROM `logobrand`";
                        $query_l = mysqli_query($koneksi, $sql_logo);
                        while ($data_logo = mysqli_fetch_row($query_l)) {
                            $id = $data_logo[0];
                            $nama_perusahaan = $data_logo[1];
                            $gambar_perusahaan = $data_logo[2];
                        ?>
                            <div class="item"><a href="#"><img src="admin/foto/<?php echo $gambar_perusahaan; ?>" alt=""></a></div>
                        <?php } ?>
                    </div>
                </div> <!-- row -->
        </div> <!-- container -->
        </div>
    </section>

    <!--====== TESTIMONIAL PART ENDS ======-->
    <br><br>
    <div class="section-title text-center">
        <div class="line m-auto"></div>
        <h3 class="title">Contact Me<span><br> I'd love to hear from you.</span></h3>
    </div> <!-- section title -->
    <?php include("includes/contact.php") ?>
    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">Subscribe Me Newsletter <span>get news updates</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form mt-50">
                            <form action="#">
                                <input type="text" placeholder="Enter Your Email">
                                <button class="main-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- subscribe area -->
            <br>
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                <img src="assets/images/logo2.png" alt="logo">
                            </a>
                            <p class="text">Lorem ipsum dolor sit amet consetetur sadipscing elitr, sederfs diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni-instagram-filled"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Road Map</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Resources</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Contact Me</h4>
                            </div>
                            <ul class="contact">
                                <li>WA : +628990703408 </li>
                                <li>prayoga2np@gmail.com</li>
                                <li>www.prayoga.com</li>
                                <li>Jl. Raya Perning, Mojokerto, <br> Jawa Timur, Indonesia</li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Designed and Developed by <a href="#" rel="nofollow">Prayoga Nugroho Pangestu</a></p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->






</body>

</html>