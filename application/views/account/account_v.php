<!-- header -->
<?php $this->load->view('layouts/header'); ?>
<!-- header -->
<div class="container-fluid">
      <div class="jumbotron text-center">
            <h1>การจัดการผู้ใช้งาน</h1>
            <div class="jumbotron text-left" style="background-color: LightSteelBlue">
                  <a href="<?php echo site_url('account/manage');?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i> รายการผู้ใช้งาน</a>
                  <a href="<?php echo site_url('account/approver_list');?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>การจัดการผู้อนุมัติตามองค์กร</a>
                  <a href="<?php echo site_url('manage_manp');?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>จัดการการขออัตรากำลังคน</a>
            </div>
      </div>
</div>
<!-- End container-fluid -->

<!-- footer -->
<style>
footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      color: white;
      text-align: center;
}
</style>
<?php $this->load->view('layouts/footer'); ?>
<!-- footer -->