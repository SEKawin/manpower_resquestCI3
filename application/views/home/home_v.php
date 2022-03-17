<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

      <title>Public Training Approval Online</title>
      <style>
            body {
                  font-family: 'Sarabun', sans-serif;
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
</head>
<?php
$code = $this->session->userdata('code');
$role = $this->session->userdata('role');
$name_role = $this->session->userdata('name_role');
$account_id = $this->session->userdata('account_id');
$code = $this->session->userdata('code');
?>

<body>
      <!-- nav -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success rounded sticky-top">
            <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars_headers_part" aria-controls="navbars_headers_part" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <img src="<?php echo base_url(); ?>assets/TSH.png" width="30" height="30" class="d-inline-block align-top">
                  <a class="navbar-brand" href="<?php echo site_url('home'); ?>">Public Training Approval Online</a>

                  <?php if ($name_role === 'HRD' || $account_id == 548) : ?>
                        <div class="collapse navbar-collapse justify-content-md-center" id="navbars_headers_part">
                              <ul class="navbar-nav">
                                    <li>
                                          <a class="nav-link" href="<?php echo site_url('home'); ?>">หน้าหลัก</a>
                                    </li>
                                    <li class="nav-item ">
                                          <a class="nav-link text-center" href="<?php echo site_url('account'); ?>">การจัดการ<br>ผู้ใช้งาน </a>
                                    </li>
                                    <li class="nav-item ">
                                          <!-- External training approval form -->
                                          <a class="nav-link text-center" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <li class="nav-item text-center">
                                          <!-- Sammary Public Training -->
                                          <a class="nav-link text-center" href="<?php echo site_url('Training_summary'); ?>">รายงานผลการฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <li class="nav-item text-center">
                                          <!-- Indivdual Development PLane -->
                                          <a class="nav-link" href="<?php echo site_url('IDP/IDP_list'); ?>">แผนพัฒนา<br>รายบุคลลากร</a>
                                    </li>
                                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url('budget'); ?>">งบประมาณประจำปี</a>
                    </li> -->
                                    <li class="nav-item text-center">
                                          <a class="nav-link" href="<?php echo site_url('login'); ?>">
                                                <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                                                <br><i class="fa fa-sign-in"></i> logout</a>
                                    </li>
                              </ul>
                        </div>

                  <?php elseif ($name_role === 'HRD_MANAGER' && $name_role === 'MANAGER') : ?>
                        <div class="collapse navbar-collapse justify-content-md-center" id="navbars_headers_part">
                              <ul class="navbar-nav">
                                    <li class="nav-item ">
                                          <!-- External training approval form -->
                                          <a class="nav-link text-center" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <li class="nav-item ">
                                          <!-- Sammary Public Training -->
                                          <a class="nav-link text-center" href="<?php echo site_url('Training_summary'); ?>">รายงานผลการฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <li class="nav-item ">
                                          <!-- Indivdual Development PLane -->
                                          <a class="nav-link text-center" href="<?php echo site_url('IDP/IDP_list'); ?>">แผนพัฒนา<br>รายบุคลลากร</a>
                                    </li>
                                    <li class="nav-item text-center">
                                          <a class="nav-link" href="<?php echo site_url('login'); ?>">
                                                <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                                                <br><i class="fa fa-sign-in"></i> logout</a>
                                    </li>
                              </ul>
                        </div>
                  <?php else : ?>

                        <div class="collapse navbar-collapse justify-content-md-center" id="navbars_headers_part">
                              <ul class="navbar-nav">
                                    <li class="nav-item ">
                                          <!-- External training approval form -->
                                          <a class="nav-link text-center" href="<?php echo site_url('training'); ?>">รายการขออนุมัติฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <li class="nav-item text-center">
                                          <!-- Sammary Public Training -->
                                          <a class="nav-link text-center" href="<?php echo site_url('Training_summary'); ?>">รายงานผลการฝึก<br>อบรมภายนอก</a>
                                    </li>
                                    <!-- Indivdual Development PLane -->
                                    <a class="nav-link text-center" href="<?php echo site_url('IDP/IDP_list'); ?>">แผนพัฒนา<br>รายบุคลลากร</a>
                                    </li>
                                    <li class="nav-item text-center">
                                          <a class="nav-link" href="<?php echo site_url('login'); ?>">
                                                <?php echo $this->session->userdata('firstname_th') . ' ' . $this->session->userdata('lastname_th'); ?>
                                                <br><i class="fa fa-sign-in"></i> logout</a>
                                    </li>
                              </ul>
                        </div>
                  <?php endif; ?>
            </div>
      </nav>
      <!-- nav -->

      <!-- main -->
      <div class="container" id="home">
            <div class="jumbotron " style="background-color: #F8F8FF">

                  <!-- External training approval form -->
                  <div class="row">
                        <div class="col-md-4">
                              <div class="card mb-4 shadow-sm">
                                    <a href="<?php echo site_url('training'); ?>"><img src="<?php echo base_url(); ?>assets/PB.jpg" class="card-img-top" height="250" alt="แบบฟอร์มขออนุมัติฝึกอบรมภายนอก"></a>
                                    <div class="card-body">
                                          <p class="card-text text-center">แบบฟอร์มขออนุมัติฝึกอบรมภายนอก</p>
                                    </div>
                              </div>
                        </div>
                        <!-- Sammary Public Training -->
                        <div class="col-md-4">
                              <div class="card mb-4 shadow-sm">
                                    <a href="<?php echo site_url('Training_summary'); ?>"><img src="<?php echo base_url(); ?>assets/PB_SUM.jpg" class="card-img-top" height="250" alt="แบบฟอร์มรายงานผลการฝึกอบรมภายนอก"></a>
                                    <div class="card-body">
                                          <p class="card-text text-center">แบบฟอร์มรายงานผลการฝึกอบรมภายนอก</p>
                                    </div>
                              </div>
                        </div>
                        <!-- Indivdual Development PLane -->
                        <div class="col-md-4">
                              <div class="card mb-4 shadow-sm">
                                    <a href="<?php echo site_url('IDP/IDP_list'); ?>"><img src="<?php echo base_url(); ?>assets/IDP.png" class="card-img-top" height="250" alt="แผนพัฒนาบุคลากร"></a>
                                    <div class="card-body">
                                          <p class="card-text text-center">แผนพัฒนาบุคลากร(IDP)</p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <!-- main -->

            <!-- footer -->
            <!-- <div class="footer" style="font-size: 12px;"> -->
            <footer class="footer bg-success rounded" style="font-size: 12px;">
                  <div class="container-fluid">
                        <div class="row">
                              <div class="col-1 text-white">
                              </div>
                              <div class="col text-white">
                                    <h5>Company</h5>
                                    <p>THAISUMMIT HARNESS PUBLIC COMPANY LIMITED.</p>
                                    <p class="rights"><span>©</span><span class="copyright-year">2018</span><span> </span><span>THAISUMMIT
                                                HARNESS PUBLIC COMPANY LIMITED</span><span>. </span></p>
                              </div>

                              <div class="col text-white">
                                    <h5>Address:</h5>
                                    <p>Thai Summit Harness Public Company Limited 202 moo 3 Laemchabang Industrial Estate,
                                          Sriracha,
                                          Chonburi 20230, Thailand.</p>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCenter_Map">
                                          Google Map
                                    </button>
                              </div>

                              <div class="col text-white ">
                                    <h5>Email:</h5>
                                    <p><a href="mailto:#" class="text-white">wanwalit_k@thaisummit-harness.co.th</a>
                                          <br> Phone : <a href="tel:#" class="text-white"> 1110</a></p>
                                    <p><a href="mailto:#" class="text-white">siriwan_i@thaisummit-harness.co.th</a>
                                          <br> Phone : <a href="tel:#" class="text-white"> 1164</a></p>
                              </div>
                        </div>
                  </div>
            </footer>
            <!-- </div> -->

            <!-- Modal GoogleMap -->
            <div class="modal fade" id="ModalCenter_Map" tabindex="-1" role="dialog" aria-labelledby="ModalCenter_MapTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="ModalCenter_MapTitle">Google Map</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                    </button>
                              </div>
                              <div class="modal-body">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.073001355753!2d100.89862398631713!3d13.094559892648915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e28c9da3d1151c!2sThai+Summit+Harness+Public+Company+Ltd.!5e0!3m2!1sen!2sth!4v1547014376049" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div>
                              <div class=" modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                  </div>
            </div>

            <script type="text/javascript">
                  $(document).ready(function() {
                        bsCustomFileInput.init()
                  })
            </script>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js') ?>"></script>
            <!-- <script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script> -->
            <script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

            <script src=" <?php echo base_url('assets/datatable/js/jquery.dataTables.js') ?>"></script>
            <!-- <script src=" <?php echo base_url('assets/datatable/js/jquery.dataTables.min.js') ?>"></script> -->
            <script src=" <?php echo base_url('assets/datatable/js/dataTables.bootstrap4.min.js') ?>"></script>


            <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</html>
</body>

</html>