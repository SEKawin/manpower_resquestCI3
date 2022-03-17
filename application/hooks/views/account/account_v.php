<!-- header -->
<?php $this->load->view('layouts/header'); ?>
<!-- header -->
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>การจัดการผู้ใช้งาน</h1>
        <div class="jumbotron text-left" style="background-color: LightSteelBlue">
            <a href="<?php echo site_url('account/manage');?>" class="btn btn-info" role="button"><i class="fa fa-user"
                    aria-hidden="true"></i> รายการผู้ใช้งาน</a>
            <a href="<?php echo site_url('account/approver_list');?>" class="btn btn-info" role="button"><i
                    class="fa fa-user" aria-hidden="true"></i> รายการผู้อนุมัติต้นสังกัด</a>
            <a href="<?php echo site_url('account/hrd_list');?>" class="btn btn-info" role="button"><i
                    class="fa fa-user" aria-hidden="true"></i> รายการผู้ตรวจสอบและผู้อนุมัติฝ่ายทรัพยากรมนุษย์</a>
            <a href="<?php echo site_url('account/hrd_manager_list');?>" class="btn btn-info" role="button"><i
                    class="fa fa-user" aria-hidden="true"></i> รายการผู้อนุมัติผู้จัดการทั่วไปสำนักพัฒนาองค์กร</a>

        </div>
    </div>
</div>
<!-- End container-fluid -->

<!-- footer -->
<?php $this->load->view('layouts/footer'); ?>
<!-- footer -->