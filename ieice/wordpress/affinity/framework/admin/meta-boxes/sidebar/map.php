<?php

if (!function_exists('affinity_mikado_sidebar_meta_box_map')) {
	function affinity_mikado_sidebar_meta_box_map() {

		$mkd_custom_sidebars = affinity_mikado_get_custom_sidebars();

		$mkd_sidebar_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Sidebar', 'affinity'),
				'name'  => 'sidebar_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_sidebar_meta',
				'type'        => 'select',
				'label'       => esc_html__('Layout', 'affinity'),
				'description' => esc_html__('Choose the sidebar layout', 'affinity'),
				'parent'      => $mkd_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__('Default', 'affinity'),
					'no-sidebar'       => esc_html__('No Sidebar', 'affinity'),
					'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'affinity'),
					'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'affinity'),
					'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'affinity'),
					'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_boxed_widgets_meta',
				'type'    => 'selectblank',
				'label'   => esc_html__('Boxed Widgets', 'affinity'),
				'parent'  => $mkd_sidebar_meta_box,
				'options' => array(
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity')
				)
			)
		);

		if (count($mkd_custom_sidebars) > 0) {
			affinity_mikado_create_meta_box_field(array(
				'name'        => 'mkd_custom_sidebar_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Choose Widget Area in Sidebar', 'affinity'),
				'description' => esc_html__('Choose Custom Widget area to display in Sidebar', 'affinity'),
				'parent'      => $mkd_sidebar_meta_box,
				'options'     => $mkd_custom_sidebars
			));
		}

	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_sidebar_meta_box_map');
}