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
                            <form id="live_form" action="<?=base_url();?>user/tambahusulan" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="ju" id="ju" value="<?=$this->uri->segment(3)?>">
                                <label>Judul : </label>
                                <input type="text" name="judul" class="form-control" required>
                                <label>Tema Riset: </label>
                                <select name="tema" id="heard" class="form-control" required>
                                    <option value="">Pilih Tema Riset</option>
                                    <option value="Pengembangan Infrastruktur TIK">Pengembangan Infrastruktur TIK</option>
                                    <option value="Pengembangan sistem/platform berbasis Open Source">Pengembangan sistem/platform berbasis Open Source</option>
                                    <option value="Teknologi untuk Peningkatan konten TIK">Teknologi untuk Peningkatan konten TIK</option>
                                    <option value="Teknologi piranti TIK dan pendukung TIK">Teknologi piranti TIK dan pendukung TIK</option>
                                    <option value="Pengembangan sistem berbasis Kecerdasan buatan">Pengembangan sistem berbasis Kecerdasan buatan</option>
                                </select>
                                <label>Abstrak :</label>
                                <textarea class="form-control" rows="10" name="abstrak" required></textarea>
                                <label>Keywords</label>
                                <input id="tags_1" type="text" name="keywords" class="tags form-control" value="" />
                                <div id="suggestions-container" style="position: relative;  width: 250px; margin: 10px;"></div>
                                <!-- <input type="text" name="keywords" class="form-control" required> -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <p>
                                            <h4>
                                                <b>Pendahuluan</b>
                                            </h4>
                                        </p>
                                    </div>
                                    <div class="x_content">
                                        <label>Latar Belakang :</label>
                                        <textarea class="form-control" rows="8" name="latbel" required></textarea>
                                        <label>Tujuan Penelitian / Urgensi Penelitian:</label>
                                        <textarea class="form-control" rows="8" name="tujuan" required></textarea>
                                        <label>Manfaat dan Inovasi yang ditargetkan :</label>
                                        <textarea class="form-control" rows="8" name="manfaat" required></textarea>
                                        <label>Tinjauan Pustaka</label>
                                        <textarea class="form-control" rows="8" name="tinjauan" required></textarea>
                                    </div>
                                </div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <p>
                                            <h4>
                                                <b>Anggota</b>
                                            </h4>
                                        </p>
                                    </div>
                                    <div class="x_content">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="radio">
                                                        <label class="radio">
                                                            <input name="anggota1" type="radio" value="Dosen1" /> Dosen
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="radio">
                                                        <label class="radio">
                                                            <input name="anggota1" type="radio" value="Mahasiswa1" /> Non Dosen
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" style="margin-left:30px">
                                            <label class="control-label" for="feedback_bad">
                                                NIDN :
                                            </label>
                                            <select class="form-control" name="nidn" id="nidn">
                                                <option>Pilih NIDN Dosen</option>
                                                <?php if ($dosen != null) { foreach ($dosen as $d) {?>
                                                <option>
                                                    <?=$d['nidn']?>
                                                </option>
                                                <?php } } else { echo "<option></option>"; }?>
                                            </select>
                                            <label class="control-label" for="feedback_bad">
                                                Nama :
                                            </label>
                                            <input type="text" disabled class="form-control" name="namaDosen" id="namaDosen">

                                        </div>
                                        <div class="form-group hidden" id="div_sub" style="margin-left:30px; float: left;">
                                            <button type="button" class="btn btn-info" id="tambah_anggota_dosen" name="subAng">Tambah Anggota</button>
                                        </div>
                                        <div class="form-group hidden" style="margin-left:30px" id="div_anggota1">
                                            <div>
                                                <label class="control-label " for="testimonial">
                                                    NIP / NIK / NIM
                                                </label>
                                                <div>
                                                    <input type="text" class="form-control" name="nim" id="nim">
                                                </div>
                                                <label class="control-label " for="testimonial">
                                                    Nama
                                                </label>
                                                <div>
                                                    <input type="text" class="form-control" name="namamhs" id="namamhs">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="div_sub_mhs" style="margin-left:30px; float: left;">
                                            <button type="button" class="btn btn-info" id="tambah_anggota_mahasiswa" name="subAng">Tambah Anggota</button>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIDN/NIM</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show_data">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <label>Biaya Usulan : </label>
                                <input type="number" name="biaya" class="form-control" required>
                                <label>Luaran yang diharapkan : </label>
                                <textarea name="luaran" rows="8" class="form-control" required></textarea>
                                <label>Upload RAB(Rencana Anggaran Biaya) "Excel" max 5MB : </label>
                                <input type="file" class="form-control" id="rab" name="rab" accept="application/Excel" required>
                                <label>Metode Penelitian "PNG" : </label>
                                <input type="file" name="metopel" class="form-control" id="metopel" accept="image/png" required>
                                <label>Jadwal Penelitian "PNG" : </label>
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
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Apakah anda yakin untuk menghapus data ini?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>