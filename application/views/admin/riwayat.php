<div class="right_col" role="main" style="height: 100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title ?></h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Proposal</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Skema</th>
                                <th>Periode</th>
                                <th>Kelengkapan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <!-- <th>Keterangan</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($proposal as $p){
                            ?>
                                <tr>
                                    <td><?= $i++ . "."?></td>
                                    <td><?= $p['judul'] ?></td>
                                    <td><?= $p['jenis'] ?></td>
                                    <td><?= $p['nama'] ?></td>
                                    <td><?= $p['kelengkapan']?></td>
                                    <td><?= $p['keterangan']?></td>
                                    <td><?= $p['status'] ?></td>
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