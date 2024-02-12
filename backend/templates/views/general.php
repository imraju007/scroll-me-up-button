<div class="scrollmeup_general active">
    <div class="scrollmeup_section_header">
        <h3>General</h3>
        <p></p>
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
</div>