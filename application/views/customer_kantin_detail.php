<div class="col-xl-12 col-md-12">
  <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
    <div class="row g-0">
      <div class="col-2 d-flex align-items-center">
        <img 
          src="<?= base_url('uploads/seller_logo/' . ($seller->logo_kantin ?? 'default.jpg')) ?>" 
          class="img-fluid w-100" 
          alt="Logo Kantin" 
          style="max-height: 120px; object-fit: contain; padding: 10px;">
      </div>
      <div class="col-10 d-flex align-items-center">
        <div class="card-body py-2">
          <h6 class="card-title fw-semibold text-capitalize mb-1"><?= $seller->nama_kantin ?></h6>
          <p class="card-text text-muted small mb-0"><?= $seller->deskripsi_kantin ?: 'Belum ada deskripsi.' ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- [ sample-page ] start -->
   <?php foreach($menu as $data) :?>
    <div class="col-xl-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <img src="<?= base_url('uploads/menu/') . (!empty($data['gambar']) ? $data['gambar'] : 'default.jpg') ?>" class="card-img-top" alt="Menu 1" style="height: 180px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title p-0 m-0"><?= $data['nama_menu'] ?></h5>
          <span><?= $data['category'] ?></span>
          <p class="card-text fw-bold">Rp. <?= $data['harga'] ?></p>
          <a href="<?= base_url('customer/menu_detail/' . $data['id_menu']) ?>" class="btn btn-primary w-100">Pesan</a>
        </div>
      </div>
    </div>
    <?php endforeach ?>

  </div>