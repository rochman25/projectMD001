<div class="right_col" role="main" style="height:100%">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Beranda Pengusul Proposal</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
              <div class="col-md-6">
                <h2>Identitas Personal</h2>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-2"></div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <!-- <center> -->
                    <img class="img-responsive avatar-view" style="width: 150px" src="<?=base_url();?>assets/foto/dosen/<?= $profile->foto ?>" alt="Avatar" title="Change the avatar">
                  <!-- </center> -->
                </div>
                <h5 style="margin-bottom: 10px"><b>NIDN/NIP/NIK</b> <?=$profile->nidn?></h5>
                <h5 style="margin-bottom: 10px"><b>Nama Lengkap: </b><?= $profile->nama ?></h5>
                <h5 style="margin-bottom: 10px"><b>Jenis Kelamin : </b>
                  <?php if($profile->jk == "L"){
                    echo "Laki - Laki";
                  }else if($profile->jk == "P"){
                    echo "Perempuan";
                  }?></h5>
                <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">
                  <i class="fa fa-edit m-right-xs"></i> Edit Profile
                </button>
              </div>
              <br />
              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal form-label" action="<?=base_url();?>user/edit" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nidn</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" disabled name="nidn" class="form-control" placeholder="Masukkan nidn anda" value="<?=$profile->nidn?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" disabled name="nama" class="form-control" placeholder="Masukkan nama lengkap anda" value="<?=$profile->nama?>"
                              required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                              <p>
                                L:
                                <input type="radio" disabled class="flat" name="jk" id="genderM" value="L" <?php if ($profile->jk == "L") {?> checked=""
                                <?php }?> required /> P:
                                <input type="radio" disabled class="flat" name="jk" id="genderF" value="P" <?php if ($profile->jk == "P") {?> checked=""
                                <?php }?> required/>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <select disabled name="prodi" class="form-control" required="required">
                              <option>Pilih Program Studi</option>
                              <option <?php if ($profile->prodi == "TI") { ?>selected
                                <?php } ?>>Teknik Informatika</option>
                              <option <?php if ($profile->prodi == "SI") {?>selected
                                <?php }?>>Sistem Informasi</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat / Tanggal Lahir</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="row">
                              <div class="col-md-4 col-sm-6 col-xs-9">
                                <input type="text" name="tempat" class="form-control" placeholder="Masukkan Tempat lahir" value="<?=$profile->tempat?>" required="required">    
                              </div>
                              <div class="col-md-4 col-sm-6 col-xs-9">
                                <input type="date" name="tgl" class="form-control" placeholder="Masukkan Tanggal Lahir" value="<?=$profile->tanggal_lahir?>" required="required">    
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">No Telp/Hp</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nohp" class="form-control" placeholder="Masukkan No Telp/Hp anda" value="<?=$profile->nohp?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" value="<?=$profile->email?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda" required="required"><?=$profile->alamat?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ubah Foto</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="file" name="foto" class="form-control" accept="image/*">
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
              <!-- start skills -->
              <!-- end of skills -->
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="x_panel">
                <div class="x_content">
                  <table class="table table-hover">
                    
                    <tbody>
                      <tr>
                        <td>
                          <b>Fakultas / Jurusan</b>
                        </td>
                        <td><?php
                            if($profile->prodi == "TI"){
                              echo "Teknik Informatika";
                            }else if($profile->prodi == "SI"){
                              echo "Sistem Informasi";
                            }
                          ?></td>
                        <td>
                          <b>Tempat / Tanggal Lahir</b>
                        </td>
                        <td><?php echo $profile->tempat . " / " . date_format(date_create($profile->tanggal_lahir), "d-M-Y"); ?></td>
                      </tr>
                      <tr>
                        <td>
                          <b>Jenjang Pendidikan</b>
                        </td>
                        <td><?= $profile->jp ?></td>
                        <td>
                          <b>Nomor Telephone</b>
                        </td>
                        <td><?= $profile->nohp ?></td>
                      </tr>
                      <tr>
                        <td>
                          <b>Jabatan Akademik</b>
                        </td>
                        <td><?= $profile->ja ?></td>
                        <td>
                          <b>Email</b>
                        </td>
                        <td><?= $profile->email ?></td>
                      </tr>
                      <tr>
                        <td>
                          <b>Alamat</b>
                        </td>
                        <td><?= $profile->alamat ?></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>