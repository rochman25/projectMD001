<div class="right_col" role="main" <?php if (count($dosen) <=4 ) {?>style="height: 100%"
    <?php }?>>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <br>
                <h3>Data Dosen</h3>
            </div>
            <div class="title_right">
                <br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>Dosen</h2> -->
                        <div class="clearfix"></div>
                        <?=$this->session->flashdata('pesan')?>
                            <a class="btn btn-info" data-toggle="modal" data-target="#modalTambah">
                                <i class="fa fa-plus"></i> Tambah Dosen</a>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIDN</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($dosen as $p) {
                                    if ($p['prodi'] == "TI") {
                                        $prodi = "Teknik Informatika";
                                    } else {
                                        $prodi = "Sistem Informasi";
                                    }
                                    ?>
                                <tr>
                                    <th scope="row">
                                        <?=$i++?>
                                    </th>
                                    <td>
                                        <?=$p['nidn']?>
                                    </td>
                                    <td>
                                        <?=$p['nama']?>
                                    </td>
                                    <td>
                                        <?=$prodi?>
                                    </td>
                                    <td>
                                        <?=$p['email']?>
                                    </td>
                                    <td width="200px">
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEdit<?=$p['nidn']?>">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        <a href="#" data-toggle="modal" data-target="#Modal_Delete<?= $p['nidn'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="Modal_Delete<?= $p['nidn'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Dosen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Apakah anda yakin untuk menghapus data ini?</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="<?=base_url();?>admin/dosen/hapus/<?=$p['nidn']?>" class="btn btn-primary">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($dosen as $p) {?>
<div class="modal fade bs-example-modal-lg" id="modalEdit<?=$p['nidn']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Dosen</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label" action="<?=base_url();?>admin/editPeriode" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIDN</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" disabled value="<?=$p['nidn']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="nidn" value="<?=$p['nidn']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Dosen" value="<?=$p['nama']?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <p>
                                    L:
                                    <input type="radio" class="flat" name="jk" id="genderM" value="L" <?php if ($p[ 'jk']=="L" ) {?> checked=""
                                    <?php }?> required /> P:
                                    <input type="radio" class="flat" name="jk" id="genderF" value="P" <?php if ($p[ 'jk']=="P" ) {?> checked=""
                                    <?php }?> required/>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fakultas / Jurusan</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="prodi" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih Fakultas / Jurusan : </option>
                                <option value="active" <?php if ($p[ 'prodi']=="TI" ) {?> selected
                                    <?php }?>>Teknik Informatika</option>
                                <option value="deactive" <?php if ($p[ 'prodi']=="SI" ) {?> selected
                                    <?php }?>>Sistem Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Akademik</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="ja" class="form-control" value="<?= $p['ja'] ?>" placeholder="Masukkan jabatan akademik" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenjang Pendidikan</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="jp" class="form-control" value="<?= $p['jp'] ?>" placeholder="Masukkan jenjang pendidikan" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="modal fade bs-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Tambah Dosen</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label" action="<?=base_url();?>admin/dosen/tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nidn</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nidn" class="form-control" placeholder="Masukkan nidn" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap dengan gelar" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <p>
                                    L:
                                    <input type="radio" class="flat" name="jk" id="genderM" value="L" required /> P:
                                    <input type="radio" class="flat" name="jk" id="genderF" value="P" required/>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fakultas / Jurusan</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="prodi" class="form-control" required="required">
                                <option>Pilih Fakultas / Jurusan</option>
                                <option value="TI">Teknik Informatika</option>
                                <option value="SI">Sistem Informasi</option>
                                <option value="IT">Teknologi Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Akademik</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="ja" class="form-control" placeholder="Masukkan jabatan akademik" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenjang Pendidikan</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="jp" class="form-control" placeholder="Masukkan jenjang pendidikan" required="required">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat / Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-9">
                                    <input type="text" name="tempat" class="form-control" placeholder="Masukkan Tempat lahir">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-9">
                                    <input type="date" name="tgl" class="form-control" placeholder="Masukkan Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Telp/Hp</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nohp" class="form-control" placeholder="Masukkan No Telp/Hp anda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email anda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ubah Foto</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>