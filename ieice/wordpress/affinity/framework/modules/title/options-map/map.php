<?php

if (!function_exists('affinity_mikado_title_options_map')) {

	function affinity_mikado_title_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_title_page',
				'title' => esc_html__('Title', 'affinity'),
				'icon'  => 'icon_archive_alt'
			)
		);

		$panel_title = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title',
				'title' => esc_html__('Title Settings', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Title Area', 'affinity'),
				'description'   => esc_html__('This option will enable/disable Title Area', 'affinity'),
				'parent'        => $panel_title,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkd_show_title_area_container"
				)
			)
		);

		$show_title_area_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $panel_title,
				'name'            => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value'    => 'no'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__('Title Area Type', 'affinity'),
				'description'   => esc_html__('Choose title type', 'affinity'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'standard'   => esc_html__('Standard', 'affinity'),
					'breadcrumb' => esc_html__('Breadcrumb','affinity'),
				),
				'args'          => array(
			"dependence" => true,
			"hide"       => array(
				"standard"   => "",
				"breadcrumb" => "#mkd_title_area_type_container"
			),
			"show"       => array(
				"standard"   => "#mkd_title_area_type_container",
				"breadcrumb" => ""
			)
		)
			)
		);

		$title_area_type_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value'    => '',
				'hidden_values'   => array('breadcrumb'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_enable_breadcrumbs',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Breadcrumbs', 'affinity'),
				'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'affinity'),
				'parent'        => $title_area_type_container,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Title in Grid', 'affinity'),
				'description'   => esc_html__('Set title content to be in grid', 'affinity'),
				'parent'        => $show_title_area_container
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_animation',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Animations', 'affinity'),
				'description'   => esc_html__('Choose an animation for Title Area', 'affinity'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'no'         => esc_html__('No Animation', 'affinity'),
					'right-left' => esc_html__('Text right to left', 'affinity'),
					'left-right' => esc_html__('Text left to right', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_vertial_alignment',
				'type'          => 'select',
				'default_value' => 'header_bottom',
				'label'         => esc_html__('Vertical Alignment', 'affinity'),
				'description'   => esc_html__('Specify title vertical alignment', 'affinity'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'affinity'),
					'window_top'    => esc_html__('From Window Top', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_content_alignment',
				'type'          => 'select',
				'default_value' => 'left',
				'label'         => esc_html__('Horizontal Alignment', 'affinity'),
				'description'   => esc_html__('Specify title horizontal alignment', 'affinity'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'left'   => esc_html__('Left', 'affinity'),
					'center' => esc_html__('Center', 'affinity'),
					'right'  => esc_html__('Right', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'        => 'title_area_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'affinity'),
				'description' => esc_html__('Choose a background color for Title Area', 'affinity'),
				'parent'      => $show_title_area_container
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'        => 'title_area_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'affinity'),
				'description' => esc_html__('Choose an Image for Title Area', 'affinity'),
				'parent'      => $show_title_area_container
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_background_image_responsive',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Background Responsive Image', 'affinity'),
				'description'   => esc_html__('Enabling this option will make Title background image responsive', 'affinity'),
				'parent'        => $show_title_area_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value'    => 'yes'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'          => 'title_area_background_image_parallax',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Background Image in Parallax', 'affinity'),
				'description'   => esc_html__('Enabling this option will make Title background image parallax', 'affinity'),
				'parent'        => $title_area_background_image_responsive_container,
				'options'       => array(
					'no'       => esc_html__('No', 'affinity'),
					'yes'      => esc_html__('Yes', 'affinity'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'        => 'title_area_height',
			'type'        => 'text',
			'label'       => esc_html__('Height', 'affinity'),
			'description' => esc_html__('Set a height for Title Area', 'affinity'),
			'parent'      => $title_area_background_image_responsive_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));


		$panel_typography = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__('Typography', 'affinity'),
			)
		);

		$group_page_title_styles = affinity_mikado_add_admin_group(array(
			'name'        => 'group_page_title_styles',
			'title'       => esc_html__('Title', 'affinity'),
			'description' => esc_html__('Define styles for page title', 'affinity'),
			'parent'      => $panel_typography
		));

		$row_page_title_styles_1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_title_styles_1',
			'parent' => $group_page_title_styles
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_title_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'affinity'),
			'parent'        => $row_page_title_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'affinity'),
			'options'       => affinity_mikado_get_text_transform_array(),
			'parent'        => $row_page_title_styles_1
		));

		$row_page_title_styles_2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_title_styles_2',
			'parent' => $group_page_title_styles,
			'next'   => true
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_title_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'affinity'),
			'parent'        => $row_page_title_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'affinity'),
			'options'       => affinity_mikado_get_font_style_array(),
			'parent'        => $row_page_title_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'affinity'),
			'options'       => affinity_mikado_get_font_weight_array(),
			'parent'        => $row_page_title_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_2
		));

		$group_page_subtitle_styles = affinity_mikado_add_admin_group(array(
			'name'        => 'group_page_subtitle_styles',
			'title'       => esc_html__('Subtitle', 'affinity'),
			'description' => esc_html__('Define styles for page subtitle', 'affinity'),
			'parent'      => $panel_typography
		));

		$row_page_subtitle_styles_1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_subtitle_styles_1',
			'parent' => $group_page_subtitle_styles
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_subtitle_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'affinity'),
			'parent'        => $row_page_subtitle_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'affinity'),
			'options'       => affinity_mikado_get_text_transform_array(),
			'parent'        => $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_subtitle_styles_2',
			'parent' => $group_page_subtitle_styles,
			'next'   => true
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_subtitle_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'affinity'),
			'parent'        => $row_page_subtitle_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'affinity'),
			'options'       => affinity_mikado_get_font_style_array(),
			'parent'        => $row_page_subtitle_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'affinity'),
			'options'       => affinity_mikado_get_font_weight_array(),
			'parent'        => $row_page_subtitle_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = affinity_mikado_add_admin_group(array(
			'name'        => 'group_page_breadcrumbs_styles',
			'title'       => esc_html__('Breadcrumbs', 'affinity'),
			'description' => esc_html__('Define styles for page breadcrumbs', 'affinity'),
			'parent'      => $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_1',
			'parent' => $group_page_breadcrumbs_styles
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'affinity'),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'affinity'),
			'options'       => affinity_mikado_get_text_transform_array(),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_2',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_breadcrumb_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'affinity'),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'affinity'),
			'options'       => affinity_mikado_get_font_style_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'affinity'),
			'options'       => affinity_mikado_get_font_weight_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = affinity_mikado_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_3',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_hovercolor',
			'default_value' => '',
			'label'         => esc_html__('Hover/Active Color', 'affinity'),
			'parent'        => $row_page_breadcrumbs_styles_3
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_title_options_map', 7);

}