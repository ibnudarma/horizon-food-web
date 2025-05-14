<div class="container">
  <!-- Tombol kembali -->
  <div class="mb-4">
    <a href="<?= base_url('seller/pesanan') ?>" class="btn btn-danger">
     Kembali ke Daftar Pesanan
    </a>
  </div>

  <!-- Info Pembeli -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="card-title mb-1">Pembeli: <span class="fw-semibold"><?= $pesanan->nama_customer ?></span></h5>
      <p class="mb-0 text-muted">Telepon: <?= $pesanan->nomor_wa ?></p>
    </div>
  </div>

  <!-- Daftar Menu -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="card-title mb-3">Menu Dipesan</h5>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>Menu</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0 ?>
            <?php foreach($pesanan_detail as $row): ?>
                <?php $subtotal = $row['harga'] * $row['jumlah'] ?>
                <?php $total += $subtotal ?>
            <tr>
              <td><?= $row['nama_menu'] ?></td>
              <td><?= $row['jumlah'] ?></td>
              <td>Rp. <?= $row['harga'] ?></td>
              <td>Rp. <?= $subtotal ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="text-end mt-3">
        <h5 class="fw-bold">Total: Rp <?= $total ?></h5>
      </div>
    </div>
  </div>

  <?php if($pesanan->status !== 'selesai'): ?>
  <div class="card shadow-sm">
    <div class="card-body text-center">
        <form action="<?= base_url('seller/pesanan_ready/' . $pesanan->id_pesanan) ?>">
            <button class="btn btn-success" type="submit">Pesanan Sudah Siap</button>
        </form>
    </div>
  </div>
</div>
<?php endif ?>
