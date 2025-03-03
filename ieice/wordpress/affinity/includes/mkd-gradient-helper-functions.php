<?php
if(!function_exists('affinity_mikado_get_gradient_left_to_right_styles')) {
    function affinity_mikado_get_gradient_left_to_right_styles($string_add = '', $empty_val = false, $custom_val = false) {
        $styles = array(
            'mkd-type1-gradient-left-to-right'.$string_add => 'Style 1',
            'mkd-type2-gradient-left-to-right'.$string_add => 'Style 2',
            'mkd-type3-gradient-left-to-right'.$string_add => 'Style 3',
            'mkd-type4-gradient-left-to-right'.$string_add => 'Style 4'
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        if($custom_val) {
            $styles = array_merge($styles,
                array(
                'mkd-custom-gradient-top-to-bottom' => 'Custom (top to bottom)'
            ));
        }

        return $styles;
    }
}

if(!function_exists('affinity_mikado_get_gradient_bottom_to_top_styles')) {
    function affinity_mikado_get_gradient_bottom_to_top_styles($string_add = '', $empty_val = false) {
        $styles = array(
            'mkd-type1-gradient-bottom-to-top'.$string_add => 'Style 1',
            'mkd-type2-gradient-bottom-to-top'.$string_add => 'Style 2',
            'mkd-type3-gradient-bottom-to-top'.$string_add => 'Style 3',
            'mkd-type4-gradient-bottom-to-top'.$string_add => 'Style 4',
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        return $styles;
    }
}

if(!function_exists('affinity_mikado_get_gradient_left_bottom_to_right_top_styles')) {
    function affinity_mikado_get_gradient_left_bottom_to_right_top_styles($string_add = '', $empty_val = false) {
        $styles = array(
            'mkd-type1-gradient-left-bottom-to-right-top'.$string_add => 'Style 1',
            'mkd-type2-gradient-left-bottom-to-right-top'.$string_add => 'Style 2',
            'mkd-type3-gradient-left-bottom-to-right-top'.$string_add => 'Style 3',
            'mkd-type4-gradient-left-bottom-to-right-top'.$string_add => 'Style 4'
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        return $styles;
    }
}
