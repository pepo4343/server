<?php

if (!function_exists('affinity_mikado_general_meta_box_map')) {
	function affinity_mikado_general_meta_box_map() {

		$general_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('General', 'affinity'),
				'name'  => 'general_meta'
			)
		);


		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_first_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Page Main Color', 'affinity'),
				'description'   => esc_html__('Choose page main color', 'affinity'),
				'parent'        => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_page_background_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Page Background Color', 'affinity'),
				'description'   => esc_html__('Choose background color for page content', 'affinity'),
				'parent'        => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(array(
			'name'          => 'mkd_comments_background_color_meta',
			'type'          => 'color',
			'label'         => esc_html__('Comments Background Color', 'affinity'),
			'description'   => esc_html__('Choose comments background color', 'affinity'),
			'parent'        => $general_meta_box,
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_page_padding_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Page Padding', 'affinity'),
				'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'affinity'),
				'parent'        => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Always put content behind header', 'affinity'),
				'description'   => esc_html__('Enabling this option will put page content behind page header', 'affinity'),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_enable_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Passepartout', 'affinity'),
				'description'   => esc_html__('Enabling this option will display passepartout around site content', 'affinity'),
				'parent'        => $general_meta_box,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#mkd_mkd_paspartu_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#mkd_mkd_paspartu_meta_container',
						'no'  => '',
						'yes' => '#mkd_mkd_paspartu_meta_container'
					)
				)
			)
		);

		$paspartu_meta_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'mkd_paspartu_meta_container',
				'hidden_property' => 'mkd_enable_paspartu_meta',
				'hidden_values'   => array('', 'no')
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_paspartu_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Color', 'affinity'),
				'description'   => esc_html__('Choose passepartout color. Default value is #fff', 'affinity'),
				'parent'        => $paspartu_meta_container,
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_paspartu_size_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Size', 'affinity'),
				'description'   => esc_html__('Enter size amount for passepartout.Default value is 15px', 'affinity'),
				'parent'        => $paspartu_meta_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_page_slider_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Slider Shortcode', 'affinity'),
				'description'   => esc_html__('Paste your slider shortcode here', 'affinity'),
				'parent'        => $general_meta_box
			)
		);

		if (affinity_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'yes') {
			affinity_mikado_create_meta_box_field(
				array(
					'name'          => 'mkd_page_transition_type',
					'type'          => 'selectblank',
					'label'         => esc_html__('Page Transition', 'affinity'),
					'description'   => esc_html__('Choose the type of transition to this page', 'affinity'),
					'parent'        => $general_meta_box,
					'default_value' => '',
					'options'       => array(
						'no-animation' => esc_html__('No animation', 'affinity'),
						'fade'         => esc_html__('Fade', 'affinity')
					)
				)
			);
		}

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_page_comments_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Show Comments', 'affinity'),
				'description' => esc_html__('Enabling this option will show comments on your page', 'affinity'),
				'parent'      => $general_meta_box,
                'default_value' => '',
				'options'     => array(
					'yes' => esc_html__('Yes', 'affinity'),
					'no'  => esc_html__('No', 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_boxed_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Boxed Layout', 'affinity'),
				'description'   => '',
				'parent'        => $general_meta_box,
				'options'       => array(
					''    => '',
					'yes' => esc_html__('Yes', 'affinity'),
					'no'  => esc_html__('No', 'affinity'),
				),
				'args'          => array(
					"dependence" => true,
					'show'       => array(
						''    => '',
						'yes' => '#mkd_mkd_boxed_container_meta',
						'no'  => '',

					),
					'hide'       => array(
						''    => '#mkd_mkd_boxed_container_meta',
						'yes' => '',
						'no'  => '#mkd_mkd_boxed_container_meta',
					)
				)
			)
		);

		$boxed_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'mkd_boxed_container_meta',
				'hidden_property' => 'mkd_boxed_meta',
				'hidden_values'   => array('', 'no')
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__('Page Background Color', 'affinity'),
				'description' => esc_html__('Choose the page background color outside box.', 'affinity'),
				'parent'      => $boxed_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Pattern', 'affinity'),
				'description' => esc_html__('Choose an image to be used as background pattern', 'affinity'),
				'parent'      => $boxed_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'affinity'),
				'description' => esc_html__('Choose an image to be displayed in background', 'affinity'),
				'parent'      => $boxed_container,
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__('Background Image Attachment', 'affinity'),
				'description'   => esc_html__('Choose background image attachment if background image option is set', 'affinity'),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__('Fixed', 'affinity'),
					'scroll' => esc_html__('Scroll', 'affinity')
				)
			)
		);

	}

	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_general_meta_box_map');
}