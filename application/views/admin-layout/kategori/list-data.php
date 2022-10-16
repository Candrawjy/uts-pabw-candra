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
                                <th>Nama Kategori</th>
                                <th>Target</th>
                                <th>Thumbnail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($kategori as $kategori) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($kategori->nama_jeniskategori)?></td>
                                <td><?=ucfirst($kategori->target)?></td>
                                <td>
                                    <?php if($kategori->thumbnail_kategori != NULL) { ?>
                                    <a href="<?=base_url('uploads/kategori/'.$kategori->thumbnail_kategori)?>" target="_blank"><img src="<?=base_url('uploads/kategori/'.$kategori->thumbnail_kategori)?>" alt="Thumbnail" class="img-fluid" width="50%" height="50%"></a>
                                    <?php } else { ?>
                                    <img src="<?=base_url('assets/img/preview/preview-kategori-umkm.png')?>" alt="Thumbnail" class="img-fluid" width="50%" height="50%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?=base_url('kelola-kategori/edit/').$kategori->id_jeniskategori?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('kelola-kategori/delete/').$kategori->id_jeniskategori?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>