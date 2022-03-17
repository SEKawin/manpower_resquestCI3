

<script type="text/javascript">
    $(document).ready(function() {

        // notify of ระยะสั้น 
        var getData =
            $.ajax({ //Alerts ของพนักงาน
                url: "<?php echo site_url('notifications/notify_mgr') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_mgr").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts ของผู้บังคับบัญชา
                url: "<?php echo site_url('notifications/notify_agm') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_agm").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts ของ ผจกง
                url: "<?php echo site_url('notifications/notify_gm') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_gm").html(getData);
                }
            }).responseText;

        // notify of ระยะยาว
        var getData =
            $.ajax({
                url: "<?php echo site_url('notifications/notify_hr') ?>",
                type: 'GET',
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_hr").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts ทั้งหมด
                url: "<?php echo site_url('notifications/notify_hrm_mgr') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_hrm_mgr").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts ทั้งหมด
                url: "<?php echo site_url('notifications/notify_hrm_agm') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_hrm_agm").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts ทั้งหมด
                url: "<?php echo site_url('notifications/notify_od') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_od").html(getData);
                }
            }).responseText;
        var getData =
            $.ajax({ //Alerts ทั้งหมด
                url: "<?php echo site_url('notifications/notify_evp') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_evp").html(getData);
                }
            }).responseText;
        var getData =
            $.ajax({ //Alerts ทั้งหมด
                url: "<?php echo site_url('notifications/notify_svp') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_svp").html(getData);
                }
            }).responseText;

    });
</script>