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
                    <div class="d-flex justify-content-between">
                        <h6><?=$title?></h6>
                        <div class="text-right">
                            <a href="<?=site_url('kelola-pengguna')?>" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <form action="<?=site_url('kelola-pengguna/import/data')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label>File Excel <small class="text-danger">(Format : csv/xlsx, Max. 3mb)</small></label>
                                <input class="form-control" type="file" name="upload_file">
                                <small class="text-danger"><?=form_error('upload_file') ?></small>
                            </div>
                        </div>
                    </div>
                    <a href="<?=site_url('kelola-pengguna/import/format')?>" class="btn btn-sm btn-primary" target="_blank">Download Format Import</a>
                    <button class="btn btn-sm btn-success" type="submit">Import</button>
                </form>
            </div>
        </div>
    </div>