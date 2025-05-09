
<div class="row">
   <?php foreach($menu as $data) :?>
    <div class="col-xl-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <img src="<?= base_url('uploads/menu/') . (!empty($data['gambar']) ? $data['gambar'] : 'default.jpg') ?>" class="card-img-top" alt="Menu 1" style="height: 180px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title p-0 m-0"><?= $data['nama_menu'] ?></h5>
          <span><?= $data['nama_kategori'] ?></span>
          <p class="card-text"><?= $data['nama_kantin'] ?></p>
          <p class="card-text fw-bold">Rp. <?= $data['harga'] ?></p>
          <a href="<?= base_url('customer/menu_detail/' . $data['id_menu']) ?>" class="btn btn-primary w-100">Pesan</a>
        </div>
      </div>
    </div>
    <?php endforeach ?>

  </div>