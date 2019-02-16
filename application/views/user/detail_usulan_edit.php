<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit usulan Proposal</h3>
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
                    <div class="x_content">
                        <div role="tabpanel" class="panel" id="tab_content1" aria-labelledby="home-tab">
                            <p>
                                <h4>
                                    <b>Data Usulan</b>
                                </h4>
                            </p>
                            <form id="live_form" action="<?=base_url();?>user/edit_usulan" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="idProposal" value="<?= $usulan->id ?>">
                                <label>Judul : </label>
                                <input type="text" name="judul" value="<?= $usulan->judul ?>" class="form-control" required>
                                <label>Tema Riset: </label>
                                <select name="tema" id="tema" class="form-control" required>
                                    <option value="">
                                        Pilih Tema Usulan
                                    </option>
                                    <option value="Pengembangan Infrastruktur TIK">Pengembangan Infrastruktur TIK</option>
                                    <option value="Pengembangan sistem/platform berbasis Open Source">Pengembangan sistem/platform berbasis Open Source</option>
                                    <option value="Teknologi untuk Peningkatan konten TIK">Teknologi untuk Peningkatan konten TIK</option>
                                    <option value="Teknologi piranti TIK dan pendukung TIK">Teknologi piranti TIK dan pendukung TIK</option>
                                    <option value="Pengembangan sistem berbasis Kecerdasan buatan">Pengembangan sistem berbasis Kecerdasan buatan</option>
                                </select>
                                <label>Abstrak :</label>
                                <textarea class="form-control" rows="10" name="abstrak" required><?= $usulan->abstrak ?></textarea>
                                <label>Keywords</label>
                                <input id="tags_1" type="text" value="<?= $usulan->keyword?>" name="keywords" class="tags form-control" value="" />
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
                                        <textarea class="form-control" rows="8" name="latbel" required><?= $usulan->latbel?></textarea>
                                        <label>Tujuan Penelitian / Urgensi Penelitian:</label>
                                        <textarea class="form-control" rows="8" name="tujuan" required><?= $usulan->tujuan?></textarea>
                                        <label>Manfaat dan Inovasi yang ditargetkan :</label>
                                        <textarea class="form-control" rows="8" name="manfaat" required><?= $usulan->manfaat?></textarea>
                                        <label>Tinjauan Pustaka</label>
                                        <textarea class="form-control" rows="8" name="tinjauan" required><?= $usulan->tinjauan_pustaka?></textarea>
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
                                            <select class="form-control" name="nidnAng1" id="nidn">
                                                <option>Pilih NIDN Dosen</option>
                                                <?php if ($dosen != null) {
                                                                foreach ($dosen as $d) {?>
                                                <option>
                                                    <?=$d['nidn']?>
                                                </option>
                                                <?php } 
                                                            }else{
                                                                echo "<option></option>";
                                                            } ?>
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
                                                    <input type="text" class="form-control" id="nim1" name="nim1">
                                                </div>
                                                <label class="control-label " for="testimonial">
                                                    Nama
                                                </label>
                                                <div>
                                                    <input type="text" class="form-control" id="namaAng" name="namaAng1">
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
                                                </tr>
                                            </thead>
                                            <tbody id="show_data">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <label>Biaya Usulan : </label>
                                <input type="number" name="biaya" value="<?= $usulan->biaya?>" class="form-control" required>
                                <label>Luaran yang diharapkan : </label>
                                <textarea name="luaran" rows="8" class="form-control" required><?= $usulan->luaran ?></textarea>
                                <br>
                                <label>Usulan, Rab, Jadwal , Metode dan Pendukung : </label>
                                <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Usulan</th>
                                                <th>Rab</th>
                                                <th>Jadwal Penelitian</th>
                                                <th>Metode Penelitian</th>
                                                <th>Pendukung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?= base_url(); ?>assets/proposal/<?= $usulan->usulan ?>" target="_blank" class="btn btn-info"> <i class="fa fa-download"></i> Usulan</a></td>
                                                <td><a href="<?= base_url(); ?>assets/rab/<?= $usulan->rab ?>" class="btn btn-info"><i class="fa fa-download"></i> Rab</a></td>
                                                <td><a href="<?= base_url(); ?>assets/jadwal/<?= $usulan->jadwal ?>" target="_blank" class="btn btn-info"> <i class="fa fa-download"></i> Jadwal</a></td>
                                                <td><a href="<?= base_url(); ?>assets/metopel/<?= $usulan->metopel ?>" target="_blank" class="btn btn-info"> <i class="fa fa-download"></i> Metode</a></td>
                                                <td><a href="<?= base_url(); ?>assets/pendukung/<?= $usulan->pendukung ?>" class="btn btn-info"> <i class="fa fa-download"></i> Pendukung</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <label>atau</label>
                                <br>
                                <label>Upload ulang RAB(Rencana Anggaran Biaya) "Excel" max 5MB : </label>
                                <input type="file" class="form-control" id="rab" name="rab" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                <label>Upload ulang Metode Penelitian "PNG" : </label>
                                <input type="file" name="metopel" class="form-control" id="metopel" accept="image/png">
                                <label>Upload ulang Jadwal Penelitian "PNG" : </label>
                                <input type="file" name="jadwal" id="jadwal" class="form-control" accept="image/png">
                                <label>Upload ulang Berkas Pendukung(OPTIONAL) "ZIP" max 5MB : </label>
                                <input type="file" id="berkas" class="form-control" accept="application/ZIP" name="berkas">
                                <label>Upload ulang Usulan "PDF" max 5MB : </label>
                                <input type="file" class="form-control" id="usulan" name="usulan">
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