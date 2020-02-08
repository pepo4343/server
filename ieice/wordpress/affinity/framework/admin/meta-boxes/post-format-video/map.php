<?php

/*** Video Post Format ***/

if (!function_exists('affinity_mikado_video_post_meta_box_map')) {
	function affinity_mikado_video_post_meta_box_map() {

		$video_post_format_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Video Post Format', 'affinity'),
				'name'  => 'post_format_video_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__('Video Type', 'affinity'),
				'description'   => esc_html__('Choose video type', 'affinity'),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'youtube',
				'options'       => array(
					'youtube' => esc_html__('Youtube', 'affinity'),
					'vimeo'   => esc_html__('Vimeo', 'affinity'),
					'self'    => esc_html__('Self Hosted', 'affinity')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'youtube' => '#mkd_mkd_video_self_hosted_container',
						'vimeo'   => '#mkd_mkd_video_self_hosted_container',
						'self'    => '#mkd_mkd_video_embedded_container'
					),
					'show'       => array(
						'youtube' => '#mkd_mkd_video_embedded_container',
						'vimeo'   => '#mkd_mkd_video_embedded_container',
						'self'    => '#mkd_mkd_video_self_hosted_container'
					)
				)
			)
		);

		$mkd_video_embedded_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkd_video_embedded_container',
				'hidden_property' => 'mkd_video_type_meta',
				'hidden_value'    => 'self'
			)
		);

		$mkd_video_self_hosted_container = affinity_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkd_video_self_hosted_container',
				'hidden_property' => 'mkd_video_type_meta',
				'hidden_values'   => array('youtube', 'vimeo')
			)
		);


		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_video_id_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video ID', 'affinity'),
				'description' => esc_html__('Enter Video ID', 'affinity'),
				'parent'      => $mkd_video_embedded_container,

			)
		);


		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Video Image', 'affinity'),
				'description' => esc_html__('Upload video image', 'affinity'),
				'parent'      => $mkd_video_self_hosted_container,

			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_video_webm_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video WEBM', 'affinity'),
				'description' => esc_html__('Enter video URL for WEBM format', 'affinity'),
				'parent'      => $mkd_video_self_hosted_container,

			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_video_mp4_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video MP4', 'affinity'),
				'description' => esc_html__('Enter video URL for MP4 format', 'affinity'),
				'parent'      => $mkd_video_self_hosted_container,

			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_post_video_ogv_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video OGV', 'affinity'),
				'description' => esc_html__('Enter video URL for OGV format', 'affinity'),
				'parent'      => $mkd_video_self_hosted_container,

			)
		);
	}

	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_video_post_meta_box_map');
}