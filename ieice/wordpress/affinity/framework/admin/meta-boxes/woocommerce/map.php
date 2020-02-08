<?php

//WooCommerce
if (affinity_mikado_is_woocommerce_installed()) {


	if (!function_exists('affinity_mikado_woocommerce_meta_box_map')) {
		function affinity_mikado_woocommerce_meta_box_map() {

			$woocommerce_meta_box = affinity_mikado_create_meta_box(
				array(
					'scope' => array('product'),
					'title' => esc_html__('Product Meta', 'affinity'),
					'name'  => 'woo_product_meta'
				)
			);

			affinity_mikado_create_meta_box_field(array(
				'name'        => 'mkd_single_product_new_meta',
				'type'        => 'select',
				'label'       => esc_html__('Enable New Product Mark', 'affinity'),
				'description' => esc_html__('Enabling this option will show new product mark on your product lists and product single', 'affinity'),
				'parent'      => $woocommerce_meta_box,
				'options'     => array(
					'no'  => esc_html__('No', 'affinity'),
					'yes' => esc_html__('Yes', 'affinity')
				)
			));

			affinity_mikado_create_meta_box_field(array(
				'name'          => 'mkd_masonry_product_list_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__('Dimensions for Masonry Product list', 'affinity'),
				'description'   => esc_html__('Choose image layout when it appears in Masonry Product list', 'affinity'),
				'parent'        => $woocommerce_meta_box,
				'options'       => array(
					'standard'           => esc_html__('Standard', 'affinity'),
					'large-width'        => esc_html__('Large width', 'affinity'),
					'large-height'       => esc_html__('Large height', 'affinity'),
					'large-width-height' => esc_html__('Large width/height', 'affinity'),
				),
				'default_value' => 'standard'
			));

		}

		add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_woocommerce_meta_box_map');
	}
}