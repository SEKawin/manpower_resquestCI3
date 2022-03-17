<!-- header -->
<?php $this->load->view('layouts/header');

$role = $this->session->userdata('role');
$name_role = $this->session->userdata('name_role');
$account_id = $this->session->userdata('account_id');
$code = $this->session->userdata('code');
?>
<!-- header -->

<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>รายการขออนุมัติฝึกอบรมภายนอก</h1>
        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
            <div class="accordion" id="accordion">

                <!-- EMPLOYEE -->
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                รายการผู้ขอฝึกอบรมภายนอกของฉัน
                            </button>

                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <a class="text-light btn btn-primary" onclick="training_form()" role="button">
                                <i class="fa fa-pencil-square"></i> แบบฟอร์มขออนุมัติฝึกอบรมภายนอก</a>
                            <div class="table-responsive">
                                <table class="table table-success text-left">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">หลักสูตรที่ขออนุมัติ</th>
                                            <th scope="col">ฝึกอบรมวันที่</th>
                                            <th scope="col">สถานที่ฝึกอบรม</th>
                                            <th scope="col">สถานะอนุมัติ</th>
                                            <th scope="col">หมายเหตุ</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php foreach ($course_emp as $rows): ?>
                                        <tr>
                                            <td>
                                                <?php if ($rows->course_file): ?>
                                                <a href="<?php echo base_url('/uploads/training_course/' . $rows->course_file); ?>"
                                                    class="btn btn-danger btn-sm " tabindex="-1" role="button">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-danger btn-sm disabled" tabindex="-1"
                                                    role="button" aria-disabled="true">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php endif;?>
                                                <?php echo $rows->course_name ?>
                                            </td>
                                            <td><?php echo $rows->date ?></td>
                                            <td><?php echo $rows->place_of_course ?></td>
                                            <td><?php $status = $rows->status;?>
                                                <?php if ($status == 0) {?>
                                                <span style="font-size: 15px;"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php } elseif ($status == 1) {?>
                                                <span class="text-success">อนุมัติ</span>
                                                <?php } else {?>
                                                <span class="text-danger">ไม่อนุมัติ</span>
                                                <?php }?>
                                            </td>
                                            <td><?php echo $rows->remark ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                    title="check_training_course"
                                                    onclick="chk_training_course('<?php echo $rows->acc_tra_id; ?>')">
                                                    ตรวจสอบสถานะ
                                                </a>
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                    title="views training"
                                                    onclick="view_training('<?php echo $rows->training_form_id; ?>')">ดูข้อมูล
                                                </a>
                                                <a class="btn btn-sm btn-danger" href="javascript:void(0)"
                                                    title="Cancel Training"
                                                    onclick="cancel_training('<?php echo $rows->training_form_id; ?>')"><i
                                                        class="fa fa-trash-o"></i></i> ยกเลิก</a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EMPLOYEE -->

                <?php foreach ($get_acc as $rows): ?>
                <?php $name_role = $rows->name_role;?>

                <?php if ($name_role == 'MANAGER'): ?>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้จัดการต้นสังกัด -->
                <div class="card">
                    <div class="card-header" id="headinheadingTwogOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                รายการที่คุณต้องอนุมัติในฐานะผู้จัดการต้นสังกัด
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headheadingTwoingOne"
                        data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <div class="table-responsive">
                                <table class="table table-success text-left">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">ชื่อ นามสกุล</th>
                                            <th scope="col">หลักสูตรที่ขออนุมัติ</th>
                                            <th scope="col">ฝึกอบรมวันที่</th>
                                            <th scope="col">สถานที่ฝึกอบรม</th>
                                            <th scope="col">สถานะอนุมัติ</th>
                                            <th scope="col">หมายเหตุ</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php foreach ($course_mgr as $rows): ?>
                                        <tr>
                                            <td><?php echo $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->course_file): ?>
                                                <a href="<?php echo base_url('/uploads/training_course/' . $rows->course_file); ?>"
                                                    class="btn btn-danger btn-sm " tabindex="-1" role="button">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-danger btn-sm disabled" tabindex="-1"
                                                    role="button" aria-disabled="true">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php endif;?>
                                                <?php echo $rows->course_name ?></td>
                                            <td><?php echo $rows->date ?></td>
                                            <td><?php echo $rows->place_of_course ?></td>

                                            <td><?php $status_appr = $rows->status_appr;?>
                                                <?php $level = $rows->level;?>
                                                <?php if ($level == 1): ?>
                                                <?php if ($status_appr == 0): ?>
                                                <span style="font-size: 15px"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php elseif ($status_appr == 1): ?>
                                                <span style="font-size: 15px"
                                                    class=" badge badge-success">อนุมัติ</span>
                                                <?php else: ?>
                                                <span style="font-size: 15px" class=" badge
                                                        badge-danger">ไม่อนุมัติ</span>
                                                <?php endif;?>
                                                <?php endif;?>
                                            </td>
                                            <td><?php echo $rows->remark ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                    title="views training"
                                                    onclick="view_training('<?php echo $rows->training_form_id; ?>')">ดูข้อมูล
                                                </a>
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                    title="check_training_course"
                                                    onclick="chk_training_course('<?php echo $rows->acc_tra_id; ?>')">
                                                    ตรวจสอบสถานะ
                                                </a>

                                                <a class="btn btn-sm btn-secondary" href="javascript:void(0)"
                                                    title="Approval Training Form"
                                                    onclick="approval_training('<?php echo $rows->training_form_id; ?>')">
                                                    ทำการอนุมัติ </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้จัดการต้นสังกัด -->

                <?php elseif ($name_role == 'HRD'): ?>
                <!-- รายการที่คุณต้องอนุมัติในฐานะฝ่าย HRD -->
                <div class="card">
                    <div class="card-header" id="heading3">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                รายการที่คุณต้องอนุมัติในฐานะฝ่าย HRD
                            </button>

                        </h2>
                    </div>

                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <div class="table-responsive">
                                <table class="table table-success text-left">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">ชื่อ นามสกุล</th>
                                            <th scope="col">หลักสูตรที่ขออนุมัติ</th>
                                            <th scope="col">ฝึกอบรมวันที่</th>
                                            <th scope="col">สถานที่ฝึกอบรม</th>
                                            <th scope="col">สถานะอนุมัติ</th>
                                            <th scope="col">หมายเหตุ</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php foreach ($course_hrd as $rows): ?>
                                        <tr>
                                            <td><?php echo $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->course_file): ?>
                                                <a href="<?php echo base_url('/uploads/training_course/' . $rows->course_file); ?>"
                                                    class="btn btn-danger btn-sm " tabindex="-1" role="button">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-danger btn-sm disabled" tabindex="-1"
                                                    role="button" aria-disabled="true">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php endif;?>
                                                <?php echo $rows->course_name ?></td>
                                            <td><?php echo $rows->date ?></td>
                                            <td><?php echo $rows->place_of_course ?></td>

                                            <td>
                                                <?php $status_appr = $rows->status_appr;?>
                                                <?php $level = $rows->level;?>
                                                <?php if ($level == 2): ?>
                                                <?php if ($status_appr == 0): ?>
                                                หัวหน้าแผนก <span style="font-size: 15px"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php elseif ($status_appr == 1): ?>
                                                หัวหน้าแผนก <span style="font-size: 15px"
                                                    class=" badge badge-success">อนุมัติ</span>
                                                <?php else: ?>
                                                หัวหน้าแผนก <span style="font-size: 15px" class=" badge
                                                        badge-danger">ไม่อนุมัติ</span>
                                                <?php endif;?>
                                                <?php endif;?>

                                                <?php if ($level == 3): ?>
                                                <?php if ($status_appr == 0): ?>
                                                หัวหน้าส่วน<span style="font-size: 15px"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php elseif ($status_appr == 1): ?>
                                                หัวหน้าส่วน<span style="font-size: 15px"
                                                    class=" badge badge-success">อนุมัติ</span>
                                                <?php else: ?>
                                                หัวหน้าส่วน<span style="font-size: 15px" class=" badge
                                                        badge-danger">ไม่อนุมัติ</span>
                                                <?php endif;?>
                                                <?php endif;?>
                                            </td>

                                            <td><?php echo $rows->remark ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                    title="views training"
                                                    onclick="view_training('<?php echo $rows->training_form_id; ?>')">ดูข้อมูล
                                                </a>
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                    title="check_training_course"
                                                    onclick="chk_training_course('<?php echo $rows->acc_tra_id; ?>')">
                                                    ตรวจสอบสถานะ
                                                </a>

                                                <a class="btn btn-sm btn-secondary" href="javascript:void(0)"
                                                    title="Approval Training Form"
                                                    onclick="approval_training('<?php echo $rows->training_form_id; ?>')">ทำการอนุมัติ
                                                </a>

                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- รายการที่คุณต้องอนุมัติในฐานะฝ่าย HRD-->

                <?php elseif ($name_role == 'HRD_MANAGER'): ?>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้จัดการฝ่าย HRD -->
                <div class="card">
                    <div class="card-header" id="heading4">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                รายการที่คุณต้องอนุมัติในฐานะผู้จัดการฝ่าย HRD
                            </button>

                        </h2>
                    </div>

                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <div class="table-responsive">
                                <table class="table table-success text-left">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">ชื่อ นามสกุล</th>
                                            <th scope="col">หลักสูตรที่ขออนุมัติ</th>
                                            <th scope="col">ฝึกอบรมวันที่</th>
                                            <th scope="col">สถานที่ฝึกอบรม</th>
                                            <th scope="col">สถานะอนุมัติ</th>
                                            <th scope="col">หมายเหตุ</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php foreach ($course_hrd_mgr as $rows): ?>
                                        <tr>
                                            <td><?php echo $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->course_file): ?>
                                                <a href="<?php echo base_url('/uploads/training_course/' . $rows->course_file); ?>"
                                                    class="btn btn-danger btn-sm " tabindex="-1" role="button">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-danger btn-sm disabled" tabindex="-1"
                                                    role="button" aria-disabled="true">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php endif;?>
                                                <?php echo $rows->course_name ?></td>
                                            <td><?php echo $rows->date ?></td>
                                            <td><?php echo $rows->place_of_course ?></td>
                                            <td><?php $status_appr = $rows->status_appr;?>
                                                <?php $level = $rows->level;?>
                                                <?php if ($level == 4): ?>
                                                <?php if ($status_appr == 0): ?>
                                                ผู้จัดการฝ่าย HRD <span style="font-size: 15px"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php elseif ($status_appr == 1): ?>
                                                ผู้จัดการฝ่าย HRD <span style="font-size: 15px"
                                                    class=" badge badge-success">อนุมัติ</span>
                                                <?php else: ?>
                                                ผู้จัดการฝ่าย HRD <span style="font-size: 15px" class=" badge
                                                        badge-danger">ไม่อนุมัติ</span>
                                                <?php endif;?>
                                                <?php endif;?>
                                            </td>
                                            <td><?php echo $rows->remark ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                    title="views training"
                                                    onclick="view_training('<?php echo $rows->training_form_id; ?>')">ดูข้อมูล
                                                </a>
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                    title="check_training_course"
                                                    onclick="chk_training_course('<?php echo $rows->acc_tra_id; ?>')">
                                                    ตรวจสอบสถานะ
                                                </a>

                                                <a class="btn btn-sm btn-secondary" href="javascript:void(0)"
                                                    title="Approval Training Form"
                                                    onclick="approval_training('<?php echo $rows->training_form_id; ?>')">
                                                    ทำการอนุมัติ </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้จัดการฝ่าย HRD -->

                <?php elseif ($name_role == 'OD'): ?>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้ช้วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร -->
                <div class="card">
                    <div class="card-header" id="heading5">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                รายการที่คุณต้องอนุมัติในฐานะผู้ช้วยผู้จัดการทั่วไป /
                                ผู้จัดการทั่วไปสำนักพัฒนาองค์กร
                            </button>

                        </h2>
                    </div>

                    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                        <div class="card-body" style="background-color: LightGray">
                            <div class="table-responsive">
                                <table class="table table-success text-left">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">ชื่อ นามสกุล</th>
                                            <th scope="col">หลักสูตรที่ขออนุมัติ</th>
                                            <th scope="col">ฝึกอบรมวันที่</th>
                                            <th scope="col">สถานที่ฝึกอบรม</th>
                                            <th scope="col">สถานะอนุมัติ</th>
                                            <th scope="col">หมายเหตุ</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">
                                        <?php foreach ($course_od as $rows): ?>
                                        <tr>
                                            <td><?php echo $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->course_file): ?>
                                                <a href="<?php echo base_url('/uploads/training_course/' . $rows->course_file); ?>"
                                                    class="btn btn-danger btn-sm " tabindex="-1" role="button">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-danger btn-sm disabled" tabindex="-1"
                                                    role="button" aria-disabled="true">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                                <?php endif;?>
                                                <?php echo $rows->course_name ?></td>
                                            <td><?php echo $rows->date ?></td>
                                            <td><?php echo $rows->place_of_course ?></td>
                                            <td><?php $status_appr = $rows->status_appr;?>
                                                <?php $level = $rows->level;?>
                                                <?php if ($level == 5): ?>
                                                <?php if ($status_appr == 0): ?>
                                                ผู้ช้วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร
                                                <br><span style="font-size: 15px"
                                                    class="badge badge-secondary">รอดำเนินการ</span>
                                                <?php elseif ($status_appr == 1): ?>
                                                ผู้ช้วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร
                                                <br><span style="font-size: 15px"
                                                    class=" badge badge-success">อนุมัติ</span>
                                                <?php else: ?>
                                                ผู้ช้วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร
                                                <br><span style="font-size: 15px" class=" badge
                                                        badge-danger">ไม่อนุมัติ</span>
                                                <?php endif;?>
                                                <?php endif;?>
                                            </td>
                                            <td><?php echo $rows->remark ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                    title="views training"
                                                    onclick="view_training('<?php echo $rows->training_form_id; ?>')">ดูข้อมูล
                                                </a>
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                    title="check_training_course"
                                                    onclick="chk_training_course('<?php echo $rows->acc_tra_id; ?>')">
                                                    ตรวจสอบสถานะ
                                                </a>

                                                <a class="btn btn-sm btn-secondary" href="javascript:void(0)"
                                                    title="Approval Training Form"
                                                    onclick="approval_training('<?php echo $rows->training_form_id; ?>')">
                                                    ทำการอนุมัติ </a>

                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- รายการที่คุณต้องอนุมัติในฐานะผู้ช้วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร -->

                <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<!-- End container-fluid -->

<!--modal Add Training From -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Training Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_training" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>ด้วย นาย/นาง/นางสาว</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('salutation'); ?>" placeholder="ชื่อ"
                                    disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label>ชื่อ</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('firstname_th'); ?>" placeholder="ชื่อ"
                                    disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('lastname_th'); ?>" placeholder="นามสกุล"
                                    disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>ฝ่าย/สำนัก</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('department_title'); ?>"
                                    placeholder="ฝ่าย/สำนัก" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>รหัสพนักงาน</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('code'); ?>" placeholder="รหัสพนักงาน"
                                    disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>รหัสแผนก</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('department_code'); ?>"
                                    placeholder="รหัสแผนก" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>วันที่เริ่มงาน</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('startwork'); ?>"
                                    placeholder="วันที่เริ่มงาน" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label>อายุงาน</label><label>(ปี/เดือน)</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('workday'); ?>"
                                    placeholder="อายุงาน (ปี/เดือน)" disabled>
                            </div>

                            <div class="form-group col-md-5">
                                <label>E-mail</label>
                                <input type="text" class="form-control" id=""
                                    value="<?php echo $this->session->userdata('email'); ?>" placeholder="email"
                                    disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label>มีความประสงค์จะขออนุมัติการอบรมภายนอกเรื่อง</label>
                                <textarea class="form-control" id="course_name" name="course_name"
                                    placeholder=""></textarea>
                                <span class="help-block text-danger"></span>
                            </div>

                            <div class="form-group col-md-5">
                                <label>สถาบันที่ให้การฝึกอบรม/สัมนา</label>
                                <textarea class="form-control" id="place_of_course" name="place_of_course"
                                    placeholder=""></textarea>
                                <span class="help-block text-danger"></span>
                            </div>

                            <div class="form-group col-md-5">
                                <label>วันที่จัดอบรมหลักสูตร</label>
                                <textarea class="form-control" id="date" name="date"
                                    placeholder="ตัวอย่าง 13 เมษายน 2562"></textarea>
                                <span class="help-block text-danger"></span>
                            </div>

                            <div class="form-group col-md-5">
                                <label>หลักสูตรมีความสอดคล้องกับแผนพัฒนาบุคลากรายบุคคล (IDP) หัวข้อ</label>
                                <textarea class="form-control" id="consistent_course" name="consistent_course"
                                    placeholder=""></textarea>
                                <span class="help-block text-danger"></span>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label><strong>เอกสาร IDP </strong></label><br>
                                <?php foreach ($get_idp as $rows): ?>
                                <?php echo $idp_file = $rows->idp_file; ?>
                                <?php if (!empty($idp_file)): ?>
                                <a href="<?php echo base_url('/uploads/idp_emp/' . $idp_file); ?>"
                                    class="btn btn-warning btn-sm " tabindex="-1" role="button">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> IDP</a>
                                <label> มีเอกสารจัดทำ IDP </label> <br>
                                <?php else: ?>
                                <a href="#" class="btn btn-warning btn-sm disabled" tabindex="-1" role="button"
                                    aria-disabled="true"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    IDP</a><label> ยังไม่มีเอกสารจัดทำ IDP </label> <br>
                                <?php endif;?>
                                <?php endforeach;?>
                                <hr>
                                <label id="label-file">อัพโหลดเอกสาร</label>
                                <div class="col-md-9">
                                    <input name="course_file" type="file">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-5">
                                <label>ความคาดหวังจากการไปอบรมครั้งนี้</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="work_eff"
                                        name="work_eff">
                                    <label class="form-check-label" for="work_eff">
                                        เพิ่มประสิทธฺภาพในการทำงาน
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="reduce_cost"
                                        name="reduce_cost">
                                    <label class="form-check-label" for="reduce_cost">
                                        ต้นทุน / เวลาในการทำงานลดลง
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="reduc_error"
                                        name="reduc_error">
                                    <label class="form-check-label" for="reduc_error">
                                        ลดความผิดพลาดในการทำงาน
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="other" name="other">
                                    <label class="form-check-label" for="other">
                                        <input type="text" class="form-control" id="other_details" name="other_details"
                                            placeholder="อื่นๆ .........."></label>
                                </div>

                            </div>

                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="my-input">รายละเอียดความคาดหวัง</label>
                                    <textarea id="details_exp" name="details_exp" class="form-control"
                                        rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-5">
                                <label for="my-input">ผู้อนุมัติ
                                    (กรุณาเลือกให้ตรงหรือสอดคล้องกับสายบังคับบัญชาปัจจุบัน)</label>
                                <select name="appr_mgr" id="appr_mgr" class="form-control">
                                    <option value="">--- เลือกผู้อนุมัติ ---</option>
                                    <?php foreach ($list_mgr as $rows): ?>
                                    <?php echo '<option value="' . $rows->account_id . '"> ' . $rows->code . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th . ' ' . $rows->department_code . ' ' . $rows->department_title . '</option>'; ?>
                                    <?php endforeach;?>
                                </select>
                                <span class="help-block text-danger"></span>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="send_appr_tra()" class="btn btn-primary"><i
                        class="fa fa-floppy-o"></i>
                    ส่งคำขออนุมัติ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal ADD Training From-->

<!--modal views training form -->
<div class="modal fade" id="modal_form_training_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title_training_form">views Training Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_training" class="form-horizontal">
                    <input type="hidden" value="" name="training_form_id">
                    <div class="form-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span><strong>ชื่อ นามสกุล: </strong> <label name="salutation"></label></span>
                                <span> <label name="firstname_th"></label></span>
                                <span> <label name="lastname_th"></label></span>
                            </div><br>
                            <div class="form-group col-md-6">
                                <span><strong>ฝ่าย/สำนัก: </strong><label name="department_title"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>รหัสพนักงาน: </strong><label name="code"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>รหัสแผนก: </strong><label name="department_code"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>วันที่เริ่มงาน: </strong><label name="startwork"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>อายุงาน (ปี/เดือน):</strong> <label></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>E-mail:</strong> <label name="email"></label></span>
                            </div>
                            <div class="form-group col-md-8">
                                <span><strong>มีความประสงค์จะขออนุมัติการอบรมภายนอกเรื่อง:</strong> <label
                                        name="course_name"></label></span>
                            </div>
                            <div class="form-group col-md-8">
                                <span><strong>สถาบันที่ให้การฝึกอบรม/สัมนา: </strong><label
                                        name="place_of_course"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>วันที่จัดอบรมหลักสูตร:</strong> <label name="date"></label></span>
                            </div>
                            <div class="form-group col-md-10">
                                <span><strong> หลักสูตรมีความสอดคล้องกับแผนพัฒนาบุคลากรายบุคคล(IDP) หัวข้อ :</strong>
                                    <label name="consistent_course"></label>
                            </div>

                            <div class="form-group col-md-5">
                                <label><strong>เอกสาร IDP </strong></label><br>
                                <?php foreach ($get_idp as $rows): ?>
                                <?php echo $idp_file = $rows->idp_file; ?>
                                <?php if (!empty($idp_file)): ?>
                                <a href="<?php echo base_url('/uploads/idp_emp/' . $idp_file); ?>"
                                    class="btn btn-warning btn-sm " tabindex="-1" role="button">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> IDP</a>
                                <label> มีเอกสารจัดทำ IDP </label> <br>
                                <?php else: ?>
                                <a href="#" class="btn btn-warning btn-sm disabled" tabindex="-1" role="button"
                                    aria-disabled="true"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    IDP</a><label> ยังไม่มีเอกสารจัดทำ IDP </label> <br>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>

                            <div class="form-group col-md-5" id="preview_file">
                                <label id="label-file"><strong>เอกสารฝึกอบรมหลักสูตร </strong></label>
                                <div class="col-md-9">
                                </div>
                            </div>

                            <div class="form-group col-md-5">
                                <label><strong>ความคาดหวังจากการไปอบรมครั้งนี้</strong></label>
                                <div class="form-check">
                                    <label class="form-check-label" name="work_eff" id="work_eff"> </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label" name="reduce_cost" id="reduce_cost">
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label" name="reduce_error" id="reduc_error">
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label name="other" id="other"></label>
                                    <label id="other_details" name="other_details"></label>
                                </div>

                            </div>

                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="my-input"><strong>รายละเอียดความคาดหวัง</strong></label>
                                    <label id="details_exp" name="details_exp"></label>
                                </div>
                            </div>

                            <hr class=" w-100 ml-0 text-center">
                            <!-- ส่วนที่ 2  ความคิดเห็นของสำนักพัฒนาองค์กร-->
                            <div class="form-group col-md-6">
                                <h5> <span class="badge badge-secondary">ส่วนที่ 2 ความคิดเห็นของสำนักพัฒนาองค์กร
                                    </span>
                                </h5>

                                <label><strong> 2.1 ความคิดเห็นของฝ่าย Human Resource Development</strong></label>
                                <div class="form-group col-md-8">
                                    <span><strong>ค่าใช้จ่าย: </strong> <label name="cost"></label>
                                        <label name="price"></span>
                                </div>

                                <hr>

                                <div class="form-group col-md-6">
                                    <span><strong>ใบหักภาษี ณ ที่จ่าย: </strong> <label name="tax"></label></span>
                                </div>
                                <hr>

                                <label> 2.2 รูปแบบการติดตามผล</label>
                                <div class="form-group col-md-8">
                                    <span><strong>ระยะเวลาฝึกอบรมภายนอก: </strong> <label name="phase"></label></span>
                                </div>

                                <label><strong> หัวหน้าแผนก </strong></label>
                                <div class="input-group col-mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="appr">ผลการอนุมัติ</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_hrd_division"></label></span>
                                    </div>
                                </div>
                                <hr class=" w-100 ml-0 text-center">

                                <label><strong> หัวหน้าส่วน </strong></label>
                                <div class="input-group col-mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_hrd_section"></label></span>
                                    </div>
                                </div>
                                <div id="txtbox_hrd_section" style="display: none">
                                    <label>หมายเหตุ :</label>
                                    <input type="text" class="form-control" id="remark_hrd_section"
                                        name="remark_hrd_section" placeholder="หมายเหตุ">
                                </div>
                                <hr class=" w-100 ml-0 text-center">
                                <label><strong> 2.3 ความคิดเห็นของผู้จัดการฝ่าย Human Resource
                                        Development</strong></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_hrd_mgr"></label></span>
                                    </div>
                                </div>
                                <div id="txtbox_hrd_mgr" style="display: none">
                                    <label>หมายเหตุ :</label>
                                    <input type="text" class="form-control" id="remark_hrd_mgr" name="remark_hrd_mgr"
                                        placeholder="หมายเหตุ">
                                </div>
                                <hr class=" w-100 ml-0 text-center">

                                <label><strong> 2.4 ความคิดเห็นของผู้จัดการฝ่ายทั่วไป /
                                        ผู้จัดการทั่วไปสำนักพัฒนาองค์กร</strong></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_od_mgr"></label></span>
                                    </div>
                                </div>
                                <div id="txtbox_od_mgr" style="display: none">
                                    <label>หมายเหตุ :</label>
                                    <input type="text" class="form-control" id="remark_od_mgr" name="remark_od_mgr"
                                        placeholder="หมายเหตุ">
                                </div>
                            </div>
                            <!-- ส่วนที่ 2  ความคิดเห็นของสำนักพัฒนาองค์กร -->

                            <hr class=" w-100 ml-0 text-center">

                            <!-- ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน 10,000 บาท -->
                            <div class="form-group col-md-6">
                                <h5> <span class="badge badge-secondary"> ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน
                                        10,000 บาท</span>
                                </h5>
                                <label><strong>3.1 ความคิดเห็นของท่านรองประธานกรรมการบริหาร</strong></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_evp1"></label></span>
                                    </div>
                                </div>
                                <label><strong>3.2 ความคิดเห็นของท่านประธานกรรมการบริหาร</strong></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <spane> <label name="status_evp2"></label></span>
                                    </div>
                                </div>
                            </div>
                            <!-- ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน 10,000 บาท -->

                        </div>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal views training form-->

<!--modal check Statuts training   -->
<div class="modal fade" id="modal_form_chk" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title_chk">check status Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body form">
                <form action="#" id="form_chk" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">
                        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>ระดับผู้จัดการขึ้นไป</label>
                                    <h5 name="status_office_mgr"></h5>
                                    <p style="font-size: 13px;" name="updated_by_office"></p>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-row">
                                <label>สำนักพัฒนาองค์กร </label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>หัวหน้าแผนก</label>
                                    <h5 name="status_hrd_division"></h5>
                                    <p style="font-size: 13px;" name="updated_by_hrd_division"></p>
                                    <hr>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>หัวหน้าส่วน</label>
                                    <h5 name="status_hrd_section"></h5>
                                    <p style="font-size: 13px;" name="updated_by_hrd_section"></p>
                                    <hr>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>ผู้จัดการฝ่าย HRD</label>
                                    <h5 name="status_hrd_manager"></h5>
                                    <p style="font-size: 13px;" name="updated_by_hrd_manager"></p>
                                    <hr>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>ผู้ช่วยผู้จัดการทั่วไป / ผู้จัดการทั่วไปสำนักพัฒนาองค์กร</label>
                                    <h5 name="status_od_mgr"></h5>
                                    <p style="font-size: 13px;" name="updated_by_od"></p>
                                    <hr>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal check Statuts training-->

<!--modal appr training   -->
<div class="modal fade" id="modal_form_appr" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title_appr">check status Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">

                <form action="#" id="form_appr_tra" class="form-horizontal">
                    <input type="hidden" value="" name="training_form_id">
                    <div class="form-body">
                        <!-- ส่วนที่ 1 ผู้ขออนุมัติกรอก-->
                        <div class="form-row">
                            <h5> <span class="badge badge-secondary">ส่วนที่ 1 ผู้ขออนุมัติกรอก</span></h5>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span><strong>ชื่อ นามสกุล: </strong> <label name="salutation"></label></span>
                                <span> <label name="firstname_th"></label></span>
                                <span> <label name="lastname_th"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>ฝ่าย/สำนัก: </strong><label name="department_title"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>รหัสพนักงาน: </strong><label name="code"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>รหัสแผนก: </strong><label name="department_code"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>วันที่เริ่มงาน: </strong><label name="startwork"></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>อายุงาน (ปี/เดือน):</strong> <label></label></span>
                            </div>
                            <div class="form-group col-md-6">
                                <span><strong>E-mail:</strong> <label name="email"></label></span>
                            </div>
                            <div class="form-group col-md-8">
                                <span><strong>มีความประสงค์จะขออนุมัติการอบรมภายนอกเรื่อง:</strong> <label
                                        name="course_name"></label></span>
                            </div>
                            <div class="form-group col-md-8">
                                <span><strong>สถาบันที่ให้การฝึกอบรม/สัมนา: </strong><label
                                        name="place_of_course"></label></span>
                            </div>
                            <div class="form-group col-md-8">
                                <span><strong>วันที่จัดอบรมหลักสูตร:</strong> <label name="date"></label></span>
                            </div>
                            <div class="form-group col-md-10">
                                <span><strong> หลักสูตรมีความสอดคล้องกับแผนพัฒนาบุคลากรายบุคคล(IDP) หัวข้อ :</strong>
                                    <label name="consistent_course"></label>
                            </div>

                            <div class="form-group col-md-5">
                                <label><strong>เอกสาร IDP </strong></label><br>
                                <?php foreach ($get_idp as $rows): ?>
                                <?php echo $idp_file = $rows->idp_file; ?>
                                <?php if (!empty($idp_file)): ?>
                                <a href="<?php echo base_url('/uploads/idp_emp/' . $idp_file); ?>"
                                    class="btn btn-warning btn-sm " tabindex="-1" role="button">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> IDP</a>
                                <label> มีเอกสารจัดทำ IDP </label> <br>
                                <?php else: ?>
                                <a href="#" class="btn btn-warning btn-sm disabled" tabindex="-1" role="button"
                                    aria-disabled="true"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    IDP</a><label> ยังไม่มีเอกสารจัดทำ IDP </label> <br>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>

                            <div class="form-group col-md-5" id="preview_file">
                                <label id="label-file"><strong>เอกสารฝึกอบรมหลักสูตร </strong></label>
                                <div class="col-md-9">
                                </div>
                            </div>

                            <div class="form-group col-md-5">
                                <label><strong>ความคาดหวังจากการไปอบรมครั้งนี้</strong></label>
                                <div class="form-check">
                                    <label class="form-check-label" name="work_eff" id="work_eff"> </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label" name="reduce_cost" id="reduce_cost">
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label" name="reduce_error" id="reduc_error">
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label name="other" id="other"></label>
                                    <label id="other_details" name="other_details"></label>
                                </div>

                            </div>

                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="my-input"><strong>รายละเอียดความคาดหวัง</strong></label>
                                    <label id="details_exp" name="details_exp"></label>
                                </div>
                            </div>
                        </div>

                        <label><strong>ความคิดเห็นต้นสังกัด (ระดับผู้จัดการขึ้นไป)</strong></label>

                        <div class="form-group col-md-6">
                            <div class="input-group col-mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'MANAGER' || $name_role === 'HRD_MANAGER'): ?>
                                <select class="custom-select" name="status_mgr_office" id="status_mgr_office">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>

                                <button type="button" class="btn btn-sm btn-primary" id="btn_mgr_office"
                                    onclick="mgr_office_send()">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane><label name="status_mgr_office"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <div id="txtbox_mgr_office" style="display: none">
                                <label>หมายเหตุ :</label>
                                <input type="text" class="form-control" id="remark_mgr_office" name="remark_mgr_office"
                                    placeholder="หมายเหตุ">
                            </div>
                        </div>

                        <!-- ส่วนที่ 1  ผู้ขออนุมัติกรอก-->

                        <hr class=" w-100 ml-0 text-center">
                        <!-- ส่วนที่ 2  ความคิดเห็นของสำนักพัฒนาองค์กร-->
                        <div class="form-group col-md-6">
                            <h5> <span class="badge badge-secondary">ส่วนที่ 2 ความคิดเห็นของสำนักพัฒนาองค์กร
                                </span>
                            </h5>
                            <!-- session role -->

                            <?php if ($name_role === 'HRD'): ?>
                            <label></strong> 2.1 ความคิดเห็นของฝ่าย Human Resource Development</strong></label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cost" id="cost" value="0">
                                    <label class="form-check-label" for="charge">
                                        ไม่มีค่าใช้จ่าย (สัมมนาฟรี)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cost" id="cost" value="1">
                                    <label class="form-check-label" for="price">
                                        มีค่าใช้จ่ายเป็นจำนวนเงิน</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="จำนวนเงิน บาท">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tax" id="tax" value="0">
                                    <label class="form-check-label" for="taxed">
                                        ต้องการใบหักภาษี ณ ที่จ่าย
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tax" id="tax" value="1">
                                    <label class="form-check-label" for="Notaxed">
                                        ไม่ต้องการใบหักภาษี ณ ที่จ่าย
                                    </label>
                                </div>
                            </div>
                            <hr>

                            <label><strong> 2.2 รูปแบบการติดตามผล</strong></label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phase" id="phase" value="0">
                                    <label class="form-check-label" for="short">
                                        ระยะสั้น (หลักสูตรไม่เกิน 5 วัน หรือไม่เกิน 30 ชม.)
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phase" id="phase" value="1">
                                    <label class="form-check-label" for="long">
                                        ระยะยาว (หลักสูตร 5 วันขึ้นไป หรือมากกว่า 30 ชม.)
                                    </label>
                                </div>
                            </div>
                            <!-- session role -->

                            <!-- session No role -->
                            <?php else: ?>
                            <label><strong> 2.1 ความคิดเห็นของฝ่าย Human Resource Development</strong></label>
                            <div class="form-group col-md-8">
                                <span><strong>ค่าใช้จ่าย: </strong> <label name="cost"></label>
                                    <label name="price"></span>
                            </div>

                            <hr>

                            <div class="form-group col-md-6">
                                <span><strong>ใบหักภาษี ณ ที่จ่าย: </strong> <label name="tax"></label></span>
                            </div>
                            <hr>

                            <label> 2.2 รูปแบบการติดตามผล</label>
                            <div class="form-group col-md-8">
                                <span><strong>ระยะเวลาฝึกอบรมภายนอก: </strong> <label name="phase"></label></span>
                            </div>
                            <?php endif;?>
                            <!-- session No role -->

                            <label><strong> หัวหน้าแผนก </strong></label>
                            <div class="input-group col-mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="appr">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'HRD'): ?>
                                <select class="custom-select" id="status_hrd_division" name="status_hrd_division">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>

                                <button type="button" class="btn btn-sm btn-primary" id="btn_hrd_section"
                                    onclick="hrd_section_send('')">ยืนยัน</button>

                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_hrd_division"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <div id="txtbox_hrd_division" style="display: none">
                                <label>หมายเหตุ :</label>
                                <input type="text" class="form-control" id="remark_hrd_division"
                                    name="remark_hrd_division" placeholder="หมายเหตุ">
                            </div>
                            <hr class=" w-100 ml-0 text-center">

                            <label><strong> หัวหน้าส่วน </strong></label>
                            <div class="input-group col-mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'HRD'): ?>
                                <select class="custom-select" id="status_hrd_section" name="status_hrd_section">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_hrd_division"
                                    onclick="hrd_division_send('')">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_hrd_section"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <div id="txtbox_hrd_section" style="display: none">
                                <label>หมายเหตุ :</label>
                                <input type="text" class="form-control" id="remark_hrd_section"
                                    name="remark_hrd_section" placeholder="หมายเหตุ">
                            </div>
                            <hr class=" w-100 ml-0 text-center">
                            <label><strong> 2.3 ความคิดเห็นของผู้จัดการฝ่าย Human Resource
                                    Development</strong></label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'HRD_MANAGER'): ?>
                                <select class="custom-select" id="status_hrd_mgr" name="status_hrd_mgr">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_hrd_mgr"
                                    onclick="hrd_mgr_send('')">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_hrd_mgr"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <div id="txtbox_hrd_mgr" style="display: none">
                                <label>หมายเหตุ :</label>
                                <input type="text" class="form-control" id="remark_hrd_mgr" name="remark_hrd_mgr"
                                    placeholder="หมายเหตุ">
                            </div>
                            <hr class=" w-100 ml-0 text-center">

                            <label><strong> 2.4 ความคิดเห็นของผู้จัดการฝ่ายทั่วไป /
                                    ผู้จัดการทั่วไปสำนักพัฒนาองค์กร</strong></label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'OD'): ?>
                                <select class="custom-select" id="status_od_mgr" name="status_od_mgr">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_od_send"
                                    onclick="od_send('')">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_od_mgr"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <div id="txtbox_od_mgr" style="display: none">
                                <label>หมายเหตุ :</label>
                                <input type="text" class="form-control" id="remark_od_mgr" name="remark_od_mgr"
                                    placeholder="หมายเหตุ">
                            </div>
                        </div>
                        <!-- ส่วนที่ 2  ความคิดเห็นของสำนักพัฒนาองค์กร -->

                        <hr class=" w-100 ml-0 text-center">

                        <!-- ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน 10,000 บาท -->
                        <div class="form-group col-md-6">
                            <h5> <span class="badge badge-secondary"> ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน
                                    10,000 บาท</span>
                            </h5>
                            <label><strong>3.1 ความคิดเห็นของท่านรองประธานกรรมการบริหาร</strong></label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'EVP'): ?>
                                <select class="custom-select" id="status_evp1" name="status_evp1">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_evp1_send"
                                    onclick="evp1_send('')">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_evp1"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                            <label><strong>3.2 ความคิดเห็นของท่านประธานกรรมการบริหาร</strong></label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">ผลการอนุมัติ</label>
                                </div>
                                <?php if ($name_role === 'EVP'): ?>
                                <select class="custom-select" id="status_evp2" name="status_evp2">
                                    <option selected value="0">เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_evp2s_send"
                                    onclick="evp2_send('')">ยืนยัน</button>
                                <?php else: ?>
                                <div class="form-group col-md-6">
                                    <spane> <label name="status_evp2"></label></span>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <!-- ส่วนที่ 3 กรณีมีค่าใช้จ่ายในการสัมมนาเกิน 10,000 บาท -->

                        <hr class=" w-100 ml-0 text-center">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End modal appr training-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script type="text/javascript">
var save_method;

$(function() {
    $("#status_mgr_office").change(function() {
        if ($(this).val() == "2") {
            $("#txtbox_mgr_office").show();
        } else {
            $("#txtbox_mgr_office").hide();
        }
    });

    $("#status_hrd_division").change(function() {
        if ($(this).val() == "2") {
            $("#txtbox_hrd_division").show();
        } else {
            $("#txtbox_hrd_division").hide();
        }
    });

    $("#status_hrd_section").change(function() {
        if ($(this).val() == "2") {
            $("#txtbox_hrd_section").show();
        } else {
            $("#txtbox_hrd_section").hide();
        }
    });

    $("#status_hrd_mgr").change(function() {
        if ($(this).val() == "2") {
            $("#txtbox_hrd_mgr").show();
        } else {
            $("#txtbox_hrd_mgr").hide();
        }
    });

    $("#status_od_mgr").change(function() {
        if ($(this).val() == "2") {
            $("#txtbox_od_mgr").show();
        } else {
            $("#txtbox_od_mgr").hide();
        }
    });

    $('input[type="radio"][name="cost"]').on('change', function() {
        $('textarea[name="textarea"]').toggle($.trim(this.value) == '1');
    });

});

function training_form() {
    save_method = 'add';
    // $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text(
        'แบบฟอร์มขออนุมัติฝึกอบรมภายนอก'); // Set Title to Bootstrap modal title
    $('#label-file').text(
        'ขอเอกสารแนบประกอบการหลักสูตร (รายละเอียด, ค่าใช้จ่าย , กำหนดการ'); // label file upload
}

function send_appr_tra() {

    $('#btnSave').text('กำลังส่งคำขออนุมัติ...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable

    var url;

    url = "<?php echo site_url('training/ajax_add_training_form') ?>";

    // ajax adding data to database

    var formData = new FormData($('#form_training')[0]);
    // console.log(formData)

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {

            if (data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                window.location.reload();

            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                        'has-error'
                    ); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                        i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('ส่งคำขออนุมัติ'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('ส่งคำขออนุมัติ'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}

function cancel_training(id) {
    if (confirm('คุณต้องการนำข้อมูลนี้ออกจากระบบใช่หรือไม่')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('training/cancel_training') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
    }
}

function approval_training(training_form_id) {
    // console.log(training_form_id)
    $('#form_appr_tra')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_appr').modal('show'); // show bootstrap modal
    $('.modal-title_appr').text(
        'ทำการอนุมัติฝึกอบรมภายนอก'); // Set Title to Bootstrap modal title

    $.ajax({
        url: "<?php echo site_url('training/ajax_view_training') ?>/" + training_form_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $.each(data, function(key, item) {
                $('[name="training_form_id"]').val(item.training_form_id);
                $('label[name="course_name"]').text(item.course_name);
                $('label[name="place_of_course"]').text(item.place_of_course);
                $('label[name="date"]').text(item.date);
                $('label[name="consistent_course"]').text(item.consistent_course);
                $('label[name="remark"]').text(item.remark);
                $('label[name="created_on"]').text(item.created_on);
                $('label[name="salutation"]').text(item.salutation);
                $('label[name="firstname_th"]').text(item.firstname_th);
                $('label[name="lastname_th"]').text(item.lastname_th);
                $('label[name="department_title"]').text(item.department_title);
                $('label[name="code"]').text(item.code);
                $('label[name="department_code"]').text(item.department_code);
                $('label[name="startwork"]').text(item.startwork);
                $('label[name="email"]').text(item.email);
                $('label[name="details_exp"]').text(item.details_exp);

                if (item.work_eff == 0) {
                    $('label[name="work_eff"]').text('');
                } else {
                    $('label[name="work_eff"]').text('- เพิ่มประสิทธฺภาพในการทำงาน');
                }

                if (item.reduce_cost == 0) {
                    $('label[name="reduce_cost"]').text('');
                } else {
                    $('label[name="reduce_cost"]').text('- ต้นทุน / เวลาในการทำงานลดลง');
                }

                if (item.reduc_error == 0) {
                    $('label[name="reduc_error"]').text('');
                } else {
                    $('label[name="reduc_error"]').text('- ลดความผิดพลาดในการทำงาน');
                }

                if (item.other == 0) {
                    $('label[name="other"]').text('');
                } else {
                    $('label[name="other"]').text('- อื่นๆ');
                }

                if (item.other_details == 0) {
                    $('label[name="other_details"]').text('');
                } else {
                    $('label[name="other_details"]').text(item.other_details);
                }

                if (item.cost == 0) {
                    $('label[name="cost"]').text('ไม่มีค่าใช้จ่าย (สัมมนาฟรี)');
                    $('label[name="price"]').empty(item.price);
                } else {
                    $('label[name="cost"]').text('มีค่าใช้จ่ายเป็นจำนวนเงิน');
                    $('label[name="price"]').text(item.price);
                }
                if (item.tax == 0) {
                    $('label[name="tax"]').text('ต้องการใบหักภาษี ณ ที่จ่าย');
                } else {
                    $('label[name="tax"]').text('ไม่ต้องการใบหักภาษี ณ ที่จ่าย');
                }
                if (item.phase == 0) {
                    $('label[name="phase"]').text(
                        'ระยะสั้น (หลักสูตรไม่เกิน 5 วัน หรือไม่เกิน 30 ชม.)');
                } else {
                    $('label[name="phase"]').text(
                        'ระยะยาว (หลักสูตร 5 วันขึ้นไป หรือมากกว่า 30 ชม.)');
                }

                // ผลอนุมัติ lv 1 - 5
                if (item.level == 1) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_mgr_office"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_mgr_office"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_mgr_office"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }

                if (item.level == 2) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_division"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_division"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_division"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                }

                if (item.level == 3) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_section"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                }

                if (item.level == 4) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_mgr"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_mgr"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_mgr"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }

                if (item.level == 5) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_od_mgr"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_od"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_od"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }
                // ผลอนุมัติ lv 1 - 5

                if (item.course_file) {
                    $('#label-file').text('เอกสารฝึกอบรมหลักสูตร'); // label file upload
                    $('#preview_file div').html(
                        '<a href="<?php echo base_url('/uploads/training_course/'); ?>' +
                        item.course_file + '" download>' + item.course_name + '</a>');

                } else {
                    $('#label-file').text('เอกสารฝึกอบรมหลักสูตร'); // label file upload
                    $('#preview_file div').html(
                        '<label class="badge badge-danger" >ไม่มีไฟล์แนบ</label>');
                }
            })

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function view_training(training_form_id) {
    $('#form_training')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('#modal_form_training_form').modal('show'); // show bootstrap modal
    $('.modal-title_training_form').text(
        'ดูแบบฟอร์มขออนุมัติอบรมภายนอก'); // Set Title to Bootstrap modal title

    $.ajax({
        url: "<?php echo site_url('training/ajax_view_training') ?>/" + training_form_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $.each(data, function(key, item) {
                $('[name="training_form_id"]').val(item.training_form_id);
                $('label[name="course_name"]').text(item.course_name);
                $('label[name="place_of_course"]').text(item.place_of_course);
                $('label[name="date"]').text(item.date);
                $('label[name="consistent_course"]').text(item.consistent_course);
                $('label[name="remark"]').text(item.remark);
                $('label[name="created_on"]').text(item.created_on);
                $('label[name="salutation"]').text(item.salutation);
                $('label[name="firstname_th"]').text(item.firstname_th);
                $('label[name="lastname_th"]').text(item.lastname_th);
                $('label[name="department_title"]').text(item.department_title);
                $('label[name="code"]').text(item.code);
                $('label[name="department_code"]').text(item.department_code);
                $('label[name="startwork"]').text(item.startwork);
                $('label[name="email"]').text(item.email);
                $('label[name="details_exp"]').text(item.details_exp);

                if (item.work_eff == 0) {
                    $('label[name="work_eff"]').text('');
                } else {
                    $('label[name="work_eff"]').text('- เพิ่มประสิทธฺภาพในการทำงาน');
                }

                if (item.reduce_cost == 0) {
                    $('label[name="reduce_cost"]').text('');
                } else {
                    $('label[name="reduce_cost"]').text('- ต้นทุน / เวลาในการทำงานลดลง');
                }

                if (item.reduc_error == 0) {
                    $('label[name="reduc_error"]').text('');
                } else {
                    $('label[name="reduc_error"]').text('- ลดความผิดพลาดในการทำงาน');
                }

                if (item.other == 0) {
                    $('label[name="other"]').text('');
                } else {
                    $('label[name="other"]').text('- อื่นๆ');
                }

                if (item.other_details == 0) {
                    $('label[name="other_details"]').text('');
                } else {
                    $('label[name="other_details"]').text(item.other_details);
                }

                if (item.cost == 0) {
                    $('label[name="cost"]').text('ไม่มีค่าใช้จ่าย (สัมมนาฟรี)');
                    $('label[name="price"]').empty(item.price);
                } else {
                    $('label[name="cost"]').text('มีค่าใช้จ่ายเป็นจำนวนเงิน');
                    $('label[name="price"]').text(item.price);
                }
                if (item.tax == 0) {
                    $('label[name="tax"]').text('ต้องการใบหักภาษี ณ ที่จ่าย');
                } else {
                    $('label[name="tax"]').text('ไม่ต้องการใบหักภาษี ณ ที่จ่าย');
                }
                if (item.phase == 0) {
                    $('label[name="phase"]').text(
                        'ระยะสั้น (หลักสูตรไม่เกิน 5 วัน หรือไม่เกิน 30 ชม.)');
                } else {
                    $('label[name="phase"]').text(
                        'ระยะยาว (หลักสูตร 5 วันขึ้นไป หรือมากกว่า 30 ชม.)');
                }

                // ผลอนุมัติ lv 1 - 5
                if (item.level == 1) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_mgr_office"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_mgr_office"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_mgr_office"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }

                if (item.level == 2) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_division"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_division"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_division"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                }

                if (item.level == 3) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_section"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                }

                if (item.level == 4) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_hrd_mgr"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_hrd_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_mgr"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_hrd_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_hrd_mgr"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }

                if (item.level == 5) {
                    if (item.status_appr == 0) {
                        // รอดำเนินการ
                        $('label[name="status_od_mgr"]').text('รอดำเนินการ');
                    } else if (item.status_appr == 1) {
                        // อนุมัติ
                        $('label[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="updated_by_od"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else {
                        // ไม่อนุมัติ
                        $('label[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="updated_by_od"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }
                // ผลอนุมัติ lv 1 - 5

                if (item.course_file) {
                    $('#label-file').text('เอกสารฝึกอบรมหลักสูตร'); // label file upload
                    $('#preview_file div').html(
                        '<a href="<?php echo base_url('/uploads/training_course/'); ?>' +
                        item.course_file + '" download>' + item.course_name + '</a>');

                } else {
                    $('#label-file').text('เอกสารฝึกอบรมหลักสูตร'); // label file upload
                    $('#preview_file div').html(
                        '<label class="badge badge-danger" >ไม่มีไฟล์แนบ</label>');
                }
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function chk_training_course(id) {  
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_chk').modal('show'); // show bootstrap modal
    $('.modal-title_chk').text(
        'ตรวจสอบสถานะการขออนุมัติฝึกอบรมภายนอก'); // Set Title to Bootstrap modal title
    $.ajax({
        url: "<?php echo site_url('approval/chk_status_training') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

            $.each(data, function(key, item) {
                if (item.level == 1) {
                    // console.log('mgr_office ' + item.status_appr)
                    if (item.status_appr == 0) {
                        $('p[name="status_office_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                        );
                    } else if (item.status_appr == 1) {
                        $('h5[name="status_office_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else if (item.status_appr == 2) {
                        $('h5[name="status_office_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_office"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                }

                if (item.level == 2) { // division
                    // console.log('division ' + item.status_appr)
                    if (item.status_appr == 0) {
                        $('p[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                        );
                    } else if (item.status_appr == 1) {
                        $('h5[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_hrd_division"]').text('วันที่' + ' ' + item
                            .updated_on);
                    } else if (item.status_appr == 2) {
                        $('h5[name="status_hrd_division"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_hrd_division"]').text('วันที่' + ' ' + item
                            .updated_on);
                    }
                } else {
                    $('p[name="status_hrd_division"]').html(
                        '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                    );
                }

                if (item.level == 3) { //section
                    // console.log('section ' + item.status_appr)
                    if (item.status_appr == 0) {
                        $('p[name="status_hrd_section "]').html(
                            '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                        );
                    } else if (item.status_appr == 1) {
                        $('h5[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('p[name=""]').text('');
                        $('p[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else if (item.status_appr == 2) {
                        $('h5[name="status_hrd_section"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_hrd_section"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                } else {
                    $('p[name="status_hrd_section"]').html(
                        '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                    );
                }

                if (item.level == 4) {
                    // console.log('hrd_mgr ' + item.status_appr)
                    if (item.status_appr == 0) {
                        $('p[name="status_hrd_manager"]').html(
                            '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                        );
                    } else if (item.status_appr == 1) {
                        $('h5[name="status_hrd_manager"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_hrd_manager"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else if (item.status_appr == 2) {
                        $('h5[name="status_hrd_manager"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_hrd_manager"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                } else {
                    $('p[name="status_hrd_manager"]').html(
                        '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                    );
                }

                if (item.level == 5) {
                    // console.log('od ' + item.status_appr)
                    if (item.status_appr == 0) {
                        $('p[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                        );
                    } else if (item.status_appr == 1) {
                        $('h5[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_od"]').text('วันที่' + ' ' +
                            item.updated_on);
                    } else if (item.status_appr == 2) {
                        $('h5[name="status_od_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('p[name=" "]').text('');
                        $('p[name="updated_by_od"]').text('วันที่' + ' ' +
                            item.updated_on);
                    }
                } else {
                    $('p[name="status_od_mgr"]').html(
                        '<span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>'
                    );
                }

            }) // end each(data, function(key, item)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }

    });
}

var url = '<?php echo base_url('training/') ?>';

function hrd_section_send() {

    var formdata = $('#form_appr_tra').serialize();
    console.log(formdata)
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('approval/ajax_chk_by_hrd') ?>",
        data: formdata,
        dataType: 'JSON',
        success: function(data) {
            $('#modal_form_appr').modal('hide');
            alert('ทำการอนุมัติเรียบร้อยแล้ว');
            window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้');
        }
    });
}

function mgr_office_send() {
    var formdata = $('#form_appr_tra').serialize();
    console.log(formdata)
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('approval/ajax_approval_send') ?>",
        data: formdata,
        dataType: 'JSON',
        success: function(data) {
            $('#modal_form_appr').modal('hide');
            alert('ทำการอนุมัติเรียบร้อยแล้ว');
            // window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้');
        }
    });
}

function hrd_division_send() {
    var formdata = $('#form_appr_tra').serialize();
    console.log(formdata)
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('approval/ajax_approval_send') ?>",
        data: formdata,
        dataType: 'JSON',
        success: function(data) {

            $('#modal_form_appr').modal('hide');
            alert('ทำการอนุมัติเรียบร้อยแล้ว');
            window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้');
        }
    });
}

function hrd_mgr_send() {
    var formdata = $('#form_appr_tra').serialize();
    console.log(formdata)
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('approval/ajax_approval_send') ?>",
        data: formdata,
        dataType: 'JSON',
        success: function(data) {
            $('#modal_form_appr').modal('hide');
            alert('ทำการอนุมัติเรียบร้อยแล้ว');
            window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้');
        }
    });
}

function od_send() {
    var formdata = $('#form_appr_tra').serialize();
    console.log(formdata)
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url('approval/ajax_approval_send') ?>",
        data: formdata,
        dataType: 'JSON',
        success: function(data) {
            $('#modal_form_appr').modal('hide');
            alert('ทำการอนุมัติเรียบร้อยแล้ว');
            window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้');
        }
    });
}
</script>

<!-- footer -->
<?php $this->load->view('layouts/footer');?>