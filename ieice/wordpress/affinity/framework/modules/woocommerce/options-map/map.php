<?php

if (!function_exists('affinity_mikado_woocommerce_options_map')) {

	/**
	 * Add Woocommerce options page
	 */
	function affinity_mikado_woocommerce_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'affinity'),
				'icon'  => 'icon_cart_alt'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__('Product List', 'affinity')
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'mkd_woo_product_list_columns',
			'type'          => 'select',
			'label'         => esc_html__('Product List Columns', 'affinity'),
			'default_value' => 'mkd-woocommerce-columns-4',
			'description'   => esc_html__('Choose number of columns for product listing and related products on single product', 'affinity'),
			'options'       => array(
				'mkd-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'affinity'),
				'mkd-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'affinity')
			),
			'parent'        => $panel_product_list,
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'mkd_woo_products_per_page',
			'type'          => 'text',
			'label'         => esc_html__('Number of products per page', 'affinity'),
			'default_value' => '',
			'description'   => esc_html__('Set number of products on shop page', 'affinity'),
			'parent'        => $panel_product_list,
			'args'          => array(
				'col_width' => 3
			)
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'mkd_products_list_title_tag',
			'type'          => 'select',
			'label'         => esc_html__('Products Title Tag', 'affinity'),
			'default_value' => 'h4',
			'description'   => '',
			'options'       => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'        => $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__('Single Product', 'affinity')
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'mkd_single_product_title_tag',
			'type'          => 'select',
			'label'         => esc_html__('Single Product Title Tag', 'affinity'),
			'default_value' => 'h2',
			'description'   => '',
			'options'       => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'        => $panel_single_product,
		));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'affinity')
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'mkd_woo_dropdown_cart_description',
			'type'          => 'text',
			'label'         => esc_html__('Cart Description', 'affinity'),
			'default_value' => '',
			'description'   => esc_html__('Enter dropdown cart description', 'affinity'),
			'parent'        => $panel_dropdown_cart
		));
	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_woocommerce_options_map', 21);
}