<?php

if(!function_exists('affinity_mikado_reset_options_map')) {
	/**
	 * Reset options panel
	 */
	function affinity_mikado_reset_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'affinity'),
				'icon'  => 'icon_refresh'
			)
		);

		$panel_reset = affinity_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'affinity'),
			)
		);

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'reset_to_defaults',
			'default_value' => 'no',
			'label'         => esc_html__('Reset to Defaults', 'affinity'),
			'description'   => esc_html__('This option will reset all Mikado Options values to defaults', 'affinity'),
			'parent'        => $panel_reset
		));

	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_reset_options_map', 19);

}