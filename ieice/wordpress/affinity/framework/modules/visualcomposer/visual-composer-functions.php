<?php

if(!function_exists('affinity_mikado_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function affinity_mikado_vc_grid_elements_enabled() {

		return (affinity_mikado_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('affinity_mikado_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function affinity_mikado_visual_composer_grid_elements() {

		if(!affinity_mikado_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'affinity_mikado_visual_composer_grid_elements', 12);
}

if(!function_exists('affinity_mikado_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function affinity_mikado_grid_elements_ajax_disable() {
		global $affinity_options;

		if(affinity_mikado_vc_grid_elements_enabled()) {
			$affinity_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'affinity_mikado_grid_elements_ajax_disable');
}


if(!function_exists('affinity_mikado_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function affinity_mikado_get_vc_version() {
		if(affinity_mikado_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}

if (!function_exists('affinity_mikado_is_gutenberg_editor')) {
    /**
     * Function that checks if gutenberg editor is installed
     * @return bool
     */
    function affinity_mikado_is_gutenberg_editor() {
        return class_exists( 'WP_Block_Type' );
    }
}

if (!function_exists('affinity_mikado_is_gutenberg_plugin')) {
    /**
     * Function that checks if gutenberg plugin is installed
     * @return bool
     */
    function affinity_mikado_is_gutenberg_plugin() {
        return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
    }
}