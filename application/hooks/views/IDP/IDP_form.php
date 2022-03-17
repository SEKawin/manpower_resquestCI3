<?php $this->load->view('layouts/header'); ?>


<div class="container-fluid">
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">แผนพัฒนารายบุคคล</h1>
            <h3>(Individual Development Plan)</h3>
            <a href="<?php echo site_url('IDP/IDP_form'); ?>" class="btn btn-primary my-2">แบบฟอร์มแผนพัฒนารายบุคคล</a>
            <a href="<?php echo site_url('IDP/IDP_list'); ?>" class="btn btn-secondary my-2">แผนพัฒนารายบุคคล</a>
        </div>

        <h3>แบบฟอร์มแผนพัฒนารายบุคคล</h3>

    </div>
</div>

<?php $this->load->view('layouts/footer');?>