<div class="row">
    <!-- [ -page ] start -->
    <div class="col-sm-12">
    <div class="card">
        <div class="card-body">
        <form action="<?= base_url('app/seller_add') ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="nama_kantin" class="col-sm-2 col-form-label">Nama Kantin</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_kantin" name="nama_kantin" value="<?= $seller->nama_kantin ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Pemilik</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $seller->nama ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email') ?>" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="deskripsi_kantin" class="col-sm-2 col-form-label">Deskripsi Kantin</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="deskripsi_kantin" name="deskripsi_kantin" value="<?= $seller->deskripsi_kantin ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="logo_kantin" class="col-sm-2 col-form-label">Logo Kantin</label>
            <div class="col-sm-2">
            <img src="<?= base_url('uploads/seller_logo/')?><?=$seller->logo_kantin?>" alt="" width="100px">
            </div>
            <div class="col-sm-8">
            <input type="file" class="form-control" id="logo_kantin" name="logo_kantin">
            </div>
        </div>
            <button class="btn btn-success" type="button">Simpan Perubahan</button>
        </form>
        </div>
    </div>
    </div>
    <!-- [ page ] end -->
</div>