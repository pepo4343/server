<?php
if (!function_exists('affinity_mikado_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function affinity_mikado_register_side_area_sidebar() {

		register_sidebar(array(
			'name'          => esc_html__('Side Area', 'affinity'),
			'id'            => 'sidearea', //TODO Change name of sidebar
			'description'   => esc_html__('Side Area', 'affinity'),
			'before_widget' => '<div id="%1$s" class="widget mkd-sidearea %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-sidearea-widget-title">',
			'after_title'   => '</h4>'
		));

	}

	add_action('widgets_init', 'affinity_mikado_register_side_area_sidebar');

}

if (!function_exists('affinity_mikado_side_menu_body_class')) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function affinity_mikado_side_menu_body_class($classes) {

		if (is_active_widget(false, false, 'mkd_side_area_opener')) {

			if (affinity_mikado_options()->getOptionValue('side_area_type')) {

				$classes[] = 'mkd-' . affinity_mikado_options()->getOptionValue('side_area_type');

				if (affinity_mikado_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'mkd-' . affinity_mikado_options()->getOptionValue('side_area_slide_with_content_width');

				}

			}

		}

		return $classes;

	}

	add_filter('body_class', 'affinity_mikado_side_menu_body_class');
}


if (!function_exists('affinity_mikado_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function affinity_mikado_get_side_area() {

		if (is_active_widget(false, false, 'mkd_side_area_opener')) {

			$parameters = array(
				'show_side_area_title' => affinity_mikado_options()->getOptionValue('side_area_title') !== '' ? true : false,
				//Dont show title if empty
			);

			affinity_mikado_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('affinity_mikado_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function affinity_mikado_get_side_area_title() {

		$parameters = array(
			'side_area_title' => affinity_mikado_options()->getOptionValue('side_area_title')
		);

		affinity_mikado_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if (!function_exists('affinity_mikado_get_side_menu_icon_html')) {
	/**
	 * Function that outputs html for side area icon opener.
	 * Uses $affinity_IconCollections global variable
	 * @param $styles
	 * @return string generated html
	 */
	function affinity_mikado_get_side_menu_icon_html($styles = array()) {

		$icon_html = '';

		$icon_html = '<span class="mkd-side-area-icon">
                        <span ' . affinity_mikado_get_inline_style($styles) . ' class="mkd-sai mkd-sai-first-line"></span>
                        <span ' . affinity_mikado_get_inline_style($styles) . ' class="mkd-sai mkd-sai-second-line"></span>
                        <span ' . affinity_mikado_get_inline_style($styles) . ' class="mkd-sai mkd-sai-third-line"></span>
                      </span>';


		return $icon_html;
	}
}