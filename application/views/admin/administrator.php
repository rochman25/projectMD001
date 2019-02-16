<div class="right_col" role="main" <?php if(count($admin) <= 4){ ?>style="height: 100%"<?php } ?>>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <br>
                <h3>Data Administrator</h3>
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
                        <!-- <h2>Administrator</h2> -->
                        <div class="clearfix"></div>
                        <?= $this->session->flashdata('pesan') ?>
                        <a class="btn btn-info" data-toggle="modal" data-target="#modalTambah">
                            <i class="fa fa-plus"></i> Tambah Administrator</a>
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
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach($admin as $p){
                                    if($p['programstudi'] == "TI"){
                                        $prodi = "Teknik Informatika";
                                    }else{
                                        $prodi = "Sistem Informasi";
                                    }    
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++ ?>
                                    </th>
                                    <td>
                                        <?= $p['nidn'] ?>
                                    </td>
                                    <td>
                                        <?= $p['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $prodi ?>
                                    </td>
                                    <td>
                                        <?= $p['email'] ?>
                                    </td>
                                    <td>
                                        <?= $p['level'] ?>
                                    </td>
                                    <td width="200px">
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEdit<?= $p['nidn'] ?>">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url(); ?>admin/administrator/hapus/<?= $p['id'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach($admin as $p) { ?>
<div class="modal fade bs-example-modal-lg" id="modalEdit<?= $p['nidn'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <input type="hidden" name="nidn" value="<?= $p['nidn']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Dosen" value="<?= $p['nama'] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="prodi" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih Status : </option>
                                <option value="active" <?php if($p[ 'programstudi']=="TI" ) { ?> selected
                                    <?php } ?>>Teknik Informatika</option>
                                <option value="deactive" <?php if($p[ 'programstudi']=="SI" ) { ?> selected
                                    <?php } ?>>Sistem Informasi</option>
                            </select>
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
<?php } ?>
<div class="modal fade bs-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Tambah Administrator</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label" action="<?=base_url();?>admin/administrator/tambah" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIDN</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="nidn" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih NIDN Dosen : </option>
                                <?php foreach($dosen as $p){ ?>
                                <option value="<?= $p['nidn'] ?>">
                                    <?= $p['nidn'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="level" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih Jabatan : </option>
                                <option value="Ketua">Ketua</option>
                                <option value="Operator">Operator</option>
                                <option value="Peninjau">Peninjau</option>
                                <option value="Admin">Admin</option>
                            </select>
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