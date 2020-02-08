<?php
if (!function_exists('affinity_mikado_contact_form_map')) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function affinity_mikado_contact_form_map() {

		vc_add_param('contact-form-7', array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Style', 'affinity'),
			'param_name'  => 'html_class',
			'value'       => array(
				esc_html__('Default', 'affinity')        => 'default',
				esc_html__('Custom Style 1', 'affinity') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'affinity') => 'cf7_custom_style_2'
			),
			'description' => esc_html__('You can style each form element individually in Mikado Options > Contact Form 7', 'affinity')
		));

	}

	add_action('vc_after_init', 'affinity_mikado_contact_form_map');
}
?>