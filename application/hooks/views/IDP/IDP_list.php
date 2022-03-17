<?php $this->load->view('layouts/header');
$account_id = $this->session->userdata('account_id');
$role = $this->session->userdata('role');
$name_role = $this->session->userdata('name_role');
$office_title = $this->session->userdata('office_title');
$department_title = $this->session->userdata('department_title');
$code = $this->session->userdata('code');
?>

<div class="container-fluid">
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">แผนพัฒนารายบุคคล</h1>
            <h3>(Individual Development Plan)</h3>
            <a href="<?php echo site_url('IDP/IDP_form'); ?>" class="btn btn-primary my-2">แบบฟอร์มแผนพัฒนารายบุคคล</a>
            <a href="<?php echo site_url('IDP/IDP_list'); ?>" class="btn btn-secondary my-2">แผนพัฒนารายบุคคล</a>
        </div>
        <h3>แผนพัฒนารายบุคคล</h3>
        <form id="form-filter">
            <div class="form-row">
                <?php if ($role === 'EMPLOYEE' && $name_role === null): ?>
                <div class="col-md">
                    <select class="form-control" value="" placeholder="เลือก..." id="office_title" disabled>
                        <option value=""><?php echo $office_title; ?></option>
                        <option value="">สำนัก...</option>
                        <?php foreach ($list_office as $rows): ?>
                        <option value=" <?php echo $rows->office_title ?>">
                            <?php echo $rows->office_code . ' ' . $rows->office_title ?></option>;
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-control" placeholder="เลือก..." id="department_title" disabled>
                        <option value=""><?php echo $department_title; ?></option>
                        <option value="">ฝ่าย/แผนก...</option>
                        <?php foreach ($list_department as $rows): ?>
                        <option value="<?php echo $rows->department_title ?>">
                            <?php echo $rows->department_code . ' ' . $rows->department_title ?> </option>;
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <input type="text" value="<?php echo $code; ?>" class="form-control "
                        placeholder="รหัสพนักงาน 6 หลัก" id="code" disabled>
                </div>
                <?php endif;?>

                <?php if ($role === 'EMPLOYEE' && $name_role != null): ?>
                <div class="col-md">
                    <select class="form-control" value="" placeholder="เลือก..." id="office_title">
                        <option value=""><?php echo $office_title; ?></option>
                        <option value="">สำนัก...</option>
                        <?php foreach ($list_office as $rows): ?>
                        <option value="<?php echo $rows->office_title ?>">
                            <?php $rows->office_code . ' ' . $rows->office_title?></option>;
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-control" placeholder="เลือก..." id="department_title">
                        <option value=""><?php echo $department_title; ?></option>
                        <option value="">ฝ่าย/แผนก...</option>
                        <?php foreach ($list_department as $rows): ?>
                        <option value="<?php echo $rows->department_title ?>">
                            <?php echo $rows->department_code . ' ' . $rows->department_title ?></option>';
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col">
                    <input type="text" value="<?php echo $code; ?>" class="form-control "
                        placeholder="รหัสพนักงาน 6 หลัก" id="code">
                </div>
                <?php endif;?>
                <div class="col-auto">
                    <button type="button" id="btn-filter" class="btn btn-primary"><i class="fa fa-search"
                            aria-hidden="true"></i> ค้นหา</button>
                    <button type="button" id="btn-reset" class="btn btn-light"><i class="fa fa-refresh"
                            aria-hidden="true"></i> เครียร์ข้อมูล</button>
                </div>
            </div>
        </form>

        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table_idp" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr>
                                <!-- <th>ลำดับ</th> -->
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>ฝ่าย</th>
                                <th>สังกัด</th>
                                <th>IDP </th>
                                <th>เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <?php foreach ($idp_list as $idp): ?>
                            <tr>
                                <td> <?php echo $idp->code; ?></td>
                                <td> <?php echo $idp->salutation . ' ' . $idp->firstname_th . ' ' . $idp->lastname_th; ?>
                                </td>
                                <td> <?php echo $idp->position; ?></td>
                                <td> <?php echo $idp->department_code . ' ' . $idp->department_title; ?></td>
                                <td> <?php echo $idp->office_code . ' ' . $idp->office_title; ?></td>
                                <td>
                                    <?php if ($idp->idp_file): ?>
                                    <a href="<?php echo base_url('/uploads/idp_emp/' . $idp->idp_file); ?>"
                                        class="btn btn-warning btn-sm " tabindex="-1" role="button">
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> IDP</a>
                                    <?php else: ?>
                                    <a href="#" class="btn btn-warning btn-sm disabled" tabindex="-1" role="button"
                                        aria-disabled="true"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        IDP</a>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <a class="text-light btn btn-sm btn-primary"
                                        onclick="idp_form('<?php echo$idp->code ?>')" role="button">
                                        <i class="fa fa-pencil-square"></i>อับโหลดเอกสาร IDP</a>
                            </tr>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title-idp">Model Title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body form">
                <form action="#" id="form_idp" class="form-horizontal">
                    <div class="form-group col-md-6">
                        <label id="label-file">อับโหลดไฟล์</label>
                        <div class="col-md-9">
                            <input name="idp_file" type="file">
                            <!-- <span class="help-block text-danger"></span> -->
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="btnSave"
                    onclick="save_idp(code)"> <i class="fa fa-floppy-o"></i>
                    บันทึก</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
function idp_form(code) {
    console.log(code)
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title-idp').text(
        'อับโหลดเอกสาร IDP'); // Set Title to Bootstrap modal title
    $('#label-file').text(
        'อับโหลดเอกสาร IDP'); // label file upload
}

function save_idp() {
    $('#btnSave').text('กำลังบันทึก...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable
    var url = "<?php echo site_url('idp/ajax_save_idp') ?>";

    var formData = new FormData($('#form_idp')[0]);
    console.log(formData)
    
    $.ajax({
        url: url + code,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            console.log(data)
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

            $('#btnSave').text('กำลังบันทึก'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('กำลังบันทึก'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });
}
</script>

<?php $this->load->view('layouts/footer');?>