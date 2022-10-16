    <footer>
        <div class="wave footer <?php if($this->uri->segment(1) == "search" || $this->uri->segment(1) == "bantuan" || $this->uri->segment(1) == "review"){echo 'gray';}?>"></div>
        <div class="container margin_60_40 fix_mobile">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_1">Profil</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul>
                            <li>
                                <img src="<?=base_url('')?>assets/img/logo/logo.png" alt="Logo" class="img-fluid mb-3" width="30%">
                                <p>Poodies merupakan sebuah website portal informasi untuk mencari UMKM yang berfokus dibidang makanan dan jasa kreatif yang terdapat di daerah Jabodebek (Jakarta, Bogor, Depok dan Bekasi).</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_2">Lainnya</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <!-- <li><a href="<?=site_url('berita')?>">Berita</a></li> -->
                            <li><a href="<?=site_url('bantuan')?>">Bantuan</a></li>
                            <li><a href="<?=site_url('kontak-kami')?>">Kontak Kami</a></li>
                            <li><a href="<?=site_url('tentang-kami')?>">Tentang Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_3">Kontak</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_house_alt"></i>Jl. Kumbang No.14, RT.02/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</li>
                            <li><i class="icon_mobile"></i>0813-1129-3294</li>
                            <li><i class="icon_mail_alt"></i><a href="mailto:poodiesipb@gmail.com">Poodiesipb@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_4">Ikuti Kami</h3>
                    <div class="collapse dont-collapse-sm" id="collapse_4">
                        <div class="follow_us">
                            <ul class="mt-2">
                                <li><a href="https://twitter.com/vokasiipb" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('')?>assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://id-id.facebook.com/vokasiipb/" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('')?>assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://www.instagram.com/sekolahvokasiipb" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('')?>assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://www.youtube.com/channel/UCc1K1TZY4M7PRbx3c3G8MLQ/videos" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=base_url('')?>assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row add_bottom_25">
                <div class="offset-lg-6 col-lg-6">
                    <ul class="additional_links">
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><span>&copy; <script>document.write(new Date().getFullYear());</script> Poodies</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div id="toTop"></div>

    <script src="<?=base_url('')?>assets/js/common_scripts.min.js"></script>
    <script src="<?=base_url('')?>assets/js/common_func.js"></script>
    <script src="<?=base_url('')?>assets/assets/validate.js"></script>
    <script src="<?=base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?=base_url('assets/js/custom.js')?>"></script>

    <script src="<?=base_url('')?>assets/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?=base_url('')?>assets/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

    <script src="<?=base_url('')?>assets/js/beranda.js"></script>
    <script src="<?=base_url('')?>assets/js/sticky_sidebar.min.js"></script>
    <script src="<?=base_url('')?>assets/js/sticky-kit.min.js"></script>
    <script src="<?=base_url('')?>assets/js/specific_detail.js"></script>
    <?php if($this->uri->segment(1) == "review") { ?>
    <script src="<?=base_url('')?>assets/js/specific_review.js"></script>
    <?php } else if($this->uri->segment(1) != "review") { ?>
    <script src="<?=base_url('')?>assets/js/specific_listing.js"></script>
    <?php } ?>
</body>
</html>