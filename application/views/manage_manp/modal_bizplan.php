<div class="modal fade" id="modal_bizplan_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title-bizplan">Manage Manpower Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal-bizplan">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="send_form_bizplan()" class="btn btn-sm btn-primary">
                    <i class="fa fa-floppy-o"></i> บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body-bizplan" style="display: none;">
    <form action="#" id="form_manpower_bizplan" class="form-horizontal">
        <input type="hidden" value="" name="biz_id" />
        <div class="form-body">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Year : </label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Years" value="<?php echo date('Y')?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Cost Center : </label>
                    <input list="cost_cens" name="cost_cen" id="cost_cen" class="form-control" placeholder="Cost Center">
                    <datalist id="cost_cens">
                        <?php foreach ($cost_centers as $row) :
                            echo '<option value="' . $row->department_code . '">';
                        endforeach; ?>
                    </datalist>
                </div>

                <div class="form-group col-md-5">
                    <label>Cost Center (Position) :</label>
                    <input list="cost_cen_posis" type="text" class="form-control" id="cost_cen_posi" name="cost_cen_posi" placeholder="Cost Center (Position)">
                    <datalist id="cost_cen_posis">
                        <?php foreach ($section as $row) :
                            echo '<option value="' . $row->section_code . '">';
                        endforeach; ?>
                    </datalist>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Level :</label>
                    <input list="levels" name="level" id="level" class="form-control" placeholder="Level">
                    <datalist id="levels">
                        <option value="พนักงานทั่วไป">
                        <option value="เจ้าหน้าที่ Staff">
                        <option value="เจ้าหน้าที่ Officer">
                        <option value="วิศวกร Engineer">
                        <option value="โปรแกรมเมอร์">
                        <option value="หัวหน้ากลุ่ม">
                        <option value="หัวหน้าแผนก">
                        <option value="หัวหน้าส่วน">
                        <option value="ผู้จัดการฝ่าย">
                    </datalist>
                </div>
                <div class="form-group col-md-5">
                    <label>Name of Position (New Bizplan) :</label>
                    <input type="text" class="form-control" id="name_of_posi" name="name_of_posi" placeholder="Name of Position (New Bizplan)">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-">
                    <label>Required amount :</label>
                    <input type="number" class="form-control" id="required_amount" name="required_amount" placeholder="Required amount">
                </div>
                <hr class=" w-100 ml-0 text-center">
            </div>
            <!-- การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ -->
        </div>
    </form>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript">
    function bizplan_from() {
        save_method = 'add_bizplan';
        $('#append-modal-bizplan').html($('#hidden-modal-body-bizplan').html());
        // $('body').find('#idOfModal').find('input:checkbox').removeAttr('checked');
        $('body').find('#form_manpower_bizplan')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('#modal_bizplan_form').modal('show'); // show bootstrap modal
        $('.modal-title-bizplan').val(
            'การขออัตรากำลังคนเพิ่มตามที่ได้รับอนุมัติใน Bizplan Manpower'); // Set Title to Bootstrap modal title

    }

    function send_form_bizplan() {

        $('#btn_save').val('กำลังบันทึกข้อมูล...'); //change button text
        $('#btn_save').attr('disabled', false); //set button disable 

        var url;
        if (save_method == 'add_bizplan') {
            url = "<?php echo site_url('manage_manp/ajax_add_bizplan') ?>";
        } else {
            url = "<?php echo site_url('manage_manp/ajax_update_bizplan') ?>";
        }

        // ajax adding data to database
        var formData = new FormData($('body').find('#form_manpower_bizplan')[0]);
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
                    $('#modal_bizplan_form').modal('hide');
                    $('body').find('#form_manpower_bizplan')[0].reset(); // reset form on modals
                    $('#tbl_bizplan').DataTable().ajax.reload(null, false);
                    // load the url and show modal on success
                    alert(
                        'คุณได้บันทึกข้อมูลการขออัตรากำลังคน เพิ่มตามที่ได้รับอนุมัติใน Bizplan Manpower เรียบร้อยครับ'
                    );
                } else {
                    for (var i = 0; i < value.inputerror.length; i++) {
                        $('[name="' + value.inputerror[i] + '"]').parent().parent().addClass(
                            'has-error'
                        ); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + value.inputerror[i] + '"]').next().val(value.error_string[
                            i]); //select span help-block class set text error string
                    }
                }
                $('#btn_save').val('กำลังบันทึกข้อมูล'); //change button text
                $('#btn_save').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('มีการปัญหารในการใช้งานติดต่อเจ้าหน้าที่ที่ระบบนี้ โทร 1104');
                $('#btn_save').val('บันทึกข้อมูล'); //change button text
                $('#btn_save').attr('disabled', false); //set button enable 
            }
        });
    }

    function edit_bizplan(biz_id) {
        save_method = 'update_bizplan';

        $('#append-modal-bizplan').html($('#hidden-modal-body-bizplan').html());

        $('body').find('#form_manpower_bizplan')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('#modal_bizplan_form').modal('show'); // show bootstrap modal
        $('.modal-title-bizplan').val(
            'การขออัตรากำลังคนเพิ่มตามที่ได้รับอนุมัติใน Bizplan Manpower'); // Set Title to Bootstrap modal title
        $.ajax({
            url: "<?php echo site_url('manage_manp/ajax_edit_bizplan') ?>/" + biz_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(key, value) {
                    $('[name="biz_id"]').val(value.biz_id);
                    $('[name="year"]').val(value.year);
                    $('[name="cost_cen"]').val(value.cost_cen);
                    $('[name="cost_cen_posi"]').val(value.cost_cen_posi);
                    $('[name="level"]').val(value.level);
                    $('[name="position"]').val(value.position);
                    $('[name="name_of_posi"]').val(value.name_of_posi);
                    $('[name="required_amount"]').val(value.required_amount);
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
            }
        });
    }

    function remove_bizplan(biz_id) {
        if (confirm('คุณต้องการนำข้อมูลนี้ออกจากระบบใช่หรือไม่')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('manage_manp/ajax_remove_bizplan') ?>/" + biz_id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#tbl_bizplan').DataTable().ajax.reload(null, false);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(
                        'ไม่สามารถยกเลิกข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
                }
            });
        }
    }
</script>