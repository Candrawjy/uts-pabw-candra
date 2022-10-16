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
                            <a href="<?=site_url('kelola-pengguna/import')?>" class="btn btn-sm btn-primary">Import Excel</a>
                            <a href="<?=site_url('kelola-pengguna/export')?>" class="btn btn-sm btn-success">Export Excel</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Peran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($pengguna as $pengguna) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=ucfirst($pengguna->nama_user)?></td>
                                <td><?=ucfirst($pengguna->email_user)?></td>
                                <td><?=$pengguna->nohp_user?></td>
                                <td>
                                    <?php if($pengguna->id_role == '1') { ?>
                                        Administrator
                                    <?php } else if($pengguna->id_role == '2') { ?>
                                        User
                                    <?php } else { ?>
                                        Partner
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($pengguna->is_active == '0') { ?>
                                        Belum Verifikasi
                                    <?php } else { ?>
                                        Terverifikasi
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($pengguna->email_user != 'candraw71@gmail.com' && $pengguna->email_user != 'admin@gmail.com') { ?>
                                    <a href="<?=base_url('kelola-pengguna/edit/').$pengguna->id_user?>" class="btn_1">Edit</a><br>
                                    <a href="<?=base_url('kelola-pengguna/delete/').$pengguna->id_user?>" class="btn_1 gray" id="btn-hapus">Hapus</a>
                                    <?php } else { ?>
                                        <p>Aksi tidak tersedia</p>
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
                            <h6>Grafik Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <?php if($jumlah_pengguna != '0') {?>
                                <?php 
                                    $penggunachart = $this->db->query('SELECT *, COUNT(id_user) AS jml_pengguna FROM user JOIN role ON role.id_role=user.id_role WHERE user.id_role!="1" GROUP BY(user.id_role)')->result_array();

                                    if ($penggunachart) {
                                        $arrData = array(
                                            "chart" => array(
                                                "caption" => "Perbandingan Pengguna Berdasarkan Perannya",
                                                "showValues" => "0",
                                                "theme" => "fusion"
                                            )
                                        );

                                        $arrData["data"] = array();

                                        foreach($penggunachart as $penggunachart) {
                                            array_push($arrData["data"], array(
                                                "label" => ucfirst($penggunachart['nama_role']),
                                                "value" => $penggunachart['jml_pengguna']
                                                )
                                            );
                                        }

                                        $jsonEncodedData = json_encode($arrData);

                                        $columnChart = new FusionCharts("pie2d", "pengguna" , 400, 400, "chart-2", "json", $jsonEncodedData);

                                        $columnChart->render();
                                    }
                                ?>
                            <div class="row table-responsive">
                                <div class="col-lg-6 offset-lg-4">
                                    <div id="chart-2"></div>
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