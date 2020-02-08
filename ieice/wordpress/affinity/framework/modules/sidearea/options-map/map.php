<?php

if (!function_exists('affinity_mikado_sidearea_options_map')) {

	function affinity_mikado_sidearea_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__('Side Area', 'affinity'),
				'icon'  => 'icon_menu'
			)
		);

		$side_area_panel = affinity_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'affinity'),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'select',
				'name'          => 'side_area_type',
				'default_value' => 'side-menu-slide-with-content',
				'label'         => esc_html__('Side Area Type', 'affinity'),
				'description'   => esc_html__('Choose a type of Side Area', 'affinity'),
				'options'       => array(
					'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'affinity'),
					'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'affinity'),
					'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'affinity'),
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'side-menu-slide-from-right'       => '#mkd_side_area_slide_with_content_container',
						'side-menu-slide-with-content'     => '#mkd_side_area_width_container',
						'side-area-uncovered-from-content' => '#mkd_side_area_width_container, #mkd_side_area_slide_with_content_container'
					),
					'show'       => array(
						'side-menu-slide-from-right'       => '#mkd_side_area_width_container',
						'side-menu-slide-with-content'     => '#mkd_side_area_slide_with_content_container',
						'side-area-uncovered-from-content' => ''
					)
				)
			)
		);

		$side_area_width_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $side_area_panel,
				'name'            => 'side_area_width_container',
				'hidden_property' => 'side_area_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'side-menu-slide-with-content',
					'side-area-uncovered-from-content'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_width_container,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__('Side Area Width', 'affinity'),
				'description'   => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)', 'affinity'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_width_container,
				'type'          => 'color',
				'name'          => 'side_area_content_overlay_color',
				'default_value' => '',
				'label'         => esc_html__('Content Overlay Background Color', 'affinity'),
				'description'   => esc_html__('Choose a background color for a content overlay', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_width_container,
				'type'          => 'text',
				'name'          => 'side_area_content_overlay_opacity',
				'default_value' => '',
				'label'         => esc_html__('Content Overlay Background Transparency', 'affinity'),
				'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		$side_area_slide_with_content_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $side_area_panel,
				'name'            => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_slide_with_content_container,
				'type'          => 'select',
				'name'          => 'side_area_slide_with_content_width',
				'default_value' => 'width-470',
				'label'         => esc_html__('Side Area Width', 'affinity'),
				'description'   => esc_html__('Choose width for Side Area', 'affinity'),
				'options'       => array(
					'width-270' => '270px',
					'width-370' => '370px',
					'width-470' => '470px'
				)
			)
		);

		affinity_mikado_add_admin_field(array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_bakground_image',
				'label'       => esc_html__('Side Area Background Image', 'affinity'),
				'description' => esc_html__('Choose background image for Side Area', 'affinity'),
			)
		);

//init icon pack hide and show array. It will be populated dinamically from collections array
		$side_area_icon_pack_hide_array = array();
		$side_area_icon_pack_show_array = array();

//do we have some collection added in collections array?
		if (is_array(affinity_mikado_icon_collections()->iconCollections) && count(affinity_mikado_icon_collections()->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$side_area_icon_collections_params = affinity_mikado_icon_collections()->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach (affinity_mikado_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
				$side_area_icon_pack_hide_array[$dep_collection_key] = '';

				//we need to include only current collection in show string as it is the only one that needs to show
				$side_area_icon_pack_show_array[$dep_collection_key] = '#mkd_side_area_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($side_area_icon_collections_params as $side_area_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($side_area_icon_collections_param !== $dep_collection_object->param) {
						$side_area_icon_pack_hide_array[$dep_collection_key] .= '#mkd_side_area_icon_' . $side_area_icon_collections_param . '_container,';
					}
				}

				//remove remaining ',' character
				$side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
			}

		}

		$side_area_icon_style_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__('Side Area Icon Style', 'affinity'),
				'description' => esc_html__('Define styles for Side Area icon', 'affinity'),
			)
		);

		$side_area_icon_style_row1 = affinity_mikado_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_icon_color',
				'default_value' => '',
				'label'         => esc_html__('Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_icon_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Hover Color', 'affinity'),
			)
		);

		$side_area_icon_style_row2 = affinity_mikado_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row2,
				'type'          => 'colorsimple',
				'name'          => 'side_area_light_icon_color',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Icon Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row2,
				'type'          => 'colorsimple',
				'name'          => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Icon Hover Color', 'affinity'),
			)
		);

		$side_area_icon_style_row3 = affinity_mikado_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row3',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row3,
				'type'          => 'colorsimple',
				'name'          => 'side_area_dark_icon_color',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Icon Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_icon_style_row3,
				'type'          => 'colorsimple',
				'name'          => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Icon Hover Color', 'affinity'),
			)
		);

		$icon_spacing_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'icon_spacing_group',
				'title'       => esc_html__('Side Area Icon Spacing', 'affinity'),
				'description' => esc_html__('Define padding and margin for side area icon', 'affinity'),
			)
		);

		$icon_spacing_row = affinity_mikado_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name'   => 'icon_spancing_row',
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_padding_left',
				'default_value' => '',
				'label'         => esc_html__('Padding Left', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_padding_right',
				'default_value' => '',
				'label'         => esc_html__('Padding Right', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_margin_left',
				'default_value' => '',
				'label'         => esc_html__('Margin Left', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_margin_right',
				'default_value' => '',
				'label'         => esc_html__('Margin Right', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'yesno',
				'name'          => 'side_area_icon_border_yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Icon Border', 'affinity'),
				'descritption'  => esc_html__('Enable border around icon', 'affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_side_area_icon_border_container'
				)
			)
		);

		$side_area_icon_border_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $side_area_panel,
				'name'            => 'side_area_icon_border_container',
				'hidden_property' => 'side_area_icon_border_yesno',
				'hidden_value'    => 'no'
			)
		);

		$border_style_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_icon_border_container,
				'name'        => 'border_style_group',
				'title'       => esc_html__('Border Style', 'affinity'),
				'description' => esc_html__('Define styling for border around icon', 'affinity'),
			)
		);

		$border_style_row_1 = affinity_mikado_add_admin_row(
			array(
				'parent' => $border_style_group,
				'name'   => 'border_style_row_1',
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $border_style_row_1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_icon_border_color',
				'default_value' => '',
				'label'         => esc_html__('Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $border_style_row_1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_icon_border_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Hover Color', 'affinity'),
			)
		);

		$border_style_row_2 = affinity_mikado_add_admin_row(
			array(
				'parent' => $border_style_group,
				'name'   => 'border_style_row_2',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $border_style_row_2,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_border_width',
				'default_value' => '',
				'label'         => esc_html__('Width', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $border_style_row_2,
				'type'          => 'textsimple',
				'name'          => 'side_area_icon_border_radius',
				'default_value' => '',
				'label'         => esc_html__('Radius', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $border_style_row_2,
				'type'          => 'selectsimple',
				'name'          => 'side_area_icon_border_style',
				'default_value' => '',
				'label'         => esc_html__('Style', 'affinity'),
				'options'       => array(
					'solid'  => esc_html__('Solid', 'affinity'),
					'dashed' => esc_html__('Dashed', 'affinity'),
					'dotted' => esc_html__('Dotted', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__('Text Aligment', 'affinity'),
				'description'   => esc_html__('Choose text aligment for side area', 'affinity'),
				'options'       => array(
					'center' => esc_html__('Center', 'affinity'),
					'left'   => esc_html__('Left', 'affinity'),
					'right'  => esc_html__('Right', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_title',
				'default_value' => '',
				'label'         => esc_html__('Side Area Title', 'affinity'),
				'description'   => esc_html__('Enter a title to appear in Side Area', 'affinity'),
				'args'          => array(
					'col_width' => 3,
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'color',
				'name'          => 'side_area_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'affinity'),
				'description'   => esc_html__('Choose a background color for Side Area', 'affinity'),
			)
		);

		$padding_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'padding_group',
				'title'       => esc_html__('Padding', 'affinity'),
				'description' => esc_html__('Define padding for Side Area', 'affinity'),
			)
		);

		$padding_row = affinity_mikado_add_admin_row(
			array(
				'parent' => $padding_group,
				'name'   => 'padding_row',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $padding_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_padding_top',
				'default_value' => '',
				'label'         => esc_html__('Top Padding', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $padding_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_padding_right',
				'default_value' => '',
				'label'         => esc_html__('Right Padding', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $padding_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_padding_bottom',
				'default_value' => '',
				'label'         => esc_html__('Bottom Padding', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $padding_row,
				'type'          => 'textsimple',
				'name'          => 'side_area_padding_left',
				'default_value' => '',
				'label'         => esc_html__('Left Padding', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'select',
				'name'          => 'side_area_close_icon',
				'default_value' => 'light',
				'label'         => esc_html__('Close Icon Style', 'affinity'),
				'description'   => esc_html__('Choose a type of close icon', 'affinity'),
				'options'       => array(
					'light' => esc_html__('Light', 'affinity'),
					'dark'  => esc_html__('Dark', 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_close_icon_size',
				'default_value' => '',
				'label'         => esc_html__('Close Icon Size', 'affinity'),
				'description'   => esc_html__('Define close icon size', 'affinity'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$title_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'title_group',
				'title'       => esc_html__('Title', 'affinity'),
				'description' => esc_html__('Define Style for Side Area title', 'affinity'),
			)
		);

		$title_row_1 = affinity_mikado_add_admin_row(
			array(
				'parent' => $title_group,
				'name'   => 'title_row_1',
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_title_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_1,
				'type'          => 'textsimple',
				'name'          => 'side_area_title_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_1,
				'type'          => 'textsimple',
				'name'          => 'side_area_title_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_1,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_title_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'affinity'),
				'options'       => affinity_mikado_get_text_transform_array()
			)
		);

		$title_row_2 = affinity_mikado_add_admin_row(
			array(
				'parent' => $title_group,
				'name'   => 'title_row_2',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_2,
				'type'          => 'fontsimple',
				'name'          => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_title_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'affinity'),
				'options'       => affinity_mikado_get_font_style_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_title_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'affinity'),
				'options'       => affinity_mikado_get_font_weight_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $title_row_2,
				'type'          => 'textsimple',
				'name'          => 'side_area_title_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'text_group',
				'title'       => esc_html__('Text', 'affinity'),
				'description' => esc_html__('Define Style for Side Area text', 'affinity'),
			)
		);

		$text_row_1 = affinity_mikado_add_admin_row(
			array(
				'parent' => $text_group,
				'name'   => 'text_row_1',
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_1,
				'type'          => 'colorsimple',
				'name'          => 'side_area_text_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_1,
				'type'          => 'textsimple',
				'name'          => 'side_area_text_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_1,
				'type'          => 'textsimple',
				'name'          => 'side_area_text_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_1,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_text_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'affinity'),
				'options'       => affinity_mikado_get_text_transform_array()
			)
		);

		$text_row_2 = affinity_mikado_add_admin_row(
			array(
				'parent' => $text_group,
				'name'   => 'text_row_2',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_2,
				'type'          => 'fontsimple',
				'name'          => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_2,
				'type'          => 'fontsimple',
				'name'          => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_text_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'affinity'),
				'options'       => affinity_mikado_get_font_style_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'side_area_text_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'affinity'),
				'options'       => affinity_mikado_get_font_weight_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $text_row_2,
				'type'          => 'textsimple',
				'name'          => 'side_area_text_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = affinity_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'widget_links_group',
				'title'       => esc_html__('Link Style', 'affinity'),
				'description' => esc_html__('Define styles for Side Area widget links', 'affinity'),
			)
		);

		$widget_links_row_1 = affinity_mikado_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name'   => 'widget_links_row_1',
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_1,
				'type'          => 'colorsimple',
				'name'          => 'sidearea_link_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_1,
				'type'          => 'textsimple',
				'name'          => 'sidearea_link_font_size',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_1,
				'type'          => 'textsimple',
				'name'          => 'sidearea_link_line_height',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_1,
				'type'          => 'selectblanksimple',
				'name'          => 'sidearea_link_text_transform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'affinity'),
				'options'       => affinity_mikado_get_text_transform_array()
			)
		);

		$widget_links_row_2 = affinity_mikado_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name'   => 'widget_links_row_2',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_2,
				'type'          => 'fontsimple',
				'name'          => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'sidearea_link_font_style',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'affinity'),
				'options'       => affinity_mikado_get_font_style_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_2,
				'type'          => 'selectblanksimple',
				'name'          => 'sidearea_link_font_weight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'affinity'),
				'options'       => affinity_mikado_get_font_weight_array()
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_2,
				'type'          => 'textsimple',
				'name'          => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'affinity'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = affinity_mikado_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name'   => 'widget_links_row_3',
				'next'   => true
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $widget_links_row_3,
				'type'          => 'colorsimple',
				'name'          => 'sidearea_link_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Hover Color', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'yesno',
				'name'          => 'side_area_enable_bottom_border',
				'default_value' => 'no',
				'label'         => esc_html__('Border Bottom on Elements', 'affinity'),
				'description'   => esc_html__('Enable border bottom on elements in side area', 'affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_side_area_bottom_border_container'
				)
			)
		);

		$side_area_bottom_border_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $side_area_panel,
				'name'            => 'side_area_bottom_border_container',
				'hidden_property' => 'side_area_enable_bottom_border',
				'hidden_value'    => 'no'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $side_area_bottom_border_container,
				'type'          => 'color',
				'name'          => 'side_area_bottom_border_color',
				'default_value' => '',
				'label'         => esc_html__('Border Bottom Color', 'affinity'),
				'description'   => esc_html__('Choose color for border bottom on elements in sidearea', 'affinity'),
			)
		);

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_sidearea_options_map', 5);

}