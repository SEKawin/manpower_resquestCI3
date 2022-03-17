<!--modal Add Manpower Form For Approval -->
<div class="modal fade" id="modal_form_manpower_edit_edit" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title-edit">Manpower Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_manpower_edit" class="form-horizontal">
                    <input type="hidden" value="" name="hr_no" />
                    <input type="hidden" value="" name="year" />
                    <div class="form-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>No. <u>MRF.</u> :</b> </label>
                                <label name="hr_no"></label> / <label name="year"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>ตำแหน่งที่ขอ :</b></label>
                                <label name="req_posi_name"></label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>จำนวนที่ขอ :</b></label>
                                <label name="rec_num"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>วันที่ต้องการ :</b></label>
                                <label name="rec_date"><label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>COST CENTER :</b></label>
                                <label name="cost_center"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>แผนก/ส่วน/ฝ่าย :</b></label>
                                <label name="sec_div_dept"></label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>แหล่งบุคลากร :</b></label>
                                <label name="sou_of_person"><label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10" id="type_of_rec">
                                <label><b>ประเภทของความต้องการ :</b></label>
                                <label name="type_of_rec"></label>

                                <div id="pos_in_manp">
                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;<b>มีตำแหน่งงานอยู่ในแผนอัตรากำลัง :</b></label>
                                    <label name="pos_in_manp"></label>
                                </div>

                                <div id="reason_of_replaces">
                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;<b>บุคลลที่ถูกทดแทน :</b>
                                        <label name="per_replaced"></label>
                                    </label>
                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;<b>เหตุผลของการทดแทน :</b></label>
                                    <label name="rea_of_replac"></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>ประเภทของพนักงาน :</b></label>
                                <label name="type_emp"></label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label><b>ประเภทการจ้าง :</b></label>
                                <label name="type_of_employment"> </label>

                                <div id="term_of_emp" style="display: none;">
                                    <label><b>ระยะเวลาการจ้าง :</b></label>
                                    <label name="dur_of_emp"></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label><b>เอกสารประกอบใบคำขอ :</b></label>
                            </div>
                            <div class="form-group col-md-3">
                                <label name="attach_doc1">แผนผังหน่วยงาน/แผนก</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label name="attach_doc2">คำบรรยายลักษณะงาน</label>
                            </div>
                            <div class="form-group col-md-4">
                                <label name="attach_doc3">ใบลาออกของพนักงานผู้ลาออก</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="duty_resp">หน้าที่ความรับผิดชอบ:</label>
                                <textarea class="form-control" id="duty_resp" name="duty_resp" placeholder="ระบุ หน้าที่ความรับผิดชอบ"></textarea>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <p><u>คุณสมบัติ</u></p>
                                <div>
                                    <label>เพศ</label>
                                    <input type="text" class="form-control" id="sex_emp" name="sex_emp" placeholder="ระบุ เพศ">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div>
                                    <label>อายุ</label>
                                    <input type="text" class="form-control" id="age_emp" name="age_emp" placeholder="ระบุ อายุ">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div>
                                    <label>การศึกษา</label>
                                    <input type="text" class="form-control" id="education_emp" name="education_emp" placeholder="ระบุ การศึกษา">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div>
                                    <label>ทักษะ/ความชำนาญ</label>
                                    <input type="text" class="form-control" id="skill_expert" name="skill_expert" placeholder="ระบุ ทักษะ/ความชำนาญ">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label>ประสบการณ์</label>
                                <textarea class="form-control" id="experience" name="experience" placeholder="ระบุ ประสบการณ์"></textarea>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label>อื่นๆ</label>
                                <textarea class="form-control" id="other" name="other" placeholder="อื่นๆ"></textarea>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>กรุณาเลือกผู้ขอจ้างให้ตรงกับต้นสังกัด</label>
                            <select class="form-control" id="dept_mgr_code" name="dept_mgr_code">
                                <option value="">[เลือกผู้อนุมัติ]</option>
                                <?php
                                foreach ($app_mgr_agian as $rows) :
                                    $dept_mgr_code = $rows->dept_mgr_code;
                                endforeach;
                                foreach ($list_mgr as $rows) :
                                    if ($rows->code == $dept_mgr_code) :
                                        echo "<option value=\"{$rows->code}\">{$rows->code} คุณ{$rows->firstname_th} {$rows->lastname_th} ฝ่าย {$rows->department_code} {$rows->department_title}</option>";
                                    else :
                                        echo "<option value=\"{$rows->code}\">{$rows->code} คุณ{$rows->firstname_th} {$rows->lastname_th} ฝ่าย {$rows->department_code} {$rows->department_title}</option>";
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <p class="text-center text-danger">**กรุณาตรวจสอบข้อมูลที่ทำกรอกให้เรียบร้อยก่อนกด"ส่งคำขออนุมัติ"
            </p>
            <hr class=" w-100 ml-0 text-center">

            <div class="modal-footer">
                <div id="footer_btn">
                    <button type="button" id="BtnSaveFrom_Edit" onclick="SendForm_Edit()" class="btn btn-primary">
                        <i class="fa fa-floppy-o"></i> ส่งคำขออนุมัติ
                    </button>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--modal Add Manpower Form For Approval -->

<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js') ?>"></script>

<?php $url = base_url('uploads/manp_form'); ?>
<?php $url2 = base_url('uploads/resignation_attach'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init()
    })

    function edit_manpower_form(hr_no) {
        save_method = 'update';
        $('#form_manpower_edit')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form_manpower_edit_edit').modal('show'); // show bootstrap modal
        $('.modal-title-edit').text(
            'แบบฟอร์มขออนุมัติอัตรา/ขอกำลังคนในงบประมาณ'); // Set Title to Bootstrap modal title

        var manp_form = '<?php echo $url; ?>';
        var resignation_attach = '<?php echo $url2; ?>';

        $.ajax({
            url: "<?php echo site_url('manpower_form/view_manp_form') ?>/" + hr_no,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data)
                $.each(data.data1, function(key, value) {
                    $('body').find('[name="hr_no"]').val(value.hr_no);
                    $('body').find('[name="year"]').val(value.year);
                    $('body').find('[name="hr_no"]').val(value.hr_no);
                    $('body').find('label[name="hr_no"]').text(value.hr_no);
                    $('body').find('label[name="year"]').text(value.year);
                    $('body').find('label[name="req_posi_name"]').text(value.req_posi_name);
                    $('body').find('label[name="rec_num"]').text(value.rec_num + ' คน');
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

                    if (value.attach_doc3 == null || value.attach_doc3 == '') {
                        $('body').find('label[name="attach_doc3"]').
                        html('<a href="' + resignation_attach + '/' + value.attach_doc3 +
                            '" download class="btn btn-outline-secondary btn-sm disabled">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> ใบลาออกของพนักงานผู้ลาออก</a>'
                        );

                    } else {
                        $('body').find('label[name="attach_doc3"]').
                        html('<a href="' + resignation_attach + '/' + value.attach_doc3 +
                            '" download ="' + value.hr_no + '-' + value.year +
                            'ใบลาออกของพนักงานผู้ลาออก"class="btn btn-outline-primary btn-sm">' +
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> ใบลาออกของพนักงานผู้ลาออก</a>'
                        );
                    }
                    $('body').find('[name="duty_resp"]').val(value.duty_resp);
                    $('body').find('[name="sex_emp"]').val(value.sex_emp);
                    $('body').find('[name="age_emp"]').val(value.age_emp);
                    $('body').find('[name="education_emp"]').val(value.education_emp);
                    $('body').find('[name="skill_expert"]').val(value.skill_expert);
                    $('body').find('[name="experience"]').val(value.experience);
                    $('body').find('[name="other"]').val(value.other);
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }

    function SendForm_Edit() {
        $('#BtnSaveFrom_Edit').text('กำลังส่งแบบติดตามผล...'); //change button text
        $('#BtnSaveFrom_Edit').attr('disabled', false); //set button disable 

        if (save_method == 'update') {
            var url = "<?php echo site_url('manpower_form/ajax_edit_manpower_form') ?>";
        }
        // ajax adding data to database
        var formData = new FormData($('#form_manpower_edit')[0]);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(value) {
                if (value.status) //if success close modal and reload ajax table
                {
                    // $('#tbl_manp_form').DataTable().ajax.reload();
                    $('#').modal('hide');
                    $('#form_manpower_edit')[0].reset(); // reset form on modals
                    $('#tbl_manp_form').DataTable().ajax.reload(null, false);
                    // load the url and show modal on success
                    alert('คุณส่งแบบฟอร์มขออนุมัติอัตรากำลัง/กำลังคนในงบประมาณเรียบร้อยแล้วครับ');
                } else {
                    for (var i = 0; i < value.inputerror.length; i++) {
                        $('[name="' + value.inputerror[i] + '"]').parent().parent().addClass(
                            'has-error'
                        ); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + value.inputerror[i] + '"]').next().text(value.error_string[
                            i]); //select span help-block class set text error string
                    }
                }
                $('#BtnSaveFrom_Edit').text('ส่งคำขออนุมัติ'); //change button text
                $('#BtnSaveFrom_Edit').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('มีการปัญหารในการใช้งานติดต่อเจ้าหน้าที่ที่ระบบนี้ โทร 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
                $('#BtnSaveFrom_Edit').text('ส่งคำขออนุมัติ'); //change button text
                $('#BtnSaveFrom_Edit').attr('disabled', false); //set button enable 
            }
        });
    }
</script>