<?php

/*** Link Post Format ***/
if (!function_exists('affinity_mikado_link_post_meta_box_map')) {
	function affinity_mikado_link_post_meta_box_map() {

		$link_post_format_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'affinity'),
				'name'  => 'post_format_link_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'affinity'),
				'description' => esc_html__('Enter link', 'affinity'),
				'parent'      => $link_post_format_meta_box,

			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_link_color',
				'type'        => 'color',
				'label'       => esc_html__('Link Background Color', 'affinity'),
				'description' => esc_html__('Post background color', 'affinity'),
				'parent'      => $link_post_format_meta_box,

			)
		);
	}

	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_link_post_meta_box_map');
}