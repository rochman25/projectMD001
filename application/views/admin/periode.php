<div class="right_col" role="main" <?php if(count($periode) <= 4){ ?>style="height: 100%"<?php } ?>>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <br>
                <h3>Data Periode</h3>
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
                        <!-- <h2>Periode</h2> -->
                        <div class="clearfix"></div>
                        <?= $this->session->flashdata('pesan') ?>
                        <a class="btn btn-info" data-toggle="modal" data-target="#modalTambah">
                            <i class="fa fa-plus"></i> Tambah Periode</a>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach($periode as $p){ ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++ ?>
                                    </th>
                                    <td>
                                        <?= $p['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $p['status'] ?>
                                    </td>
                                    <td width="200px">
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEdit<?= $p['id'] ?>">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        <a href="#" data-toggle="modal" data-target="#Modal_Delete<?= $p['id'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="Modal_Delete<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Periode</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Apakah anda yakin untuk menghapus data ini?</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="<?= base_url(); ?>admin/periode/hapus/<?= $p['id'] ?>" class="btn btn-primary">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach($periode as $p) { ?>
<div class="modal fade bs-example-modal-lg" id="modalEdit<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Periode</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label" action="<?=base_url();?>admin/periode/edit" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $p['id']?>">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periode</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="periode" class="form-control" placeholder="Masukkan Periode" value="<?= $p['nama'] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih Status : </option>
                                <option value="active" <?php if($p[ 'status']=="active" ) { ?> selected
                                    <?php } ?>>Aktif</option>
                                <option value="deactive" <?php if($p[ 'status']=="deactive" ) { ?> selected
                                    <?php } ?>>Tidak Aktif</option>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Periode</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label" action="<?=base_url();?>admin/periode/tambah" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periode</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="periode" class="form-control" placeholder="Masukkan Periode" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Pilih Status : </option>
                                <option value="active">Aktif</option>
                                <option value="deactive">Tidak Aktif</option>
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