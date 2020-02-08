<?php

if(!function_exists('affinity_mikado_footer_bg_image_styles')) {
    /**
     * Outputs background image styles for footer
     */
    function affinity_mikado_footer_bg_image_styles() {
        $background_image = affinity_mikado_options()->getOptionValue('footer_background_image');

        if($background_image !== '') {
            $footer_bg_image_styles['background-image'] = 'url('.$background_image.')';

            echo affinity_mikado_dynamic_css('body.mkd-footer-with-bg-image .mkd-page-footer', $footer_bg_image_styles);
        }
    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_footer_bg_image_styles');
}
