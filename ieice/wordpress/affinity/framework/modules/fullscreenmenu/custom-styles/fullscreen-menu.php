<?php

if(!function_exists('affinity_mikado_fullscreen_menu_general_styles')) {

    function affinity_mikado_fullscreen_menu_general_styles() {
        $fullscreen_menu_background_color = '';
        if(affinity_mikado_options()->getOptionValue('fullscreen_alignment') !== '') {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li, .mkd-fullscreen-above-menu-widget-holder, .mkd-fullscreen-below-menu-widget-holder, .mkd-fullscreen-logo-wrapper', array(
                'text-align' => affinity_mikado_options()->getOptionValue('fullscreen_alignment')
            ));
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
            $fullscreen_menu_background_color = affinity_mikado_hex2rgb(affinity_mikado_options()->getOptionValue('fullscreen_menu_background_color'));
            if(affinity_mikado_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
                $fullscreen_menu_background_transparency = affinity_mikado_options()->getOptionValue('fullscreen_menu_background_transparency');
            } else {
                $fullscreen_menu_background_transparency = 0.9;
            }
        }

        if($fullscreen_menu_background_color !== '') {
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
                'background-color' => 'rgba('.$fullscreen_menu_background_color[0].','.$fullscreen_menu_background_color[1].','.$fullscreen_menu_background_color[2].','.$fullscreen_menu_background_transparency.')'
            ));
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
                'background-image'    => 'url('.affinity_mikado_options()->getOptionValue('fullscreen_menu_background_image').')',
                'background-position' => 'center 0',
                'background-repeat'   => 'no-repeat'
            ));
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
                'background-image'    => 'url('.affinity_mikado_options()->getOptionValue('fullscreen_menu_pattern_image').')',
                'background-repeat'   => 'repeat',
                'background-position' => '0 0'
            ));
        }

    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_general_styles');

}

if(!function_exists('affinity_mikado_fullscreen_menu_first_level_style')) {

    function affinity_mikado_fullscreen_menu_first_level_style() {

        $first_menu_style = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_color') !== '') {
            $first_menu_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_color');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
            $first_menu_style['font-family'] = affinity_mikado_get_formatted_font_family(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts')).',sans-serif';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
            $first_menu_style['font-size'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
            $first_menu_style['line-height'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
            $first_menu_style['font-style'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
            $first_menu_style['font-weight'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
            $first_menu_style['letter-spacing'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
            $first_menu_style['text-transform'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform');
        }

        if(!empty($first_menu_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a, nav.mkd-fullscreen-menu > ul > li > h6', $first_menu_style);
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_color') !== '') {
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener.opened .mkd-line:after, .mkd-fullscreen-menu-opener.opened .mkd-line:before', array(
                'background-color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_color')
            ));
        }

        $first_menu_hover_style = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
            $first_menu_hover_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
            $first_menu_hover_style['background-color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color');
        }

        if(!empty($first_menu_hover_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a:hover, nav.mkd-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
        }

        $first_menu_active_style = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
            $first_menu_active_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_active_color');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
            $first_menu_active_style['background-color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_active_background_color');
        }

        if(!empty($first_menu_active_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
        }

    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_first_level_style');

}

if(!function_exists('affinity_mikado_fullscreen_menu_second_level_style')) {

    function affinity_mikado_fullscreen_menu_second_level_style() {
        $second_menu_style = array();
        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
            $second_menu_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_color_2nd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
            $second_menu_style['font-family'] = affinity_mikado_get_formatted_font_family(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')).',sans-serif';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
            $second_menu_style['font-size'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize_2nd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
            $second_menu_style['line-height'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight_2nd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
            $second_menu_style['font-style'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
            $second_menu_style['font-weight'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
            $second_menu_style['letter-spacing'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
            $second_menu_style['text-transform'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
        }

        if(!empty($second_menu_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > ul > li > a, nav.mkd-fullscreen-menu > ul > li > ul > li > h6', $second_menu_style);
        }

        $second_menu_hover_style = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
            $second_menu_hover_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
            $second_menu_hover_style['background-color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
        }

        if(!empty($second_menu_hover_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > ul > li > a:hover, nav.mkd-fullscreen-menu > ul > li > ul > li > h6:hover', $second_menu_hover_style);
        }
    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_second_level_style');

}

if(!function_exists('affinity_mikado_fullscreen_menu_third_level_style')) {

    function affinity_mikado_fullscreen_menu_third_level_style() {
        $third_menu_style = array();
        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
            $third_menu_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_color_3rd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
            $third_menu_style['font-family'] = affinity_mikado_get_formatted_font_family(affinity_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')).',sans-serif';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
            $third_menu_style['font-size'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontsize_3rd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
            $third_menu_style['line-height'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_lineheight_3rd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
            $third_menu_style['font-style'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
            $third_menu_style['font-weight'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
            $third_menu_style['letter-spacing'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
            $third_menu_style['text-transform'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
        }

        if(!empty($third_menu_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li ul li ul li a', $third_menu_style);
        }

        $third_menu_hover_style = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
            $third_menu_hover_style['color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
            $third_menu_hover_style['background-color'] = affinity_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
        }

        if(!empty($third_menu_hover_style)) {
            echo affinity_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
        }
    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_third_level_style');

}

if(!function_exists('affinity_mikado_fullscreen_menu_icon_styles')) {

    function affinity_mikado_fullscreen_menu_icon_styles() {

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_color')
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener:hover', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_hover_color')
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
            echo affinity_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-light-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened)', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_light_icon_color').' !important'
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-light-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened):hover', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_light_icon_hover_color').' !important'
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-dark-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened)', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_color').' !important'
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened):hover ,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-dark-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened):hover', array(
                'color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color').' !important'
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_background_color') !== '') {

            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener', array(
                '-webkit-backface-visibility' => 'hidden',
                'display'                     => 'inline-block'
            ));
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener.normal', array(
                'padding' => '10px 15px',
            ));
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener.medium', array(
                'padding' => '10px 13px',
            ));
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener.large', array(
                'padding' => '15px',
            ));
            echo affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener:not(.opened)', array(
                'background-color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_background_color')
            ));

        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_background_hover_color') !== '') {

            affinity_mikado_dynamic_css('.mkd-fullscreen-menu-opener.normal:not(.opened):hover, .mkd-fullscreen-menu-opener.medium:not(.opened):hover, .mkd-fullscreen-menu-opener.large:not(.opened):hover', array(
                'background-color' => affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_background_hover_color')
            ));

        }

    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_icon_styles');

}

if(!function_exists('affinity_mikado_fullscreen_menu_icon_spacing')) {

    function affinity_mikado_fullscreen_menu_icon_spacing() {

        $fullscreen_menu_icon_spacing = array();

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
            $fullscreen_menu_icon_spacing['padding-left'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_left')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
            $fullscreen_menu_icon_spacing['padding-right'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_right')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
            $fullscreen_menu_icon_spacing['margin-left'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_left')).'px';
        }

        if(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
            $fullscreen_menu_icon_spacing['margin-right'] = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_right')).'px';
        }

        if(!empty($fullscreen_menu_icon_spacing)) {
            echo affinity_mikado_dynamic_css('a.mkd-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
        }

    }

    add_action('affinity_mikado_style_dynamic', 'affinity_mikado_fullscreen_menu_icon_spacing');

}