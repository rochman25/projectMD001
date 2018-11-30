<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=base_url();?>assets/img/img.jpg" alt="">
                        <?=$this->session->userdata('username')?>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <?php if ($this->session->userdata('level') == "user") {?>
                                <a href="<?= base_url();?>user/logout">
                            <?php }else if($this->session->userdata('level') == "admin"){?>
                                <a href="<?= base_url();?>admin/logout">
                            <?php } ?>
                                <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->