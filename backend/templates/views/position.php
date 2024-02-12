<div class="scrollmeup_position">
    <div class="scrollmeup_section_header">
        <h3>Position Customization</h3>
        <p>Customize the Switch Position for perfect placement</p>
    </div>
    <div class="scrollmeup_section_block">
        <div class="scrollmeup_input_select_setting scrollmeup_switch_position">
            <div class="scrollmeup_input_select_setting_details">
                <h4>Switch Position</h4>
                <p>Choose to screen position where the Switch should be displayed.</p>
            </div>
            <select>
                <option <?php echo esc_attr($settings["scrollmeup_switch_position"] === "top_right" ? "selected" : "") ?> value="top_right">Top Right</option>
                <option <?php echo esc_attr($settings["scrollmeup_switch_position"] === "top_left" ? "selected" : "") ?> value="top_left">Top Left</option>
                <option <?php echo esc_attr($settings["scrollmeup_switch_position"] === "bottom_right" ? "selected" : "") ?> value="bottom_right">Bottom Right</option>
                <option <?php echo esc_attr($settings["scrollmeup_switch_position"] === "bottom_left" ? "selected" : "") ?> value="bottom_left">Bottom Left</option>
            </select>
        </div>

		<?php

		echo $this->fields->get_separator( [
			"class"     => "scrollmeup_switch_margin_top",
			"condition" => [
				"value"  => $settings["scrollmeup_switch_position"],
				"needle" => "top"
			]
		] );
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_margin_top",
			"type"          => "number",
			"label"         => "Margin from Top",
			"description"   => "Customize default margin from the top of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_margin_top"],
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "top"
			]
		] );

		echo $this->fields->get_separator([
			"class"     => "scrollmeup_switch_margin_bottom",
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "bottom"
			]
		]);
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_margin_bottom",
			"type"          => "number",
			"label"         => "Margin from Bottom",
			"description"   => "Customize default margin from the bottom of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_margin_bottom"],
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "bottom"
			]
		] );

		echo $this->fields->get_separator([
			"class"     => "scrollmeup_switch_margin_left",
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "left"
			]
		]);
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_margin_left",
			"type"          => "number",
			"label"         => "Margin from Left",
			"description"   => "Customize default margin from the left of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_margin_left"],
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "left"
			]
		] );

		echo $this->fields->get_separator([
			"class"     => "scrollmeup_switch_margin_right",
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "right"
			]
		]);
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_margin_right",
			"type"          => "number",
			"label"         => "Margin from Right",
			"description"   => "Customize default margin from the right of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_margin_right"],
			"condition" => [
				"value" => $settings["scrollmeup_switch_position"],
				"needle" => "right"
			]
		] );

		echo $this->fields->get_separator();
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_padding_x",
			"type"          => "number",
			"label"         => "Padding X Axis",
			"description"   => "Customize default padding in X axis of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_padding_x"]
		] );

		echo $this->fields->get_separator();
		echo $this->fields->generate_input_field( [
			"class_name"    => "scrollmeup_switch_padding_y",
			"type"          => "number",
			"label"         => "Padding Y Axis",
			"description"   => "Customize default padding in Y axis of the Switch in pixel.",
			"default_value" => $settings["scrollmeup_switch_padding_y"]
		] );

		?>
    </div>
</div>