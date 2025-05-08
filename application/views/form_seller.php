<div class="row">
    <!-- [ -page ] start -->
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            lengkapi profilmu dulu yuk
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <div class="card">
        <div class="card-body">
        <form action="<?= base_url('app/seller_add') ?>" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama_kantin" name="nama_kantin" placeholder="nama_kantin">
                <label for="nama_kantin">Nama Kantin</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                <label for="nama">Nama Pemilik Kantin</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi_kantin" name="deskripsi_kantin"></textarea>
                <label for="deskripsi_kantin">Deskripsi Kantin</label>
            </div>
            <div class="mb-3">
                <label for="logo_kantin" class="form-label">Logo Kantin</label>
                <input class="form-control" type="file" id="logo_kantin" name="logo_kantin">
            </div>
            <button class="btn btn-success" type="submit">Lengkapi Profile</button>
        </form>
        </div>
    </div>
    </div>
    <!-- [ page ] end -->
</div>