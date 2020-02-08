<?php

if(!function_exists('affinity_mikado_load_elements_map')) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function affinity_mikado_load_elements_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_elements_page',
				'title' => esc_html__('Elements','affinity'),
				'icon'  => 'icon_star_alt'
			)
		);

		do_action('affinity_mikado_options_elements_map');

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_load_elements_map');

}