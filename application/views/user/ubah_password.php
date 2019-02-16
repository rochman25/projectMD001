<div class="right_col" role="main" style="height: 100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ubah Password</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <?= $this->session->flashdata('pesan') ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ubah Password</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="x_content">
                            <br>
                            <form id="live_form" action="<?=base_url();?>user/ubah_password" method="post" data-parsley-validate>
                                <label>Password Lama : </label>
                                <input type="password" placeholder="Masukkan passworld lama" name="old" class="form-control" required>
                                <label>Password Baru : </label>
                                <input type="password" name="new" placeholder="Masukkan password baru" class="form-control" required>
                                <br>
                                <input type="submit" class="btn btn-info" value="kirim">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>