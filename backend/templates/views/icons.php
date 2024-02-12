<div class="scrollmeup_icons">
    <div class="scrollmeup_section_header">
        <h3>Icon Design</h3>
        <p>Choose Default Switch Icon</p>
    </div>

    <div class="scrollmeup_section_block">
        <div class="scrollmeup_switch_customize_container">
            <div class="scrollmeup_switch_items scrollmeup_icon_design scrollmeup_ignore">
				<?php
				$icons = $this->settings->get_all_icons();
				if(sizeof($icons) > 0){
					foreach ($icons as $icon){
						?>
                        <div class="scrollmeup_switch_item  <?php echo esc_attr($settings["scrollmeup_icon_design"] == $icon['name'] ? "active" : "") ?>" data-switch_id="<?php echo esc_attr($icon['name']); ?>">
                            <img width="55px" src="<?php echo esc_url($icon['url']) ?>" alt="">
                        </div>
						<?php
					}
				}
				?>

            </div>
        </div>
    </div>
</div>