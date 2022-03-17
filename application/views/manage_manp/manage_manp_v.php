<!-- header -->
<?php $this->load->view('layouts/header'); ?>
<!-- header -->
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>การจัดการเพิ่มอัตรากำลัง/ทดแทนอัตรากำลัง</h1>
        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
            <br>
            <div class="container">
                <div class="text-center">
                    <h4>การขออัตรากำลังคนเพิ่มตามที่ได้รับอนุมัติใน Bizplan Manpower <?php echo date("Y"); ?></h4>
                </div>
                <div class="row">
                    <a class="text-light btn btn-primary" onclick="bizplan_from()" role="button">
                        <i class="fa fa-user-plus"></i> เพิ่มอัตรากำลังคน (Bizplan)</a>
                </div>

                <div class="table-responsive-sm">
                    <table id="tbl_bizplan" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Year</th>
                                <th>Cost Center</th>
                                <th>Cost Center (Position)</th>
                                <th>Level</th>
                                <th>Name of Position (New Bizplan)</th>
                                <th>Required Amount</th>
                                <th>Remaining Amount</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container">
                <div class="text-center">
                    <h4>การขออัตรากำลังคนทดแทนอัตรากำลังคนที่ลาออก ปี <?php echo date("Y"); ?></h4>
                </div>
                <div class="row">

                    <a class="text-light btn btn-primary" onclick="replace_form()" role="button">
                        <i class="fa fa-user-plus"></i> ทดแทนอัตรากำลังคน (Replace)</a>
                </div>

                <div class="table-responsive-sm">
                    <table id="tbl_replace" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Year</th>
                                <th>Cost Center</th>
                                <th>Cost Center (Position)</th>
                                <th>Position (Replace)</th>
                                <th>Name (Replace)</th>
                                <th>Required Amount</th>
                                <th>Remaining Amount</th>
                                <th>Resignation Letter</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ?>

<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var tbl_bizplan = $('#tbl_bizplan').DataTable({
            "searching": true,
            "ordering": false,
            "bInfo": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Tbl_server_side/Tbl_manage_c/ajax_bizplan') ?>",
                "type": "POST",
                "data": function(data) {
                    data.year = $('#year').val();
                    data.cost_cen = $('#cost_cen').val();
                    data.cost_cen_posi = $('#cost_cen_posi').val();
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
        $('#btn_filter_biz').click(function() { //button filter event click
            tbl_bizplan.ajax.reload(); //just reload table
        });
        $('#btn_reset_biz').click(function() { //button reset event click
            $('#form_filter_bizplan')[0].reset();
            tbl_bizplan.ajax.reload(); //just reload table
        });

        var tbl_replace = $('#tbl_replace').DataTable({
            "searching": true,
            "ordering": false,
            "bInfo": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Tbl_server_side/Tbl_manage_c/ajax_replace') ?>",
                "type": "POST",
                "data": function(data) {
                    data.year = $('#year').val();
                    data.cost_cen = $('#cost_cen').val();
                    data.cost_cen_posi = $('#cost_cen_posi').val();
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
        $('#btn_filter_replace').click(function() { //button filter event click
            tbl_replace.ajax.reload(); //just reload table
        });
        $('#btn_reset_replace').click(function() { //button reset event click
            $('#form_filter_replace')[0].reset();
            tbl_replace.ajax.reload(); //just reload table
        });
    });
</script>



<?php $this->load->view('manage_manp/modal_bizplan'); ?>
<?php $this->load->view('manage_manp/modal_replace'); ?>

<!-- footer -->
<?php $this->load->view('layouts/footer'); ?>
<!-- footer