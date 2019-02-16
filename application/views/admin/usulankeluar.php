<div class="right_col" role="main" style="height: 100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Usulan Keluar Periode <?= $periode->nama ?></h3>
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
                                    <td><?= $i?></td>
                                    <td><?= $p['judul'] ?></td>
                                    <td><?= $p['jenis'] ?></td>
                                    <td><?= $p['kelengkapan']?></td>
                                    <td><?= $p['keterangan']?></td>
                                    <td><?= $p['status'] ?></td>
                                    <td><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEdit<?= $p['nidn'] ?>">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url(); ?>admin/administrator/hapus/<?= $p['id'] ?>" class="btn btn-sm btn-danger">
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