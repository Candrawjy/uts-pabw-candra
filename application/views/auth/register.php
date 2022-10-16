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
				<h4 class="m-3">Register</h4>
			</figure>
			<form autocomplete="off" action="<?=site_url('register')?>" method="post">
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_user" value="<?=set_value('nama_user')?>">
					<i class="icon_pencil-edit"></i>
					<small class="text-danger"><?=form_error('nama_user')?></small>
				</div>
				<div class="form-group">
					<input class="form-control" type="email" placeholder="Email" name="email_user" value="<?=set_value('email_user')?>">
					<i class="icon_mail_alt"></i>
					<small class="text-danger"><?=form_error('email_user')?></small>
				</div>
				<div class="form-group">
					<input class="form-control" type="number" placeholder="No Handphone" name="nohp_user" value="<?=set_value('nohp_user')?>">
					<i class="icon_mobile"></i>
					<small class="text-danger"><?=form_error('nohp_user')?></small>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" id="password1" placeholder="Password" name="password">
					<i class="icon_lock_alt"></i>
					<small class="text-danger"><?=form_error('password')?></small>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" id="password2" placeholder="Konfirmasi Password" name="passconf">
					<input type="hidden" name="id_role" value="2">
					<i class="icon_lock_alt"></i>
					<small class="text-danger"><?=form_error('passconf')?></small>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 gradient full-width">Register</button>
				<div class="text-center mt-2"><small>Sudah memiliki akun? <strong><a href="<?=site_url('login')?>">Login</a></strong></small></div>
			</form>

			<div class="text-center mt-2"><small><strong><a href="#" class="btn_1 " data-toggle="modal" data-target="#detail_modal">Informasi</a></strong></small></div>
			<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detail_modalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="detail_modalLabel">Informasi</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<h6>Catatan :</h6>
							<ul>
								<li>Mohon gunakan alamat email aktif saat pendaftaran guna verifikasi email.</li>
								<li>Jika gagal dalam melakukan register, Anda bisa mencoba pada link <a href="https://ipb.link/pabw-candra">berikut ini</a>. Karena di dalam localhost tidak dapat mengirim email.</li>
							</ul>
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
	
	<script src="<?=base_url('')?>assets/js/pw_strenght.js"></script>
	<script src="<?=base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?=base_url('assets/js/custom.js')?>"></script>
</body>
</html>