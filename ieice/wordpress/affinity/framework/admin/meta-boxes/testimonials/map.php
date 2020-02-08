<?php

//Testimonials

if (!function_exists('affinity_mikado_testimonial_meta_box_map')) {
	function affinity_mikado_testimonial_meta_box_map() {

		$testimonial_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('testimonials'),
				'title' => esc_html__('Testimonial', 'affinity'),
				'name'  => 'testimonial_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_testimonaial_logo_image',
				'type'        => 'image',
				'label'       => esc_html__('Logo Image', 'affinity'),
				'description' => esc_html__('Choose testimonial logo image ', 'affinity'),
				'parent'      => $testimonial_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__('Title', 'affinity'),
				'description' => esc_html__('Enter testimonial title', 'affinity'),
				'parent'      => $testimonial_meta_box,
			)
		);


		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__('Author', 'affinity'),
				'description' => esc_html__('Enter author name', 'affinity'),
				'parent'      => $testimonial_meta_box,
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__('Job Position', 'affinity'),
				'description' => esc_html__('Enter job position', 'affinity'),
				'parent'      => $testimonial_meta_box,
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__('Text', 'affinity'),
				'description' => esc_html__('Enter testimonial text', 'affinity'),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_testimonial_meta_box_map');
}