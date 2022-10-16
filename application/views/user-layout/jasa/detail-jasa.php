	<main>
		<?php if($umkm_jasa['thumbnail'] == NULL) { ?>
		<div class="hero_in detail_page background-image" data-background="url(<?=base_url('')?>assets/img/banner/banner-utama.png)">
		<?php } else { ?>
		<div class="hero_in detail_page background-image" data-background="url(<?=base_url('uploads/thumbnail/'.$umkm_jasa['thumbnail'])?>)">
		<?php } ?>
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<?php $ratings = $this->db->from("rating")->where('status', '1')->where('id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->get()->num_rows(); ?>
								<div class="head">
									<div class="score">
										<span>
											<br>
											<em><?=number_format($ratings)?> Review</em>
										</span>
										<strong></strong>
									</div>
								</div>
								<h1><?=ucfirst($umkm_jasa['nama_umkmjasa'])?></h1>
								<?=ucfirst($umkm_jasa['kota'])?> - <a href="<?=ucfirst($umkm_jasa['lokasi'])?>" target="_blank">Lihat Lokasi</a>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6 position-relative">
								<div class="buttons clearfix d-flex">
									<span class="magnific-gallery">
										<a href="<?=base_url('uploads/thumbnail/'.$umkm_jasa['thumbnail'])?>" class="btn_hero" title="Photo" data-effect="mfp-zoom-in"><i class="icon_image"></i>Lihat Foto</a>
									</span>
									<?php if ($this->session->userdata('id_role') == null) { ?>
									<a href="#" class="btn_hero wishlist-gagal ms-3" id="gagal"><i class="icon_heart"></i>Wishlist</a>
									<?php } else { ?>
										<?php
										$count_wishlist = $this->db->from("wishlist")->where('id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->where('id_user', $this->session->userdata('id_user'))->get()->num_rows();
										$wishlist = $this->db->from("wishlist")->where('id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->where('id_user', $this->session->userdata('id_user'))->get()->result();
										?>

										<?php if($count_wishlist == '0') { ?>
										<form action="<?php echo site_url('wishlist')?>" method="post">
											<input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
											<input type="hidden" name="id_umkm_jasa" value="<?=$umkm_jasa['id_umkm_jasa']?>">
											<button type="submit" class="btn_hero ms-3"><i class="icon_heart"></i>Wishlist</button>
										</form>
										<?php } else { ?>
										<?php foreach($wishlist as $wishlist): ?>
										<a href="<?=base_url('wishlist/remove/').$wishlist->id_wishlist?>" class="btn_hero wishlist-remove ms-3 liked"><i class="icon_heart"></i>Wishlist</a>
										<?php endforeach ?>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $kategori = $this->db->select(array('jenis_kategori.*, produk.*'))->distinct()->from("jenis_kategori")->join('produk', 'produk.id_jeniskategori = jenis_kategori.id_jeniskategori')->group_by('jenis_kategori.id_jeniskategori')->where('jenis_kategori.target', 'Jasa Kreatif')->where('produk.id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->get()->result(); ?>
		<nav class="secondary_nav sticky_horizontal">
		    <div class="container">
		        <ul id="secondary_nav">
		        	<?php foreach ($kategori as $kategori) : ?>
		            <li><a href="#<?=$kategori->slug?>"><?=ucfirst($kategori->nama_jeniskategori)?></a></li>
		        	<?php endforeach ?>
		            <li><a href="#section-4"><i class="icon_chat_alt"></i>Ulasan</a></li>
		        </ul>
		    </div>
		    <span></span>
		</nav>

		<div class="bg_gray">
		    <div class="container margin_detail">
		        <div class="row">
		            <div class="col-lg-8 list_menu">
		            	<?php $kategori = $this->db->select(array('jenis_kategori.*, produk.*'))->distinct()->from("jenis_kategori")->join('produk', 'produk.id_jeniskategori = jenis_kategori.id_jeniskategori')->group_by('jenis_kategori.id_jeniskategori')->where('jenis_kategori.target', 'Jasa Kreatif')->where('produk.id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->get()->result(); ?>
		            	<?php foreach ($kategori as $kategori) : ?>
		                <section id="<?=$kategori->slug?>">
		                    <h4><?=ucfirst($kategori->nama_jeniskategori)?></h4>
		                    <div class="row">
		                    	<?php $produk = $this->db->select('umkm_jasa.*, jenis_kategori.*, produk.*, produk.deskripsi as deskripsi_produk')->from("produk")->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = produk.id_umkm_jasa')->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = produk.id_jeniskategori')->where('umkm_jasa.jenis', '2')->where('produk.id_jeniskategori', $kategori->id_jeniskategori)->where('produk.id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->group_by('jenis_kategori.id_jeniskategori')->order_by('produk.created_at','DESC')->get()->result();?>
		                    	<?php foreach ($produk as $produk) : ?>
		                        <div class="col-md-6">
		                            <a class="menu_item pe-none" aria-disabled="true" href="javascript:void(0)">
		                                <figure>
		                                	<?php if($produk->foto == NULL) { ?>
		                                	<img src="<?=base_url('')?>assets/img/preview/preview-umkm.png" data-src="<?=base_url('')?>assets/img/preview/preview-umkm.png" alt="thumb" class="lazy" width="160px" height="160px">
		                                	<?php } else { ?>
		                                	<img src="<?=base_url('')?>assets/img/preview/preview-umkm.png" data-src="<?=base_url('uploads/produk/'.$produk->foto)?>" alt="thumb" class="lazy" width="160px" height="160px">
		                                	<?php } ?>
		                                </figure>
		                                <h3><?=ucfirst($produk->nama_produk)?></h3>
		                                <p><?=ucfirst($produk->deskripsi_produk)?></p>
		                                <strong>Rp<?=number_format($produk->harga)?></strong>
		                            </a>
		                        </div>
		                        <?php endforeach ?>
		                    </div>
		                </section>
		                <?php endforeach ?>
		            </div>

		            <div class="col-lg-4" id="sidebar_fixed">
		                <div class="box_order mobile_fixed">
		                    <div class="head">
		                        <h3>Detail Jasa Kreatif</h3>
		                        <a href="javascript:void(0)" class="close_panel_mobile"><i class="icon_close"></i></a>
		                    </div>
		                    <div class="main">
		                        <div class="clearfix">
		                        	<p><b>Deskripsi : </b></p>
		                        	<p><?=ucfirst($umkm_jasa['deskripsi'])?></p>
		                        </div>
		                        <hr>
		                        <div class="clearfix">
		                        	<p><b>Lokasi :</b> <?=ucfirst($umkm_jasa['kota'])?> <a href="<?=ucfirst($umkm_jasa['lokasi'])?>" target="_blank">(Lihat Lokasi)</a></p>
		                        	<!-- <p><b>Telepon :</b> <?=$umkm_jasa['nohp_umkmjasa']?></p> -->
		                        	<p><b>Jam Operasional :</b> <?=$umkm_jasa['jam_operasional']?> WIB</p>
		                        </div>
		                        <div class="btn_1_mobile">
		                            <a href="http://wa.me/<?=$umkm_jasa['nohp_umkmjasa']?>?text=Halo,%20<?=$umkm_jasa['nama_umkmjasa']?>" class="btn_1 gradient full-width mb_5" target="_blank">Hubungi Jasa Kreatif</a>
		                        </div>
		                    </div>
		                </div>
		                <div class="btn_reserve_fixed"><a href="javascript:void(0)" class="btn_1 gradient full-width">Detail Jasa Kreatif</a></div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="container margin_30_20">
			<div class="row">
				<div class="col-lg-8 list_menu">
					<section id="section-4">
						<h4>Ulasan</h4>
					    <!-- <div class="row add_bottom_30 d-flex align-items-center reviews">
					        <div class="col-md-3">
					            <div id="review_summary">
					                <strong>8.5</strong>
					                <em>Hebat</em>
					                <small>Berdasarkan 4 ulasan</small>
					            </div>
					        </div>
					        <div class="col-md-9 reviews_sum_details">
					            <div class="row">
					                <div class="col-md-6">
					                    <h6>Kualitas makanan</h6>
					                    <div class="row">
					                        <div class="col-xl-10 col-lg-9 col-9">
					                            <div class="progress">
					                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
					                            </div>
					                        </div>
					                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.0</strong></div>
					                    </div>

					                    <h6>Pelayanan</h6>
					                    <div class="row">
					                        <div class="col-xl-10 col-lg-9 col-9">
					                            <div class="progress">
					                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
					                            </div>
					                        </div>
					                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.5</strong></div>
					                    </div>
					                </div>

					                <div class="col-md-6">
					                    <h6>Ketepatan Waktu</h6>
					                    <div class="row">
					                        <div class="col-xl-10 col-lg-9 col-9">
					                            <div class="progress">
					                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					                            </div>
					                        </div>
					                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
					                    </div>

					                    <h6>Harga</h6>
					                    <div class="row">
					                        <div class="col-xl-10 col-lg-9 col-9">
					                            <div class="progress">
					                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					                            </div>
					                        </div>
					                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div> -->

					     <div id="reviews">
					     	<?php $review = $this->db->select('umkm_jasa.*, user.*, rating.*')->from("rating")->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = rating.id_umkm_jasa')->join('user', 'user.id_user = rating.id_user')->where('rating.status', '1')->where('rating.id_umkm_jasa', $umkm_jasa['id_umkm_jasa'])->order_by('rating.created_at','DESC')->get()->result();?>

					     	<?php foreach ($review as $review) : ?>
					        <div class="review_card">
					            <div class="row">
					                <div class="col-md-2 user_info">
					                    <figure><img src="<?=base_url('')?>assets/img/avatar.jpg" alt=""></figure>
					                    <h5><?=ucfirst($review->nama_user)?></h5>
					                </div>
					                <div class="col-md-10 review_content">
					                    <div class="clearfix add_bottom_15">
					                        <span class="rating"><?=$review->jml_rating?><small>/10</small> <strong>Rating</strong></span>
					                        <em><?= date('D, d-m-Y', strtotime($review->created_at)) ?></em>
					                    </div>
					                    <p><?=ucfirst($review->deskripsi)?></p>
					                </div>
					            </div>
					        </div>
					    	<?php endforeach ?>
					    </div>
					    <?php if ($this->session->userdata('id_role') == null) { ?>
					    <div class="text-end"><a href="#" class="btn_1 gradient" id="gagal">Berikan Penilaian</a></div>
					    <?php } else { ?>
	                    <div class="text-end"><a href="<?=base_url('review/').$umkm_jasa['slug']?>" class="btn_1 gradient">Berikan Penilaian</a></div>
	                    <?php } ?>
					</section>
				</div>
			</div>
		</div>
	</main>