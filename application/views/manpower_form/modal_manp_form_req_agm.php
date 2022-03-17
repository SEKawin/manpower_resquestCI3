<!-- modal Views Manpower Requisition Form -->
<div class="modal fade" id="modal_manp_form_req_agm" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">views Manpower Requisition Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal_req_agm">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body_req_agm" style="display: none;">
    <form action="#" id="form_manp_req_agm" class="form-horizontal">
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
                    <p>ผู้จัดการฝ่าย :<label name="status_dept_mgr"></label></p>
                    <p>วันที่ :<label name="update_mgr"></label></p>
                </div>
                <div class="form-group col-md-12">
                    <?php foreach ($name_role as $row) :
                        $name_role = $row->name_role; ?>
                        <?php if ($name_role == 'AGM') : ?>
                            <div class="input-group mb-3" id="approving_agm">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect_agm">ผลการอนุมัติของผู้ช่วยผู้จัดการทั่วไป</label>
                                </div>
                                <select class="choice_agm custom-select" id="inputGroupSelect_agm" name="status_agm">
                                    <option selected>เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-primary" id="btn_approval_agm" onclick="approval_agm()">ยืนยัน</button>
                            </div>

                            <div class="txtbox_agm" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_agm" name="remark_agm" placeholder="หมายเหตุ">
                            </div>
                            <div id="approved_agm" style="display: none">
                                <p>ผู้ทบทวน <label name="name_agm"></label></p>
                                <p>ผู้ช่วยผู้จัดการทั่วไป :<label name="status_agm"></label></p>
                                <p>วันที่ : <label name="update_agm"></label></p>
                            </div>
                        <?php else : ?>
                            <div id="approved_agm" style="display: none">
                                <p>ผู้ทบทวน <label name="name_agm"></label></p>
                                <p>ผู้ช่วยผู้จัดการทั่วไป :<label name="status_agm"></label></p>
                                <p>วันที่ : <label name="update_agm"></label></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="form-group col-md-4">
                    <p>ผู้อนุมัติคำขอขั้นต้น <label name="name_gm"></label></p>
                    <p>ผู้จัดการทั่วไป :<label name="status_gm"></label></p>
                    <p>วันที่ :<label name="update_gm"></label></p>
                </div>
                <hr class=" w-100 ml-0 text-center">
            </div>
            <!-- สำหรับหน่วยงานที่ขอ -->

        </div>
        <hr class=" w-100 ml-0 text-center">

</div>
</form>
</div>
<!--modal Views Manpower Requisition Form -->
<?php $url = base_url('uploads/'); ?>

<script type="text/javascript">
    function form_requested_agm(hr_no) {
        $('#append-modal_req_agm').html($('#hidden-modal-body_req_agm').html());
        $('body').find('#form_manp_req_agm')[0].reset(); // reset form on modals
        $('.form-row').removeClass('has-error'); // clear error class
        $('#modal_manp_form_req_agm').modal('show'); // show bootstrap modal
        $('.modal-title').text('แบบฟอร์มใบขออนุมัติอัตรากำลัง/ใบขอกำลังคนในงบประมาณ'); // Set Title to Bootstrap modal title

        var url = '<?php echo $url; ?>';

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
                    if (value.attach_doc1 == null || value.attach_doc1 == '') {
                        $('body').find('label[name="attach_doc1"]').
                        html('<a href="' + url + '/manp_form/' + value.attach_doc1 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> แผนผังหน่วยงาน/แผนก</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc1"]').
                        html('<a href="' + url + '/manp_form/' + value.attach_doc1 + '" download ="' +
                            value.hr_no + '-' + value.year +
                            'แผนผังหน่วยงาน/แผนก" class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> แผนผังหน่วยงาน/แผนก</a>'
                        );
                    }

                    if (value.attach_doc2 == null || value.attach_doc2 == '') {
                        $('body').find('label[name="attach_doc2"]').
                        html('<a href="' + url + '/manp_form/' + value.attach_doc2 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> คำบรรยายลักษณะงาน</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc2"]').
                        html('<a href="' + url + '/manp_form/' + value.attach_doc2 +
                            '" download ="' + value.hr_no + '-' + value.year +
                            'คำบรรยายลักษณะงาน"class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> คำบรรยายลักษณะงาน</a>'
                        );
                    }

                    if (value.attach_doc3 == null || value.attach_doc3 == '') {
                        $('body').find('label[name="attach_doc3"]').
                        html('<a href="' + url + '/resignation_attach/' + value.attach_doc3 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> ใบลาออกของพนักงานผู้ลาออก</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc3"]').
                        html('<a href="' + url + '/resignation_attach/' + value.attach_doc3 +
                            '" download ="' + value.hr_no + '-' + value.year +
                            'คำบรรยายลักษณะงาน"class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> ใบลาออกของพนักงานผู้ลาออก</a>'
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
                    $(function() {
                        $(".choice_agm").change(function() {
                            if ($(this).val() == 1) {
                                $('#remark_agm').val('')
                                    .change();
                                $(".txtbox_agm").hide('slow');
                            } else {

                                $(".txtbox_agm").show('slow');
                            }
                        });
                    });

                    if (value.status_agm == 1 || value.status_agm == 2) {
                        $('body').find('#approving_agm').hide('');
                        $('body').find('#approved_agm').show('');
                        if (value.status_agm == 1) {
                            $('body').find('label[name="status_agm"]').html(
                                '<span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                            );
                        } else if (value.status_agm == 2) {
                            $('body').find('label[name="status_agm"]').html(
                                '<span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                            );
                        }
                        $('body').find('label[name="update_agm"]').text(value.update_mgr);
                    }

                })

                // ผู้จัดการฝ่าย
                $.each(data.data2, function(key, value) {
                    $('body').find('label[name="name_mgr"]').text('ลงชื่อ :' +
                        value.firstname_th + ' ' + value.lastname_th);
                })

                // ผู้ช่วยผู้ข่วยผู้จัดการทั่วไป
                $.each(data.data3, function(key, value) {
                    $('body').find('label[name="name_agm"]').text('ลงชื่อ :' +
                        value.firstname_th + ' ' + value.lastname_th);
                })

                // ผู้ช่วยผู้จัดการทั่วไป
                $.each(data.data4, function(key, value) {
                    $('body').find('label[name="name_gm"]').text('ลงชื่อ :' +
                        value.firstname_th + ' ' + value.lastname_th);
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }

    function approval_agm() {
        $('#btn_approval_agm').text('กำลังทำการยืนยัน...'); //change button text
        $('#btn_approval_agm').attr('disabled', true); //set button disable

        var formdata = $('#form_manp_req_agm').serialize();
        // console.log(formdata)
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Approval_manp/appr_by_agm') ?>",
            data: formdata,
            dataType: 'JSON',
            success: function(data) {
                $('#append-modal_req_agm').html($('#hidden-modal-body_req_agm').html());
                $('#tbl_req_agm').DataTable().ajax.reload(null, false);
                $('body').find('#form_manp_req_agm')[0].reset(); // reset form on modals
                $('#modal_manp_form_req_agm').modal('hide');
                alert('คุณทำการอนุมัติเรียบร้อยแล้ว');

                $('#btn_approval_agm').text('ยืนยัน'); //change button text
                $('#btn_approval_agm').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }
</script>