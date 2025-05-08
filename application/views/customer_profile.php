<div class="row">
    <!-- [ -page ] start -->
    <div class="col-sm-12">
    <div class="card">
        <div class="card-body">
        <form action="<?= base_url('app/seller_add') ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $customer->nama ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email') ?>" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $customer->no_hp ?>">
            </div>
        </div>
            <button class="btn btn-success" type="button">Simpan Perubahan</button>
        </form>
        </div>
    </div>
    </div>
    <!-- [ page ] end -->
</div>