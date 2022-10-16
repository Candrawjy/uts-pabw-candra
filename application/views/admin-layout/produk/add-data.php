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
                                <label>Nama UMKM/Jasa Kreatif</label>
                                <select name="id_umkm_jasa" class="form-control select2">
                                    <option value="">-- Pilih UMKM/Jasa Kreatif --</option>
                                    <?php foreach ($umkm as $y): ?>
                                    <option value="<?=$y->id_umkm_jasa?>"><?=ucfirst($y->nama_umkmjasa)?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_umkm_jasa') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_jeniskategori" class="form-control select2">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($kategori as $y): ?>
                                    <option value="<?=$y->id_jeniskategori?>"><?=ucfirst($y->nama_jeniskategori)?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_jeniskategori') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input class="form-control" type="text" name="nama_produk" value="<?=set_value('nama_produk')?>">
                                <small class="text-danger"><?= form_error('nama_produk') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi"><?=set_value('deskripsi')?></textarea>
                                <small class="text-danger"><?= form_error('deskripsi') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="number" name="harga" value="<?=set_value('harga')?>">
                                <small class="text-danger"><?= form_error('harga') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label>Foto Produk <small class="text-danger">(Format : JPG/PNG, Max. 5mb)</small></label>
                                <input class="form-control" type="file" name="userfile[]">
                                <small class="text-danger"><?= form_error('userfile') ?></small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>