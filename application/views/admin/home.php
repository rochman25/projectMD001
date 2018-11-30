<div class="right_col" role="main" style="height:100%">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Identitas</h3>
            </div>
            <div class="title_right">
                
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
                            <p>Username :
                                <?=$profile->username?>
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
                                            <form class="form-horizontal form-label" action="<?=base_url();?>user/editprofile" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Id</label>
                                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                                        <input type="text" disabled="disabled" name="id" class="form-control" placeholder="Masukkan id anda" value="<?=$profile->id?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                                        <input type="text" name="uname" class="form-control" placeholder="Masukkan username anda" value="<?=$profile->username?>"
                                                            required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                                        <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" value="<?=$profile->email?>" required="required">
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
                                <!-- start skills -->
                                <!-- end of skills -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>