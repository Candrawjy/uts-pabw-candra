	<main>
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		        		<h1>Daftar Jasa Kreatif di sekitar Jabodetabek</h1>
		    		</div>
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<form class="form-inline" method="get" action="<?=site_url('search')?>">
								<input type="text" class="form-control" placeholder="Cari UMKM atau Jasa Kreatif" name="keyword">
								<button type="submit"><i class="icon_search"></i></button>
							</form>
						</div>
		    		</div>
		    	</div>       
		    </div>
		</div>

		<div class="container margin_30_20">			
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row">
						<div class="col-12">
							<h2 class="title_small">Kategori Teratas</h2>
							<div class="owl-carousel owl-theme categories_carousel_in listing">
								<?php foreach ($kategori as $kategori) : ?>
								<div class="item">
									<figure>
										<?php if($kategori->thumbnail_kategori == NULL) { ?>
							        	<img src="<?=base_url('')?>assets/img/preview/preview-kategori-umkm.png" data-src="<?=base_url('')?>assets/img/preview/preview-kategori-umkm.png" alt="" class="owl-lazy">
							       		<?php } else { ?>
							       			<img src="<?=base_url('')?>assets/img/preview/preview-kategori-umkm.png" data-src="<?=base_url('uploads/kategori/'.$kategori->thumbnail_kategori)?>" alt="" class="owl-lazy">
							        	<?php } ?>
										<a href="#" class="pe-none"><h3><?=ucfirst($kategori->nama_jeniskategori)?></h3></a>
									</figure>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>

					<div class="promo">
						<h3>Gratis Biaya Konsultasi!</h3>
						<p class="text-sm small">*Syarat dan ketentuan berlaku (berdasarkan jasa kreatif)</p>
						<i class="icon-clock_2"></i>
					</div>
					
					<div class="row">
						<div class="col-12"><h2 class="title_small">Semua Jasa Kreatif</h2></div>
						<?php foreach ($jasa as $jasa) : ?>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							    	<?php if($jasa->thumbnail == NULL) { ?>
							        <img src="<?=base_url('')?>assets/img/preview/preview-jasa.png" data-src="<?=base_url('')?>assets/img/preview/preview-jasa.png" class="img-fluid lazy" alt="">
							        <?php } else { ?>
							        <img src="<?=base_url('')?>assets/img/preview/preview-jasa.png" data-src="<?=base_url('uploads/thumbnail/'.$jasa->thumbnail)?>" class="img-fluid lazy" alt="">
							        <?php } ?>
							        <a href="<?=base_url('jasa/detail/').$jasa->slug?>" class="strip_info">
							            <small><?=ucfirst($jasa->nama_jeniskategori)?></small>
							            <div class="item_title">
							                <h3><?=ucfirst($jasa->nama_umkmjasa)?></h3>
							                <small><?=ucfirst($jasa->kota)?></small>
							            </div>
							        </a>
							    </figure>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>		
		</div>
	</main>