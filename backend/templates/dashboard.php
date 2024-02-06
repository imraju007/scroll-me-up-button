<?php

$settings = $this->settings->get_all_scrollmeup_settings();

?>
<div class="scrollmeup_main">

    <div class="scrollmeup_body">

        <div class="scrollmeup_body_header">
            <button class="scrollmeup_body_header_save_btn scrollmeup_ignore" onclick="scrollmeup_save()">SAVE CHANGES</button>
        </div>

        <div class="scrollmeup_section_block">
	        <?php

	        echo $this->fields->generate_checkbox( [
		        "class_name"    => "scrollmeup_enable_switch",
		        "label"         => "Enable Switch",
		        "description"   => "Check to show the Switch in your Website's frontend.",
		        "default_value" => $settings["scrollmeup_enable_switch"]
	        ] );

	        ?>
        </div>


        <?php include SCROLLMEUP_PATH . "backend/templates/views/icons.php"; ?>
        <?php include SCROLLMEUP_PATH . "backend/templates/views/text.php"; ?>
        <?php include SCROLLMEUP_PATH . "backend/templates/views/position.php"; ?>
        <?php include SCROLLMEUP_PATH . "backend/templates/views/advance.php"; ?>





    </div>

</div>
