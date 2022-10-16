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
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_user" value="<?=ucfirst($this->session->userdata('nama_user'))?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email_user" value="<?=ucfirst($this->session->userdata('email_user'))?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input class="form-control" type="number" name="nohp_user" value="<?=ucfirst($this->session->userdata('nohp_user'))?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control" type="text" name="status" value="Terverifikasi" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- <button class="btn btn-sm btn-success" type="submit">Tambah</button> -->
                </form>
            </div>
        </div>
    </div>