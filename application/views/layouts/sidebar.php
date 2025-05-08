<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="<?= base_url('app/dashboard') ?>" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="<?=  base_url('assets/images/logo-dark.svg') ?>" alt="" class="logo" />
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">

        <?php if(check_role('seller')) : ?>
        <li class="pc-item">
          <a href="<?= base_url('seller/dashboard') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a>
        </li>

        <li class="pc-item">
          <a href="<?= base_url('seller/menu') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-outlet"></i></span><span class="pc-mtext">Menu</span></a>
        </li>

        <li class="pc-item">
          <a href="<?= base_url('seller/pesanan') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-receipt"></i></span><span class="pc-mtext">Pesanan</span></a>
        </li>
        <?php endif ?>

        <?php if(check_role('customer')) : ?>
        <li class="pc-item">
        <a href="<?= base_url('customer/menu') ?>" class="pc-link"
          ><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Menu</span></a>
        </li>

        <li class="pc-item">
          <a href="<?= base_url('customer/kantin') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-outlet"></i></span><span class="pc-mtext">Kantin</span></a>
        </li>

        <li class="pc-item">
          <a href="<?= base_url('customer/keranjang') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-shopping-cart"></i></span><span class="pc-mtext">Keranjang</span></a>
        </li>

        <li class="pc-item">
          <a href="<?= base_url('customer/pesanan') ?>" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-receipt"></i></span><span class="pc-mtext">Pesanan</span></a>
        </li>
        <?php endif ?>

      </ul>
      <div class="w-100 text-center">
        <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
      </div>
    </div>
  </div>
</nav>