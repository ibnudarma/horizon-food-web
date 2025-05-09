<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Horizon Food</title>


  <!-- Bootstrap core CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/welcome/css/bootstrap.css') ?>" />

<!-- Fonts style -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

<!-- Font Awesome style -->
<link href="<?= base_url('assets/welcome/css/font-awesome.min.css') ?>" rel="stylesheet" />

<!-- Nice Select -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

<!-- Slick Slider -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

<!-- Custom styles for this template -->
<link href="<?= base_url('assets/welcome/css/style.css') ?>" rel="stylesheet" />

<!-- Responsive style -->
<link href="<?= base_url('assets/welcome/css/responsive.css') ?>" rel="stylesheet" />


</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
              Horizon Food
            </span>
          </a>
          <div class="" id="">
            <div class="User_option">
              <a href="<?= base_url('app/sign_in') ?>">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Login</span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="detail-box">
              <h1>
                Selamat Datang di Horizon Food
              </h1>
              <p>
                Platform untuk kantin dan pembeli dalam memesan makanan atau minuman dengan mudah.
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="slider_container">
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img1.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img2.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img3.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img4.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img1.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img2.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img3.png') ?>" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/slider-img4.png') ?>" alt="" />
          </div>
        </div>
      </div>
    <!-- end slider section -->
  </div>


  <!-- recipe section -->

  <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Rekomendasi Menu Terbaik
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="<?= base_url('assets/welcome/images/r1.jpg') ?>" class="box-img" alt="Sarapan">
            </div>
            <div class="detail-box">
              <h4>Sarapan</h4>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="<?= base_url('assets/welcome/images/r2.jpg') ?>" class="box-img" alt="Makan Siang">
            </div>
            <div class="detail-box">
              <h4>Makan Siang</h4>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="<?= base_url('assets/welcome/images/r3.jpg') ?>" class="box-img" alt="Makan Malam">
            </div>
            <div class="detail-box">
              <h4>Makan Malam</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="<?= base_url('app/sign_in') ?>">
          Coba Horizon Food Sekarang
        </a>
      </div>
    </div>
  </section>
  <!-- end recipe section -->

  <!-- app section -->

  <section class="app_section">
  <div class="container">
    <div class="col-md-9 mx-auto">
      <div class="row">
        <div class="col-md-7 col-lg-8">
          <div class="detail-box">
            <h2>
              <span> Dapatkan</span> <br>
              Aplikasi Horizon Food
            </h2>
            <p>
              Pesan makanan dan minuman favoritmu dari kantin terdekat dengan mudah, langsung melalui aplikasi Horizon Food.
            </p>
            <div class="app_btn_box">
              <a href="" class="mr-1">
                <img src="<?= base_url('assets/welcome/images/google_play.png') ?>" class="box-img" alt="Unduh di Google Play">
              </a>
              <a href="">
                <img src="<?= base_url('assets/welcome/images/app_store.png') ?>" class="box-img" alt="Unduh di App Store">
              </a>
            </div>
            <a href="" class="download_btn">
              Unduh Sekarang
            </a>
          </div>
        </div>
        <div class="col-md-5 col-lg-4">
          <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/mobile.png') ?>" class="box-img" alt="Gambar Aplikasi">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end app section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="col-md-11 col-lg-10 mx-auto">
        <div class="heading_container heading_center">
          <h2>
            Tentang Kami
          </h2>
        </div>
        <div class="box">
          <div class="col-md-7 mx-auto">
            <div class="img-box">
            <img src="<?= base_url('assets/welcome/images/about-img.jpg') ?>" class="box-img" alt="Tentang Horizon Food">
            </div>
          </div>
          <div class="detail-box">
            <p>
              Horizon Food adalah platform digital yang memudahkan pembeli untuk memesan makanan dan minuman dari berbagai kantin secara praktis dan cepat. Kami hadir untuk menghubungkan kantin dengan pelanggan melalui layanan online yang efisien, nyaman, dan terpercaya.
            </p>
          </div>
        </div>
      </div>
    </div>    
  </section>

  <!-- end about section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="col-md-11 col-lg-10 mx-auto">
        <div class="heading_container heading_center">
          <h2>
            Testimoni
          </h2>
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="detail-box">
                <h4>
                  Amanda
                </h4>
                <p>
                  Aplikasi Horizon Food sangat membantu! Saya bisa pesan makanan favorit dari kantin tanpa perlu antre. Praktis dan cepat!
                </p>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h4>
                  Rudi
                </h4>
                <p>
                  Sistem pemesanannya mudah digunakan, dan makanannya selalu sampai tepat waktu. Cocok banget untuk mahasiswa yang sibuk.
                </p>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h4>
                  Sari
                </h4>
                <p>
                  Dengan Horizon Food, saya bisa lihat menu dari berbagai kantin dalam satu aplikasi. Sangat memudahkan memilih makanan setiap hari!
                </p>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <div class="footer_container">
    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="#">Horizon Food</a>
        </p>        
      </div>
    </footer>
    <!-- footer section -->

  </div>
  <!-- jQuery -->
<script src="<?= base_url('assets/welcome/js/jquery-3.4.1.min.js') ?>"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/welcome/js/bootstrap.js') ?>"></script>

<!-- Slick slider (CDN tetap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

<!-- Nice select (CDN tetap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>

<!-- Custom JS -->
<script src="<?= base_url('assets/welcome/js/custom.js') ?>"></script>


</body>

</html>