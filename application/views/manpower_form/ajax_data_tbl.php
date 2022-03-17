
<?php $this->load->view('manpower_form/modal_manp_form_hr'); ?>
<?php $this->load->view('manpower_form/modal_manp_form_hrm_mgr'); ?>
v
<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    var tbl_manp_form = $('#tbl_manp_form').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_emp_c/ajax_emp_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_emp').on('click', function() {
        tbl_manp_form.ajax.reload();
    });

    //การแสดงของสำหรับหน่วยงานที่ขอ
    var tbl_req_mgr = $('#tbl_req_mgr').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_req_c/ajax_mgr_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_dept').on('click', function() {
        tbl_req_mgr.ajax.reload();
    });

    var tbl_req_agm = $('#tbl_req_agm').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_req_c/ajax_agm_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_agm').on('click', function() {
        tbl_req_agm.ajax.reload();
    });

    var tbl_req_gm = $('#tbl_req_gm').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_req_c/ajax_gm_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_gm').on('click', function() {
        tbl_req_gm.ajax.reload();
    });
    //การแสดงของสำหรับหน่วยงานที่ขอ

    var tbl_hr = $('#tbl_hr').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_hr_c/ajax_hr_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_hr').on('click', function() {
        tbl_hr.ajax.reload();
    });

    var tbl_hr_all = $('#tbl_hr_all').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_hr_c/ajax_hr_all_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_hr_all').on('click', function() {
        tbl_hr_all.ajax.reload();
    });

    //การแสดงของสำหรับสำนักพัฒนาองค์กร
    var tbl_hrm_mgr = $('#tbl_hrm_mgr').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_hrm_c/ajax_hrm_mgr_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_hrm_mgr').on('click', function() {
        tbl_hrm_mgr.ajax.reload();
    });

    var tbl_hrm_agm = $('#tbl_hrm_agm').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_hrm_c/ajax_hrm_agm_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_hrm_agm').on('click', function() {
        tbl_hrm_agm.ajax.reload();
    });

    var tbl_hrm_gm = $('#tbl_hrm_gm').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_hrm_c/ajax_hrm_gm_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_hrm_gm').on('click', function() {
        tbl_hrm_gm.ajax.reload();
    });
    //การแสดงของสำหรับสำนักพัฒนาองค์กร

    // การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ
    var tbl_evp = $('#tbl_evp').DataTable({
        "searching": true,
        "ordering": false,
        "bInfo": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Tbl_server_side/Tbl_vp_c/ajax_evp_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.req_posi_name = $('#req_posi_name').val();
                data.rec_date = $('#rec_date').val();
                data.cost_center = $('#cost_center').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
        // File expor
        dom: 'Bfrtip',
    });
    $('#btn_reload_evp').on('click', function() {
        tbl_evp.ajax.reload();
    });
    // การพิจารณาลงนามอนุมัติของท่านรองประธานกรรมการ

});
</script>