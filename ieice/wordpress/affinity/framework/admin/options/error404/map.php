<?php

if(!function_exists('affinity_mikado_error_404_options_map')) {

	function affinity_mikado_error_404_options_map() {

		affinity_mikado_add_admin_page(array(
			'slug'  => '__404_error_page',
			'title' => esc_html__('404 Error Page','affinity'),
			'icon'  => 'icon_info_alt'
		));

		$panel_404_options = affinity_mikado_add_admin_panel(array(
			'page'  => '__404_error_page',
			'name'  => 'panel_404_options',
			'title' => esc_html__('404 Page Option','affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_title',
			'default_value' => '',
			'label'         => esc_html__('Title','affinity'),
			'description'   => esc_html__('Enter title for 404 page','affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_text',
			'default_value' => '',
			'label'         => esc_html__('Text', 'affinity'),
			'description'   => esc_html__('Enter text for 404 page', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => esc_html__('404_back_to_home', 'affinity'),
			'default_value' => '',
			'label'         => esc_html__('Back to Home Button Label', 'affinity'),
			'description'   => esc_html__('Enter label for "Back to Home" button', 'affinity')
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_error_404_options_map', 17);

}