<body>
    <div id="flash" data-flash="<?=$this->session->flashdata('success')?>"></div>
    <div id="flash-error" data-flash="<?=$this->session->flashdata('error')?>"></div>
    <header class="header_in clearfix">
        <div class="container">
            <div id="logo">
                <a href="<?=site_url('')?>">
                    <img src="<?=base_url('')?>assets/img/logo/logo.png" width="100%" height="40px" alt="Logo" class="logo_sticky">
                </a>
            </div>
            <div class="layer"></div>
            <a href="javascript:void(0)" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a href="javascript:void(0)" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="<?=site_url('')?>">
                        <img src="<?=base_url('')?>assets/img/logo/logo-white.png" width="30%" height="30%" alt="Logo">
                    </a>
                </div>
                <ul>
                    <li><a href="<?=site_url('')?>">Beranda</a></li>
                    <li><a href="<?=site_url('umkm')?>">UMKM</a></li>
                    <li><a href="<?=site_url('jasa')?>">Jasa</a></li>
                    <li><a href="<?=site_url('search')?>">Cari</a></li>
                    <?php if ($this->session->userdata('id_role') != null) { ?>
                    <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                    <li><a href="<?=site_url('logout')?>" id="btn-logout">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="<?=site_url('login')?>">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>