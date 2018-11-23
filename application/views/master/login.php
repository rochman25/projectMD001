<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <?php $this->load->view('master/css') ?>
    </head>
    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <?= $this->session->flashdata('pesan') ?>
                        <form action="<?= base_url(); ?><?= $login ?>/login" method="post">
                            <h1>Login Form</h1>
                            <div>
                                <input type="text" class="form-control" name="uname" placeholder="Username" required="" /><?= form_error('uname') ?>
                            </div>
                            <div>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required="" /><?= form_error('pass') ?>
                            </div>
                            <div>
                                <input type="submit" class="col-lg-12 btn btn-md btn-info" value="Login">
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div>
                                    <p>©2018 All Rights Reserved.</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
<?php $this->load->view('master/js') ?>