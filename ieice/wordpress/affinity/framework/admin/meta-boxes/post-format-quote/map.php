<?php

/*** Quote Post Format ***/

if (!function_exists('affinity_mikado_quote_post_meta_box_map')) {
	function affinity_mikado_quote_post_meta_box_map() {

		$quote_post_format_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Quote Post Format', 'affinity'),
				'name'  => 'post_format_quote_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'affinity'),
				'description' => esc_html__('Enter Quote text', 'affinity'),
				'parent'      => $quote_post_format_meta_box,

			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_quote_color',
				'type'        => 'color',
				'label'       => esc_html__('Quote Background Color', 'affinity'),
				'description' => esc_html__('Post background color', 'affinity'),
				'parent'      => $quote_post_format_meta_box,

			)
		);
	}

	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_quote_post_meta_box_map');
}