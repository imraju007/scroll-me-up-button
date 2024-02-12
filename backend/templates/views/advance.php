<div class="scrollmeup_advance">
    <div class="scrollmeup_section_header">
        <h3>Advanced Customization</h3>
        <p>Customize the Selected Switch Design in Your Way</p>
    </div>
    <div class="scrollmeup_section_block">
        <div class="scrollmeup_switch_customize_container">
			<?php

			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_width_height",
				"type"          => "number",
				"label"         => "Switch Size",
				"description"   => "Set the width of the Floating Switch in pixel. Height will be auto maintained.",
				"default_value" => $settings["scrollmeup_switch_width_height"],
				"data_default" => "60",
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_icon_width",
				"type"          => "number",
				"label"         => "Icon Width",
				"description"   => "Set the width of the Switch Icon in pixel. Height will be auto maintained.",
				"default_value" => $settings["scrollmeup_switch_icon_width"],
				"data_default" => "30",
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_icon_color",
				"type"          => "color",
				"label"         => "Switch Icon Color",
				"description"   => "Set the color of the Floating Switch Icon.",
				"default_value" => $settings["scrollmeup_switch_icon_color"],
				"data_default" => "#ffffff"
			] );

			echo $this->fields->get_separator([
				"class" => "scrollmeup_use_background",
			]);
			echo $this->fields->generate_checkbox( [
				"class_name"    => "scrollmeup_use_background",
				"label"         => "Use Background",
				"description"   => "You can use Background for the Icon.",
				"default_value" => $settings["scrollmeup_use_background"],
				"onChange" => ""
			] );
			echo $this->fields->get_separator( [
				"class"     => "scrollmeup_switch_bg",
				"condition" => [
					"value"  => $settings["scrollmeup_use_background"],
					"needle" => "1"
				]
			] );
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_bg",
				"type"          => "color",
				"label"         => "Switch Background",
				"description"   => "Set the background color of the Switch.",
				"default_value" => $settings["scrollmeup_switch_bg"],
				"data_default" => "#121116",
				"condition" => [
					"value"  => $settings["scrollmeup_use_background"],
					"needle" => "1"
				]
			] );

			echo $this->fields->get_separator( [
				"class"     => "scrollmeup_switch_border_radius",
				"condition" => [
					"value"  => $settings["scrollmeup_use_background"],
					"needle" => "1"
				]
			] );
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_border_radius",
				"type"          => "number",
				"label"         => "Border Radius",
				"description"   => "Set the border radius of the Switch in pixel.",
				"default_value" => $settings["scrollmeup_switch_border_radius"],
				"data_default" => "7",
				"condition" => [
					"value"  => $settings["scrollmeup_use_background"],
					"needle" => "1"
				]
			] );

			?>
        </div>
    </div>
</div>