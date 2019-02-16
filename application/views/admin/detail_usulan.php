<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Usulan Masuk
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Usulan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-xs-3">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-left">
                                    <li class="active">
                                        <a href="#home" data-toggle="tab">Data Usulan</a>
                                    </li>
                                    <li>
                                        <a href="#profile" data-toggle="tab">Berkas</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-9">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <b>Judul : </b>
                                        <p>
                                            <?= $usulan->judul ?>
                                        </p>
                                        <b>Tema Riset: </b>
                                        <p>
                                            <?= $usulan->tema ?>
                                        </p>
                                        <b>Abstrak : </b>
                                        <p>
                                            <?= $usulan->abstrak ?>
                                        </p>
                                        <b>Keywords : </b>
                                        <p>
                                            <?= $usulan->keyword ?>
                                        </p>
                                        <b>Latar Belakang : </b>
                                        <p>
                                            <?= $usulan->latbel ?>
                                        </p>
                                        <b>Tujuan Penelitian / Urgensi Penelitian:</b>
                                        <p>
                                            <?= $usulan->tujuan ?>
                                        </p>
                                        <b>Manfaat dan Inovasi yang ditargetkan :</b>
                                        <p>
                                            <?= $usulan->manfaat ?>
                                        </p>
                                        <b>Tinjauan Pustaka : </b>
                                        <p>
                                            <?= $usulan->tinjauan_pustaka ?>
                                        </p>
                                        <b>Biaya : </b>
                                        <p>
                                            <?= "Rp." . $usulan->biaya ?>
                                        </p>
                                        <b>Anggota : </b>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIDN/NIM</th>
                                                    <th>Nama Lengkap</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $i = 1;
                                                    foreach($anggota as $a){ ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $a['idAnggota'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $a['nama'] ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="profile">
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
                                                    <td>
                                                        <a href="<?= base_url(); ?>assets/proposal/<?= $usulan->usulan ?>" target="_blank" class="btn btn-info">
                                                            <i class="fa fa-download"></i> Usulan</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>assets/rab/<?= $usulan->rab ?>" class="btn btn-info">
                                                            <i class="fa fa-download"></i> Rab</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>assets/jadwal/<?= $usulan->jadwal ?>" target="_blank" class="btn btn-info">
                                                            <i class="fa fa-download"></i> Jadwal</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>assets/metopel/<?= $usulan->metopel ?>" target="_blank" class="btn btn-info">
                                                            <i class="fa fa-download"></i> Metode</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>assets/pendukung/<?= $usulan->pendukung ?>" class="btn btn-info">
                                                            <i class="fa fa-download"></i> Pendukung</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <b>Masukkan kelengkapan </b>
                                        <br>
                                        <!-- <form id="live_form" action="<?=base_url();?>admin/operator/kirim_usulan" method="post"> -->
                                        <input type="hidden" id="idProposal" value="<?= $usulan->id ?>" >
                                        <label>Kelengkapan : </label>
                                        <select name="tema" id="heard" class="form-control" required>
                                            <option value="">Status Kelengkapan</option>
                                            <option value="Lengkap">Lengkap</option>
                                            <option value="Kurang Lengkap">Kurang Lengkap</option>
                                        </select>
                                        <label>Keterangan : </label>
                                        <textarea class="form-control" rows="10" name="keterangan" required></textarea>
                                        <br>
                                        <!-- <div class="form-group hidden" id="div_sub_mhs" style="margin-left:30px; float: left;"> -->
                                        <button type="button" class="btn btn-danger" style="float: left;" id="kirimDosen" name="subAng">Kirim ke Pengusul</button>
                                        <button type="button" class="btn btn-success" style="float: right;" id="kirimDosen" name="subAng">Kirim ke Ketua</button>
                                        
                                        <!-- </div> -->
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 