  <div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>APPPD</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<!-- <div class="profile clearfix"> -->
    <!-- <div class="profile_pic"> -->
        <!--<img src="images/img.jpg" alt="..." class="img-circle profile_img">-->
    <!-- </div> -->
    <!-- <div class="profile_info"> -->
        <!-- <span>Menu Utama</span> -->
    <!-- </div> -->
<!-- </div> -->

<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu Utama</h3>
        <?php if($this->session->userdata('level') == "user"){ ?>
        <ul class="nav side-menu">
            <li><a href="<?= base_url(); ?>user/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?= base_url(); ?>user/usulan"><i class="fa fa-tasks"></i>Usulan Proposal</a></li>
            <li><a href="<?= base_url(); ?>user/evaluasi"><i class="fa fa-table"></i>Evaluasi Proposal</a></li>
        </ul>
        <?php }else if($this->session->userdata('level') == "admin"){ ?>
        <ul class="nav side-menu">
            <li><a href="<?= base_url(); ?>admin/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?= base_url(); ?>admin/proposal/masuk"><i class="fa fa-table"></i>Proposal Masuk</a></li>
            <li><a href="<?= base_url(); ?>admin/proposal/diterima"><i class="fa fa-table"></i>Proposal Diterima</a></li>
            <li><a href="<?= base_url(); ?>admin/proposal/ditolak"><i class="fa fa-table"></i>Proposal Ditolak</a></li>
            <li><a href="<?= base_url(); ?>admin/laporan"><i class="fa fa-bar-chart-o"></i>Laporan</a></li>
        </ul>
        <?php } ?>
    </div>
</div>
<!-- /sidebar menu -->