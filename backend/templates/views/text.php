<div class="scrollmeup_text">
    <div class="scrollmeup_section_header">
        <h3>Text Design</h3>
        <p>Choose Default Switch Icon</p>
    </div>
    <div class="scrollmeup_section_block">
		<?php

		echo $this->fields->generate_checkbox( [
			"class_name"    => "scrollmeup_text_switch",
			"label"         => "Use Text",
			"description"   => "You can use Text bellow the icon.",
			"default_value" => $settings["scrollmeup_text_switch"],
			"onChange" => ""
		] );

		?>
        <div class="scrollmeup_text_settings_sections <?php echo esc_attr($settings["scrollmeup_text_switch"] == "0" ? "deactive" : "") ?>">
			<?php

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_switch_text",
				"type"          => "text",
				"label"         => "Text Bellow Icon",
				"description"   => "Customize default text bellow the icon.",
				"default_value" => $settings["scrollmeup_switch_text"]
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_text_font_size",
				"type"          => "number",
				"label"         => "Font Size",
				"description"   => "Customize default font size of the Switch Text in pixel.",
				"default_value" => $settings["scrollmeup_text_font_size"]
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_text_font_weight",
				"type"          => "number",
				"label"         => "Font Weight",
				"description"   => "Customize default font weight of the Switch Text.",
				"default_value" => $settings["scrollmeup_text_font_weight"]
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_text_font_color",
				"type"          => "color",
				"label"         => "Font Color",
				"description"   => "Set the font color of the Switch Text.",
				"default_value" => $settings["scrollmeup_text_font_color"],
				"data_default" => "#ffffff"
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_checkbox( [
				"class_name"    => "scrollmeup_text_vertical",
				"label"         => "Vertical Text",
				"description"   => "Set the Switch Text Vertically.",
				"default_value" => $settings["scrollmeup_text_vertical"]
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_text_margin_top",
				"type"          => "number",
				"label"         => "Margin Top",
				"description"   => "Customize default margin from the top of the Switch Text in pixel.",
				"default_value" => $settings["scrollmeup_text_margin_top"]
			] );

			echo $this->fields->get_separator();
			echo $this->fields->generate_input_field( [
				"class_name"    => "scrollmeup_text_margin_bottom",
				"type"          => "number",
				"label"         => "Margin Bottom",
				"description"   => "Customize default margin from the bottom of the Switch Text in pixel.",
				"default_value" => $settings["scrollmeup_text_margin_bottom"]
			] );

			?>
        </div>
    </div>
</div>