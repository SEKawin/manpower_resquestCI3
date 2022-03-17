<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- font-awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/TSH.png">
    <title>Public Training Online</title>

</head>

<body style="font-family: 'Sarabun', sans-serif" ;>

    <nav class="navbar sticky-top navbar-dark bg-success ">
        <a class="navbar-brand" href="<?php echo site_url('login'); ?>">
            <img src="<?php echo base_url(); ?>assets/TSH.png" width="30" height="30" class="d-inline-block align-top">
            Public Training Online
        </a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">เข้าสู่ระบบ <br>Public Training Online</h4>
                        <div class="text-danger"> <?php echo $this->session->flashdata('msg'); ?></div>

                        <form class="form-signin" action="<?php echo site_url('login/process_auth_login'); ?>"
                            method="post">
                            <div class="form-label-group">
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Username" required autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required>
                                <label for="Password">Password</label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="Check1">
                                <label class="form-check-label" for="Check1">Remember password</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                                <i class="fa fa-sign-in"></i> Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('layouts/footer');?>
    <!-- footer -->