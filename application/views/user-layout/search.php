    <main>
        <?php $keyword = $this->input->GET('keyword', TRUE); ?>
		<div class="hero_single inner_pages background-image" data-background="url(<?=base_url('')?>assets/img/banner/banner-utama.png)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-10 col-md-8">
							<h1>Cari UMKM dan Jasa Kreatif</h1>
							<p>Temukan UMKM dan Jasa Kreatif yang Kamu Mau</p>
							<form method="get" action="<?=site_url('search')?>">
                                <div class="row g-0 custom-search-input">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <input class="form-control no_border_r" type="text" placeholder="Mau cari apa?" name="keyword" value="<?=$keyword?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn_1 gradient" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
			<div class="wave hero gray"></div>
		</div>

        <?php if ($keyword != "") { ?>
        <div class="bg_gray">
            <div class="container margin_30_40">
                <div class="main_title center mb-5">
                    <span><em></em></span>
                    <h2>Hasil Pencarian</h2>
                    <p>Berikut adalah hasil pencarian dari "<?=ucfirst($keyword)?>" :</p>
                </div>

                <div class="row">
                    <?php if (count($search) > 0) { ?>
                        <?php foreach ($search as $data) : ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <figure>
                                    <?php if($data->thumbnail == NULL) { ?>
                                    <img src="<?=base_url('')?>assets/img/preview/preview-umkm.png" data-src="<?=base_url('')?>assets/img/preview/preview-umkm.png" class="img-fluid lazy" alt="">
                                    <?php } else { ?>
                                    <img src="<?=base_url('')?>assets/img/preview/preview-umkm.png" data-src="<?=base_url('uploads/thumbnail/'.$data->thumbnail)?>" class="img-fluid lazy" alt="">
                                    <?php } ?>
                                    <a href="<?=base_url('umkm/detail/').$data->slug?>" class="strip_info">
                                        <small>
                                            <?php if($data->jenis == '1') { ?>
                                            UMKM
                                            <?php } else { ?>
                                            Jasa Kreatif
                                            <?php } ?>
                                        </small>
                                        <div class="item_title">
                                            <h3><?=ucfirst($data->nama_umkmjasa)?></h3>
                                            <small><?=ucfirst($data->kota)?></small>
                                        </div>
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php } else { ?>
                        <h3 class="text-center text-danger">Mohon maaf, data yang Anda cari tidak tersedia</h3>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
	</main>