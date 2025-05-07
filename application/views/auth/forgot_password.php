<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="auth-header">
                                <h2 class="text-secondary mt-5"><b>Lupa Password</b></h2>
                                <p class="f-16 mt-2">Masukkan Email Anda untuk menerima OTP atau link reset password.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menampilkan Pesan Error -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Debug dengan var_dump() untuk email -->
                    <pre>
                        <?php var_dump($this->input->post('email')); ?>  <!-- Menampilkan nilai email -->
                    </pre>

                    <!-- Form Email -->
                    <form method="POST" action="<?= base_url('forgotpassword/send_reset_link'); ?>">  <!-- Ubah action sesuai dengan controller yang benar -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email..." value="<?= set_value('email'); ?>" required/>
                            <label for="email">Alamat Email</label>
                            <?php echo form_error('email', '<div class="form-error">', '</div>'); ?> <!-- Menampilkan error untuk email -->
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Kirim OTP</button>
                        </div>
                    </form>

                    <hr />
                    <h5 class="d-flex justify-content-center"><a class="text-secondary" href="<?= base_url('app/signin'); ?>">Sudah punya akun? Masuk</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
