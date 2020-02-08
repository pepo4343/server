<?php

/*** Audio Post Format ***/

if (!function_exists('affinity_mikado_audio_post_meta_box_map')) {
	function affinity_mikado_audio_post_meta_box_map() {

		$audio_post_format_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Audio Post Format', 'affinity'),
				'name'  => 'post_format_audio_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'affinity'),
				'description' => esc_html__('Enter audion link', 'affinity'),
				'parent'      => $audio_post_format_meta_box,

			)
		);

	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_audio_post_meta_box_map');
}