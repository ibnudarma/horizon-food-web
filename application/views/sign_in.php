<!doctype html>
<html lang="en">
  <head>
    <title> Horizon Food | Sign Up</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular, and .net Technologies." />
    <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon" />

    <!-- [Google Font] -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
    
    <!-- [Icon Fonts] -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/phosphor/duotone/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>" />

    <!-- [Template CSS] -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>" />
  </head>
  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="card mt-5">
            <div class="card-body">
              <!-- Notifikasi -->
              <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success text-center">
                  <?php echo $this->session->flashdata('success'); ?>
                  </div>
              <?php endif; ?>
              <?php if ($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger text-center">
                      <?php echo $this->session->flashdata('error'); ?>
                  </div>
              <?php endif; ?>
              <!-- End Notifikasi -->
              <a href="<?= base_url('/') ?>" class="d-flex justify-content-center mt-3">
                <img src="<?= base_url('assets/images/logo-dark.svg') ?>" alt="image" class="img-fluid brand-logo" />
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <p class="f-15 mt-2">Santap Lezat, Pesan Cerdas, Hanya di Horizon Food!</p>
                  </div>
                </div>
              </div>
              <!-- Form -->
               <form action="<?= base_url('app/sign_in') ?>" method="post">
                 <div class="form-floating mb-3">
                   <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                   <label for="email">Email Address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Email Address / Username" />
                    <label for="password">Password</label>
                  </div>
                  <div class="d-flex mt-1 justify-content-between">
                    <div class="form-check">
                      <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                      <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                    </div>
                    <a href=""><h5 class="text-secondary">Lupa Password?</h5></a>
                  </div>
                  <div class="d-grid mt-4">
                    <button type="Submit" class="btn btn-secondary p-2">Masuk</button>
                  </div>
                </form>
              <hr />
              <h5 class="d-flex justify-content-center">Belum punya akun?<a href="<?= base_url('app/sign_up') ?>" class="ms-1">Daftar</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- [JS Files] -->
    <script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/icon/custom-font.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>

    <!-- [Theme JS Settings] -->
    <script>layout_change('light');</script>
    <script>font_change('Roboto');</script>
    <script>change_box_container('false');</script>
    <script>layout_caption_change('true');</script>
    <script>layout_rtl_change('false');</script>
    <script>preset_change('preset-1');</script>
  </body>
</html>
