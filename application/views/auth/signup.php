<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- <a href="#" class="d-flex justify-content-center mt-3">
                        <img src="<?= base_url('assets/images/logo-dark.svg'); ?>" alt="image" class="img-fluid brand-logo" />
                    </a> -->
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="auth-header">
                                <h2 class="text-secondary mt-5"><b>Daftar</b></h2>
                                <p class="f-16 mt-2">Masukkan data untuk melanjutkan</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="<?= base_url('app/register'); ?>">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required />
                            <label for="email">Alamat Email</label>
							<?php echo form_error('email', '<div class="form-error">', '</div>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                            <label for="password">Password</label>
							<?php echo form_error('password', '<div class="form-error">', '</div>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" required />
                            <label for="password_confirm">Konfirmasi Password</label>
							<?php echo form_error('password_confirm', '<div class="form-error">', '</div>'); ?>
                        </div>
                        <!-- Dropdown untuk memilih Role -->
                        <div class="form-floating mb-3">
                            <select class="form-control" id="role" name="role" required>
                                <option value="customer">Customer</option>
                                <option value="seller">Seller</option>
                            </select>
                            <label for="role">Role</label>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary p-2">Daftar</button>
                        </div>
                    </form>
                    <hr />
                    <h5 class="d-flex justify-content-center">Sudah punya akun?</h5>
                    <h5 class="d-flex justify-content-center"><a class="text-secondary" href="<?= base_url('signin'); ?>">Masuk</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
