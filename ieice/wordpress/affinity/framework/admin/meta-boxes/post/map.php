<?php

/*** Post Options ***/

if (!function_exists('affinity_mikado_blog_post_meta_box_map')) {
	function affinity_mikado_blog_post_meta_box_map() {

		$post_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Post', 'affinity'),
				'name'  => 'post_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_blog_single_type_meta',
				'type'          => 'select',
				'label'         => esc_html__('Post Type', 'affinity'),
				'description'   => esc_html__('Choose post type', 'affinity'),
				'parent'        => $post_meta_box,
				'default_value' => 'youtube',
				'options'       => array(
					''             => '',
					'standard'     => esc_html__('Standard', 'affinity'),
					'image-title' => esc_html__('Image Title', 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(array(
			'name'          => 'mkd_blog_masonry_gallery_dimensions',
			'type'          => 'select',
			'label'         => esc_html__('Dimensions for Masonry Gallery', 'affinity'),
			'description'   => esc_html__('Choose image layout when it appears in Masonry Gallery list', 'affinity'),
			'parent'        => $post_meta_box,
			'options'       => array(
				'square'             => esc_html__('Square', 'affinity'),
				'large-width'        => esc_html__('Large width', 'affinity'),
				'large-height'       => esc_html__('Large height', 'affinity'),
				'large-width-height' => esc_html__('Large width/height', 'affinity'),
			),
			'default_value' => 'square'
		));


	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_blog_post_meta_box_map');
}