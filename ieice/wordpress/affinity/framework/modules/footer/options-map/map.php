<?php

if (!function_exists('affinity_mikado_footer_options_map')) {
	/**
	 * Add footer options
	 */
	function affinity_mikado_footer_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__('Footer', 'affinity'),
				'icon'  => 'icon_cone_alt'
			)
		);

		$footer_panel = affinity_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'affinity'),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__('Uncovering Footer', 'affinity'),
				'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'affinity'),
				'parent'        => $footer_panel,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'name'        => 'footer_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'affinity'),
				'description' => esc_html__('Choose Background Image for Footer Area', 'affinity'),
				'parent'      => $footer_panel
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__('Footer in Grid', 'affinity'),
				'description'   => esc_html__('Enabling this option will place Footer content in grid', 'affinity'),
				'parent'        => $footer_panel,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Footer Top', 'affinity'),
				'description'   => esc_html__('Enabling this option will show Footer Top area', 'affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_top_container = affinity_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'default_value' => '4',
				'label'         => esc_html__('Footer Top Columns', 'affinity'),
				'description'   => esc_html__('Choose number of columns for Footer Top area', 'affinity'),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent'        => $show_footer_top_container,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => '',
				'label'         => esc_html__('Footer Top Columns Alignment', 'affinity'),
				'description'   => esc_html__('Text Alignment in Footer Columns', 'affinity'),
				'options'       => array(
					'left'   => esc_html__('Left', 'affinity'),
					'center' => esc_html__('Center', 'affinity'),
					'right'  => esc_html__('Right', 'affinity'),
				),
				'parent'        => $show_footer_top_container,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Footer Bottom', 'affinity'),
				'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = affinity_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);


		affinity_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '3',
				'label'         => esc_html__('Footer Bottom Columns', 'affinity'),
				'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'affinity'),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '3 (25%+50%+25%)',

				),
				'parent'        => $show_footer_bottom_container,
			)
		);

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_footer_options_map');

}