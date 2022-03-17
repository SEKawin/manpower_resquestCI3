<!--modal Add Manpower Form For Approval -->
<div class="modal fade" id="modal_form_manpower" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Manpower Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_manpower" class="form-horizontal">
                    <input type="hidden" value="" name="hr_no" />
                    <div class="form-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>No. <u>MRF.</u></label>
                                <input type="text" class="form-control" name="year" placeholder="<?php echo date("Y"); ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>วันที่ต้องการ (เช่น 31 มกราคม 2564)</label>
                                <input type="text" class="form-control" id="rec_date" name="rec_date" placeholder="วันที่ต้องการ">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>จำนวนที่ต้องการ คน</label>
                                <input type="number" class="form-control" id="rec_num" name="rec_num" placeholder="จำนวนที่ต้องการ">
                                <span class="help-block text-danger"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>แหล่งบุคลากร</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sou_of_person1" name="sou_of_person" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="sou_of_person1">ภายใน</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sou_of_person2" name="sou_of_person" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="sou_of_person2">ภายนอก</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12" id="type_of_rec">
                                <label>ประเภทของความต้องการ <b class="text-danger">(ไม่มีข้อมูลให้เลือกกรุณาติดต่อฝ่าย HR เบอร์ 2002 , 1140)</b></label>
                                <!-- เลือกประเภทของความต้องการ -->

                                <!-- เพิ่มจำนวน -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="type_of_rec1" name="type_of_rec" class="choice_ custom-control-input" value="0">
                                    <label class="custom-control-label" for="type_of_rec1">
                                        เพิ่มอัตรากำลัง</label>
                                    <div id="addittional">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="employment">เพิ่มอัตรากำลัง</label>
                                            </div>
                                            <div id="employment">
                                                <select id="bizplan_sel" name="biz_id" class="custom-select">
                                                    <option selected value="">ระบุ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- เพิ่มจำนวน -->

                                <!-- ทดแทน -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="type_of_rec2" name="type_of_rec" class="choice_ custom-control-input" value="1">
                                    <label class="custom-control-label" for="type_of_rec2">
                                        ทดแทน </label>
                                    <div id="replacement">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="employment">ทดแทน</label>
                                            </div>
                                            <div id="employment">
                                                <select id="replace_sel" name="repl_id" class="custom-select">
                                                    <option selected value="">ระบุ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ทดแทน -->
                                <!-- เลือกประเภทของความต้องการ -->
                            </div>
                        </div>

                        <!-- ประเภทของพนักงาน -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>ประเภทของพนักงาน</label>
                                <div class="form-group col-md-12">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp1" name="type_of_emp" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="type_of_emp1">
                                            ผู้จัดการฝ่าย
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp2" name="type_of_emp" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="type_of_emp2">
                                            หัวหน้ากลุ่ม
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp3" name="type_of_emp" class="custom-control-input" value="3">
                                        <label class="custom-control-label" for="type_of_emp3">
                                            เจ้าหน้าที่(Staff)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp4" name="type_of_emp" class="custom-control-input" value="4">
                                        <label class="custom-control-label" for="type_of_emp4">
                                            เจ้าหน้าที่(Officer)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp5" name="type_of_emp" class="custom-control-input" value="5">
                                        <label class="custom-control-label" for="type_of_emp5">
                                            หัวหน้าแผนก
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp6" name="type_of_emp" class="custom-control-input" value="6">
                                        <label class="custom-control-label" for="type_of_emp6">
                                            หัวหน้าส่วน
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp7" name="type_of_emp" class="custom-control-input" value="7">
                                        <label class="custom-control-label" for="type_of_emp7">
                                            วิศวกร(Engineer)
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp8" name="type_of_emp" class="custom-control-input" value="8">
                                        <label class="custom-control-label" for="type_of_emp8">
                                            พนักงานทั่วไป
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp9" name="type_of_emp" class="custom-control-input" value="9">
                                        <label class="custom-control-label" for="type_of_emp9">
                                            พนักงาน 11 เดือน
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp10" name="type_of_emp" class="custom-control-input" value="10">
                                        <label class="custom-control-label" for="type_of_emp10">
                                            พนักงานรับเหมาแรงงาน (Subcontractor)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_emp11" name="type_of_emp" class="custom-control-input" value="11">
                                        <label class="custom-control-label" for="type_of_emp11">
                                            นักศึกษาฝึกงาน
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ประเภทของพนักงาน -->

                        <!-- ประเภทการจ้าง -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>ประเภทการจ้าง</label>
                                <div class="form-group col-md-12">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_employment1" name="type_of_employment" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="type_of_employment1">
                                            จ้างประจำ
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="type_of_employment2" name="type_of_employment" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="type_of_employment2">
                                            จ้างชั่วคราว
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ประเภทการจ้าง -->

                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label><label class="text-danger">**</label> เอกสารประกอบใบคำขอ <label class="text-danger"><strong>(กรุณาแนบเฉพาะไฟล์ PDF เท่านั้น)</strong></label></label>
                                <input type="hidden" name="attach">
                                <span class="help-block text-danger"></span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="attach_doc1">แผนผังหน่วยงาน/แผนก</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc1" name="attach_doc1" aria-describedby="attach_doc1">
                                        <label class="custom-file-label">Choose file</label>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="attach_doc2">คำบรรยายลักษณะงาน</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attach_doc2" name="attach_doc2" aria-describedby="attach_doc2">
                                        <label class="custom-file-label">Choose file</label>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

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
                                <textarea class="form-control" id="other" name="other" placeholder="อื่น"></textarea>
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
                    <button type="button" id="btnSave_form" onclick="send_form()" class="btn btn-primary">
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

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init()
    })

    function form_manpower(account_code) {
        save_method = 'add';
        $('#form_manpower')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form_manpower').modal('show'); // show bootstrap modal
        $('.modal-title').text(
            'แบบฟอร์มขออนุมัติอัตรา/ขอกำลังคนในงบประมาณ'); // Set Title to Bootstrap modal title

        $('#addittional').hide('show');
        $('#replacement').hide('show');

        //ประเภทของความต้องการ Received Number
        $('#type_of_rec').on('click', '.choice_', function() {
            if ($(this).val() == 0) {
                // เพิ่มจำนวน Addtttional
                $("#addittional").show('slow');
                $("#replacement").hide('slow');
            } else if ($(this).val() == 1) {
                //ทดแทน Replacement
                $("#addittional").hide('slow');
                $("#replacement").show('slow');
            };
        });
        //ประเภทของความต้องการ Received Number

        // ประเภทการจ้าง
        $('#employment').on('click', '.choice_', function() {
            if ($(this).val() == 0) {
                //จ้างประจำ
                $('#temporary').hide('show');
            } else if ($(this).val() == 1) {
                // จ้างชั่วคราว
                $('#temporary').show('show');
            };
        });
        // ประเภทการจ้าง

        $.ajax({
            url: "<?php echo site_url('manpower_form/get_bizplan_replace') ?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                var bizplan = data.bizplan;

                var options = '';
                for (var i = 0; i < bizplan.length; i++) { // Loop through the data & construct the options
                    options += '<option value="' + bizplan[i].biz_id + '">' + bizplan[i].cost_cen_posi + ' ' +
                        bizplan[i].level + ' ' + ' ' + bizplan[i].name_of_posi + ' ' + bizplan[i].required_amount + 'คน </option>';
                }
                // Append to the html
                $('#bizplan_sel').append(options);

                var replace = data.replace;
                var options2 = '';
                for (var i = 0; i < replace.length; i++) { // Loop through the data & construct the options
                    options2 += '<option value="' + replace[i].repl_id + '">' + replace[i].cost_cen_posi + ' ' +
                        replace[i].position_replace + ' ' + replace[i].name_replace + ' ' + replace[i].required_amount + 'คน </option>';
                }
                $('#replace_sel').append(options2);
            }
        });

    }

    function send_form() {
        $('#btnSave_form').text('กำลังส่งแบบติดตามผล...'); //change button text
        $('#btnSave_form').attr('disabled', false); //set button disable 

        var url = "<?php echo site_url('manpower_form/ajax_add_manpower_form') ?>";
        // ajax adding data to database
        var formData = new FormData($('#form_manpower')[0]);

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
                    $('#modal_form_manpower').modal('hide');
                    $('#form_manpower')[0].reset(); // reset form on modals
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
                $('#btnSave_form').text('ส่งคำขออนุมัติ'); //change button text
                $('#btnSave_form').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('มีการปัญหารในการใช้งานติดต่อเจ้าหน้าที่ที่ระบบนี้ โทร 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
                $('#btnSave_form').text('ส่งคำขออนุมัติ'); //change button text
                $('#btnSave_form').attr('disabled', false); //set button enable 
            }
        });
    }
</script>

<?php $this->load->view('manpower_form/modal_manp_form_req_mgr'); ?>
<?php $this->load->view('manpower_form/modal_manp_form_req_agm'); ?>
<?php $this->load->view('manpower_form/modal_manp_form_req_gm'); ?>