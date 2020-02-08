<?php
if(!function_exists('affinity_mikado_layerslider_overrides')) {
	/**
	 * Disables Layer Slider auto update box
	 */
	function affinity_mikado_layerslider_overrides() {
		$GLOBALS['lsAutoUpdateBox'] = false;
	}

	add_action('layerslider_ready', 'affinity_mikado_layerslider_overrides');
}
?>