<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIAKAD SMA XAVERIUS 1</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->

  <!-- Favicons -->
  <link href="{{ asset('sekolah') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('sekolah') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('sekolah') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('sekolah') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('sekolah') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('sekolah') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('sekolah') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ asset('sekolah') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('sekolah') }}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-index">

  @guest()
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="d-flex align-items-center">SIAKAD SMA XAVERIUS 1</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="/login"><span>Login</span></a></li>
            <li><a href="/schooldetail"><span>Tentang Sekolah</span></a></li>
            <li><a href="https://www.smaxaverius1jbi.sch.id/beranda" target="blank">Web Utama</a></li>
          </ul>
        </nav>
      </div>
    </header>

    
    <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2 data-aos="fade-up">Selamat Datang di Siakad SMA Xaverius 1 Kota Jambi</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>Hallo Sobat Xaverian, untuk dapat mengakses siakad silahkan Login terlebih dahulu.</p>
          </blockquote>
        </div>

        <div class="col-md-7" style="margin-left: 7%">
          @include('flash::message')
          @yield('login-akun')
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Siakad SMA Xaverius 1 Jambi</span>
            </a>
              <p>Hallo Sobat Xaverian, untuk dapat mengakses siakad silahkan Login terlebih dahulu. </p>
            <br>
              <h6>Ikuti Sosial Media Kami :</h6>
            <div class="row">
              <span>
                <a href="#" class="twitter margin-ikon"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook margin-ikon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram margin-ikon"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin margin-ikon"><i class="bi bi-linkedin"></i></a>
              </span>
            </div>
          </div>

          <div class="col-lg-2 col-4 footer-links">
            <h4>Tautan</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Beranda PPDB Online</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Tentang Xaverius 1</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Layanan</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Kebijakan</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Lapor</a></li>
            </ul>
          </div>

          <div class="col-lg-5 col-md-8 footer-contact text-center text-md-start">
            <h4>Kontak Kami</h4>
            <p>
              <iframe class="lebar-peta lebar-peta1 lebar-peta2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.2181610322336!2d103.63126807385521!3d-1.6262674725068145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2588abcc27420d%3A0x307cf27d53b2da1b!2sSekolah%20Menengah%20Umum%20Xaverius%201%20Kota%20Jambi!5e1!3m2!1sid!2sid!4v1696751447576!5m2!1sid!2sid" width="400" height="275" style="border:0; border-radius: 7.5px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <br>
              <strong>Telepon Sekolah: </strong>0831-7263-3234<br>
              <strong>Ketua Panitia T.U: </strong><a href="https://wa.link/88ojpp" target="blank"> 081930000081</a><br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Nova</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>

  @endguest








  @auth()
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/home" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">SIAKAD SMA XAVERIUS 1</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/home"><span>Beranda Siakad</span></a></li>
          <li><a href="https://www.smaxaverius1jbi.sch.id/beranda" target="blank"><span>Web Utama</span></a></li>
          <li><a href="#footer"><span>Kontak Kami</span></a></li>
          <li><a href="#">Akun</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2 data-aos="fade-up">Selamat Datang di Siakad SMA Xaverius 1 Kota Jambi</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>Hallo, {{ Auth::user()->name }}</p>
          </blockquote>
        </div>

        <div class="col-md-7" style="margin-left: 7%">
          @yield('login-akun')
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Siakad SMA Xaverius 1 Jambi</span>
            </a>
              <p>Hallo, {{ Auth::user()->name }}</p>
            <br>
              <h6>Ikuti Sosial Media Kami :</h6>
            <div class="row">
              <span>
                <a href="#" class="twitter margin-ikon"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook margin-ikon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram margin-ikon"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin margin-ikon"><i class="bi bi-linkedin"></i></a>
              </span>
            </div>
          </div>

          <div class="col-lg-2 col-4 footer-links">
            <h4>Tautan</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Beranda PPDB Online</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Tentang Xaverius 1</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Layanan</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Kebijakan</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Lapor</a></li>
            </ul>
          </div>

          <div class="col-lg-5 col-md-8 footer-contact text-center text-md-start">
            <h4>Kontak Kami</h4>
            <p>
              <iframe class="lebar-peta lebar-peta1 lebar-peta2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.2181610322336!2d103.63126807385521!3d-1.6262674725068145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2588abcc27420d%3A0x307cf27d53b2da1b!2sSekolah%20Menengah%20Umum%20Xaverius%201%20Kota%20Jambi!5e1!3m2!1sid!2sid!4v1696751447576!5m2!1sid!2sid" width="400" height="275" style="border:0; border-radius: 7.5px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <br>
              <strong>Telepon Sekolah:</strong> 0831-7263-3234<br>
              <strong>Ketua Panitia T.U</strong><a href="https://wa.link/88ojpp" target="blank"> 081930000081</a><br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Nova</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer --><!-- End Footer -->
  @endauth

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('sekolah') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('sekolah') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('sekolah') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('sekolah') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('sekolah') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('sekolah') }}/assets/vendor/php-email-form/validate.js"></script>
  <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        var togglePasswordIcon = document.getElementById("togglePasswordIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePasswordIcon.classList.remove("fa-eye-slash");
            togglePasswordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            togglePasswordIcon.classList.remove("fa-eye");
            togglePasswordIcon.classList.add("fa-eye-slash");
        }
    });
</script>

  <!-- Template Main JS File -->
  <script src="{{ asset('sekolah') }}/assets/js/main.js"></script>

</body>

</html>