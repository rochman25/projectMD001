<div class="right_col" role="main" style="height:100%">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Identitas</h3>
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
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                </div>
              </div>
              <p>Nama :
                <?=$profile->nama?>
              </p>
              <p>Nidn :
                <?=$profile->nidn?>
              </p>
              <p>Alamat :
                <?=$profile->alamat?>
              </p>
              <p>Email :
                <?=$profile->email?>
              </p>
              <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">
                <i class="fa fa-edit m-right-xs"></i>Edit Profile</button>
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
                      <form class="form-horizontal form-label" action="<?= base_url(); ?>user/editprofile" method="POST">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nidn</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nidn" class="form-control" placeholder="Masukkan nidn anda" value="<?= $profile->nidn ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="uname" class="form-control" placeholder="Masukkan username anda" value="<?= $profile->username ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap anda" value="<?= $profile->nama ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <select name="prodi" class="form-control" required="required">
                              <option>Pilih Program Studi</option>
                              <option <?php if($profile->prodi == "Teknik Informatika"){ ?>selected<?php } ?>>Teknik Informatika</option>
                              <option <?php if($profile->prodi == "Sistem Informasi"){ ?>selected<?php } ?>>Sistem Informasi</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" value="<?= $profile->email ?>" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                          <div class="col-md-6 col-sm-9 col-xs-12">
                            <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda" required="required"><?= $profile->alamat ?></textarea>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>