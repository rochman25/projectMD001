<div class="navbar nav_title purple" style="border: 0;">
    <a href="#" class="site_title"><img src="<?= base_url(); ?>assets/img/amikom_logo.png" width="50px"><span> LPPM</span></a>
</div>

<div class="clearfix"></div>

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu Utama</h3>
        <?php if ($this->session->userdata('level') == "user") {?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url();?>user/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?=base_url();?>user/usulan"><i class="fa fa-tasks"></i>Usulan Proposal</a></li>
            <li><a href="<?=base_url();?>user/evaluasi"><i class="fa fa-table"></i>Evaluasi Proposal</a></li>
            <li><a href="<?=base_url();?>user/riwayat"><i class="fa fa-history"></i>Riwayat Proposal</a></li>
            <li><a href="<?=base_url();?>user/password"><i class="fa fa-key"></i>Ubah Password</a></li>
        </ul>
        <?php } else if ($this->session->userdata('level') == "OP") {?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url();?>admin/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?=base_url();?>admin/periode"><i class="fa fa-history"></i>Data Periode</a></li>
            <li><a href="<?=base_url();?>admin/dosen"><i class="fa fa-user"></i>Data Dosen</a></li>
            <li><a href="<?=base_url();?>admin/peninjau"><i class="fa fa-user"></i>Data Peninjau</a></li>
            <li><a href="<?=base_url();?>admin/operator/usulan/masuk"><i class="fa fa-tasks"></i>Usulan Masuk</a></li>
            <li><a href="<?=base_url();?>admin/operator/usulan/keluar"><i class="fa fa-tasks"></i>Usulan Keluar</a></li>
            <li><a href="<?=base_url();?>admin/password"><i class="fa fa-key"></i>Ubah Password</a></li>
            <!-- <li><a href="<?=base_url();?>admin/laporan"><i class="fa fa-bar-chart-o"></i>Laporan</a></li> -->
        </ul>
        <?php } else if ($this->session->userdata('level') == "AD") {?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url();?>admin/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?=base_url();?>admin/usulan/masuk"><i class="fa fa-tasks"></i>Usulan Masuk</a></li>
            <li><a href="<?=base_url();?>admin/usulan/keluar"><i class="fa fa-tasks"></i>Usulan Keluar</a></li>
            <li><a href="<?=base_url();?>admin/operator"><i class="fa fa-user"></i>Data Operator</a></li>
            <li><a href="<?=base_url();?>user/password"><i class="fa fa-key"></i>Ubah Password</a></li>
        </ul>
        <?php } else if ($this->session->userdata('level') == "PE") {?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url();?>admin/index"><i class="fa fa-home"></i>Beranda</a></li>
            <li><a href="<?=base_url();?>admin/peninjau/usulan"><i class="fa fa-tasks"></i>Usulan Masuk</a></li>
            <li><a href="<?=base_url();?>admin/peninjau/riwayat"><i class="fa fa-history"></i>Riwayat Reviewer</a></li>
            <li><a href="<?=base_url();?>admin/password"><i class="fa fa-key"></i>Ubah Password</a></li>
        </ul>
        <?php } ?>
    </div>
</div>
<!-- /sidebar menu -->