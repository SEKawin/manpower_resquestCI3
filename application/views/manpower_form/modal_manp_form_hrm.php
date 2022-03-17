<!-- modal Views Manpower Requisition Form -->
<div class="modal fade" id="modal_manp_form_hrm" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">views Manpower Requisition Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal-hrm">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body-hrm" style="display: none;">
    <form action="#" id="form_manp_hrm" class="form-horizontal">
        <input type="hidden" value="" name="hr_no" />
        <input type="hidden" value="" name="year" />
        <div class="form-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>No. <u>MRF.</u> : </label>
                    <label name="hr_no"></label> / <label name="year"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>ตำแหน่งที่ขอ :</label>
                    <label name="req_posi_name"></label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>จำนวนที่ขอ :</label>
                    <label name="rec_num"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>วันที่ต้องการ :</label>
                    <label name="rec_date"><label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>COST CENTER :</label>
                    <label name="cost_center"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>แผนก/ส่วน/ฝ่าย :</label>
                    <label name="sec_div_dept"></label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>แหล่งบุคลากร :</label>
                    <label name="sou_of_person"><label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10" id="type_of_rec">
                    <label>ประเภทของความต้องการ :</label>
                    <label name="type_of_rec"></label>

                    <div id="pos_in_manp">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;มีตำแหน่งงานอยู่ในแผนอัตรากำลัง :</label>
                        <label name="pos_in_manp"></label>
                    </div>

                    <div id="reason_of_replaces">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;บุคลลที่ถูกทดแทน :
                            <label name="per_replaced"></label>
                        </label>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;เหตุผลของการทดแทน :</label>
                        <label name="rea_of_replac"></label>
                    </div>

                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>ประเภทของพนักงาน :</label>
                    <label name="type_emp"></label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>ประเภทการจ้าง :</label>
                    <label name="type_of_employment"> </label>

                    <div id="term_of_emp" style="display: none;">
                        <label>ระยะเวลาการจ้าง :</label>
                        <label name="dur_of_emp"></label>
                    </div>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>เอกสารประกอบใบคำขอ :</label>
                </div>
                <div class="form-group col-md-3">
                    <label name="attach_doc1">แผนผังหน่วยงาน/แผนก</label>
                </div>
                <div class="form-group col-md-3">
                    <label name="attach_doc2">คำบรรยายลักษณะงาน</label>
                </div>
                <div class="form-group col-md-5">
                    <label name="attach_doc3">ใบลาออกของพนักงานผู้ลาออก</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-9">
                    <label>หน้าที่ความรับผิดชอบ :</label>
                    <label name="duty_resp" placeholder="ระบุ หน้าที่ความรับผิดชอบ"></label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><u>คุณสมบัติ </u></label>
                </div>
                <div class="form-group col-md-6">
                    <label>เพศ/อายุ :</label>
                    <label name="sex_age_emp"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>การศึกษา :</label>
                    <label name="education_emp"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>ทักษะ/ความชำนาญ :</label>
                    <label name="skill_expert"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>ประสบการณ์ :</label>
                    <label name="experience"></label>
                </div>
                <div class="form-group col-md-6">
                    <label>อื่น ๆ :</label>
                    <label name="other"></label>
                </div>
            </div>

            <hr class=" w-100 ml-0 text-center">
            <!-- สำหรับหน่วยงานที่ขอ -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>
                        <center><b><u> สำหรับหน่วยงานที่ขอ </u></b></center>
                    </label>
                </div>
                <div class="form-group col-md-4">
                    <p>ผู้ขอจ้าง <label name="name_mgr"></label></p>
                    <p>ผู้จัดการฝ่าย :<label name="status_mgr"></label></p>
                    <p>วันที่ :<label name="update_mgr"></label></p>
                </div>
                <div class="form-group col-md-4">
                    <p>ผู้ทบทวน <label name="name_agm"></label></p>
                    <p>ผู้ช่วยผู้จัดการทั่วไป :<label name="status_agm"></label></p>
                    <p>วันที่ :<label name="update_agm"></label></p>
                </div>
                <div class="form-group col-md-4">
                    <p>ผู้อนุมัติคำขอขั้นต้น <label name="name_gm"></label></p>
                    <p>ผู้จัดการทั่วไป :<label name="status_gm"></label></p>
                    <p>วันที่ :<label name="update_gm"></label></p>
                </div>
            </div>
            <hr class=" w-100 ml-0 text-center">
            <!-- สำหรับหน่วยงานที่ขอ -->

            <!-- สำหรับเจ้าหน้าที่ HR ตรวจสอบเอกสาร  -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>
                        <center><b><u> สำหรับเจ้าหน้าที่ HR ตรวจสอบเอกสาร </u></b></center>
                    </label>
                </div>
                <div class="form-group col-md-4">
                    <p><label name="name_hr"></label></p>
                    <p>เจ้าหน้าที่ HR :<label name="status_hr"></label></p>
                    <p>วันที่ :<label name="update_hr"></label></p>
                </div>
            </div>
            <hr class=" w-100 ml-0 text-center">
            <!-- สำหรับเจ้าหน้าที่ HR ตรวจสอบเอกสาร  -->

            <!-- สำหรับสำนักพัฒนาองค์กร -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>
                        <center><b><u> สำหรับสำนักพัฒนาองค์กร </u></b></center>
                    </label>
                </div>

                <?php foreach ($HRM as $rows) :
                    $name_role = $rows->name_role;
                endforeach; ?>
                <?php if ($name_role == 'HRM_MGR') : ?>
                    <div class="form-group col-md-12">
                        <div class="input-group mb-3" id="approving_hrm_mgr">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect_hrm_mgr">ผลการอนุมัติของผู้จัดการฝ่าย</label>
                            </div>
                            <select class="choice_hrm_mgr custom-select" id="inputGroupSelect_hrm_mgr" name="status_hrm_mgr">
                                <option selected>เลือก...</option>
                                <option value="1">เห็นควรอนุมัติ</option>
                                <option value="2">ไม่เห็นควรอนุมัติ</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-primary" id="btn_approval_hrm_mgr" onclick="approval_hrm_mgr()">ยืนยัน</button>
                            <div class="txtbox_hrm_mgr" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_hrm_mgr" name="remark_hrm_mgr" placeholder="หมายเหตุ">
                            </div>
                        </div>

                        <div id="approved_hrm_mgr" style="display: none">
                            <label name="name_hrm_mgr"></label>
                            <p>ผู้จัดการฝ่าย :<label name="status_hrm_mgr"></label></p>
                            <p>วันที่ : <label name="update_hrm_mgr"></label></p>
                        </div>
                    <?php else : ?>

                        <div id="approved_hrm_mgr" style="display: none">
                            <label name="name_hrm_mgr"></label>
                            <p>ผู้จัดการฝ่าย :<label name="status_hrm_mgr"></label></p>
                            <p>วันที่ : <label name="update_hrm_mgr"></label></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($name_role == 'HRM_AGM') : ?>
                    <div class="form-group col-md-12">
                        <div class="input-group mb-3" id="approving_hrm_agm">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect_hrm_agm">ผลการอนุมัติของผู้ช่วยผู้จัดการทั่วไป</label>
                            </div>
                            <select class="choice_hrm_agm custom-select" id="inputGroupSelect_hrm_agm" name="status_hrm_agm">
                                <option selected>เลือก...</option>
                                <option value="1">เห็นควรอนุมัติ</option>
                                <option value="2">ไม่เห็นควรอนุมัติ</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-primary" id="btn_approval_hrm_agm" onclick="approval_hrm_agm()">ยืนยัน</button>
                        </div>
                        <div class="txtbox_hrm_agm" style="display: none">
                            <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_hrm_agm" name="remark_hrm_agm" placeholder="หมายเหตุ">
                        </div>
                        <div id="approved_hrm_agm" style="display: none">
                            <label name="name_hrm_agm"></label>
                            <p>ผู้ช่วยผู้จัดการทั่วไป :<label name="status_hrm_agm"></label></p>
                            <p>วันที่ : <label name="update_hrm_agm"></label></p>
                        </div>
                    <?php else : ?>

                        <div id="approved_hrm_agm" style="display: none">
                            <label name="name_hrm_agm"></label>
                            <p>ผู้ช่วยผู้จัดการทั่วไป :<label name="status_hrm_agm"></label></p>
                            <p>วันที่ : <label name="update_hrm_agm"></label></p>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($name_role == 'HRM_GM') : ?>

                    <div class="form-group col-md-12">
                        <div class="input-group mb-3" id="approving_od">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect_od">ผลการอนุมัติของผู้จัดการทั่วไป</label>
                            </div>
                            <select class="choice_od custom-select" id="inputGroupSelect_od" name="status_od">
                                <option selected>เลือก...</option>
                                <option value="1">เห็นควรอนุมัติ</option>
                                <option value="2">ไม่เห็นควรอนุมัติ</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-primary" id="btn_approval_od" onclick="approval_od()">ยืนยัน</button>
                        </div>

                        <div class="txtbox_od" style="display: none">
                            <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_od" name="remark_od" placeholder="หมายเหตุ">
                        </div>

                        <div id="approved_od" style="display: none">
                            <label name="name_od"></label>
                            <p>ผู้จัดการทั่วไป :<label name="status_od"></label></p>
                            <p>วันที่ : <label name="update_od"></label></p>
                        </div>

                    <?php else : ?>
                        <div id="approved_od" style="display: none">
                            <label name="name_od"></label>
                            <p>ผู้จัดการทั่วไป :<label name="status_od"></label></p>
                            <p>วันที่ : <label name="update_od"></label></p>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
            <hr class=" w-100 ml-0 text-center">
            <!-- สำหรับสำนักพัฒนาองค์กร -->
        </div>

    </form>
</div>
<!--modal Views Manpower Requisition Form -->

<?php $url = base_url('uploads/manp_form'); ?>
<script type="text/javascript">
    function form_approval_by_hrm(hr_no) {
        $('#append-modal-hrm').html($('#hidden-modal-body-hrm').html());
        $('body').find('#form_manp_hrm')[0].reset(); // reset form on modals
        $('.form-row').removeClass('has-error'); // clear error class
        $('#modal_manp_form_hrm').modal('show'); // show bootstrap modal
        $('.modal-title').text('แบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ'); // Set Title to Bootstrap modal title
        var manp_form = '<?php echo $url; ?>';
        $.ajax({
            url: "<?php echo site_url('manpower_form/view_manp_form') ?>/" + hr_no,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $.each(data.data1, function(key, value) {

                    $('body').find('[name="hr_no"]').val(value.hr_no);
                    $('body').find('[name="year"]').val(value.year);
                    $('body').find('label[name="hr_no"]').text(value.hr_no);
                    $('body').find('label[name="year"]').text(value.year);
                    $('body').find('label[name="req_posi_name"]').text(value.req_posi_name);
                    $('body').find('label[name="rec_num"]').text(value.rec_num);
                    $('body').find('label[name="rec_date"]').text(value.rec_date);
                    $('body').find('label[name="cost_center"]').text(value.cost_center);
                    $('body').find('label[name="sec_div_dept"]').text(value.sec_div_dept);

                    if (value.sou_of_person == 0) {
                        $('body').find('label[name="sou_of_person"]').html('ภายใน ');

                    } else {
                        $('body').find('label[name="sou_of_person"]').html('ภายนอก');
                    }

                    if (value.type_of_rec == 0) {
                        $('body').find('label[name="type_of_rec"]').html('เพิ่มจำนวน ');

                        $('body').find('#pos_in_manp').show();
                        $('body').find('#reason_of_replaces').hide();
                        $('body').find('label[name="per_replaced"]').html('-');
                        $('body').find('label[name="rea_of_replac"]').html('-');
                        if (value.pos_in_manp == 0) {
                            $('body').find('label[name="pos_in_manp"]').html('ใช่');
                        } else {
                            $('body').find('label[name="pos_in_manp"]').html('ไม่ใช่ ');
                        }
                    } else if (value.type_of_rec == 1) {
                        $('body').find('label[name="type_of_rec"]').html('ทดแทน ');

                        $('body').find('#pos_in_manp').hide();
                        $('body').find('#reason_of_replaces').show();
                        $('body').find('label[name="per_replaced"]').html(value.per_replaced);

                        if (value.reason_of_replaces == 1) {
                            $('body').find('label[name="rea_of_replac"]').html('ลาออก ');
                        } else if (value.reason_of_replaces == 2) {
                            $('body').find('label[name="rea_of_replac"]').html('ปลดออก ');
                        } else if (value.reason_of_replaces == 3) {
                            $('body').find('label[name="rea_of_replac"]').html('อื่นๆ  ');
                        }
                    }

                    // ประเภทของพนักงาน
                    if (value.type_of_emp == 1) {
                        $('body').find('label[name="type_emp"]').
                        html('ผู้จัดการฝ่าย');
                    } else if (value.type_of_emp == 2) {
                        $('body').find('label[name="type_emp"]').
                        html('หัวหน้ากลุ่ม');
                    } else if (value.type_of_emp == 3) {
                        $('body').find('label[name="type_emp"]').
                        html('เจ้าหน้าที่ (Staff)');
                    } else if (value.type_of_emp == 4) {
                        $('body').find('label[name="type_emp"]').
                        html('เจ้าหน้าที่ (Officer)');
                    } else if (value.type_of_emp == 5) {
                        $('body').find('label[name="type_emp"]').
                        html('หัวหน้าแผนก');
                    } else if (value.type_of_emp == 6) {
                        $('body').find('label[name="type_emp"]').
                        html('หัวหน้าส่วน)');
                    } else if (value.type_of_emp == 7) {
                        $('body').find('label[name="type_emp"]').
                        html('วิศวกร (Engineer)');
                    } else if (value.type_of_emp == 8) {
                        $('body').find('label[name="type_emp"]').
                        html('พนักงานทั่วไป');
                    } else if (value.type_of_emp == 9) {
                        $('body').find('label[name="type_emp"]').
                        html('พนักงาน 11 เดือน');
                    } else if (value.type_of_emp == 10) {
                        $('body').find('label[name="type_emp"]').
                        html('พนักงานรับเหมาแรงงาน (Subcontractor)');
                    } else if (value.type_of_emp == 11) {
                        $('body').find('label[name="type_emp"]').
                        html('นักศึกษาฝึกงาน');
                    }
                    // ประเภทของพนักงาน

                    // ประเภทการจ้าง
                    if (value.type_of_employment == 0) {
                        $('body').find('label[name="type_of_employment"]')
                            .html('จ้างประจำ');
                    } else if (value.type_of_employment == 1) {
                        $('body').find('label[name="type_of_employment"]')
                            .html('จ้างชั่วคราว');
                        $('body').find('#term_of_emp').show();
                        $('body').find('label[name="dur_of_emp"]')
                            .text(value.dur_of_emp);
                    }
                    // ประเภทการจ้าง 


                    if (value.attach_doc1 == null) {
                        $('body').find('label[name="attach_doc1"]').
                        html('<a href="' + manp_form +
                            '/' + value.attach_doc1 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> แผนผังหน่วยงาน/แผนก</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc1"]').
                        html('<a href="' + manp_form + '/' + value.attach_doc1 + '" download ="' +
                            value.hr_no + '-' + value.year +
                            'แผนผังหน่วยงาน/แผนก" class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> แผนผังหน่วยงาน/แผนก</a>'
                        );
                    }

                    if (value.attach_doc2 == null) {
                        $('body').find('label[name="attach_doc2"]').
                        html('<a href="' + manp_form + '/' + value.attach_doc2 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> คำบรรยายลักษณะงาน</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc2"]').
                        html('<a href="' + manp_form + '/' + value.attach_doc2 +
                            '" download ="' + value.hr_no + '-' + value.year +
                            'คำบรรยายลักษณะงาน"class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> คำบรรยายลักษณะงาน</a>'
                        );
                    }

                    $('body').find('label[name="duty_resp"]').text(value.duty_resp);
                    $('body').find('label[name="sex_age_emp"]').text(value.sex_emp + ' / ' + value.age_emp);
                    $('body').find('label[name="education_emp"]').text(value.education_emp);
                    $('body').find('label[name="skill_expert"]').text(value.skill_expert);
                    $('body').find('label[name="experience"]').text(value.experience);
                    $('body').find('label[name="other"]').text(value.other);

                    // ผู้จัดการฝ่าย
                    if (value.status_dept_mgr == 1) {
                        $('body').find('label[name="status_dept_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                    } else if (value.status_dept_mgr == 2) {
                        $('body').find('label[name="status_dept_mgr"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                    } else {
                        $('body').find('label[name="status_dept_mgr"]').empty('');
                        $('body').find('label[name="name_mgr"]').empty('');
                    }
                    $('body').find('label[name="update_mgr"]').text(value.update_mgr);

                    // ผู้ช่วยผู้ข่วยผู้จัดการทั่วไป
                    if (value.status_agm == 1) {
                        $('body').find('label[name="status_agm"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                    } else if (value.status_agm == 2) {
                        $('body').find('label[name="status_agm"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                    } else {
                        $('body').find('label[name="status_agm"]').empty('');
                        $('body').find('label[name="name_agm"]').empty('');
                    }
                    $('body').find('label[name="update_agm"]').text(value.update_agm);

                    // ผู้จัดการทั่วไป
                    if (value.status_gm == 1) {
                        $('body').find('label[name="status_gm"]').html(
                            '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                    } else if (value.status_gm == 2) {
                        $('body').find('label[name="status_gm"]').html(
                            '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                    } else {
                        $('body').find('label[name="status_gm"]').empty('');
                        $('body').find('label[name="name_gm"]').empty('');
                    }
                    $('body').find('label[name="update_gm"]').text(value.update_gm);

                    // HR
                    if (value.status_gm == 1) {
                        $('body').find('#show_hr').show('');
                        if (value.status_hr == 1 || value.status_hr == 2) {
                            $('body').find('#approving_hr').hide('');
                            $('body').find('#approved_hr').show('');
                            if (value.status_hr == 1) {
                                $('body').find('label[name="status_hr"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-success">เอกสารครบถ้วน</span>'
                                );
                            } else if (value.status_hr == 2) {
                                $('body').find('label[name="status_hr"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-danger">เอกสารไม่ครบถ้วน</span>'
                                );
                            } else {
                                $('body').find('label[name="status_hr"]').empty('');
                                $('body').find('label[name="name_hr"]').empty('');
                            }
                            $('body').find('label[name="update_hr"]').text(value.update_hr);
                        }
                    }

                    // HRM MGR
                    if (value.status_hr == 1) {
                        $(function() {
                            $(".choice_hrm_mgr").change(function() {
                                if ($(this).val() == 1) {
                                    $('#remark_hrm_mgr').val('')
                                        .change();
                                    $(".txtbox_hrm_mgr").hide('slow');
                                } else {

                                    $(".txtbox_hrm_mgr").show('slow');
                                }
                            });
                        });
                        $('body').find('#show_hrm').show('');
                        if (value.status_hrm_mgr == 1 || value.status_hrm_mgr == 2) {
                            $('body').find('#approving_hrm_mgr').hide('');
                            $('body').find('#approved_hrm_mgr').show('');
                            if (value.status_hrm_mgr == 1) {
                                $('body').find('label[name="status_hrm_mgr"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-success">เห็นควรอนุมัติ</span>'
                                );
                            } else if (value.status_hrm_mgr == 2) {
                                $('body').find('label[name="status_hrm_mgr"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-danger">ไม่เห็นควรอนุมัติ</span>'
                                );
                            } else {
                                $('body').find('label[name="status_hrm_mgr"]').empty('');
                                $('body').find('label[name="name_hrm_mgr"]').empty('');
                            }
                            $('body').find('label[name="update_hrm_mgr"]').text(value.update_hrm_mgr);
                        }

                        // HRM AGM
                        $(function() {
                            $(".choice_hrm_agm").change(function() {
                                if ($(this).val() == 1) {
                                    $('#remark_hrm_agm').val('')
                                        .change();
                                    $(".txtbox_hrm_agm").hide('slow');
                                } else {

                                    $(".txtbox_hrm_agm").show('slow');
                                }
                            });
                        });
                        if (value.status_hrm_agm == 1 || value.status_hrm_agm == 2) {
                            $('body').find('#approving_hrm_agm').hide('');
                            $('body').find('#approved_hrm_agm').show('');
                            if (value.status_hrm_agm == 1) {
                                $('body').find('label[name="status_hrm_agm"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-success">เห็นควรอนุมัติ</span>'
                                );
                            } else if (value.status_hrm_agm == 2) {
                                $('body').find('label[name="status_hrm_agm"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-danger">ไม่เห็นควรอนุมัติ</span>'
                                );
                            } else {
                                $('body').find('label[name="status_hrm_agm"]').empty('');
                                $('body').find('label[name="name_hrm_agm"]').empty('');
                            }
                            $('body').find('label[name="update_hrm_agm]').text(value.update_hrm_agm);
                        }
                        // HRM GM // OD
                        $(function() {
                            $(".choice_od").change(function() {
                                if ($(this).val() == 1) {
                                    $('#remark_od').val('')
                                        .change();
                                    $(".txtbox_od").hide('slow');
                                } else {

                                    $(".txtbox_od").show('slow');
                                }
                            });
                        });
                        if (value.status_od == 1 || value.status_od == 2) {
                            $('body').find('#approving_od').hide('');
                            $('body').find('#approved_od').show('');

                            if (value.status_od == 1) {
                                $('body').find('label[name="status_od"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-success">เห็นควรอนุมัติ</span>'
                                );
                            } else if (value.status_od == 2) {
                                $('body').find('label[name="status_od"]').html(
                                    '<span style="font-size: 15px;" class="badge badge-danger">ไม่เห็นควรอนุมัติ</span>'
                                );
                            } else {
                                $('body').find('label[name="status_od"]').empty('');
                                $('body').find('label[name="name_od"]').empty('');
                            }
                            $('body').find('label[name="update_od"]').text(value.update_od);
                        }
                    }

                })

                // ผู้จัดการฝ่าย
                $.each(data.data2, function(key, value) {
                    $('body').find('label[name="name_mgr"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);

                })

                // ผู้ช่วยผู้ข่วยผู้จัดการทั่วไป
                $.each(data.data3, function(key, value) {
                    $('body').find('label[name="name_agm"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);
                })

                // ผู้จัดการทั่วไป
                $.each(data.data4, function(key, value) {
                    $('body').find('label[name="name_gm"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);

                })
                // เจ้าหน้าที่ HR
                $.each(data.data5, function(key, value) {
                    $('body').find('label[name="name_hr"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);
                })

                // HRM MGR
                $.each(data.data6, function(key, value) {
                    $('body').find('label[name="name_hrm_mgr"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);
                })

                // HRM AGM
                $.each(data.data7, function(key, value) {
                    $('body').find('label[name="name_hrm_agm"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);
                })

                // HRM GM
                $.each(data.data8, function(key, value) {
                    $('body').find('label[name="name_od"]').text('ลงชื่อ :' +
                        value.firstname_th + value.lastname_th);
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
            }
        });
    }

    function approval_hrm_agm() {
        $('#btn_approval_hrm_agm').text('กำลังทำการยืนยัน...'); //change button text
        $('#btn_approval_hrm_agm').attr('disabled', true); //set button disable

        var formdata = $('#form_manp_hrm').serialize();
        // console.log(formdata)
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Approval_manp/appr_by_hrm_agm') ?>",
            data: formdata,
            dataType: 'JSON',
            success: function(data) {
                $('#append-modal-hrm').html($('#hidden-modal-body-hrm').html());
                $('#tbl_hrm_agm').DataTable().ajax.reload(null, false);
                $('body').find('#form_manp_hrm')[0].reset(); // reset form on modals
                $('#modal_manp_form_hrm').modal('hide');
                alert('คุณทำการอนุมัติเรียบร้อยแล้ว');

                $('#btn_approval_hrm_agm').text('ยืนยัน'); //change button text
                $('#btn_approval_hrm_agm').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }

    function approval_od() {
        $('#btn_approval_hrm_gm').text('กำลังทำการยืนยัน...'); //change button text
        $('#btn_approval_hrm_gm').attr('disabled', true); //set button disable

        var formdata = $('#form_manp_hrm').serialize();
        // console.log(formdata)
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Approval_manp/appr_by_hrm_gm') ?>",
            data: formdata,
            dataType: 'JSON',
            success: function(data) {
                $('#append-modal-hrm').html($('#hidden-modal-body-hrm').html());
                $('#tbl_hrm_gm').DataTable().ajax.reload(null, false);
                $('body').find('#form_manp_hrm')[0].reset(); // reset form on modals
                $('#modal_manp_form_hrm').modal('hide');
                alert('คุณทำการอนุมัติเรียบร้อยแล้ว');

                $('#btn_approval_hrm_gm').text('ยืนยัน'); //change button text
                $('#btn_approval_hrm_gm').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }
</script>
