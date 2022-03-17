<!-- header -->
<?php $this->load->view('layouts/header');

$name_role = $this->session->userdata('name_role');
$account_code = $this->session->userdata('code');
$email = $this->session->userdata('email');
$table = '<thead>
<tr>
    <th>No. MRF.</th>
    <th>ผู้ขอ</th>
    <th>ตำแหน่งที่ขอ</th>
    <th>วันที่ต้องการ</th>
    <th>Cost Center แผนก/ส่วน/ฝ่าย</th>
    <th>ผลสถานะของแบบฟอร์ม </th>
    <th>หมายเหตุ</th>
    <th>เมนู</th>
</tr>
</thead>';
?>

<div class="jumbotron text-center">
    <div class="container-fluid">
        <h1>ใบขออนุมัติอัตรากำลัง / ใบขอกำลังคนในงบประมาณ</h1>
        <div class="d-flex justify-content-around">
            <a href="<?php echo base_url('/uploads/Manual Manpower Request.pptx'); ?>" download="คู่มือการใช้งานระบบ Manpower Request Online" class=" btn btn-link btn-sm" role="button"> <i class="fa fa-file-pdf-o" aria-hidden="true">
                    คู่มือการใช้งานระบบ Manpower Request Online</i></a>
        </div>
        <div class="jumbotron " style="background-color: LightSteelBlue">
            <!-- พนักงานกรอกแบบฟอร์มขอคน -->
            <div class="accordion text-left" id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                รายการผู้ขออนุมัติอัตรากำลัง / ใบขอกำลังคนในงบประมาณ<strong><u>ของฉัน</u></strong>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <a class="text-light btn btn-sm btn-primary" onclick="form_manpower(<?php echo $account_code ?>)" role="button">
                                <i class="fa fa-pencil-square"></i> แบบฟอร์มขออนุมัติอัตรากำลัง /
                                ใบขอกำลังคนในงบประมาณ</a>
                            <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_emp">Reload</button>
                            <div class="table-responsive">
                                <table id="tbl_manp_form" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No. MRF.</th>
                                            <th>ประเภทความต้องการ</th>
                                            <th>ตำแหน่งที่ขอ</th>
                                            <th>วันที่ต้องการ</th>
                                            <th>Cost Center แผนก/ส่วน/ฝ่าย</th>
                                            <th>ผลสถานะของแบบฟอร์ม </th>
                                            <th>หมายเหตุ</th>
                                            <th>เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light text-left">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- พนักงานกรอกแบบฟอร์มขอคน -->

            <!-- สำหรับหน่วยงานที่ขอ  -->
            <?php foreach ($role as $rows) :
                $name_role = $rows->name_role;
                if ($name_role === 'DEPT_MGR') : ?>
                    <div class="accordion text-left" id="accordion_2">
                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับหน่วยงานที่ขอในฐานะผู้จัดการฝ่าย</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_mgr" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion_2">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_dept">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_req_mgr" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role === 'AGM') : ?>
                    <div class="accordion text-left" id="accordion_3">
                        <div class="card">
                            <div class="card-header" id="heading3">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับหน่วยงานที่ขอ
                                                ในฐานะผู้ช่วยผู้จัดการทั่วไป</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_agm" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion_3">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_agm">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_req_agm" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role === 'GM') : ?>
                    <div class="accordion text-left" id="accordion_4">
                        <div class="card">
                            <div class="card-header" id="heading4">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับหน่วยงานที่ขอในฐานะผู้จัดการทั่วไป</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_gm" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion_4">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_gm">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_req_gm" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- สำหรับหน่วยงานที่ขอ  -->

                    <!-- HR -->
                <?php elseif ($name_role === 'HR') : ?>
                    <div class="accordion text-left" id="accordion_5">
                        <div class="card">
                            <div class="card-header" id="heading5">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับเจ้าหน้าที่ฝ่าย HR </u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_hr" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion_5">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_hr">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_hr" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role == 'HRM_MGR') : ?>
                    <!-- สำหรับสำนักพัฒนาองค์กร  -->
                    <div class="accordion text-left" id="accordion_6">
                        <div class="card">
                            <div class="card-header" id="heading6">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับสำนักพัฒนาองค์กรในฐานะผู้จัดการฝ่าย</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_hrm_mgr" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion_6">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_hrm_mgr">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_hrm_mgr" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role == 'HRM_AGM') : ?>
                    <div class="accordion text-left" id="accordion_7">
                        <div class="card">
                            <div class="card-header" id="heading7">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับสำนักพัฒนาองค์กร
                                                ในฐานะผู้ช่วยผู้จัดการทั่วไป</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_hrm_agm" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion_7">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_hrm_agm">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_hrm_agm" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role == 'HRM_GM') : ?>
                    <div class="accordion text-left" id="accordion_8">
                        <div class="card">
                            <div class="card-header" id="heading8">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                        รายการที่คุณต้องอนุมัติ<strong><u>สำหรับสำนักพัฒนาองค์กร
                                                ในฐานะผู้จัดการทั่วไป</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_od" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion_8">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_hrm_gm">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_hrm_gm" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($name_role == 'EVP') : ?>
                    <div class="accordion text-left" id="accordion_9">
                        <div class="card">
                            <div class="card-header" id="heading9">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                        รายการที่คุณต้องอนุมัติ<strong><u>การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการบริหาร</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_evp" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse8" class="collapse" aria-labelledby="heading9" data-parent="#accordion_9">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_evp">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_evp" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($name_role == 'SVP') : ?>
                    <div class="accordion text-left" id="accordion_10">
                        <div class="card">
                            <div class="card-header" id="heading10">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                        รายการที่คุณต้องอนุมัติ<strong><u>การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการอาวุโส</u></strong>
                                        <h5 class="badge badge-warning">รออนุมัติ&nbsp;
                                            <span class="badge badge-light" id="notify_svp" style="font-size:14px;"></span>
                                            &nbsp;รายการ
                                        </h5>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse8" class="collapse" aria-labelledby="heading10" data-parent="#accordion_10">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_svp">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_svp" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <?php echo $table; ?>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                endif;
            endforeach; ?>
            <!-- สำหรับสำนักพัฒนาองค์กร  -->

            <?php foreach ($role as $rows) :
                $name_role = $rows->name_role;
                if ($name_role === 'HRM_ADMIN') : ?>
                    <div class="accordion text-left" id="accordion_all">
                        <div class="card">
                            <div class="card-header" id="heading_all">
                                <h2 class="mb-0">
                                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse_all" aria-expanded="true" aria-controls="collapse_all">
                                        แบบฟอร์มผู้ขออัตรากำลัง/กำลังคนในงประมาณทั้งหมด</strong>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_all" class="collapse" aria-labelledby="heading_all" data-parent="#accordion_all">
                                <div class="card-body" style="background-color: LightGray">
                                    <button class="text-light btn btn-sm btn-primary" type="button" id="btn_reload_hr_all">Reload</button>
                                    <div class="table-responsive">
                                        <table id="tbl_hr_all" class="table table-striped table-bordered table-hover table-success text-center" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No. MRF.</th>
                                                    <th>ผู้ขอ</th>
                                                    <th>ประเภทความต้องการ</th>
                                                    <th>ตำแหน่งที่ขอ</th>
                                                    <th>วันที่ต้องการ</th>
                                                    <th>Cost Center แผนก/ส่วน/ฝ่าย</th>
                                                    <th>ผลสถานะของแบบฟอร์ม </th>
                                                    <th>หมายเหตุ</th>
                                                    <th>เมนู</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-light text-left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endif;
            endforeach; ?>
        </div>
    </div>
</div>

<?php $this->load->view('manpower_form/model_manpower_form'); ?>
<?php $this->load->view('manpower_form/modal_manp_form_hrm'); ?>
<?php $this->load->view('manpower_form/model_manp_form_edit'); ?>
<?php $this->load->view('manpower_form/model_manpower_form_view'); ?>
<?php $this->load->view('manpower_form/modal_manp_form_vp'); ?>
<?php $this->load->view('manpower_form/ajax_data_tbl'); ?>
<?php $this->load->view('manpower_form/script_notify'); ?>
<?php $this->load->view('layouts/footer');
