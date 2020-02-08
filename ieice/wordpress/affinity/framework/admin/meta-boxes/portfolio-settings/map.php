<?php

if (!function_exists('affinity_mikado_portfolio_settings_meta_box_map')) {
	function affinity_mikado_portfolio_settings_meta_box_map() {

		$meta_box = affinity_mikado_create_meta_box(array(
			'scope' => 'portfolio-item',
			'title' => esc_html__('Portfolio Settings', 'affinity'),
			'name'  => 'portfolio_settings_meta_box'
		));

		affinity_mikado_create_meta_box_field(array(
			'name'        => 'mkd_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'affinity'),
			'description' => esc_html__('Choose a default type for Single Project pages', 'affinity'),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__('Default', 'affinity'),
				'small-images'      => esc_html__('Portfolio small images', 'affinity'),
				'small-slider'      => esc_html__('Portfolio small slider', 'affinity'),
				'big-images'        => esc_html__('Portfolio big images', 'affinity'),
				'big-slider'        => esc_html__('Portfolio big slider', 'affinity'),
				'custom'            => esc_html__('Portfolio custom', 'affinity'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'affinity'),
				'gallery'           => esc_html__('Portfolio gallery', 'affinity'),
				'video'             => esc_html__('Portfolio video', 'affinity'),
			)
		));

		$all_pages = array();
		$pages = get_pages();
		foreach ($pages as $page) {
			$all_pages[$page->ID] = $page->post_title;
		}

		affinity_mikado_create_meta_box_field(array(
			'name'        => 'portfolio_single_back_to_link',
			'type'        => 'select',
			'label'       => esc_html__('"Back To" Link', 'affinity'),
			'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'affinity'),
			'parent'      => $meta_box,
			'options'     => $all_pages
		));

		$group_portfolio_external_link = affinity_mikado_add_admin_group(array(
			'name'        => 'group_portfolio_external_link',
			'title'       => esc_html__('Portfolio External Link', 'affinity'),
			'description' => esc_html__('Enter URL to link from Portfolio List page', 'affinity'),
			'parent'      => $meta_box
		));

		$row_portfolio_external_link = affinity_mikado_add_admin_row(array(
			'name'   => 'row_gradient_overlay',
			'parent' => $group_portfolio_external_link
		));

		affinity_mikado_create_meta_box_field(array(
			'name'        => 'portfolio_external_link',
			'type'        => 'textsimple',
			'label'       => esc_html__('Link', 'affinity'),
			'description' => '',
			'parent'      => $row_portfolio_external_link,
			'args'        => array(
				'col_width' => 3
			)
		));

		affinity_mikado_create_meta_box_field(array(
			'name'        => 'portfolio_external_link_target',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Target', 'affinity'),
			'description' => '',
			'parent'      => $row_portfolio_external_link,
			'options'     => array(
				'_self'  => esc_html__('Same Window', 'affinity'),
				'_blank' => esc_html__('New Window', 'affinity')
			)
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_masonry_dimenisions',
				'type'        => 'select',
				'label'       => esc_html__('Dimensions for Masonry', 'affinity'),
				'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'affinity'),
				'parent'      => $meta_box,
				'options'     => array(
					'default'            => esc_html__('Default', 'affinity'),
					'large_width'        => esc_html__('Large width', 'affinity'),
					'large_height'       => esc_html__('Large height', 'affinity'),
					'large_width_height' => esc_html__('Large width/height', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Portfolio Background Color', 'affinity'),
				'description' => esc_html__('Portfolio background color used for some portfolio list hover animations', 'affinity'),
				'parent'      => $meta_box,

			)
		);

	}


	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_portfolio_settings_meta_box_map');
}