<?php

if(!function_exists('affinity_mikado_parallax_options_map')) {
	/**
	 * Parallax options page
	 */
	function affinity_mikado_parallax_options_map() {

		$panel_parallax = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax','affinity'),
			)
		);

		affinity_mikado_add_admin_field(array(
			'type'          => 'onoff',
			'name'          => 'parallax_on_off',
			'default_value' => 'off',
			'label'         => esc_html__('Parallax on touch devices','affinity'),
			'description'   => esc_html__('Enabling this option will allow parallax on touch devices','affinity'),
			'parent'        => $panel_parallax
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'parallax_min_height',
			'default_value' => '400',
			'label'         => esc_html__('Parallax Min Height', 'affinity'),
			'description'   => esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'affinity'),
			'args'          => array(
				'col_width' => 3,
				'suffix'    => 'px'
			),
			'parent'        => $panel_parallax
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_parallax_options_map');

}