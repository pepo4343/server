<?php

if(!function_exists('affinity_mikado_sidebar_options_map')) {

	function affinity_mikado_sidebar_options_map() {

		$panel_widgets = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'affinity')
			)
		);

		/**
		 * Navigation style
		 */

		affinity_mikado_add_admin_field(array(
			'name'          => 'page_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => esc_html__('Boxed Widgets', 'affinity'),
			'parent'        => $panel_widgets
		));

		$group_sidebar_padding = affinity_mikado_add_admin_group(array(
			'name'   => 'group_sidebar_padding',
			'title'  => esc_html__('Padding', 'affinity'),
			'parent' => $panel_widgets
		));

		$row_sidebar_padding = affinity_mikado_add_admin_row(array(
			'name'   => 'row_sidebar_padding',
			'parent' => $group_sidebar_padding
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_top',
			'default_value' => '',
			'label'         => esc_html__('Top Padding', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_right',
			'default_value' => '',
			'label'         => esc_html__('Right Padding', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__('Bottom Padding', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_left',
			'default_value' => '',
			'label'         => esc_html__('Left Padding', 'affinity'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'select',
			'name'          => 'sidebar_alignment',
			'default_value' => '',
			'label'         => esc_html__('Text Alignment', 'affinity'),
			'description'   => esc_html__('Choose text aligment', 'affinity'),
			'options'       => array(
				'left'   => esc_html__('Left', 'affinity'),
				'center' => esc_html__('Center', 'affinity'),
				'right'  => esc_html__('Right', 'affinity')
			),
			'parent'        => $panel_widgets
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_sidebar_options_map');

}