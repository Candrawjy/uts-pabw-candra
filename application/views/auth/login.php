<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Poodies - Portal Informasi UMKM Makanan dan Jasa Kreatif">
	<meta name="author" content="Poodies">
	<title>Poodies - <?=$title?></title>

	<link rel="shortcut icon" href="<?=base_url('')?>assets/img/logo/icon.png" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?=base_url('')?>assets/img/logo/icon.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?=base_url('')?>assets/img/logo/icon.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?=base_url('')?>assets/img/logo/icon.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?=base_url('')?>assets/img/logo/icon.png">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<link href="<?=base_url('')?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/style.css" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/order-sign_up.css" rel="stylesheet">
	<link href="<?=base_url('')?>assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets/css/sweetalert2.min.css')?>">
</head>
<body id="register_bg">
	<div id="flash" data-flash="<?=$this->session->flashdata('success')?>"></div>
	<div id="flash-error" data-flash="<?=$this->session->flashdata('error')?>"></div>
	<div id="register">
		<aside>
			<figure>
				<a href="<?=site_url('')?>">
					<img src="<?=base_url('')?>assets/img/logo/logo.png" width="60%" height="30%" alt="Logo">
				</a>
				<h4 class="m-3">Login</h4>
			</figure>
			<form autocomplete="off" action="<?=site_url('login')?>" method="post">
				<div class="form-group">
					<input class="form-control" type="email" placeholder="Email" name="email_user" value="<?=set_value('email_user')?>">
					<i class="icon_mail_alt"></i>
					<small class="text-danger"><?=form_error('email_user')?></small>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" id="password" placeholder="Password" name="password">
					<i class="icon_lock_alt"></i>
					<small class="text-danger"><?=form_error('password')?></small>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="float-end"><a id="forgot" href="#">Lupa password?</a></div>
				</div>
				<button type="submit" class="btn_1 gradient full-width">Login</button>
				<div class="text-center mt-2"><small>Belum memiliki akun? <strong><a href="<?=site_url('register')?>">Register</a></strong></small></div>
			</form>
			
			<div class="text-center mt-2"><small><strong><a href="#" class="btn_1 " data-toggle="modal" data-target="#detail_modal">Informasi Akun</a></strong></small></div>
			<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detail_modalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="detail_modalLabel">Informasi Akun</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" placeholder="admin@gmail.com" readonly value="admin@gmail.com">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" class="form-control" placeholder="admin12" readonly value="admin12">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="copy">&copy; <script>document.write(new Date().getFullYear());</script> Poodies</div>
		</aside>
	</div>
	
	<script src="<?=base_url('')?>assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url('')?>assets/js/common_scripts.min.js"></script>
	<script src="<?=base_url('')?>assets/js/common_func.js"></script>
	<script src="<?=base_url('')?>assets/assets/validate.js"></script>
	<script src="<?=base_url('assets/js/sweetalert2.min.js')?>"></script>
	<script src="<?=base_url('assets/js/custom.js')?>"></script>
</body>
</html>