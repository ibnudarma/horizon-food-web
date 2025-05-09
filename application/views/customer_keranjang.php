<div class="container">
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>
  <div class="card shadow border-0 rounded-3">
    <div class="card-body">
      <h4 class="card-title fw-bold mb-4">Keranjang Belanja</h4>

      <!-- Scrollable item list -->
      <div style="max-height: 300px; overflow-y: auto;">
        <?php $total = 0; ?>
        <?php foreach ($keranjang as $data) : ?>
          <?php $subtotal = $data['harga'] * $data['jumlah']; ?>
          <?php $total += $subtotal; ?>

          <div class="card mb-3 border-0 bg-light">
            <div class="row g-0 align-items-center">
              <div class="col-md-2">
                <img src="<?= base_url('uploads/menu/') . (!empty($data['gambar']) ? $data['gambar'] : 'default.jpg') ?>" 
                     class="img-fluid p-2" 
                     alt="Produk" 
                     style="object-fit: contain; max-height: 100px;">
              </div>
              <div class="col-md-7">
                <div class="card-body py-2">
                  <h6 class="card-title mb-1"><?= $data['nama_menu'] ?></h6>
                  <p class="text-muted small mb-1">Rp. <?= number_format($data['harga']) ?> x <?= $data['jumlah'] ?></p>
                  <p class="text-muted small mb-1"><?= $data['catatan'] ?></p>
                  <p class="fw-semibold mb-0">Subtotal: Rp. <?= number_format($subtotal) ?></p>
                </div>
              </div>
              <div class="col-md-3 text-end pe-3">
                <a href="<?= base_url('customer/keranjang_delete/' . $data['id_keranjang']) ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <!-- Total & Checkout -->
      <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
        <h5 class="fw-bold mb-0">Total: Rp <?= number_format($total) ?></h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayarModal">
          Checkout
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="bayarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> <!-- Centered modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="bayarModalLabel">Pembayaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center">
        <p class="mb-3">Silakan lakukan pembayaran dengan memindai QR code di bawah ini:</p>
        <img src="<?= base_url('assets/images/qr.jpg') ?>" alt="QR Code" class="img-fluid rounded shadow" style="max-width: 300px;">
      </div>
      <div class="modal-footer justify-content-center">
        <a href="<?= base_url('customer/checkout') ?>" class="btn btn-success">Sudah Bayar</a>
      </div>
    </div>
  </div>
</div>

