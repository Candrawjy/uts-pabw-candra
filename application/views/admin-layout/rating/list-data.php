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
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <div class="d-flex justify-content-between">
                        <h6><?=$title?></h6>
                        <?php if ($this->session->userdata('id_role') == '1') { ?>
                        <div class="text-right">
                            <a href="<?=site_url('rating/import')?>" class="btn btn-sm btn-primary">Import Excel</a>
                            <a href="<?=site_url('rating/export')?>" class="btn btn-sm btn-success">Export Excel</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Penilai</th>
                                <th>Nama UMKM/Jasa Kreatif</th>
                                <th>Rating (1-10)</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($rating as $rating) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($rating->nama_user)?></td>
                                <td><?=ucfirst($rating->nama_umkmjasa)?></td>
                                <td><?=ucfirst($rating->jml_rating)?></td>
                                <td><?=ucfirst($rating->deskripsi)?></td>
                                <td>
                                    <?php if($rating->status == '0') { ?>
                                    <i class="pending">Ditinjau</i>
                                    <?php } else if($rating->status == '1') { ?>
                                    <i class="approved">Diterima</i>
                                    <?php } else { ?>
                                    <i class="cancel">Ditolak</i>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($this->session->userdata('id_role') != '2') { ?>
                                    <a href="<?=base_url('rating/edit/').$rating->id_rating?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('rating/delete/').$rating->id_rating?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                    <?php } else { ?>
                                        Tidak tersedia
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
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

                                        $columnChart = new FusionCharts("column2D", "myFirstChart" , 700, 400, "chart-1", "json", $jsonEncodedData);

                                        $columnChart->render();
                                    }
                                ?>
                            <div class="row table-responsive">
                                <div class="col-lg-8 offset-lg-2">
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
            </div>
        </div>
    </div>