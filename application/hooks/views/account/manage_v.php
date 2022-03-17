<!-- header -->
<?php $this->load->view('layouts/header');?>
<!-- header -->

<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>การจัดการผู้ใช้งาน</h1>
        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
            <div class="row col-md-12">
                <div class="page-header">
                    <h3>Account Database <small>รายการผู้ใช้งาน</small></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a class="text-light btn btn-primary" onclick="add_account()" role="button">
                        <i class="fa fa-user-plus"></i> เพิ่มรายชื่อผู้ใช้งาน</a>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table id="table_account" class="table table-striped table-bordered table-hover table-success">
                    <thead>
                        <tr>
                            <th>รหัสพนักงาน</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>รหัสฝ่าย ชื่อฝ่าย </th>
                            <th>สถานะ</th>
                            <th>เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php ?>

<!--modal  Employee -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" style="width:100%">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">account Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_account" class="form-horizontal">
                    <input type="hidden" value="" name="account_id">
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="code">รหัสพนักงาน</label>
                                    <input type="text" id="is_text" class="form-control" name="code"
                                        placeholder="กรุณาระบุรหัสพนักงาน">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>คำนำหน้า</label>
                                    <select class="form-control" placeholder="เลือก..." name="salutation"
                                        placeholder="นาย นาง นางสาว หรือ อื่น ๆ" id="salutation">
                                        <option value="">เลือก...</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="firstname_th">ชื่อ</label>
                                    <input type="text" id="is_text" class="form-control" name="firstname_th"
                                        placeholder="กรุณาระบุชื่อ">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="lastname_th">นามสกุล</label>
                                    <input type="text" id="is_text" class="form-control" name="lastname_th"
                                        placeholder="กรุณาระบุนามสกุล">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รหัสฝ่าย</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="department_code"
                                            id="department_code">
                                            <option value="0">รหัสฝ่าย...</option>
                                            <?php
foreach ($list_department as $rows) {
    echo '<option value="' . $rows->department_code . '"> ' . $rows->department_code . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อฝ่าย</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="department_title"
                                            id="department_title">
                                            <option value="">ฝ่าย...</option>
                                            <?php
foreach ($list_department as $rows) {
    echo '<option value="' . $rows->department_title . '"> ' . $rows->department_title . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>รหัสบัตรประจำตัวประชาชน</label>
                                    <input type="text" id="is_text" class="form-control" name="idcard">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ชื่อ (อังกฤษ)</label>
                                    <input type="text" id="is_text" class="form-control" name="firstname_en">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>นามสกุล (อังกฤษ)</label>
                                    <input type="text" id="is_text" class="form-control" name="lastname_en">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>เพศ</label>
                                    <select class="form-control" placeholder="เลือก..." name="sex">
                                        <option value="">เพศ...</option>
                                        <option value="1">ชาย</option>
                                        <option value="0">หญิง</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <select class="form-control" placeholder="เลือก..." name="position">
                                        <option value="">ตำแหน่ง...</option>
                                        <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
                                        <option value="วิศวกร">วิศวกร</option>
                                        <option value="หัวหน้าแผนก">หัวหน้าแผนก</option>
                                        <option value="หัวหน้าแผนก">หัวหน้าส่วน</option>
                                        <option value="ผู้จัดการฝ่าย">ผู้จัดการฝ่าย</option>
                                        <option value="ผู้จัดการทั่วไป">ผู้จัดการทั่วไป</option>
                                        <option value="ผู้ช่วยผู้จัดการทั่วไป">ผู้ช่วยผู้จัดการทั่วไป</option>
                                        <option value="ผู้ชำนาญการพิเศษ">ผู้ชำนาญการพิเศษ</option>
                                        <option value="กรรมการบริษัท">กรรมการบริษัท</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>วันที่เริ่มงาน</label>
                                    <input type="date" class="form-control" name="startwork">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>วันเกิด</label>
                                    <input type="date" class="form-control" name="birthdate">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>การศึกษา</label>
                                    <select class="form-control" placeholder="เลือก..." name="education">
                                        <option value="">การศึกษา...</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี </option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                        <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                                        <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>อีเมล</label>
                                    <input type="email" class="form-control" name="email">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รหัสแผนก</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="division_code"
                                            id="department_code">
                                            <option value="0">รหัสแผนก..</option>
                                            <?php
foreach ($list_division as $rows) {
    echo '<option value="' . $rows->division_code . '"> ' . $rows->division_code . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อแผนก</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="division_title"
                                            id="department_code">
                                            <option value="0">ชื่อแผนก..</option>
                                            <option value="0">ชื่อส่วน..</option>
                                            <?php
foreach ($list_division as $rows) {
    echo '<option value="' . $rows->division_title . '"> ' . $rows->division_title . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รหัสส่วน</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="section_code"
                                            id="department_code">
                                            <option value="0">รหัสส่วน..</option>

                                            <?php foreach ($list_section as $rows) {
    echo '<option value="' . $rows->section_code . '"> ' . $rows->section_code . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อส่วน</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="section_title"
                                            id="department_code">

                                            <?php
foreach ($list_section as $rows) {
    echo '<option value="' . $rows->section_title . '"> ' . $rows->section_title . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>รหัสสำนัก</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="office_code"
                                            id="department_code">
                                            <option value="0">รหัสสำนัก..</option>
                                            <?php
foreach ($list_office as $rows) {
    echo '<option value="' . $rows->office_code . '"> ' . $rows->office_code . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อสำนัก</label>
                                    <div class="col-md2">
                                        <select class="form-control" placeholder="เลือก..." name="office_title"
                                            id="department_code">
                                            <option value="0">รหัสสำนัก..</option>
                                            <?php
foreach ($list_office as $rows) {
    echo '<option value="' . $rows->office_title . '"> ' . $rows->office_title . '</option>';
}
?>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i
                        class="fa fa-floppy-o"></i>
                    บันทึก</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal Add Employee-->

<!-- Jquery & Datatable -->
<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>

<script type="text/javascript">
var save_method; //for save method string
var table

$(document).ready(function() {
    //datatables
    table = $('#table_account').DataTable({
        // "searching": true,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('account/ajax_list') ?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [-2], //2 last column (file)
                "orderable": false, //set not orderable
            },
        ],
    });
});

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax
}

function add_account() {
    save_method = 'add';
    $('#form_account')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('เพิ่มข้อมูลผู้ใช้งาน'); // Set Title to Bootstrap modal title

}

function edit_account(account_id) {
    save_method = 'update';
    $('#form_account')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url: "<?php echo site_url('account/ajax_edit_account') ?>/" + account_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="account_id"]').val(data.account_id);
            $('[name="idcard"]').val(data.idcard);
            $('[name="code"]').val(data.code);
            $('[name="salutation"]').val(data.salutation);
            $('[name="firstname_th"]').val(data.firstname_th);
            $('[name="lastname_th"]').val(data.lastname_th);
            $('[name="firstname_en"]').val(data.firstname_en);
            $('[name="lastname_en"]').val(data.lastname_en);
            $('[name="sex"]').val(data.sex);
            $('[name="position"]').val(data.position);
            $('[name="startwork"]').val(data.startwork);
            $('[name="birthdate"]').val(data.birthdate);
            $('[name="education"]').val(data.education);
            $('[name="email"]').val(data.email);
            $('[name="section_code"]').val(data.section_code);
            $('[name="section_title"]').val(data.section_title);
            $('[name="division_code"]').val(data.division_code);
            $('[name="division_title"]').val(data.division_title);
            $('[name="department_code"]').val(data.department_code);
            $('[name="department_title"]').val(data.department_title);
            $('[name="office_code"]').val(data.office_code);
            $('[name="office_title"]').val(data.office_title);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('ปรับปรุงข้อมูลผู้ใช้งาน'); // Set title to Bootstrap modal title
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function save() {

    $('#btnSave').text('กำลังบันทึก...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable

    var url;
    if (save_method == 'add') {
        url = "<?php echo site_url('account/ajax_add_account') ?>";
    } else {
        url = "<?php echo site_url('account/ajax_update_account') ?>";
    }

    // ajax adding data to database
    var formData = new FormData($('#form_account')[0]);
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
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                        'has-error'
                    ); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                        i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('บันทึก'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('บันทึก'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

        }
    });
}

function delete_account(account_id) {

    if (confirm('คุณต้องการนำข้อมูลนี้ออกจากระบบใช่หรือไม่')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('account/remove') ?>/" + account_id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });

    }
}
</script>


<!-- footer -->
<?php $this->load->view('layouts/footer');?>
<!-- footer -->