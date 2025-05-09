<div class="container mb-3">

  <!-- Info Penjual -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="card-title mb-1"><?= $pesanan->nama_kantin ?></h5>
      <p class="card-text text-muted mb-0"><?= $pesanan->waktu_pesanan ?></p>
    </div>
  </div>

  <!-- Daftar Menu -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="card-title">Daftar Menu</h5>
      <table class="table table-bordered mt-3">
        <thead class="table-light">
          <tr>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($pesanan_detail as $row): ?>
          <tr>
            <td><?= $row['nama_menu'] ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>Rp. <?= $row['harga']?></td>
            <td>Rp. <?= $row['harga'] * $row['jumlah']?></td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>

      <!-- Total -->
      <div class="text-end">
        <h5 class="fw-bold">Total: Rp <?= $pesanan->total ?></h5>
      </div>
    </div>
  </div>

  <!-- Status Pesanan -->
  <?php if($pesanan->status == 'diproses'): ?>
  <div class="alert alert-warning text-center" role="alert">
    Status: <strong>Pesanan Sedang Diproses</strong>
  </div>
  <?php elseif ($pesanan->status == 'selesai'): ?>
    <div class="alert alert-success text-center" role="alert">
      Status: <strong>Pesanan Selesai Harap Diambil!</strong>
    </div>
<?php endif ?>

  <!-- Tombol Aksi -->
  <div class="text-center">
    <a href="<?= base_url('customer/pesanan') ?>" class="btn btn-secondary">Kembali</a>
  </div>
</div>
