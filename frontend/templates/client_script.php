<?php if(!is_admin()){ ?>
    <?php if($this->data_settings["scrollmeup_enable_switch"] == "1") { ?>
        <?php include SCROLLMEUP_PATH . "frontend/templates/views/switch.php"; ?>
    <?php } ?>
<?php } ?>