<?php

if (!function_exists('affinity_mikado_content_bottom_meta_box_map')) {
	function affinity_mikado_content_bottom_meta_box_map() {

		$content_bottom_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Content Bottom', 'affinity'),
				'name' => 'content_bottom_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name' => 'mkd_enable_content_bottom_area_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Enable Content Bottom Area', 'affinity'),
				'description' => esc_html__('This option will enable Content Bottom area on pages', 'affinity'),
				'parent' => $content_bottom_meta_box,
				'options' => array(
					'no' => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes',  'affinity')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'' => '#mkd_mkd_show_content_bottom_meta_container',
						'no' => '#mkd_mkd_show_content_bottom_meta_container'
					),
					'show' => array(
						'yes' => '#mkd_mkd_show_content_bottom_meta_container'
					)
				)
			)
		);

		$show_content_bottom_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent' => $content_bottom_meta_box,
				'name' => 'mkd_show_content_bottom_meta_container',
				'hidden_property' => 'mkd_enable_content_bottom_area_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no')
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name' => 'mkd_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Sidebar to Display', 'affinity'),
				'description' => esc_html__('Choose a Content Bottom sidebar to display', 'affinity'),
				'options' => affinity_mikado_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'mkd_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__('Display in Grid', 'affinity'),
				'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'affinity'),
				'options' => array(
					'no' => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity')
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'mkd_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'affinity'),
				'description' => esc_html__('Choose a background color for Content Bottom area', 'affinity'),
				'parent' => $show_content_bottom_meta_container
			)
		);


	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_content_bottom_meta_box_map');
}