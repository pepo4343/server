<?php

if (!function_exists('affinity_mikado_header_meta_box_map')) {
    function affinity_mikado_header_meta_box_map() {

        $header_meta_box = affinity_mikado_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Header', 'affinity'),
                'name'  => 'header_meta'
            )
        );

        $temp_holder_show             = '';
        $temp_holder_hide             = '';
        $temp_array_standard          = array();
        $temp_array_standard_extended = array();
        $temp_array_box               = array();
        $temp_array_divided           = array();
        $temp_array_minimal           = array();
        $temp_array_centered          = array();
        $temp_array_tabbed            = array();
        $temp_array_vertical          = array();
        $temp_array_vertical_compact  = array();
        $temp_array_top_header        = array(
                                        'hidden_value'  => 'default',
                                        'hidden_values' => array('header-vertical','header-vertical-compact'));
        $temp_array_top_line          = array(
                                        'hidden_value'  => 'default',
                                        'hidden_values' => array('header-vertical','header-vertical-compact'));
        $temp_array_behaviour         = array();
        switch(affinity_mikado_options()->getOptionValue('header_type')) {

            case 'header-standard':
                $temp_holder_show = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact',
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact',
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-standard-extended':
                $temp_holder_show = '#mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container, #mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-box':
                $temp_holder_show = '#mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container, #mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;


            case 'header-minimal':
                $temp_holder_show = '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-divided':
                $temp_holder_show = '#mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );


                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-centered':
                $temp_holder_show = '#mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-tabbed':
                $temp_holder_show = '#mkd_mkd_header_tabbed_type_meta_container, #mkd_mkd_header_behaviour_meta';
                $temp_holder_hide = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('header-vertical','header-vertical-compact')
                );

                break;

            case 'header-vertical':
                $temp_holder_show = '#mkd_mkd_header_vertical_type_meta_container';
                $temp_holder_hide = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-standard',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('', 'header-vertical','header-vertical-compact')
                );

                break;

            case 'header-vertical-compact':
                $temp_holder_show = '#mkd_mkd_header_vertical_compact_type_meta_container';
                $temp_holder_hide = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_type_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_box = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_minimal = array(
                    'hidden_values' => array(
                        '',
                        'header-vertical',
                        'header-standard',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_divided = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_centered = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-vertical',
                        'header-divided',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_tabbed = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-vertical',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array(
                        '',
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical-compact'
                    )
                );

                $temp_array_vertical_compact = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array(
                        'header-standard',
                        'header-minimal',
                        'header-divided',
                        'header-centered',
                        'header-standard-extended',
                        'header-box',
                        'header-tabbed',
                        'header-vertical'
                    )
                );

                $temp_array_behaviour = array(
                    'hidden_values' => array('', 'header-vertical','header-vertical-compact')
                );

                break;
        }


        affinity_mikado_create_meta_box_field(
            array(
                'parent'        => $header_meta_box,
                'type'          => 'select',
                'name'          => 'mkd_enable_wide_menu_background_meta',
                'default_value' => '',
                'label'         => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'affinity'),
                'description'   => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'affinity'),
                'options'       => array(
                    ''             => '',
                    'no' => esc_html__('No', 'affinity'),
                    'yes'  => esc_html__('Yes', 'affinity')
                )
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_header_type_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Choose Header Type', 'affinity'),
                'description'   => esc_html__('Select header type layout', 'affinity'),
                'parent'        => $header_meta_box,
                'options'       => array(
                    ''                         => 'Default',
                    'header-standard'          => esc_html__('Standard Header', 'affinity'),
                    'header-standard-extended' => esc_html__('Standard Extended Header', 'affinity'),
                    'header-box'               => esc_html__('"In The Box" Header', 'affinity'),
                    'header-minimal'           => esc_html__('Minimal Header', 'affinity'),
                    'header-divided'           => esc_html__('Divided Header', 'affinity'),
                    'header-centered'          => esc_html__('Centered Header', 'affinity'),
                    'header-tabbed'            => esc_html__('Tabbed Header', 'affinity'),
                    'header-vertical'          => esc_html__('Vertical Header', 'affinity'),
                    'header-vertical-compact'  => esc_html__('Vertical Compact Header', 'affinity')
                ),
                'args'          => array(
                    "dependence" => true,
                    "hide"       => array(
                        ""                         => $temp_holder_hide,
                        'header-standard'          => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-standard-extended' => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-box'               => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-minimal'           => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-divided'           => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-centered'          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-tabbed'            => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-vertical'          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_compact_type_meta_container',
                        'header-vertical-compact'  => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_tabbed_type_meta_container,#mkd_mkd_header_vertical_type_meta_container'
                    ),
                    "show"       => array(
                        ""                         => $temp_holder_show,
                        "header-standard"          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        "header-standard-extended" => '#mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        "header-box"               => '#mkd_mkd_header_box_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        "header-minimal"           => '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        'header-divided'           => '#mkd_mkd_header_divided_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        'header-centered'          => '#mkd_mkd_header_centered_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        "header-tabbed"            => '#mkd_mkd_header_tabbed_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_top_line_container_meta_container, #mkd_mkd_header_behaviour_meta',
                        "header-vertical"          => '#mkd_mkd_header_vertical_type_meta_container',
                        "header-vertical-compact"  => '#mkd_mkd_header_vertical_compact_type_meta_container'
                    )
                )
            )
        );

        affinity_mikado_create_meta_box_field(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'type'            => 'select',
                    'name'            => 'mkd_header_behaviour_meta',
                    'default_value'   => '',
                    'label'           => esc_html__('Choose Header behaviour', 'affinity'),
                    'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'affinity'),
                    'options'         => array(
                        ''                                => '',
                        'no-behavior'                     => esc_html__('No Behavior', 'affinity'),
                        'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'affinity'),
                        'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'affinity'),
                        'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'affinity')
                    ),
                    'hidden_property' => 'mkd_header_type_meta',
                    'hidden_value'    => '',
                    'args'            => array(
                        'dependence' => true,
                        'show'       => array(
                            ''                                => '',
                            'sticky-header-on-scroll-up'      => '',
                            'sticky-header-on-scroll-down-up' => '#mkd_mkd_sticky_amount_container_meta_container',
                            'no-behavior'                     => ''
                        ),
                        'hide'       => array(
                            ''                                => '#mkd_mkd_sticky_amount_container_meta_container',
                            'sticky-header-on-scroll-up'      => '#mkd_mkd_sticky_amount_container_meta_container',
                            'sticky-header-on-scroll-down-up' => '',
                            'no-behavior'                     => '#mkd_mkd_sticky_amount_container_meta_container'
                        )
                    )
                ),
                $temp_array_behaviour
            )
        );

        $sticky_amount_container = affinity_mikado_add_admin_container(
            array(
                'parent'          => $header_meta_box,
                'name'            => 'mkd_sticky_amount_container_meta_container',
                'hidden_property' => 'mkd_header_behaviour_meta',
                'hidden_value'    => '',
                'hidden_values'   => array('', 'no-behavior', 'sticky-header-on-scroll-up'),
            )
        );

        $sticky_amount_group = affinity_mikado_add_admin_group(array(
            'name'        => 'sticky_amount_group',
            'title'       => esc_html__('Scroll Amount for Sticky Header Appearance', 'affinity'),
            'parent'      => $sticky_amount_container,
            'description' => esc_html__('Enter the amount of pixels for sticky header appearance, or set browser height to "Yes" for predefined sticky header appearance amount', 'affinity')
        ));

        $sticky_amount_row = affinity_mikado_add_admin_row(array(
            'name'   => 'sticky_amount_group',
            'parent' => $sticky_amount_group
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'   => 'mkd_scroll_amount_for_sticky_meta',
                'type'   => 'textsimple',
                'label'  => esc_html__('Amount in px', 'affinity'),
                'parent' => $sticky_amount_row,
                'args'   => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_scroll_amount_for_sticky_fullscreen_meta',
                'type'          => 'yesnosimple',
                'label'         => esc_html__('Browser Height', 'affinity'),
                'default_value' => 'no',
                'parent'        => $sticky_amount_row
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_header_style_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Header Skin', 'affinity'),
                'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'affinity'),
                'parent'        => $header_meta_box,
                'options'       => array(
                    ''             => '',
                    'light-header' => esc_html__('Light', 'affinity'),
                    'dark-header'  => esc_html__('Dark', 'affinity')
                )
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'parent'        => $header_meta_box,
                'type'          => 'select',
                'name'          => 'mkd_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label'         => esc_html__('Enable Header Style on Scroll', 'affinity'),
                'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'affinity'),
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'affinity'),
                    'yes' => esc_html__('Yes', 'affinity')
                )
            )
        );

        $header_standard_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_standard_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_standard
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_custom_sidebar_header_standard_meta',
            'type'        => 'selectblank',
            'label'       => esc_html__('Choose Widget Area to Display', 'affinity'),
            'description' => esc_html__('Choose Custom Widget area to display in Header', 'affinity'),
            'parent'      => $header_standard_type_meta_container,
            'options'     => affinity_mikado_get_custom_sidebars()
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_header_standard_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header In Grid', 'affinity'),
            'description'   => esc_html__('Set header content to be in grid', 'affinity'),
            'parent'        => $header_standard_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_menu_area_in_grid_header_standard_container',
                    'no'  => '#mkd_menu_area_in_grid_header_standard_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_menu_area_in_grid_header_standard_container'
                )
            )
        ));

		affinity_mikado_create_meta_box_field(array(
			'name'          => 'mkd_sticky_header_in_grid_meta',
			'type'          => 'select',
			'label'         => esc_html__('Sticky Header In Grid', 'affinity'),
			'description'   => esc_html__('Set sticky header content to be in grid', 'affinity'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'affinity'),
				'no'  => esc_html__('No', 'affinity'),
				'yes' => esc_html__('Yes', 'affinity')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#mkd_menu_area_in_grid_header_standard_container',
					'no'  => '#mkd_menu_area_in_grid_header_standard_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#mkd_menu_area_in_grid_header_standard_container'
				)
			)
		));

        $menu_area_in_grid_header_standard_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_standard_container',
            'parent'          => $header_standard_type_meta_container,
            'hidden_property' => 'mkd_menu_area_in_grid_header_standard_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_standard_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for header area', 'affinity'),
                'parent'      => $menu_area_in_grid_header_standard_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_transparency_header_standard_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $menu_area_in_grid_header_standard_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_shadow_header_standard_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on grid area', 'affinity'),
            'parent'        => $menu_area_in_grid_header_standard_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_standard_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for header area', 'affinity'),
                'parent'      => $header_standard_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_standard_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_standard_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_standard_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on header area', 'affinity'),
            'parent'        => $header_standard_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        $header_minimal_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_minimal_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_minimal
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_header_minimal_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header In Grid', 'affinity'),
            'description'   => esc_html__('Set header content to be in grid', 'affinity'),
            'parent'        => $header_minimal_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_menu_area_in_grid_header_minimal_container',
                    'no'  => '#mkd_menu_area_in_grid_header_minimal_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_menu_area_in_grid_header_minimal_container'
                )
            )
        ));

        $menu_area_in_grid_header_minimal_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_minimal_container',
            'parent'          => $header_minimal_type_meta_container,
            'hidden_property' => 'mkd_menu_area_in_grid_header_minimal_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_minimal_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for header area', 'affinity'),
                'parent'      => $menu_area_in_grid_header_minimal_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_transparency_header_minimal_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $menu_area_in_grid_header_minimal_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_shadow_header_minimal_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on grid area', 'affinity'),
            'parent'        => $menu_area_in_grid_header_minimal_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_minimal_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for header area', 'affinity'),
                'parent'      => $header_minimal_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_minimal_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_minimal_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_minimal_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on header area', 'affinity'),
            'parent'        => $header_minimal_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_fullscreen_menu_background_image_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Fullscreen Background Image', 'affinity'),
                'description'   => esc_html__('Set background image for Fullscreen Menu', 'affinity'),
                'parent'        => $header_minimal_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_disable_fullscreen_menu_background_image_meta',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Disable Fullscreen Background Image', 'affinity'),
                'description'   => esc_html__('Enabling this option will hide background image in Fullscreen Menu', 'affinity'),
                'parent'        => $header_minimal_type_meta_container
            )
        );

        $header_divided_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_divided_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_divided
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_header_divided_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header In Grid', 'affinity'),
            'description'   => esc_html__('Set header content to be in grid', 'affinity'),
            'parent'        => $header_divided_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_menu_area_in_grid_header_divided_container',
                    'no'  => '#mkd_menu_area_in_grid_header_divided_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_menu_area_in_grid_header_divided_container'
                )
            )
        ));

        $menu_area_in_grid_header_divided_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_divided_container',
            'parent'          => $header_divided_type_meta_container,
            'hidden_property' => 'mkd_menu_area_in_grid_header_divided_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_divided_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for header area', 'affinity'),
                'parent'      => $menu_area_in_grid_header_divided_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_transparency_header_divided_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $menu_area_in_grid_header_divided_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_shadow_header_divided_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on grid area', 'affinity'),
            'parent'        => $menu_area_in_grid_header_divided_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_divided_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for header area', 'affinity'),
                'parent'      => $header_divided_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_divided_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_divided_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_divided_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on header area', 'affinity'),
            'parent'        => $header_divided_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        $header_centered_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_centered_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_centered
            )
        );

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'logo_area_centered_title',
            'parent' => $header_centered_type_meta_container,
            'title'  => esc_html__('Logo Area', 'affinity')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_in_grid_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area In Grid', 'affinity'),
            'description'   => esc_html__('Set logo area content to be in grid', 'affinity'),
            'parent'        => $header_centered_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_area_in_grid_header_centered_container',
                    'no'  => '#mkd_logo_area_in_grid_header_centered_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_area_in_grid_header_centered_container'
                )
            )
        ));

        $logo_area_in_grid_header_centered_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_header_centered_container',
            'parent'          => $header_centered_type_meta_container,
            'hidden_property' => 'mkd_logo_area_in_grid_header_centered_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_grid_background_color_header_centered_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for logo area', 'affinity'),
                'parent'      => $logo_area_in_grid_header_centered_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_grid_background_transparency_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $logo_area_in_grid_header_centered_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_in_grid_border_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Border', 'affinity'),
            'description'   => esc_html__('Set border on grid area', 'affinity'),
            'parent'        => $logo_area_in_grid_header_centered_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_area_in_grid_border_header_centered_container',
                    'no'  => '#mkd_logo_area_in_grid_border_header_centered_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_area_in_grid_border_header_centered_container'
                )
            )
        ));

        $logo_area_in_grid_border_header_centered_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_border_header_centered_container',
            'parent'          => $logo_area_in_grid_header_centered_container,
            'hidden_property' => 'mkd_logo_area_in_grid_border_header_centered_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_logo_area_in_grid_border_color_header_centered_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'affinity'),
            'description' => esc_html__('Set border color for grid area', 'affinity'),
            'parent'      => $logo_area_in_grid_border_header_centered_container
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_background_color_header_centered_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for logo area', 'affinity'),
                'parent'      => $header_centered_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_background_transparency_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_centered_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_border_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area Border', 'affinity'),
            'description'   => esc_html__('Set border on logo area', 'affinity'),
            'parent'        => $header_centered_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_border_bottom_color_container',
                    'no'  => '#mkd_logo_border_bottom_color_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_border_bottom_color_container'
                )
            )
        ));

        $border_bottom_color_centered_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_border_bottom_color_container',
            'parent'          => $header_centered_type_meta_container,
            'hidden_property' => 'mkd_logo_area_border_header_centered_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_logo_area_border_color_header_centered_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'affinity'),
            'description' => esc_html__('Choose color of logo area bottom border', 'affinity'),
            'parent'      => $border_bottom_color_centered_container
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_wrapper_padding_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Logo Padding', 'affinity'),
                'description' => esc_html__('Insert padding in format: 0px 0px 1px 0px', 'affinity'),
                'parent'      => $header_centered_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'menu_area_centered_title',
            'parent' => $header_centered_type_meta_container,
            'title'  => esc_html__('Menu Area', 'affinity')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area In Grid', 'affinity'),
            'description'   => esc_html__('Set menu area content to be in grid', 'affinity'),
            'parent'        => $header_centered_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_menu_area_in_grid_header_centered_container',
                    'no'  => '#mkd_menu_area_in_grid_header_centered_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_menu_area_in_grid_header_centered_container'
                )
            )
        ));

        $menu_area_in_grid_header_centered_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_centered_container',
            'parent'          => $header_centered_type_meta_container,
            'hidden_property' => 'mkd_menu_area_in_grid_header_centered_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_centered_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for menu area', 'affinity'),
                'parent'      => $menu_area_in_grid_header_centered_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_transparency_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $menu_area_in_grid_header_centered_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_shadow_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on grid area', 'affinity'),
            'parent'        => $menu_area_in_grid_header_centered_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_centered_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for menu area', 'affinity'),
                'parent'      => $header_centered_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_centered_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_centered_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on menu area', 'affinity'),
            'parent'        => $header_centered_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));


        $header_standard_extended_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_standard_extended_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_standard_extended
            )
        );

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'logo_area_standard_extended_title',
            'parent' => $header_standard_extended_type_meta_container,
            'title'  => esc_html__('Logo Area', 'affinity')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_in_grid_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area In Grid', 'affinity'),
            'description'   => esc_html__('Set logo area content to be in grid', 'affinity'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_area_in_grid_header_standard_extended_container',
                    'no'  => '#mkd_logo_area_in_grid_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_area_in_grid_header_standard_extended_container'
                )
            )
        ));

        $logo_area_in_grid_header_standard_extended_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_header_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'mkd_logo_area_in_grid_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_grid_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for logo area', 'affinity'),
                'parent'      => $logo_area_in_grid_header_standard_extended_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_grid_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $logo_area_in_grid_header_standard_extended_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_in_grid_border_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Border', 'affinity'),
            'description'   => esc_html__('Set border on grid area', 'affinity'),
            'parent'        => $logo_area_in_grid_header_standard_extended_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_area_in_grid_border_header_standard_extended_container',
                    'no'  => '#mkd_logo_area_in_grid_border_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_area_in_grid_border_header_standard_extended_container'
                )
            )
        ));

        $logo_area_in_grid_border_header_standard_extended_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_border_header_standard_extended_container',
            'parent'          => $logo_area_in_grid_header_standard_extended_container,
            'hidden_property' => 'mkd_logo_area_in_grid_border_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_logo_area_in_grid_border_color_header_standard_extended_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'affinity'),
            'description' => esc_html__('Set border color for grid area', 'affinity'),
            'parent'      => $logo_area_in_grid_border_header_standard_extended_container
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for logo area', 'affinity'),
                'parent'      => $header_standard_extended_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_logo_area_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_standard_extended_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_logo_area_border_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area Border', 'affinity'),
            'description'   => esc_html__('Set border on logo area', 'affinity'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_logo_border_bottom_color_standard_extended_container',
                    'no'  => '#mkd_logo_border_bottom_color_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_logo_border_bottom_color_standard_extended_container'
                )
            )
        ));

        $border_bottom_color_standard_extended_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_border_bottom_color_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'mkd_logo_area_border_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_logo_area_border_color_header_standard_extended_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'affinity'),
            'description' => esc_html__('Choose color of logo area bottom border', 'affinity'),
            'parent'      => $border_bottom_color_standard_extended_container
        ));

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'menu_area_standard_extended_title',
            'parent' => $header_standard_extended_type_meta_container,
            'title'  => esc_html__('Menu Area', 'affinity')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area In Grid', 'affinity'),
            'description'   => esc_html__('Set menu area content to be in grid', 'affinity'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_menu_area_in_grid_header_standard_extended_container',
                    'no'  => '#mkd_menu_area_in_grid_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_menu_area_in_grid_header_standard_extended_container'
                )
            )
        ));

        $menu_area_in_grid_header_standard_extended_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'mkd_menu_area_in_grid_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for menu area', 'affinity'),
                'parent'      => $menu_area_in_grid_header_standard_extended_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'affinity'),
                'description' => esc_html__('Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $menu_area_in_grid_header_standard_extended_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_in_grid_shadow_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on grid area', 'affinity'),
            'parent'        => $menu_area_in_grid_header_standard_extended_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for menu area', 'affinity'),
                'parent'      => $header_standard_extended_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_standard_extended_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on menu area', 'affinity'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        $header_box_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_box_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'parent'        => $header_box_type_meta_container,
                'type'          => 'select',
                'name'          => 'mkd_top_area_gradient_header_box_meta',
                'default_value' => '',
                'label'         => esc_html__('Top Area Gradient Background', 'affinity'),
                'description'   => esc_html__('Set gradient background for top menu area', 'affinity'),
                'options'       => affinity_mikado_get_gradient_left_to_right_styles('',true)
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_grid_background_color_header_box_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Set grid background color for header area', 'affinity'),
                'parent'      => $header_box_type_meta_container
            )
        );


        $header_tabbed_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_tabbed_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_tabbed
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_color_header_tabbed_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'affinity'),
                'description' => esc_html__('Choose a background color for header area', 'affinity'),
                'parent'      => $header_tabbed_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_menu_area_background_transparency_header_tabbed_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'affinity'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'affinity'),
                'parent'      => $header_tabbed_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_menu_area_shadow_header_tabbed_meta',
            'type'          => 'select',
            'label'         => esc_html__('Header Area Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on header area', 'affinity'),
            'parent'        => $header_tabbed_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        $top_bar_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_top_bar_container_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_top_header
            )
        );

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'top_bar_section_title',
            'parent' => $top_bar_container,
            'title'  => esc_html__('Top Bar', 'affinity')
        ));

        $top_bar_global_option = affinity_mikado_options()->getOptionValue('top_bar');

        $top_bar_default_dependency = array(
            '' => '#mkd_top_bar_container_no_style'
        );

        $top_bar_show_array = array(
            'yes' => '#mkd_top_bar_container_no_style'
        );

        $top_bar_hide_array = array(
            'no' => '#mkd_top_bar_container_no_style'
        );

        if($top_bar_global_option === 'yes') {
            $top_bar_show_array           = array_merge($top_bar_show_array, $top_bar_default_dependency);
            $top_bar_container_hide_array = array('no');
        } else {
            $top_bar_hide_array           = array_merge($top_bar_hide_array, $top_bar_default_dependency);
            $top_bar_container_hide_array = array('', 'no');
        }


        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_top_bar_meta',
            'type'          => 'select',
            'label'         => esc_html__('Enable Top Bar on This Page', 'affinity'),
            'description'   => esc_html__('Enabling this option will enable top bar on this page', 'affinity'),
            'parent'        => $top_bar_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity'),
                'no'  => esc_html__('No', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'show'       => $top_bar_show_array,
                'hide'       => $top_bar_hide_array
            )
        ));

        $top_bar_container = affinity_mikado_add_admin_container_no_style(array(
            'name'            => 'top_bar_container_no_style',
            'parent'          => $top_bar_container,
            'hidden_property' => 'mkd_top_bar_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => $top_bar_container_hide_array
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_top_bar_in_grid_meta',
            'type'          => 'select',
            'label'         => esc_html__('Top Bar In Grid', 'affinity'),
            'description'   => esc_html__('Set top bar content to be in grid', 'affinity'),
            'parent'        => $top_bar_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'    => 'mkd_top_bar_skin_meta',
            'type'    => 'select',
            'label'   => esc_html__('Top Bar Skin', 'affinity'),
            'options' => array(
                ''      => esc_html__('Default', 'affinity'),
                'light' => esc_html__('White', 'affinity'),
                'dark'  => esc_html__('Black', 'affinity'),
                'gray'  => esc_html__('Gray', 'affinity'),
            ),
            'parent'  => $top_bar_container
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'   => 'mkd_top_bar_background_color_meta',
            'type'   => 'color',
            'label'  => esc_html__('Top Bar Background Color', 'affinity'),
            'parent' => $top_bar_container
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_top_bar_background_transparency_meta',
            'type'        => 'text',
            'label'       => esc_html__('Top Bar Background Color Transparency', 'affinity'),
            'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'affinity'),
            'parent'      => $top_bar_container,
            'args'        => array(
                'col_width' => 3
            )
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_top_bar_border_meta',
            'type'          => 'select',
            'label'         => esc_html__('Top Bar Border', 'affinity'),
            'description'   => esc_html__('Set border on top bar', 'affinity'),
            'parent'        => $top_bar_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#mkd_top_bar_border_container',
                    'no'  => '#mkd_top_bar_border_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#mkd_top_bar_border_container'
                )
            )
        ));

        $top_bar_border_container = affinity_mikado_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'top_bar_border_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'mkd_top_bar_border_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_top_bar_border_color_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'affinity'),
            'description' => esc_html__('Choose color for top bar border', 'affinity'),
            'parent'      => $top_bar_border_container
        ));








        $top_line_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_top_line_container_meta_container',
                    'hidden_property' => 'mkd_header_type_meta',

                ),
                $temp_array_top_line
            )
        );

        affinity_mikado_add_admin_section_title(array(
            'name'   => 'top_line_section_title',
            'parent' => $top_line_container,
            'title'  => esc_html__('Top LIne', 'affinity')
        ));

        $top_line_global_option = affinity_mikado_options()->getOptionValue('top_line');

        $top_line_default_dependency = array(
            '' => '#mkd_top_line_container_no_style'
        );

        $top_line_show_array = array(
            'yes' => '#mkd_top_line_container_no_style'
        );

        $top_line_hide_array = array(
            'no' => '#mkd_top_line_container_no_style'
        );

        if($top_line_global_option === 'yes') {
            $top_line_show_array           = array_merge($top_line_show_array, $top_line_default_dependency);
            $top_line_container_hide_array = array('no');
        } else {
            $top_line_hide_array           = array_merge($top_line_hide_array, $top_line_default_dependency);
            $top_line_container_hide_array = array('', 'no');
        }


        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_top_line_meta',
            'type'          => 'select',
            'label'         => esc_html__('Enable Top Line on This Page', 'affinity'),
            'description'   => esc_html__('Enabling this option will enable top line on this page', 'affinity'),
            'parent'        => $top_line_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity'),
                'no'  => esc_html__('No', 'affinity')
            ),
            'args'          => array(
                'dependence' => true,
                'show'       => $top_line_show_array,
                'hide'       => $top_line_hide_array
            )
        ));

        $top_line_container = affinity_mikado_add_admin_container_no_style(array(
            'name'            => 'top_line_container_no_style',
            'parent'          => $top_line_container,
            'hidden_property' => 'mkd_top_line_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => $top_line_container_hide_array
        ));

            $group_top_line_colors = affinity_mikado_add_admin_group(array(
                'name'        => 'group_line_colors',
                'title'       => esc_html__('Top Line Colors', 'affinity'),
                'description' => esc_html__('Define colors for top line (not all of them are mandatory)', 'affinity'),
                'parent'      => $top_line_container
            ));

                affinity_mikado_create_meta_box_field(array(
                    'name'        => 'mkd_top_line_color_1_meta',
                    'type'        => 'colorsimple',
                    'label'       => esc_html__('Color 1', 'affinity'),
                    'parent'      => $group_top_line_colors
                ));

                affinity_mikado_create_meta_box_field(array(
                    'name'        => 'mkd_top_line_color_2_meta',
                    'type'        => 'colorsimple',
                    'label'       => esc_html__('Color 2', 'affinity'),
                    'parent'      => $group_top_line_colors
                ));

                affinity_mikado_create_meta_box_field(array(
                    'name'        => 'mkd_top_line_color_3_meta',
                    'type'        => 'colorsimple',
                    'label'       => esc_html__('Color 3', 'affinity'),
                    'parent'      => $group_top_line_colors
                ));

                affinity_mikado_create_meta_box_field(array(
                    'name'        => 'mkd_top_line_color_4_meta',
                    'type'        => 'colorsimple',
                    'label'       => esc_html__('Color 4', 'affinity'),
                    'parent'      => $group_top_line_colors
                ));

        $header_vertical_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_vertical_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta'
                ),
                $temp_array_vertical
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_vertical_header_background_color_meta',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'affinity'),
            'description' => esc_html__('Set background color for vertical menu', 'affinity'),
            'parent'      => $header_vertical_type_meta_container
        ));

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_vertical_header_background_image_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'affinity'),
                'description'   => esc_html__('Set background image for vertical menu', 'affinity'),
                'parent'        => $header_vertical_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_disable_vertical_header_background_image_meta',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Disable Background Image', 'affinity'),
                'description'   => esc_html__('Enabling this option will hide background image in Vertical Menu', 'affinity'),
                'parent'        => $header_vertical_type_meta_container
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_vertical_header_shadow_meta',
            'type'          => 'select',
            'label'         => esc_html__('Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on vertical menu', 'affinity'),
            'parent'        => $header_vertical_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_vertical_header_center_content_meta',
            'type'          => 'select',
            'label'         => esc_html__('Center Content', 'affinity'),
            'description'   => esc_html__('Set content in vertical center', 'affinity'),
            'parent'        => $header_vertical_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

        $header_vertical_compact_type_meta_container = affinity_mikado_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'mkd_header_vertical_compact_type_meta_container',
                    'hidden_property' => 'mkd_header_type_meta'
                ),
                $temp_array_vertical_compact
            )
        );

        affinity_mikado_create_meta_box_field(array(
            'name'        => 'mkd_vertical_compact_header_background_color_meta',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'affinity'),
            'description' => esc_html__('Set background color for vertical compact menu', 'affinity'),
            'parent'      => $header_vertical_compact_type_meta_container
        ));

        affinity_mikado_create_meta_box_field(array(
            'name'          => 'mkd_vertical_compact_header_shadow_meta',
            'type'          => 'select',
            'label'         => esc_html__('Shadow', 'affinity'),
            'description'   => esc_html__('Set shadow on vertical menu', 'affinity'),
            'parent'        => $header_vertical_compact_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'affinity'),
                'yes' => esc_html__('Yes', 'affinity')
            )
        ));

    }
    add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_header_meta_box_map');
}
