<?php

if (!function_exists('affinity_mikado_boxed_class')) {
	/**
	 * Function that adds classes on body for boxed layout
	 */
	function affinity_mikado_boxed_class($classes) {

		//is boxed layout turned on?
		if (affinity_mikado_get_meta_field_intersect('boxed') == 'yes' && affinity_mikado_get_meta_field_intersect('header_type') !== 'header-vertical') {
			$classes[] = 'mkd-boxed';//
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_boxed_class');
}

if (!function_exists('affinity_mikado_theme_version_class')) {
	/**
	 * Function that adds classes on body for version of theme
	 */
	function affinity_mikado_theme_version_class($classes) {
		$current_theme = wp_get_theme();

		//is child theme activated?
		if ($current_theme->parent()) {
			//add child theme version
			$classes[] = strtolower($current_theme->get('Name')) . '-child-ver-' . $current_theme->get('Version');

			//get parent theme
			$current_theme = $current_theme->parent();
		}

		if ($current_theme->exists() && $current_theme->get('Version') != '') {
			$classes[] = strtolower($current_theme->get('Name')) . '-ver-' . $current_theme->get('Version');
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_theme_version_class');
}

if (!function_exists('affinity_mikado_smooth_scroll_class')) {
	/**
	 * Function that adds classes on body for smooth scroll
	 */
	function affinity_mikado_smooth_scroll_class($classes) {
		//is smooth scroll enabled enabled and not Mac device?
		if (affinity_mikado_options()->getOptionValue('smooth_scroll') == 'yes') {
			$classes[] = 'mkd-smooth-scroll';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_smooth_scroll_class');
}

if (!function_exists('affinity_mikado_smooth_page_transitions_class')) {
	/**
	 * Function that adds classes on body for smooth page transitions
	 */
	function affinity_mikado_smooth_page_transitions_class($classes) {

		if (affinity_mikado_options()->getOptionValue('smooth_page_transitions') == 'yes') {
			$classes[] = 'mkd-smooth-page-transitions';
		} else {
			$classes[] = '';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_smooth_page_transitions_class');
}

if (!function_exists('affinity_mikado_smooth_ajax_class')) {
	/**
	 * Function that adds classes on body for smooth page transitions
	 */
	function affinity_mikado_smooth_ajax_class($classes) {

		if (affinity_mikado_options()->getOptionValue('smooth_page_transitions') == "yes") {
			$classes[] = 'mkd-mimic-ajax';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_smooth_ajax_class');
}

if (!function_exists('affinity_mikado_content_initial_width_body_class')) {
	/**
	 * Function that adds transparent content class to body.
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with transparent content body class added
	 */
	function affinity_mikado_content_initial_width_body_class($classes) {

		if (affinity_mikado_options()->getOptionValue('initial_content_width')) {
			$classes[] = 'mkd-' . affinity_mikado_options()->getOptionValue('initial_content_width');
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_content_initial_width_body_class');
}

if (!function_exists('affinity_mikado_set_blog_body_class')) {
	/**
	 * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with blog body class added
	 */
	function affinity_mikado_set_blog_body_class($classes) {

		if (affinity_mikado_load_blog_assets()) {
			$classes[] = 'mkd-blog-installed';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_set_blog_body_class');
}


if (!function_exists('affinity_mikado_set_portfolio_single_info_follow_body_class')) {
	/**
	 * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with follow portfolio info class body class added
	 */

	function affinity_mikado_set_portfolio_single_info_follow_body_class($classes) {

		if (is_singular('portfolio-item')) {
			if (affinity_mikado_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes') {
				$classes[] = 'mkd-follow-portfolio-info';
			}
		}


		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_set_portfolio_single_info_follow_body_class');
}

if (!function_exists('affinity_mikado_paspartu_body_class')) {
	/**
	 * Function that adds paspartu class to body
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with paspartu class body class added
	 */
	function affinity_mikado_paspartu_body_class($classes) {

		$id = affinity_mikado_get_page_id();
		$paspartu_enabled = affinity_mikado_get_meta_field_intersect('enable_paspartu', $id) == 'yes';
		if ($paspartu_enabled) {
			$classes[] = 'mkd-paspartu-enabled';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_paspartu_body_class');
}

if (!function_exists('affinity_mikado_sidebar_boxed_widgets_body_class')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */

	function affinity_mikado_sidebar_boxed_widgets_body_class($classes) {

		$boxed_widgets = '';
		$page_id = affinity_mikado_get_page_id();

		$boxed_widgets_meta = get_post_meta($page_id, 'mkd_boxed_widgets_meta', true);

		if (($boxed_widgets_meta !== '') && $page_id !== -1) {
			$boxed_widgets = $boxed_widgets_meta !== '' ? $boxed_widgets_meta : '';
		} else {
			if (is_single() && affinity_mikado_options()->getOptionValue('blog_single_boxed_widgets')) {
				$boxed_widgets = esc_attr(affinity_mikado_options()->getOptionValue('blog_single_boxed_widgets'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && affinity_mikado_options()->getOptionValue('archive_boxed_widgets')) {
				$boxed_widgets = esc_attr(affinity_mikado_options()->getOptionValue('archive_boxed_widgets'));
			} elseif (is_page() && affinity_mikado_options()->getOptionValue('page_boxed_widgets')) {
				$boxed_widgets = esc_attr(affinity_mikado_options()->getOptionValue('page_boxed_widgets'));
			}
		}

		if (affinity_mikado_is_product_category() || affinity_mikado_is_product_tag()) {
			$boxed_widgets = get_post_meta(affinity_mikado_get_woo_shop_page_id(), 'mkd_boxed_widgets_meta', true);
		}

		if ($boxed_widgets === 'yes') {
			$classes[] = 'mkd-boxed-widgets';
		}

		return $classes;
	}

	add_filter('body_class', 'affinity_mikado_sidebar_boxed_widgets_body_class');

}