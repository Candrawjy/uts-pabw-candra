    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=site_url('dashboard')?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
            <div class="box_general">
                <div class="header_box">
                    <h6>Wishlist Saya</h6>
                </div>
                <div class="list_general">
                    <ul>
                        <?php foreach($wishlist as $wishlist): ?>
                        <li>
                            <figure><img src="<?=base_url('uploads/thumbnail/'.$wishlist->thumbnail)?>" alt=""></figure>
                            <small><?=ucfirst($wishlist->nama_jeniskategori)?></small>
                            <h4><?=ucfirst($wishlist->nama_umkmjasa)?></h4>
                            <p><?=ucfirst($wishlist->deskripsi)?></p>
                            <?php if($this->session->userdata('id_role') == '1') { ?>
                            <p>Wishlist oleh <?=ucfirst($wishlist->nama_user)?></p>
                            <?php } ?>
                            <ul class="buttons">
                                <li><a href="<?=base_url('wishlist/remove/').$wishlist->id_wishlist?>" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Hapus</a></li>
                            </ul>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>