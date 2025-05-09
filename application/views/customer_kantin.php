<div class="row">

<?php foreach($seller as $data) : ?>
  <div class="col-xl-6 col-md-12">
    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
      <div class="row g-0">
        <div class="col-md-4">
          <img 
            src="<?= base_url('uploads/seller_logo/' . ($data['logo_kantin'] ?? 'default.jpg')) ?>" 
            class="img-fluid h-100 w-100" 
            alt="Logo Kantin" 
            style="object-fit: cover;">
        </div>
        <div class="col-md-8 d-flex align-items-center">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-2 text-capitalize"><?= $data['nama_kantin'] ?></h5>
            <p class="card-text text-muted small mb-3"><?= $data['deskripsi_kantin'] ?: 'Belum ada deskripsi.' ?></p>
            <a href="<?= base_url('customer/kantin_detail/' . $data['id_seller']) ?>" class="btn btn-primary btn-sm rounded-pill px-4">
              Kunjungi Kantin
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

</div>