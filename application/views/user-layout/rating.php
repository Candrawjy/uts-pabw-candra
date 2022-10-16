    <main class="bg_gray">
        <div class="container margin_60_20">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="box_general write_review">
                        <h1 class="add_bottom_15">Tulis ulasan untuk "<?=ucfirst($umkm_jasa['nama_umkmjasa'])?>"</h1>
                        <form action="" method="post">
                            <label class="d-block add_bottom_15">Penilaian Keseluruhan</label>
                            <div class="row">
                                <div class="col-lg-12 add_bottom_25">
                                    <div class="add_bottom_15">Rating <strong class="food_quality_val"></strong></div>
                                    <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="food_quality" name="jml_rating">
                                </div>
                                <small class="text-danger"><?= form_error('jml_rating') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Judul Penilaian Anda</label>
                                <input class="form-control" type="text" name="judul" value="<?=set_value('judul')?>">
                                <input class="form-control" type="hidden" name="id_umkm_jasa" value="<?=$umkm_jasa['id_umkm_jasa']?>">
                                <small class="text-danger"><?= form_error('judul') ?></small>
                            </div>
                            <div class="form-group">
                                <label>Penilaian Anda</label>
                                <textarea class="form-control" style="height: 180px;" name="deskripsi"><?=set_value('deskripsi')?></textarea>
                                <small class="text-danger"><?= form_error('deskripsi') ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_1">Submit Penilaian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>