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

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.css') ?>">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo base_url('assets/TSH.png') ?>">
    <title>Public Training Online</title>

</head>
<?php 
$role = $this->session->userdata('role');
$name_role = $this->session->userdata('name_role');
$account_id = $this->session->userdata('account_id');
$code = $this->session->userdata('code');
?>

<body style="font-family: 'Sarabun', sans-serif" ;>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success rounded">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
                aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="<?php echo base_url(); ?>assets/TSH.png" width="30" height="30" class="d-inline-block align-top">
            <a class="navbar-brand" href="<?php echo site_url('training'); ?>">Public Training Online</a>

            <?php if ($name_role === 'HRD'): ?>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <!-- External training approval form -->
                        <a class="nav-link" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึกอบรมภายนอก</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('account'); ?>">การจัดการผู้ใช้งาน </a>
                    </li>
                    <li class="nav-item ">
                        <!-- Indivdual Development PLane -->
                        <a class="nav-link" href="<?php echo site_url('IDP'); ?>">แผนพัฒนารายบุคคล</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('budget'); ?>">งบประมาณประจำปี</a>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('login'); ?>">
                            <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                            <i class="fa fa-sign-in"></i> ออกจากระบบ</a>
                    </li>
                </ul>
            </div>

            <?php elseif ($name_role === 'HRD_MANAGER' && $name_role === 'MANAGER'): ?>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <!-- External training approval form -->
                        <a class="nav-link" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึกอบรมภายนอก</a>
                    </li>
                    <li class="nav-item ">
                        <!-- Indivdual Development PLane -->
                        <a class="nav-link" href="<?php echo site_url('IDP'); ?>">แผนพัฒนารายบุคคล</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('login'); ?>">
                            <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                            <i class="fa fa-sign-in"></i> ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
            <?php else: ?>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <!-- External training approval form -->
                        <a class="nav-link" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึกอบรมภายนอก</a>
                    </li>

                    <!-- Indivdual Development PLane -->
                    <a class="nav-link" href="<?php echo site_url('IDP'); ?>">แผนพัฒนารายบุคคล</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('login'); ?>">
                            <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                            <i class="fa fa-sign-in"></i> ออกจากระบบ</a>
                    </li>
                </ul>
            </div>

            <?php endif;?>

        </div>
    </nav>  