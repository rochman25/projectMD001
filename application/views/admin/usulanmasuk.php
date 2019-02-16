<div class="right_col" role="main" style="height: 100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Usulan Masuk Periode <?= $periode->nama ?></h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Proposal</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-bordered">
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
                                foreach($proposal as $p){
                            ?>
                                <tr>
                                    <td><?= $i++?></td>
                                    <td><?= $p['judul'] ?></td>
                                    <td><?= $p['jenis'] ?></td>
                                    <td><?= $p['kelengkapan']?></td>
                                    <td><?= $p['keterangan']?></td>
                                    <td><?= $p['stat'] ?></td>
                                    <td><a href="<?= base_url(); ?>admin/operator/detail_usulan/<?= $p['idProposal'] ?>" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i> Lihat Detail</a>
                                        <!-- <a href="<?= base_url(); ?>admin/administrator/hapus/<?= $p['id'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus</a> -->
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