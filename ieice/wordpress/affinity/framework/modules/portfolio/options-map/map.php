<?php

if (!function_exists('affinity_mikado_portfolio_options_map')) {

	function affinity_mikado_portfolio_options_map() {

		affinity_mikado_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'affinity'),
			'icon'  => 'icon_images'
		));

		$panel = affinity_mikado_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'affinity'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_template',
			'type'          => 'select',
			'label'         => esc_html__('Portfolio Type', 'affinity'),
			'default_value' => 'small-images',
			'description'   => esc_html__('Choose a default type for Single Project pages', 'affinity'),
			'parent'        => $panel,
			'options'       => array(
				'small-images'      => esc_html__('Portfolio small images', 'affinity'),
				'small-slider'      => esc_html__('Portfolio small slider', 'affinity'),
				'big-images'        => esc_html__('Portfolio big images', 'affinity'),
				'big-slider'        => esc_html__('Portfolio big slider', 'affinity'),
				'custom'            => esc_html__('Portfolio custom', 'affinity'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'affinity'),
				'gallery'           => esc_html__('Portfolio gallery', 'affinity'),
				'video'             => esc_html__('Portfolio video', 'affinity'),
			)
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'affinity'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'affinity'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'affinity'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'affinity'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Author', 'affinity'),
			'description'   => esc_html__('Enabling this option will disable author meta on Single Projects.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'affinity'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'affinity'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'affinity'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'affinity'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#mkd_navigate_same_category_container'
			)
		));

		$container_navigate_category = affinity_mikado_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_nav_same_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Enable Pagination Through Same Category', 'affinity'),
			'description'   => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'affinity'),
			'parent'        => $container_navigate_category,
			'default_value' => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_numb_columns',
			'type'          => 'select',
			'label'         => esc_html__('Number of Columns', 'affinity'),
			'default_value' => 'three-columns',
			'description'   => esc_html__('Enter the number of columns for Portfolio Gallery type', 'affinity'),
			'parent'        => $panel,
			'options'       => array(
				'two-columns'   => esc_html__('2 columns', 'affinity'),
				'three-columns' => esc_html__('3 columns', 'affinity'),
				'four-columns'  => esc_html__('4 columns', 'affinity'),
			)
		));

		affinity_mikado_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'affinity'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'affinity'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_portfolio_options_map', 14);

}