<?php

if (!function_exists('affinity_mikado_blog_options_map')) {

	function affinity_mikado_blog_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__('Blog','affinity'),
				'icon'  => 'icon_book_alt'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = affinity_mikado_get_custom_sidebars();

		$panel_blog_lists = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists','affinity'),
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_list_type',
			'type'          => 'select',
			'label'         => esc_html__('Blog Layout for Archive Pages','affinity'),
			'description'   => esc_html__('Choose a default blog layout','affinity'),
			'default_value' => 'standard',
			'parent'        => $panel_blog_lists,
			'options'       => array(
				'standard'           => esc_html__('Blog: Standard','affinity'),
				'masonry'            => esc_html__('Blog: Masonry','affinity'),
				'masonry-full-width' => esc_html__('Blog: Masonry Full Width','affinity'),
			)
		));

		affinity_mikado_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar','affinity'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists','affinity'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'          => esc_html__('No Sidebar','affinity'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','affinity'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','affinity'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','affinity'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','affinity'),
			)
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'archive_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => esc_html__('Boxed Widgets','affinity'),
			'parent'        => $panel_blog_lists
		));


		if (count($custom_sidebars) > 0) {
			affinity_mikado_add_admin_field(array(
				'name'        => 'blog_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','affinity'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"','affinity'),
				'parent'      => $panel_blog_lists,
				'options'     => affinity_mikado_get_custom_sidebars()
			));
		}

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'pagination',
				'default_value' => 'yes',
				'label'         => esc_html__('Pagination','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List','affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_mkd_pagination_container'
				)
			)
		);

		$pagination_container = affinity_mikado_add_admin_container(
			array(
				'name'            => 'mkd_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_lists,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'parent'        => $pagination_container,
				'type'          => 'text',
				'name'          => 'blog_page_range',
				'default_value' => '',
				'label'         => esc_html__('Pagination Range limit','affinity'),
				'description'   => esc_html__('Enter a number that will limit pagination to a certain range of links','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_list_pagination',
			'type'          => 'select',
			'label'         => esc_html__('Pagination type','affinity'),
			'description'   => esc_html__('Choose pagination for Blog lists','affinity'),
			'parent'        => $pagination_container,
			'options'       => array(
				'standard'        => esc_html__('Standard','affinity'),
				'load_more'       => esc_html__('Load More','affinity'),
				'infinite_scroll' => esc_html__('Infinite scroll','affinity'),
			),
			'default_value' => 'standard'
		));

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'masonry_filter',
				'default_value' => 'no',
				'label'         => esc_html__('Masonry Filter','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		affinity_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '',
				'label'         => esc_html__('Number of Words in Excerpt','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		affinity_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'standard_number_of_chars',
				'default_value' => '45',
				'label'         => esc_html__('Standard Type Number of Words in Excerpt','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		affinity_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'masonry_number_of_chars',
				'default_value' => '45',
				'label'         => esc_html__('Masonry Type Number of Words in Excerpt','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		affinity_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'split_number_of_chars',
				'default_value' => '45',
				'label'         => esc_html__('Split Type Number of Words in Excerpt','affinity'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','affinity'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__('Blog Single','affinity'),
			)
		);

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_type',
			'type'          => 'select',
			'label'         => esc_html__('Blog Single Type','affinity'),
			'description'   => esc_html__('Choose a layout type for Blog Single pages','affinity'),
			'parent'        => $panel_blog_single,
			'options'       => array(
				'standard'    => esc_html__('Standard','affinity'),
				'image-title' => esc_html__('Image Title','affinity')
			),
			'default_value' => 'standard'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout','affinity'),
			'description'   => esc_html__('Choose a sidebar layout for Blog Single pages','affinity'),
			'parent'        => $panel_blog_single,
			'options'       => array(
				'default'          => esc_html__('No Sidebar','affinity'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','affinity'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','affinity'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','affinity'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','affinity'),
			),
			'default_value' => 'default'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => esc_html__('Boxed Widgets','affinity'),
			'parent'        => $panel_blog_single
		));

		if (count($custom_sidebars) > 0) {
			affinity_mikado_add_admin_field(array(
				'name'        => 'blog_single_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','affinity'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"','affinity'),
				'parent'      => $panel_blog_single,
				'options'     => affinity_mikado_get_custom_sidebars()
			));
		}

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area','affinity'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages','affinity'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','affinity'),
			'description'   => esc_html__('Enabling this option will show comments on your page.','affinity'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'blog_single_related_posts',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Related Posts','affinity'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.','affinity'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Prev/Next Single Post Navigation Links','affinity'),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)','affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_mkd_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = affinity_mikado_add_admin_container(
			array(
				'name'            => 'mkd_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Navigation Only in Current Category','affinity'),
				'description'   => esc_html__('Limit your navigation only through current category','affinity'),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'blog_enable_single_tags',
			'default_value' => 'yes',
			'label'         => esc_html__('Enable Tags on Single Post','affinity'),
			'description'   => esc_html__('Enabling this option will display posts\s tags on single post page','affinity'),
			'parent'        => $panel_blog_single
		));


		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'no',
				'label'         => esc_html__('Show Author Info Box','affinity'),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages','affinity'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_mkd_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = affinity_mikado_add_admin_container(
			array(
				'name'            => 'mkd_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		affinity_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__('Show Author Email','affinity'),
				'description'   => esc_html__('Enabling this option will show author email','affinity'),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_blog_options_map', 12);

}











