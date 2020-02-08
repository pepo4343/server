<?php
if (!function_exists('affinity_mikado_blog_meta_box_map')) {
	function affinity_mikado_blog_meta_box_map() {

		$mkd_blog_categories = array();
		$categories = get_categories();
		foreach ($categories as $category) {
			$mkd_blog_categories[$category->term_id] = $category->name;
		}

		$blog_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('page'),
				'title' => esc_html__('Blog', 'affinity'),
				'name'  => 'blog_meta'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Blog Category', 'affinity'),
				'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'affinity'),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__('Number of Posts', 'affinity'),
				'description' => esc_html__('Enter the number of posts to display', 'affinity'),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array("col_width" => 3)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_blog_split_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Blog Split Background Image', 'affinity'),
				'description' => esc_html__('Set background image if Blog Split page template is selected', 'affinity'),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array("col_width" => 3)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_blog_split_title_meta',
				'type'        => 'text',
				'label'       => esc_html__('Blog Split Title', 'affinity'),
				'description' => esc_html__('Set title if Blog Split page template is selected', 'affinity'),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array("col_width" => 12)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_blog_split_subtitle_meta',
				'type'        => 'text',
				'label'       => esc_html__('Blog Split Subtitle', 'affinity'),
				'description' => esc_html__('Set subtitle if Blog Split page template is selected', 'affinity'),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array("col_width" => 12)
			)
		);

	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_blog_meta_box_map');
}