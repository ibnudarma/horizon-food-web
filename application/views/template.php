<!doctype html>
<html lang="en">
  <!-- [Head] start -->
    <?php include('layouts/head.php') ?>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
  <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
    </div>
  <!-- [ Pre-loader ] End -->

  <!-- [ Sidebar Menu ] start -->
    <?php include('layouts/sidebar.php') ?>
  <!-- [ Sidebar Menu ] end -->

  <!-- [ Header Topbar ] start -->
    <?php include('layouts/header.php') ?>
  <!-- [ Header ] end -->

  <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content pb-2">
        <?php $this->load->view($content) ?>
      </div>
    </div>
  <!-- [ Main Content ] end -->

  <!-- [ Footer Content ] start -->

  <!-- [ Footer Content ] end -->

  <!-- Required Js -->
    <?php include('layouts/script.php') ?>

  </body>
  <!-- [Body] end -->
</html>
