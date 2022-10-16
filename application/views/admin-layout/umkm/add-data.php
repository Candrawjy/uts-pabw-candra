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
                                <label>Nama Pemilik</label>
                                <select name="id_user" class="form-control select2">
                                    <option value="">-- Pilih Pemilik --</option>
                                    <?php foreach ($user as $y): ?>
                                    <option value="<?=$y->id_user?>"><?=ucfirst($y->nama_user)?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_user') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama UMKM</label>
                                <input class="form-control" type="text" name="nama_umkmjasa" value="<?=set_value('nama_umkmjasa')?>">
                                <small class="text-danger"><?= form_error('nama_umkmjasa') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi"><?=set_value('deskripsi')?></textarea>
                                <small class="text-danger"><?= form_error('deskripsi') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jam Operasional <small class="text-danger">(Contoh : 07.00 - 19.00)</small></label>
                                <input class="form-control" type="text" name="jam_operasional" value="<?=set_value('jam_operasional')?>">
                                <small class="text-danger"><?= form_error('jam_operasional') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No Handphone/WA <small class="text-danger">(Contoh : 62852***)</small></label>
                                <input class="form-control" type="number" name="nohp_umkmjasa" value="<?=set_value('nohp_umkmjasa')?>">
                                <small class="text-danger"><?= form_error('nohp_umkmjasa') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Lokasi <small class="text-danger">(Contoh : Kota Bogor)</small></label>
                                <input class="form-control" type="text" name="kota" value="<?=set_value('kota')?>">
                                <small class="text-danger"><?= form_error('kota') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Link Google Maps</label>
                                <input class="form-control" type="text" name="lokasi" value="<?=set_value('lokasi')?>">
                                <small class="text-danger"><?= form_error('lokasi') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kategori Utama UMKM</label>
                                <select name="id_jeniskategori" class="form-control select2">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach ($kategori as $x): ?>
                                    <option value="<?=$x->id_jeniskategori?>"><?=ucfirst($x->nama_jeniskategori)?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger"><?= form_error('id_jeniskategori') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label>Foto Thumbnail <small class="text-danger">(Format : JPG/PNG, Max. 5mb)</small></label>
                                <input class="form-control" type="file" name="userfile[]">
                                <small class="text-danger"><?= form_error('userfile') ?></small>
                            </div>
                                <input type="hidden" name="jenis" value="1">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>