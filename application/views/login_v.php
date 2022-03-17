<!DOCTYPE>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font-awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/TSH.png">
    <title>Manpower Request Online</title>
    <style>
    body {
        font-family: 'Sarabun', 'sans-serif';
        /* background-image: url('<?php echo base_url(); ?>assets/TSH_wallpaper.jpg'); */
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-dark justify-content-center" style="background-color: #D2691E;">
            <a class="navbar-brand" href="<?php echo site_url('login'); ?>">
                <img src="<?php echo base_url(); ?>assets/TSH.png" width="40" height="35"
                    class="d-inline-block align-top">
                Manpower Requistion Form
            </a>
        </nav>
        <div class="row justify-content-between">
            <div class="col-sm-9 col-md-5 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">เข้าสู่ระบบ</h4>
                        <div class="text-danger"> <?php echo $this->session->flashdata('msg'); ?></div>
                        <form class="form-signin" action="<?php echo site_url('login/process_auth_login'); ?>"
                            method="post">
                            <div class="form-label-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="รหัสพนักงาน 6 หลัก" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <label for="Password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="รหัสผ่านเลข 4 หลักท้ายของบัตรประชาชน" required>
                            </div>
                            <div class="form-group form-check mb-3">
                                <!-- <input type="checkbox" class="form-check-input" id="Check1">
                                <label class="form-check-label" for="Check1">Remember password</label> -->
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                                <i class="fa fa-sign-in"></i> เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
    .hovergallery img {
        -webkit-transform: scale(0.8);
        /*Webkit: Scale down image to 0.8x original size*/
        -moz-transform: scale(0.8);
        /*Mozilla scale version*/
        -o-transform: scale(0.8);
        /*Opera scale version*/
        -webkit-transition-duration: 0.5s;
        /*Webkit: Animation duration*/
        -moz-transition-duration: 0.5s;
        /*Mozilla duration version*/
        -o-transition-duration: 0.5s;
        /*Opera duration version*/
        opacity: 0.7;
        /*initial opacity of images*/
        margin: 0 50px 5px 0;
        /*margin between images*/
    }

    .hovergallery img:hover {
        -webkit-transform: scale(1.1);
        /*Webkit: Scale up image to 1.2x original size*/
        -moz-transform: scale(1.1);
        /*Mozilla scale version*/
        -o-transform: scale(1.1);
        /*Opera scale version*/
        box-shadow: 0px 0px 50px gray;
        /*CSS3 shadow: 30px blurred shadow all around image*/
        -webkit-box-shadow: 0px 0px 50px gray;
        /*Safari shadow version*/
        -moz-box-shadow: 0px 0px 50px gray;
        /*Mozilla shadow version*/
        opacity: 1;
    }
    footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>


    <!-- footer -->
    <?php $this->load->view('layouts/footer');?>
    <!-- footer -->