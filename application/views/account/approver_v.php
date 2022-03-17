<!-- header -->
<?php $this->load->view('layouts/header'); ?>
<!-- header -->

<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>การจัดการผู้ใช้งาน</h1>
        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?php echo site_url('account/manage'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i> รายการผู้ใช้งาน</a>
                <a href="<?php echo site_url('account/approver_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>การจัดการผู้อนุมัติตามองค์กร</a>
                <a href="<?php echo site_url('manage_manp'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>จัดการการขออัตรากำลังคน</a>
            </div>

            <div class="row col-md-12">
                <div class=" page-header">
                    <h3><small>การจัดการผู้อนุมัติตามองค์กร</small></h3>
                    <a class="text-light btn btn-primary" onclick="form_organization()" role="button">
                        <i class="fa fa-user-plus"></i> เพิ่มการจัดการผู้อนุมัติตามองค์กร</a>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-success" id ="organ_chart">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ผู้จัดการฝ่าย</th>
                                <th>ผู้ช่วยผู้จัดการทั่วไป</th>
                                <th>ผู้จัดการทั่วไป</th>
                                <th>เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <?php $i = 0;
                            foreach ($list_organ as $rows) :
                                $i++;
                                echo '<tr>';

                                echo '<td>' . $i . '</td>';
                                echo '<td>';
                                $mgr_code =  $rows->deptmgr_code;
                                $data = $this->account_m->get_account_code($mgr_code);
                                foreach ($data as $mgr) :
                                    echo $mgr->code . ' ' . $mgr->firstname_th . ' ' . $mgr->lastname_th
                                        . '<br>' . $mgr->department_code . ' ' . $mgr->department_title;
                                endforeach;
                                echo '</td>';
                                echo '<td>';
                                $agm_code = $rows->agm_code;
                                $data = $this->account_m->get_account_code($agm_code);
                                foreach ($data as $agm) :
                                    echo $agm->code . ' ' . $agm->firstname_th . ' ' . $agm->lastname_th
                                        . '<br>' . $agm->office_code . ' ' . $agm->office_title;
                                endforeach;
                                echo '</td>';

                                echo '<td>';
                                $gm_code = $rows->gm_code;
                                $data = $this->account_m->get_account_code($gm_code);
                                foreach ($data as $gm) :
                                    echo $gm->code . ' ' . $gm->firstname_th . ' ' . $gm->lastname_th
                                        . '<br>' . $gm->office_code . ' ' . $gm->office_title;
                                endforeach;
                                echo '</td>
                                    <td>
                                      <a href="#" class="btn btn-outline-warning btn-sm active" role="button" aria-pressed="true" onclick="edit_form_organization(' . $rows->id . ')" >แก้ไข</a>
                                      <a href="#" class="btn btn-outline-danger btn-sm active" role="button" aria-pressed="true" onclick="remove_form_organization(' . $rows->id . ')" >ลบ</a>
                                    </td><tr>';
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!--modal Views Manpower Requisition Form -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">การจัดการผู้ใช้งาน</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body" style="display: none;">
    <form action="#" id="form_organization" class="form-horizontal">
        <input type="hidden" value="" name="organ_id">
        <div class="form-body">
            <div class="form-row">
                <div class="form-group">
                    <label class="control-label col-md-12">ผู้จัดการฝ่าย</label>
                    <div class="col-md-12">
                        <input class="form-control" list="list_code" id="deptmgr_code" name="deptmgr_code" placeholder="ระบุ ผู้จัดการฝ่าย">
                        <datalist id="list_code">
                            <?php foreach ($list_emp as $rows) {
                                echo '<option value="' . $rows->code . '"> ' . $rows->code . '' . $rows->firstname_th . ' ' . $rows->astname_th
                                    . '</br>' . $rows->department_code . ' ' . $rows->department_title . '</option>';
                            }
                            ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">ผู้ช่วยผู้จัดการทั่วไป</label>
                    <div class="col-md-12">
                        <input class="form-control" list="list_code" id="agm_code" name="agm_code" placeholder="ระบุ ผู้ช่วยผู้จัดการทั่วไป">
                        <datalist id="list_code">
                            <?php foreach ($list_emp as $rows) {
                                echo '<option value="' . $rows->code . '"> ' . $rows->code . '' . $rows->firstname_th . ' ' . $rows->astname_th
                                    . '</br>' . $rows->department_code . ' ' . $rows->department_title . '</option>';
                            }
                            ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">ผู้จัดการทั่วไป</label>
                    <div class="col-md-12">
                        <input class="form-control" list="list_code" id="gm_code" name="gm_code" placeholder="ระบุ ผู้จัดการทั่วไป">
                        <datalist id="list_code">
                            <?php foreach ($list_emp as $rows) {
                                echo '<option value="' . $rows->code . '"> ' . $rows->code . '' . $rows->firstname_th . ' ' . $rows->astname_th
                                    . '</br>' . $rows->department_code . ' ' . $rows->department_title . '</option>';
                            }
                            ?>
                        </datalist>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End container-fluid -->
<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js') ?>"></script>

<script type="text/javascript">
    function form_organization() {
        save_method = 'add';
        $('#append-modal').html($('#hidden-modal-body').html());
        // $('body').find('#idOfModal').find('input:checkbox').removeAttr('checked');
        $('body').find('#form_organization')[0].reset(); // reset form on modals
        $('.form-row').removeClass('has-error'); // clear error class
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('การจัดการอนุมัติตามองค์กร'); // Set Title to Bootstrap modal title

    }

    function edit_form_organization(id) {
        save_method = 'update';
        console.log(id);
        $('#append-modal').html($('#hidden-modal-body').html());
        // $('body').find('#idOfModal').find('input:checkbox').removeAttr('checked');
        $('body').find('#form_organization')[0].reset(); // reset form on modals
        $('.form-row').removeClass('has-error'); // clear error class
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('แก้ไขการจัดการอนุมัติตามองค์กร'); // Set Title to Bootstrap modal title

        $.ajax({
            url: "<?php echo site_url('account/ajax_edit_manager_organ') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(key, value) {
                    $('[name="organ_id"]').val(value.id);
                    $('[name="deptmgr_code"]').val(value.deptmgr_code);
                    $('[name="agm_code"]').val(value.agm_code);
                    $('[name="gm_code"]').val(value.gm_code);

                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function remove_form_organization(id){
        if (confirm('คุณต้องการลบข้อมูลนี้ออกจากระบบใช่หรือไม่')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('account/ajax_remove_manager_organ') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('ไม่สามารถลบข้อมูลโปรดแจ้งหน้าที่ที่รับผิดชอบระบบ โทร 1104');
                }
            });

        }
    }
    function save() {

        $('#btnSave').text('กำลังบันทึก...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable

        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('account/ajax_add_manager_organ') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo site_url('account/ajax_update_manager_organ') ?>";
        }

        // ajax adding data to database
        var formData = new FormData($('#form_organization')[0]);

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
                alert(' โปรดแจ้งหน้าที่รับผิดชอบระบบ โทร 1104');
                $('#btnSave').text('บันทึก'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable

            }
        });
    }
</script>
<!-- footer -->
<?php $this->load->view('layouts/footer'); ?>
<!-- footer -->