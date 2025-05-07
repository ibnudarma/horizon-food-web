<div class="auth-main">
	<div class="auth-wrapper v3">
		<div class="auth-form">
			<div class="card my-5">
				<div class="card-body">
					<div class="row">
						<div class="d-flex justify-content-center">
							<div class="auth-header">
								<h2 class="text-secondary mt-5"><b>MASUK</b></h2>
								<p class="f-16 mt-2">Masukkan Email dan Password Anda</p>
							</div>
						</div>
					</div>
					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>
					<!-- Form Email -->
					<form method="POST" action="<?= base_url('app/login'); ?>">
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email..." value="<?= set_value('email'); ?>" required/>
							<label for="email">Alamat Email</label>
							<?php echo form_error('email', '<div class="form-error">', '</div>'); ?> <!-- Menampilkan error untuk email -->
						</div>

						<!-- Form Password -->
						<div class="form-floating mb-3">
							<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password..." required/>
							<label for="password">Password</label>
							<?php echo form_error('password', '<div class="form-error">', '</div>'); ?> <!-- Menampilkan error untuk password -->
						</div>

						<div class="d-flex mt-1 justify-content-between">
							<div class="form-check">
							</div>
							<h5 class="text-secondary"><a href="<?= base_url('forgot_password'); ?>">Lupa Password?</a></h5>
						</div>

						<div class="d-grid mt-4">
							<button type="submit" class="btn btn-secondary">Masuk</button>
						</div>
					</form>
					<hr />
					<h5 class="d-flex justify-content-center"><a class="text-secondary" href="<?= base_url('signup'); ?>">Belum punya akun? Daftar</a></h5>
				</div>
			</div>
		</div>
	</div>
</div>
