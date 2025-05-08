<div class="row">
    <!-- [ -page ] start -->
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            lengkapi profilmu dulu yuk
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <div class="card">
        <div class="card-body">
        <form action="<?= base_url('app/customer_add') ?>" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                <label for="nama">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="no_hp">
                <label for="no_hp">Nomor WhatsApp</label>
            </div>
            <button class="btn btn-success" type="submit">Lengkapi Profile</button>
        </form>
        </div>
    </div>
    </div>
    <!-- [ page ] end -->
</div>