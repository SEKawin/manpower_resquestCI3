<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <!-- font-awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <!-- Data Table -->
    <link href="<?php echo base_url('assets/datatable/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/animate/animate.css') ?>" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/TSH.png">

    <title>Manpower Requestion Form</title>
    <style>
    body {
        font-family: 'Sarabun', sans-serif;
    }
    footer {
            /*position: fixed;*/
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
</head>
<?php
$code = $this->session->userdata('code');
$role = $this->session->userdata('role');
$name_role = $this->session->userdata('name_role');
$code = $this->session->userdata('code');
?>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark rounded sticky-top"
        style="background-color: #D2691E;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars_headers_part"
                aria-controls="navbars_headers_part" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="<?php echo base_url(); ?>assets/TSH.png" width="40" height="35" class="d-inline-block align-top">
            <a class="navbar-brand" href="<?php echo site_url('manpower_form'); ?>">Manpower Requestion Form</a>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbars_headers_part">
                <ul class="navbar-nav">
				
					<?php if($name_role === 'HRM_ADMIN' || $name_role === 'HR'): ?>
                    <li class="nav-item ">
                        <a class="nav-link text-center" href="<?php echo site_url('account'); ?>">การจัดการผู้ใช้งาน
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-center"
                            href="<?php echo site_url('manage_manp'); ?>">การจัดการเพิ่มอัตรากำลัง<br>/ทดแทนอัตรากำลังค
                        </a>
                    </li>
					<?php endif; ?>
					
                    <li class="nav-item ">
                        <!-- External training approval form -->
                        <a class="nav-link text-center"
                            href="<?php echo site_url('manpower_form'); ?>">ใบขออนุมัติอัตรากำลัง<br>/ใบขอกำลังคนในงบประมาณ</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-center" href="<?php echo site_url('login'); ?>">
                            <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                            <br><i class="fa fa-sign-in"></i> Logout</a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>