<?php
    require 'assets\fusioncharts\integrations\php\samples\includes\fusioncharts.php';
?>
   <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=site_url('dashboard')?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
            <?php if ($this->session->userdata('id_role') == '1') { ?>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="card dashboard text-white bg-secondary">
                        <a href="#" data-toggle="modal" data-target="#detail_modal">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-info-circle text-white"></i>
                            </div>
                            <div class="mr-5">
                                <h5>Informasi (klik untuk detail)</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detail_modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detail_modalLabel">Informasi Hasil UTS PABWEB - Candra Wijaya</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>Sistem login dan register dapat diakses melalui link berikut : <a href="<?=site_url('login')?>">Login</a> | <a href="<?=site_url('register')?>">Register</a></li>
                                    <li>CRUD yang saya kerjakan adalah CRUD : 
                                        <ul>
                                            <li>
                                                menu <a href="<?=site_url('rating')?>">Rating</a> dan di dalam detail UMKM/Jasa Kreatif
                                            </li>
                                            <li>
                                                dan menu <a href="<?=site_url('kelola-pengguna')?>">Data Pengguna</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>Import & Export data ke excel yang saya kerjakan adalah :
                                        <ul>
                                            <li>
                                                menu <a href="<?=site_url('rating')?>">Rating</a>
                                            </li>
                                            <li>
                                                dan menu <a href="<?=site_url('kelola-pengguna')?>">Data Pengguna</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>FusionCharts yang saya kerjakan adalah :
                                        <ul>
                                            <li>
                                                Data rata-rata rating berdasarkan UMKM/Jasa Kreatif dan perbandingan pengguna berdasarkan perannya yang dapat diakses di <a href="<?=site_url('dashboard')?>">dashboard</a>
                                            </li>
                                            <li>
                                                Serta, masing-masing chart dapat dilihat pada menu :
                                                <ul>
                                                    <li><a href="rating">Data Rating</a></li>
                                                    <li><a href="kelola-pengguna">Data Pengguna</a></li>
                                                </ul>
                                                yang terletak dibagian paling bawah.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="text-right">
                                    <p>Tertanda,</p>
                                    <p>Candra Wijaya <br>(J0303201030) - INF A P2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-star"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=number_format($rating)?> Penilaian</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('rating')?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=number_format($umkm)?> Data UMKM</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('kelola-umkm')?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-handshake-o"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=number_format($jasa)?> Jasa Kreatif</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('kelola-jasa')?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-heart"></i>
                            </div>
                            <div class="mr-5">
                                <h5><?=number_format($bookmark)?> Wishlist</h5>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('wishlist-saya')?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h6>Grafik Rating</h6>
                        </div>
                        <div class="card-body">
                            <?php if($rating_diterima != '0') {?>
                                <?php 
                                    $rating = $this->db->query('SELECT *, COUNT(id_rating) AS jml_rating, SUM(jml_rating) AS sum_rating FROM rating JOIN umkm_jasa ON umkm_jasa.id_umkm_jasa=rating.id_umkm_jasa JOIN user ON user.id_user=rating.id_user WHERE status=1 GROUP BY(rating.id_umkm_jasa)')->result_array();

                                    if ($rating) {
                                        $arrData = array(
                                            "chart" => array(
                                                "caption" => "Rata-Rata Rating Berdasarkan UMKM/Jasa Kreatif",
                                                "showValues" => "0",
                                                "theme" => "fusion"
                                            )
                                        );

                                        $arrData["data"] = array();

                                        foreach($rating as $rating) {
                                            array_push($arrData["data"], array(
                                                "label" => $rating['nama_umkmjasa'],
                                                "value" => $rating['sum_rating']/$rating['jml_rating']
                                                )
                                            );
                                        }

                                        $jsonEncodedData = json_encode($arrData);

                                        $columnChart = new FusionCharts("column2D", "myFirstChart" , 400, 400, "chart-1", "json", $jsonEncodedData);

                                        $columnChart->render();
                                    }
                                ?>
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <div id="chart-1"></div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="col-lg-12 text-center">
                                <h6>Tidak ada data rating yang diterima, maka grafik tidak dapat ditampilkan</h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h6>Grafik Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <?php if($jumlah_pengguna != '0') {?>
                                <?php 
                                    $pengguna = $this->db->query('SELECT *, COUNT(id_user) AS jml_pengguna FROM user JOIN role ON role.id_role=user.id_role WHERE user.id_role!="1" GROUP BY(user.id_role)')->result_array();

                                    if ($pengguna) {
                                        $arrData = array(
                                            "chart" => array(
                                                "caption" => "Perbandingan Pengguna Berdasarkan Perannya",
                                                "showValues" => "0",
                                                "theme" => "fusion"
                                            )
                                        );

                                        $arrData["data"] = array();

                                        foreach($pengguna as $pengguna) {
                                            array_push($arrData["data"], array(
                                                "label" => ucfirst($pengguna['nama_role']),
                                                "value" => $pengguna['jml_pengguna']
                                                )
                                            );
                                        }

                                        $jsonEncodedData = json_encode($arrData);

                                        $columnChart = new FusionCharts("pie2d", "pengguna" , 400, 400, "chart-2", "json", $jsonEncodedData);

                                        $columnChart->render();
                                    }
                                ?>
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <div id="chart-2"></div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="col-lg-12 text-center">
                                <h6>Tidak ada data pengguna, maka grafik tidak dapat ditampilkan</h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h5><i class="fa fa-hand-peace-o"></i>Selamat datang, <?=ucfirst($this->session->userdata('nama_user'))?>!</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="col-lg-4 offset-lg-4">
                                <img src="<?=base_url('assets/dashboard/img/empty_cart.svg')?>" alt="Icon" class="img-fluid mt-3 mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h5><i class="fa fa-hand-peace-o"></i>Selamat datang, <?=ucfirst($this->session->userdata('nama_user'))?>!</h5>
                </div>
                <div class="card-body p-3">
                    <div class="col-lg-4 offset-lg-4">
                        <img src="<?=base_url('assets/dashboard/img/empty_cart.svg')?>" alt="Icon" class="img-fluid mt-3 mb-3">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>