<div class="right_col" role="main" style="height: 100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Evaluasi Usulan Periode <?= $periode->nama ?></h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Proposal</h2>
                    <div class="clearfix"></div>
                </div>
                <?= $this->session->flashdata('pesan') ?>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Skema</th>
                                <th>Kelengkapan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <!-- <th>Keterangan</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                //foreach($proposal as $p){
                                    if($proposal != null){
                            ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?php echo $proposal->judul ?></td>
                                    <td><?php echo $proposal->jenis ?></td>
                                    <td><?php echo $proposal->kelengkapan?></td>
                                    <td><?php echo $proposal->keterangan?></td>
                                    <td><?php echo $proposal->stat ?></td>
                                    <td><a href="<?= base_url(); ?>user/ubah_usulan/<?= $proposal->idProposal ?>" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Modal_Delete">
                                            <i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Usulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Apakah anda yakin untuk menghapus data ini?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url(); ?>user/hapus_usulan/<?= $proposal->idProposal ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
        </div>
    </div>