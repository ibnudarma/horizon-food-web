<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-secondary mt-5"><b>Reset Password</b></h2>
                    <p class="f-16 mt-2">Masukkan password baru Anda.</p>

                    <!-- Menampilkan pesan sukses/error -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('forgotpassword/update_password'); ?>">
                        <!-- Reset Token -->
                        <input type="hidden" name="reset_token" value="<?= $reset_token; ?>" />

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required />
                            <label for="password">Password Baru</label>
                            <?= form_error('password', '<div class="form-error">', '</div>'); ?>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" required />
                            <label for="password_confirm">Konfirmasi Password</label>
                            <?= form_error('password_confirm', '<div class="form-error">', '</div>'); ?>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary p-2">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
