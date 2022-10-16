<body class="fixed-nav sticky-footer" id="page-top">
    <div id="flash" data-flash="<?=$this->session->flashdata('success')?>"></div>
    <div id="flash-error" data-flash="<?=$this->session->flashdata('error')?>"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?=site_url('dashboard')?>">
            <img src="<?=base_url('')?>assets/img/logo/logo-white.png" width="100px" height="40px" alt="Logo">
            <!-- <span class="text-white">Logo</span> -->
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item <?php if($this->uri->segment(1) == "dashboard"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="<?=site_url('dashboard')?>">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('id_role') != '2') { ?>
                <li class="nav-item <?php if($this->uri->segment(1) == "kelola-umkm"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUmkm">
                        <i class="fa fa-fw fa-shopping-basket"></i>
                        <span class="nav-link-text">Data UMKM</span>
                    </a>
                    <ul class="sidenav-second-level <?php if($this->uri->segment(1) != "kelola-umkm"){echo 'collapse';}?>" id="collapseUmkm">
                        <li>
                            <a href="<?=site_url('kelola-umkm')?>" class="<?php if($this->uri->segment(1) == "kelola-umkm" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Lihat Data</a>
                        </li>
                        <li>
                            <a href="<?=site_url('kelola-umkm/add')?>" class="<?php if($this->uri->segment(1) == "kelola-umkm" && $this->uri->segment(2) == "add"){echo 'bg-secondary';}?>">Tambah Data</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "kelola-jasa"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseJasa">
                        <i class="fa fa-fw fa-handshake-o"></i>
                        <span class="nav-link-text">Data Jasa Kreatif</span>
                    </a>
                    <ul class="sidenav-second-level <?php if($this->uri->segment(1) != "kelola-jasa"){echo 'collapse';}?>" id="collapseJasa">
                        <li>
                            <a href="<?=site_url('kelola-jasa')?>" class="<?php if($this->uri->segment(1) == "kelola-jasa" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Lihat Data</a>
                        </li>
                        <li>
                            <a href="<?=site_url('kelola-jasa/add')?>" class="<?php if($this->uri->segment(1) == "kelola-jasa" && $this->uri->segment(2) == "add"){echo 'bg-secondary';}?>">Tambah Data</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "kelola-produk"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProduk">
                        <i class="fa fa-fw fa-cubes"></i>
                        <span class="nav-link-text">Data Produk</span>
                    </a>
                    <ul class="sidenav-second-level <?php if($this->uri->segment(1) != "kelola-produk"){echo 'collapse';}?>" id="collapseProduk">
                        <li>
                            <a href="<?=site_url('kelola-produk')?>" class="<?php if($this->uri->segment(1) == "" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Lihat Data</a>
                        </li>
                        <li>
                            <a href="<?=site_url('kelola-produk/add')?>" class="<?php if($this->uri->segment(1) == "kelola-produk" && $this->uri->segment(2) == "add"){echo 'bg-secondary';}?>">Tambah Data</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($this->session->userdata('id_role') == '1') { ?>
                <li class="nav-item <?php if($this->uri->segment(1) == "kelola-kategori"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseKategori">
                        <i class="fa fa-fw fa-folder-o"></i>
                        <span class="nav-link-text">Data Kategori</span>
                    </a>
                    <ul class="sidenav-second-level <?php if($this->uri->segment(1) != "kelola-kategori"){echo 'collapse';}?>" id="collapseKategori">
                        <li>
                            <a href="<?=site_url('kelola-kategori')?>" class="<?php if($this->uri->segment(1) == "kelola-kategori" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Kategori</a>
                        </li>
                        <li>
                            <a href="<?=site_url('kelola-kategori/add')?>" class="<?php if($this->uri->segment(1) == "" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Tambah Data</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "kelola-pengguna"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My listings">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePengguna">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Data Pengguna</span>
                    </a>
                    <ul class="sidenav-second-level <?php if($this->uri->segment(1) != "kelola-pengguna"){echo 'collapse';}?>" id="collapsePengguna">
                        <li>
                            <a href="<?=site_url('kelola-pengguna')?>" class="<?php if($this->uri->segment(1) == "" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Lihat Data</a>
                        </li>
                        <li>
                            <a href="<?=site_url('kelola-pengguna/add')?>" class="<?php if($this->uri->segment(1) == "" && $this->uri->segment(2) == ""){echo 'bg-secondary';}?>">Tambah Data</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-item <?php if($this->uri->segment(1) == "rating"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="Reviews">
                    <a class="nav-link" href="<?=site_url('rating')?>">
                        <i class="fa fa-fw fa-star"></i>
                        <span class="nav-link-text">Rating</span>
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "wishlist-saya"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="Wishlist">
                    <a class="nav-link" href="<?=site_url('wishlist-saya')?>">
                        <i class="fa fa-fw fa-heart"></i>
                        <span class="nav-link-text">Wishlist</span>
                    </a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1) == "profil"){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link" href="<?=site_url('profil')?>">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Profil Saya</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('id_role') == '2') { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                    <a class="nav-link" href="http://wa.me/6281311293294?text=Halo,%20Poodies!%20Saya%20ingin%20pasang%20iklan%20disini." target="_blank">
                        <i class="fa fa-fw fa-whatsapp"></i>
                        <span class="nav-link-text">Pasang Iklan</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('/')?>"><i class="fa fa-fw fa-home"></i>Halaman Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>

            </ul>
        </div>
    </nav>