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
                                <th>Nama Produk</th>
                                <th>Nama UMKM</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($produk as $produk) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($produk->nama_produk)?></td>
                                <td><?=ucfirst($produk->nama_umkmjasa)?></td>
                                <td><?=ucfirst($produk->nama_jeniskategori)?></td>
                                <td><?=ucfirst(character_limiter($produk->deskripsi_produk,50))?></td>
                                <td>Rp<?=number_format($produk->harga)?></td>
                                <td>
                                    <?php if($produk->foto != NULL) { ?>
                                    <a href="<?=base_url('uploads/produk/'.$produk->foto)?>" target="_blank"><img src="<?=base_url('uploads/produk/'.$produk->foto)?>" alt="Foto Produk" class="img-fluid" width="50%" height="50%"></a>
                                    <?php } else { ?>
                                    <img src="<?=base_url('assets/img/preview/preview-kategori-umkm.png')?>" alt="Thumbnail" class="img-fluid" width="50%" height="50%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?=base_url('kelola-produk/edit/').$produk->id_produk?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('kelola-produk/delete/').$produk->id_produk?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>