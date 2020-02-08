<?php

/*** Gallery Post Format ***/


if (!function_exists('affinity_mikado_gallery_post_meta_box_map')) {
	function affinity_mikado_gallery_post_meta_box_map() {
		$gallery_post_format_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Gallery Post Format', 'affinity'),
				'name'  => 'post_format_gallery_meta'
			)
		);

		affinity_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkd_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'affinity'),
				'description' => esc_html__('Choose your gallery images', 'affinity'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_gallery_post_meta_box_map');
}