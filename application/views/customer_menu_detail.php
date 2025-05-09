<div class="container">
  <div class="card shadow-sm rounded-4 border-0">
    <div class="row g-0">
      <!-- Gambar -->
      <div class="col-md-5">
        <img src="<?= base_url('uploads/menu/') . (!empty($menu->gambar) ? $menu->gambar : 'default.jpg') ?>" 
             class="img-fluid h-100 rounded-start" 
             alt="Menu" 
             style="object-fit: cover;">
      </div>

      <!-- Detail -->
      <div class="col-md-7">
        <div class="card-body">
          <h4 class="card-title fw-bold"><?= $menu->nama_menu ?></h4>
          <p class="card-text text-muted small"><?= (!empty($menu->deskripsi_menu) ? $menu->deskripsi_menu : 'Tidak ada Deskripsi') ?></p>
          
          <h5 class="text-primary fw-semibold">Rp. <?= $menu->harga ?></h5>
          <form action="<?= base_url('customer/keranjang_add') ?>" method="post">
            <input type="text" name="menu_id" value="<?= $menu->id_menu ?>" hidden>
              <div class="mb-3 mt-2">
                  <label for="jumlah" class="form-label small">Jumlah:</label>
                  <input type="number" id="jumlah" name="jumlah" class="form-control form-control-sm w-50" value="1" min="1">
                </div>
              <div class="mb-3 mt-2">
                  <textarea class="form-control" name="catatan" placeholder="Tambahkan catatan disini"></textarea>
                </div>
                
                <button class="btn btn-success btn-sm" type="submit">
                    Tambahkan ke Keranjang
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
