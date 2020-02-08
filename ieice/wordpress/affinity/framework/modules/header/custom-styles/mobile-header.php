<?php

if(!function_exists('affinity_mikado_mobile_header_general_styles')) {
	/**
	 * Generates general custom styles for mobile header
	 */
	function affinity_mikado_mobile_header_general_styles() {
		$mobile_header_styles = array();
		if(affinity_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$mobile_header_styles['height'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_header_height')).'px';
		}

		if(affinity_mikado_options()->getOptionValue('mobile_header_background_color')) {
			$mobile_header_styles['background-color'] = affinity_mikado_options()->getOptionValue('mobile_header_background_color');
		}

		echo affinity_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-header-inner', $mobile_header_styles);
	}

	add_action('affinity_mikado_style_dynamic', 'affinity_mikado_mobile_header_general_styles');
}

if(!function_exists('affinity_mikado_mobile_navigation_styles')) {
	/**
	 * Generates styles for mobile navigation
	 */
	function affinity_mikado_mobile_navigation_styles() {
		$mobile_nav_styles = array();
		if(affinity_mikado_options()->getOptionValue('mobile_menu_background_color')) {
			$mobile_nav_styles['background-color'] = affinity_mikado_options()->getOptionValue('mobile_menu_background_color');
		}

		echo affinity_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-nav', $mobile_nav_styles);

		$mobile_nav_item_styles = array();
		if(affinity_mikado_options()->getOptionValue('mobile_menu_separator_color') !== '') {
			$mobile_nav_item_styles['border-bottom-color'] = affinity_mikado_options()->getOptionValue('mobile_menu_separator_color');
		}

		if(affinity_mikado_options()->getOptionValue('mobile_text_color') !== '') {
			$mobile_nav_item_styles['color'] = affinity_mikado_options()->getOptionValue('mobile_text_color');
		}

		if(affinity_mikado_is_font_option_valid(affinity_mikado_options()->getOptionValue('mobile_font_family'))) {
			$mobile_nav_item_styles['font-family'] = affinity_mikado_get_formatted_font_family(affinity_mikado_options()->getOptionValue('mobile_font_family'));
		}

		if(affinity_mikado_options()->getOptionValue('mobile_font_size') !== '') {
			$mobile_nav_item_styles['font-size'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_font_size')).'px';
		}

		if(affinity_mikado_options()->getOptionValue('mobile_line_height') !== '') {
			$mobile_nav_item_styles['line-height'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_line_height')).'px';
		}

		if(affinity_mikado_options()->getOptionValue('mobile_text_transform') !== '') {
			$mobile_nav_item_styles['text-transform'] = affinity_mikado_options()->getOptionValue('mobile_text_transform');
		}

		if(affinity_mikado_options()->getOptionValue('mobile_font_style') !== '') {
			$mobile_nav_item_styles['font-style'] = affinity_mikado_options()->getOptionValue('mobile_font_style');
		}

		if(affinity_mikado_options()->getOptionValue('mobile_font_weight') !== '') {
			$mobile_nav_item_styles['font-weight'] = affinity_mikado_options()->getOptionValue('mobile_font_weight');
		}

		$mobile_nav_item_selector = array(
			'.mkd-mobile-header .mkd-mobile-nav a',
			'.mkd-mobile-header .mkd-mobile-nav h4'
		);

		echo affinity_mikado_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

		$mobile_nav_item_hover_styles = array();
		if(affinity_mikado_options()->getOptionValue('mobile_text_hover_color') !== '') {
			$mobile_nav_item_hover_styles['color'] = affinity_mikado_options()->getOptionValue('mobile_text_hover_color');
		}

		$mobile_nav_item_selector_hover = array(
			'.mkd-mobile-header .mkd-mobile-nav a:hover',
			'.mkd-mobile-header .mkd-mobile-nav h4:hover'
		);

		echo affinity_mikado_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
	}

	add_action('affinity_mikado_style_dynamic', 'affinity_mikado_mobile_navigation_styles');
}

if(!function_exists('affinity_mikado_mobile_logo_styles')) {
	/**
	 * Generates styles for mobile logo
	 */
	function affinity_mikado_mobile_logo_styles() {
		if(affinity_mikado_options()->getOptionValue('mobile_logo_height') !== '') { ?>
			@media only screen and (max-width: 1000px) {
			<?php echo affinity_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_logo_height')).'px !important')
			); ?>
			}
		<?php }

		if(affinity_mikado_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
			@media only screen and (max-width: 480px) {
			<?php echo affinity_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
			); ?>
			}
		<?php }

		if(affinity_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$max_height = intval(affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
			echo affinity_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-logo-wrapper a', array('max-height' => $max_height));
		}
	}

	add_action('affinity_mikado_style_dynamic', 'affinity_mikado_mobile_logo_styles');
}

if(!function_exists('affinity_mikado_mobile_icon_styles')) {
	/**
	 * Generates styles for mobile icon opener
	 */
	function affinity_mikado_mobile_icon_styles() {
		$mobile_icon_styles = array();
		if(affinity_mikado_options()->getOptionValue('mobile_icon_color') !== '') {
			$mobile_icon_styles['color'] = affinity_mikado_options()->getOptionValue('mobile_icon_color');
		}

		if(affinity_mikado_options()->getOptionValue('mobile_icon_size') !== '') {
			$mobile_icon_styles['font-size'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_icon_size')).'px';
		}

		echo affinity_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-menu-opener a', $mobile_icon_styles);

		if(affinity_mikado_options()->getOptionValue('mobile_icon_hover_color') !== '') {
			echo affinity_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
				array('color' => affinity_mikado_options()->getOptionValue('mobile_icon_hover_color')));
		}
	}

	add_action('affinity_mikado_style_dynamic', 'affinity_mikado_mobile_icon_styles');
}