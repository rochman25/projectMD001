<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APLIKASI PPP D</title>
        <?php $this->load->view('master/css'); ?>
        <style rel="stylesheet" type="text/css">
            .left_col {
                height : 100%;
                background: #722898;
            }
            .nav_title{
                background: #722898;
            }
            body{
                background: #722898;
            }
        </style>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <?php $this->load->view('master/sidebar'); ?>
                    </div>
                </div>
                <?php $this->load->view('master/nav'); ?>
                <?php $this->load->view($page); ?>
            </div>
        </div>
    </body>
    <?php $this->load->view('master/js'); ?>
</html>