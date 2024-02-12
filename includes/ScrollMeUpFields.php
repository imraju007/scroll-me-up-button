<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'ScrollMeUpFields' ) ) {
	class ScrollMeUpFields {
		private $input_fields = [];

		public function generate_input_field( $data = [] ) {
			array_push( $this->input_fields, $data['class_name'] );
			ob_start();
			?>
            <div class="scrollmeup_input_select_setting <?php echo esc_attr( $data['class_name'] ); ?>"
                 style="<?php echo isset( $data['condition'] ) ? esc_attr( strpos( $data['condition']['value'], $data['condition']['needle'] ) !== false ? "" : "display: none;" ) : "" ?>">
                <div class="scrollmeup_input_select_setting_details">
                    <h4><?php echo esc_attr( $data['label'] ); ?></h4>
                    <p><?php echo esc_attr( $data['description'] ); ?></p>
                </div>
                <input type="<?php echo esc_attr( $data['type'] ); ?>" <?php echo esc_attr( isset( $data['data_default'] ) ? "data-default=" . $data['data_default'] : "" ); ?>
                       value="<?php echo esc_attr( $data['default_value'] ); ?>">
            </div>
			<?php
			$data = ob_get_clean();

			return $data;
		}

		public function get_separator( $args = [] ) {
			ob_start();
			?>
            <div class="scrollmeup_section_block_separator <?php echo isset( $args['class'] ) ? $args['class'] . '_separator' : ''; ?>"
                 style="<?php echo isset( $args['condition'] ) ? esc_attr( strpos( $args['condition']['value'], $args['condition']['needle'] ) !== false ? "" : "display: none;" ) : ""; ?>"></div>
			<?php
			$data = ob_get_clean();

			return $data;
		}

		public function generate_checkbox( $data = [] ) {
			array_push( $this->input_fields, $data['class_name'] );
			ob_start();
			?>
            <div class="scrollmeup_checkbox_setting <?php echo esc_attr( $data['class_name'] ); ?>" style="<?php echo isset( $args['condition'] ) ? esc_attr( strpos( $args['condition']['value'], $args['condition']['needle'] ) !== false ? "" : "display: none;" ) : ""; ?>">
                <label class="scrollmeup_checkbox_item scrollmeup_ignore"><input
                            type="checkbox" <?php echo esc_attr( $data["default_value"] == "1" ? "checked" : "" ) ?> <?php echo isset( $data['onChange'] ) ? "onchange='" . $data['onChange'] . "'" : "" ?>><span
                            class="scrollmeup_checkbox_checkmark"></span></label>
                <div class="scrollmeup_checkbox_setting_details">
                    <h4><?php echo esc_attr( $data['label'] ); ?></h4>
                    <p><?php echo esc_attr( $data['description'] ); ?></p>
                </div>
            </div>
			<?php
			$data = ob_get_clean();

			return $data;
		}

		public function get_input_fields() {
			return $this->input_fields;
		}
	}
}