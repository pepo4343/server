<?php

if(!function_exists('affinity_mikado_search_body_class')) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function affinity_mikado_search_body_class($classes) {

        if(is_active_widget(false, false, 'mkd_search_opener')) {

            $classes[] = 'mkd-'.affinity_mikado_options()->getOptionValue('search_type');

            if(affinity_mikado_options()->getOptionValue('search_type') == 'fullscreen-search') {

                $is_fullscreen_bg_image_set = affinity_mikado_options()->getOptionValue('fullscreen_search_background_image') !== '';

                if($is_fullscreen_bg_image_set) {
                    $classes[] = 'mkd-fullscreen-search-with-bg-image';
                }

                $classes[] = 'mkd-search-fade';

            }

        }

        return $classes;

    }

    add_filter('body_class', 'affinity_mikado_search_body_class');
}

if(!function_exists('affinity_mikado_get_search')) {
    /**
     * Loads search HTML based on search type option.
     */
    function affinity_mikado_get_search() {

        if(affinity_mikado_active_widget(false, false, 'mkd_search_opener')) {

            $search_type = affinity_mikado_options()->getOptionValue('search_type');

            if($search_type == 'search-covers-header') {
                affinity_mikado_set_position_for_covering_search();

                return;
            } else if($search_type == 'search-slides-from-window-top') {
                affinity_mikado_set_search_position_in_menu($search_type);
                if(affinity_mikado_is_responsive_on()) {
                    affinity_mikado_set_search_position_mobile();
                }

                return;
            } elseif($search_type === 'search-dropdown') {
                affinity_mikado_set_dropdown_search_position();

                return;
            }

            affinity_mikado_load_search_template();

        }
    }

}

if(!function_exists('affinity_mikado_set_position_for_covering_search')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function affinity_mikado_set_position_for_covering_search() {

        $containing_sidebar = affinity_mikado_active_widget(false, false, 'mkd_search_opener');

        foreach($containing_sidebar as $sidebar) {

            if(strpos($sidebar, 'top-bar') !== false) {
                add_action('affinity_mikado_after_header_top_html_open', 'affinity_mikado_load_search_template');
            } else if(strpos($sidebar, 'main-menu') !== false) {
                add_action('affinity_mikado_after_header_menu_area_html_open', 'affinity_mikado_load_search_template');
            } else if(strpos($sidebar, 'mobile-logo') !== false) {
                add_action('affinity_mikado_after_mobile_header_html_open', 'affinity_mikado_load_search_template');
            } else if(strpos($sidebar, 'logo') !== false) {
                add_action('affinity_mikado_after_header_logo_area_html_open', 'affinity_mikado_load_search_template');
            } else if(strpos($sidebar, 'sticky') !== false) {
                add_action('affinity_mikado_after_sticky_menu_html_open', 'affinity_mikado_load_search_template');
            }

        }

    }

}

if(!function_exists('affinity_mikado_set_search_position_in_menu')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function affinity_mikado_set_search_position_in_menu($type) {

        add_action('affinity_mikado_after_header_menu_area_html_open', 'affinity_mikado_load_search_template');

    }
}

if(!function_exists('affinity_mikado_set_search_position_mobile')) {
    /**
     * Hooks search template to mobile header
     */
    function affinity_mikado_set_search_position_mobile() {

        add_action('affinity_mikado_after_mobile_header_html_open', 'affinity_mikado_load_search_template');

    }

}

if(!function_exists('affinity_mikado_load_search_template')) {
    /**
     * Loads HTML template with parameters
     */
    function affinity_mikado_load_search_template() {
        global $affinity_IconCollections;

        $search_type = affinity_mikado_options()->getOptionValue('search_type');

        $search_icon       = '';
        $search_icon_close = '';
        if(affinity_mikado_options()->getOptionValue('search_icon_pack') !== '') {
            $search_icon       = $affinity_IconCollections->getSearchIcon(affinity_mikado_options()->getOptionValue('search_icon_pack'), true);
            $search_icon_close = $affinity_IconCollections->getSearchClose(affinity_mikado_options()->getOptionValue('search_icon_pack'), true);
        }

        $parameters = array(
            'search_in_grid'    => affinity_mikado_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
            'search_icon'       => $search_icon,
            'search_icon_close' => $search_icon_close
        );

        affinity_mikado_get_module_template_part('templates/types/'.$search_type, 'search', '', $parameters);

    }

}

if(!function_exists('affinity_mikado_set_dropdown_search_position')) {
    function affinity_mikado_set_dropdown_search_position() {
        add_action('affinity_mikado_after_search_opener', 'affinity_mikado_load_search_template');
    }
}