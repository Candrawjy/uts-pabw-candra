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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemilik</th>
                                <th>Nama UMKM</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Jam Buka</th>
                                <th>No HP</th>
                                <th>Kota</th>
                                <th>Lokasi</th>
                                <th>Thumbnail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($umkm as $umkm) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($umkm->nama_user)?></td>
                                <td><?=ucfirst($umkm->nama_umkmjasa)?></td>
                                <td><?=ucfirst($umkm->nama_jeniskategori)?></td>
                                <td><?=ucfirst(character_limiter($umkm->deskripsi,50))?></td>
                                <td><?=$umkm->jam_operasional?> WIB</td>
                                <td><?=$umkm->nohp_umkmjasa?></td>
                                <td><?=ucfirst($umkm->kota)?></td>
                                <td><a href="<?=$umkm->lokasi?>">Lihat Lokasi</a></td>
                                <td>
                                    <?php if($umkm->thumbnail != NULL) { ?>
                                    <a href="<?=base_url('uploads/thumbnail/'.$umkm->thumbnail)?>" target="_blank"><img src="<?=base_url('uploads/thumbnail/'.$umkm->thumbnail)?>" alt="Thumbnail" class="img-fluid" width="50%" height="50%"></a>
                                    <?php } else { ?>
                                    <img src="<?=base_url('assets/img/preview/preview-kategori-umkm.png')?>" alt="Thumbnail" class="img-fluid" width="80%" height="80%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?=base_url('kelola-umkm/edit/').$umkm->id_umkm_jasa?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('kelola-umkm/delete/').$umkm->id_umkm_jasa?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>