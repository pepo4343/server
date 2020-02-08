<?php

if(!function_exists('affinity_mikado_page_options_map')) {

	function affinity_mikado_page_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__('Page','affinity'),
				'icon'  => 'icon_document_alt'
			)
		);

		$custom_sidebars = affinity_mikado_get_custom_sidebars();

		$panel_sidebar = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__('Design Style','affinity')
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout','affinity'),
			'description'   => esc_html__('Choose a sidebar layout for pages','affinity'),
			'default_value' => 'default',
			'parent'        => $panel_sidebar,
			'options'       => array(
				'default'          => esc_html__('No Sidebar','affinity'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','affinity'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','affinity'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','affinity'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','affinity'),
			)
		));


		if(count($custom_sidebars) > 0) {
			affinity_mikado_add_admin_field(array(
				'name'        => 'page_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','affinity'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"','affinity'),
				'parent'      => $panel_sidebar,
				'options'     => $custom_sidebars
			));
		}

		affinity_mikado_add_admin_field(array(
			'name'          => 'page_show_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','affinity'),
			'description'   => esc_html__('Enabling this option will show comments on your page', 'affinity'),
			'default_value' => 'yes',
			'parent'        => $panel_sidebar
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_page_options_map', 9);

}