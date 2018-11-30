<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengisian usulan Proposal</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-12 col-xs-12 profile_left">
                            <p>1. Data Pengusul</p>
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
                            <p>2. Data Usulan</p>
                            <form id="demo-form" data-parsley-validate>
                                <label for="fullname">Biaya usulan :</label>
                                <input type="text" class="form-control" name="biaya" required />
                                <label for="email">Judul :</label>
                                <input type="text" class="form-control" name="judul" data-parsley-trigger="change" required />
                                <label>Abstrak :</label>
                                <textarea class="form-control" name="abstrak" required></textarea>
                                <label>Keywords</label>
                                <input type="text" name="keywords" class="form-control" required>

                                <label for="heard">Bidang ilmu :</label>
                                <select id="heard" class="form-control" required>
                                    <option value="">Pilih Bidang Ilmu</option>
                                    <option value="press">Pemrograman Mobile</option>
                                    <option value="net">Pemrograman Web</option>
                                    <option value="mouth">Pemrograman Desktop</option>
                                </select>
                                <label for="message">Upload :</label>
                                <input type="file">
                                <br/>
                                <a class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Kirim</a>
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Alert</h4>
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
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>