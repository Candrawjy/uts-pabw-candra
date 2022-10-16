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
                                <th>Nama Jasa Kreatif</th>
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
                                foreach ($jasa as $jasa) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($jasa->nama_user)?></td>
                                <td><?=ucfirst($jasa->nama_umkmjasa)?></td>
                                <td><?=ucfirst($jasa->nama_jeniskategori)?></td>
                                <td><?=ucfirst(character_limiter($jasa->deskripsi,50))?></td>
                                <td><?=$jasa->jam_operasional?> WIB</td>
                                <td><?=$jasa->nohp_umkmjasa?></td>
                                <td><?=ucfirst($jasa->kota)?></td>
                                <td><a href="<?=$jasa->lokasi?>">Lihat Lokasi</a></td>
                                <td>
                                    <?php if($jasa->thumbnail != NULL) { ?>
                                    <a href="<?=base_url('uploads/thumbnail/'.$jasa->thumbnail)?>" target="_blank"><img src="<?=base_url('uploads/thumbnail/'.$jasa->thumbnail)?>" alt="Thumbnail" class="img-fluid" width="50%" height="50%"></a>
                                    <?php } else { ?>
                                    <img src="<?=base_url('assets/img/preview/preview-kategori-jasa.png')?>" alt="Thumbnail" class="img-fluid" width="80%" height="80%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?=base_url('kelola-jasa/edit/').$jasa->id_umkm_jasa?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('kelola-jasa/delete/').$jasa->id_umkm_jasa?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>