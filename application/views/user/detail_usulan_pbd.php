<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengisian usulan Proposal</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Usulan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <p>
                                <h4>
                                    <b>Data Pengusul</b>
                                </h4>
                            </p>
                            <ul>
                                <li>
                                    <p>Nama :
                                        <?=$profile->nama?>
                                    </p>
                                </li>
                                <li>
                                    <p>Nidn :
                                        <?=$profile->nidn?>
                                    </p>
                                </li>
                                <li>
                                    <p>Alamat :
                                        <?=$profile->alamat?>
                                    </p>
                                </li>
                                <li>
                                    <p>Email :
                                        <?=$profile->email?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="x_content">
                        <div role="tabpanel" class="panel" id="tab_content1" aria-labelledby="home-tab">
                            <p>
                                <h4>
                                    <b>Data Usulan</b>
                                </h4>
                            </p>
                            <form id="live_form" action="<?=base_url();?>user/tambahUsulanPbd" method="post" enctype="multipart/form-data">
                                <!-- <label>Jenis Usulan: </label>
                                <div class="radio">
                                    <p>
                                        Penelitian:
                                        <input type="radio" class="flat" name="ju" id="genderM" value="PNL" required /> Pengabdian:
                                        <input type="radio" class="flat" name="ju" id="genderF" value="PBD" required/>
                                    </p>
                                </div>
                                <label>Sumber Pendanaan : </label>
                                <div class="radio">
                                    <p>
                                        Internal:
                                        <input type="radio" class="flat" name="sp" id="genderM" value="IN" required /> Eksternal:
                                        <input type="radio" class="flat" name="sp" id="genderF" value="EKS" required/>
                                    </p>
                                </div>
                                <label>Jenis Pendanaan : </label>
                                <div class="radio">
                                    <p>
                                        PKL:
                                        <input type="radio" class="flat" name="jp" id="genderM" value="PKL" required /> PKLN:
                                        <input type="radio" class="flat" name="jp" id="genderF" value="PKLN" required/>
                                    </p>
                                </div> -->
                                <input type="hidden" name="ju" value="<?= $this->uri->segment(3)?>">
                                <label>Judul : </label>
                                <input type="text" name="judul" class="form-control" required>
                                <label>Analisa Situasi: </label>
                                <input type="text" name="analisa" class="form-control" required>
                                <label>Permasalahan Khalayak Sasaran :</label>
                                <textarea class="form-control" rows="10" name="permasalahan" required></textarea>
                                <label>Solusi yang ditawarkan</label>
                                <textarea class="form-control" rows="10" name="solusi" required></textarea>
                                <!-- <input type="text" name="keywords" class="form-control" required> -->
                                <label>Target Luaran : </label>
                                <textarea name="luaran" rows="8" class="form-control" required></textarea>
                                <label>Upload RAB(Rencana Anggaran Biaya) "Excel" max 5MB : </label>
                                <input type="file" class="form-control" id="rab" name="rab" accept="application/Excel" required>
                                <label>Jadwal Kegiatan "PNG" : </label>
                                <input type="file" name="jadwal" id="jadwal" class="form-control" accept="image/png" required>
                                <label>Upload Berkas Pendukung(OPTIONAL) "ZIP" max 5MB : </label>
                                <input type="file" id="berkas" class="form-control" accept="application/ZIP" name="berkas">
                                <label>Upload Usulan "PDF" max 5MB : </label>
                                <input type="file" class="form-control" id="usulan" name="usulan" required>
                                <br/>
                                <a class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Kirim</a>
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Submit Proposal</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>apakah data sudah terisi dengan benar?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Belum</button>
                                                <input type="submit" class="btn btn-primary" value="Sudah">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>