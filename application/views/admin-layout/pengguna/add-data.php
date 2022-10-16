    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=site_url('dashboard')?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h6><?=$title?></h6>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Peran</label>
                                <select name="id_role" class="form-control select2">
                                    <option value="">-- Pilih Peran --</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">User</option>
                                    <option value="3">Partner</option>
                                </select>
                                <small class="text-danger"><?= form_error('id_role') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_user" value="<?=set_value('nama_user')?>">
                                <small class="text-danger"><?= form_error('nama_user') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email_user" value="<?=set_value('email_user')?>">
                                <small class="text-danger"><?= form_error('email_user') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input class="form-control" type="number" name="nohp_user" value="<?=set_value('nohp_user')?>">
                                <small class="text-danger"><?= form_error('nohp_user') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="<?=set_value('password')?>">
                                <small class="text-danger"><?= form_error('password') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input class="form-control" type="password" name="passconf" value="<?=set_value('passconf')?>">
                                <small class="text-danger"><?= form_error('passconf') ?></small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>