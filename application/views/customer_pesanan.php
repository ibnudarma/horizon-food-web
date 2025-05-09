<div class="container">

  <?php foreach($pesanan as $data) :?>
    <div class="card shadow-sm mb-3 border-0">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h5 class="fw-bold mb-1">Pesanan #<?= $data['id_pesanan'] ?></h5>
            <p class="mb-1 text-muted"><?= $data['waktu_pesanan'] ?></p>
            <p class="mb-1"><?= $data['nama_kantin'] ?></p>
            <p class="mb-1">Total: <strong><?= $data['total'] ?></strong></p>
            <span class="badge bg-<?= ($data['status'] !== 'diproses') ? 'success' : 'warning' ?> text-dark"><?= $data['status'] ?></span>
          </div>
          <div>
            <a href="<?= base_url('customer/pesanan_detail/' . $data['id_pesanan']) ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>

  </div>