<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col">
        <div class="page-header-title">
          <a href="<?= base_url('seller/menu') ?>" class="btn btn-danger">Kembali</a>
        </div>
      </div>
      <div class="col-auto">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('seller/menu') ?>">menu</a></li>
          <li class="breadcrumb-item" aria-current="page">menu detail</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="row">
    <!-- [ -page ] start -->
    <div class="col-sm-12">
    <div class="card">
        <div class="card-body">
        <form action="<?= base_url('seller/menu_update/'.$menu->id_menu) ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-3">
            <img src="<?= base_url('uploads/menu/') . (!empty($menu->gambar) ? $menu->gambar : 'default.jpg') ?>" class="img-thumb" alt="Gambar Menu" width="120px">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?= $menu->nama_menu ?>" autocomplete="off">
            </div>
        </div>
        <div class="row mb-3">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $menu->harga ?>" autocomplete="off">
            </div>
        </div>
        <div class="row mb-3">
            <label for="deskripsi_menu" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi_menu" name="deskripsi_menu" value="<?= $menu->deskripsi_menu ?>" autocomplete="off">
            </div>
        </div>
        <div class="row mb-3">
            <label for="harga" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-select" aria-label="Default select example">
                    <option value="">Pilih kategori menu</option>
                    <?php foreach($category as $item) :?>
                        <option <?= $item->id_category == $menu->category_id ? 'selected' : '' ?> value="<?= $item->id_category ?>">
                            <?= $item->category ?>
                        </option>
                    <?php endforeach ?>
                </select>
                </div>
            </div>
        <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar Menu</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
        </div>
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
            <a href="<?= base_url('seller/menu_delete/') ?><?=$menu->id_menu?>" class="btn btn-danger" >Hapus Menu</a>
          </form>
        </div>
    </div>
    </div>
    <!-- [ page ] end -->
</div>