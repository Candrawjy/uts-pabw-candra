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
                                <label>Nama Kategori</label>
                                <input type="hidden" name="id_jeniskategori" value="<?=$kategori['id_jeniskategori'] ?>">
                                <input class="form-control" type="text" name="nama_jeniskategori" value="<?=$kategori['nama_jeniskategori'] ?>">
                                <small class="text-danger"><?= form_error('nama_jeniskategori') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Target</label>
                                <select name="target" class="form-control">
                                    <option value="<?=$kategori['target'] ?>">-- Tidak Ada Perubahan --</option>
                                    <option value="UMKM">UMKM</option>
                                    <option value="Jasa Kreatif">Jasa Kreatif</option>
                                </select>
                                <small class="text-danger"><?= form_error('target') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label>Foto Thumbnail <small class="text-danger">(Format : JPG/PNG, Max. 5mb)</small></label>
                                <input class="form-control" type="file" name="thumbnail_kategori">
                                <input type="hidden" name="tmp_thumbnail_kategori" value="<?=$kategori['thumbnail_kategori']?>">
                                <small class="text-danger"><?= form_error('thumbnail_kategori') ?></small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>