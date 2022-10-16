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
                                <label>Status</label>
                                <input type="hidden" name="id_rating" value="<?=$rating['id_rating']?>">
                                <select name="status" class="form-control select2">
                                    <option value="<?=$rating['status'] ?>">-- Tidak Ada Perubahan --</option>
                                    <!-- <option value="0">Ditinjau</option> -->
                                    <option value="1">Diterima</option>
                                    <option value="2">Ditolak</option>
                                </select>
                                <small class="text-danger"><?= form_error('status') ?></small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>