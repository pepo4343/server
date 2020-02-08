<?php

if (!function_exists('affinity_mikado_title_meta_box_map')) {
	function affinity_mikado_title_meta_box_map() {

		$title_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Title', 'affinity'),
				'name'  => 'title_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Show Title Area', 'affinity'),
				'description'   => esc_html__('Disabling this option will turn off page title area', 'affinity'),
				'parent'        => $title_meta_box,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__( 'Yes', 'affinity')
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#mkd_mkd_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#mkd_mkd_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#mkd_mkd_show_title_area_meta_container"
					)
				)
			)
		);

		$show_title_area_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'mkd_show_title_area_meta_container',
				'hidden_property' => 'mkd_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Title Area Type', 'affinity'),
				'description'   => esc_html__('Choose title type', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'standard'   => esc_html__('Standard', 'affinity'),
					'breadcrumb' => esc_html__('Breadcrumb', 'affinity'),
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"standard"   => "",
						"breadcrumb" => "#mkd_mkd_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#mkd_mkd_title_area_type_meta_container",
						"standard"   => "#mkd_mkd_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'mkd_title_area_type_meta_container',
				'hidden_property' => 'mkd_title_area_type_meta',
				'hidden_value'    => '',
				'hidden_values'   => array('breadcrumb'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Enable Breadcrumbs', 'affinity'),
				'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'affinity'),
				'parent'        => $title_area_type_meta_container,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity'),
				),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Title in Grid', 'affinity'),
				'description'   => esc_html__('Set title content to be in grid', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_animation_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Animations', 'affinity'),
				'description'   => esc_html__('Choose an animation for Title Area', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'no'         => esc_html__('No Animation', 'affinity'),
					'right-left' => esc_html__('Text right to left', 'affinity'),
					'left-right' => esc_html__('Text left to right', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_vertial_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Vertical Alignment', 'affinity'),
				'description'   => esc_html__('Specify title vertical alignment', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => '',
					'header_bottom' => esc_html__('From Bottom of Header', 'affinity'),
					'window_top'    => esc_html__('From Window Top', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Horizontal Alignment', 'affinity'),
				'description'   => esc_html__('Specify title horizontal alignment', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => '',
					'left'   => esc_html__('Left', 'affinity'),
					'center' => esc_html__('Center', 'affinity'),
					'right'  => esc_html__('Right', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Title Color', 'affinity'),
				'description' => esc_html__('Choose a color for title text', 'affinity'),
				'parent'      => $show_title_area_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_title_breadcrumb_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Breadcrumb Color', 'affinity'),
				'description' => esc_html__('Choose a color for breadcrumb text', 'affinity'),
				'parent'      => $show_title_area_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'affinity'),
				'description' => esc_html__('Choose a background color for Title Area', 'affinity'),
				'parent'      => $show_title_area_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Hide Background Image', 'affinity'),
				'description'   => esc_html__('Enable this option to hide background image in Title Area', 'affinity'),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd_mkd_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_background_image_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'mkd_hide_background_image_meta_container',
				'hidden_property' => 'mkd_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'affinity'),
				'description' => esc_html__('Choose an Image for Title Area', 'affinity'),
				'parent'      => $hide_background_image_meta_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Background Responsive Image', 'affinity'),
				'description'   => esc_html__('Enabling this option will make Title background image responsive', 'affinity'),
				'parent'        => $hide_background_image_meta_container,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity')
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta"
					),
					"show"       => array(
						""    => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
						"no"  => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);

		$title_area_background_image_responsive_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'mkd_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'mkd_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Background Image in Parallax', 'affinity'),
				'description'   => esc_html__('Enabling this option will make Title background image parallax', 'affinity'),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => '',
					'no'       => esc_html__('No', 'affinity'),
					'yes'      => esc_html__('Yes', 'affinity'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(array(
			'name'        => 'mkd_title_area_height_meta',
			'type'        => 'text',
			'label'       => esc_html__('Height', 'affinity'),
			'description' => esc_html__('Set a height for Title Area', 'affinity'),
			'parent'      => $show_title_area_meta_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		affinity_mikado_create_meta_box_field(array(
			'name'          => 'mkd_disable_title_bottom_border_meta',
			'type'          => 'yesno',
			'label'         => esc_html__('Disable Title Bottom Border', 'affinity'),
			'description'   => esc_html__('This option will disable title area bottom border', 'affinity'),
			'parent'        => $show_title_area_meta_container,
			'default_value' => 'no'
		));

		affinity_mikado_create_meta_box_field(array(
			'name'          => 'mkd_title_area_subtitle_meta',
			'type'          => 'text',
			'default_value' => '',
			'label'         => esc_html__('Subtitle Text', 'affinity'),
			'description'   => esc_html__('Enter your subtitle text', 'affinity'),
			'parent'        => $show_title_area_meta_container,
			'args'          => array(
				'col_width' => 6
			)
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Subtitle Color', 'affinity'),
				'description' => esc_html__('Choose a color for subtitle text', 'affinity'),
				'parent'      => $show_title_area_meta_container
			)
		);

	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_title_meta_box_map');
}