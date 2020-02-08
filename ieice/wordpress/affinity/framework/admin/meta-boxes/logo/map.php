<?php

if (!function_exists('affinity_mikado_logo_meta_box_map')) {
    function affinity_mikado_logo_meta_box_map() {

        $logo_meta_box = affinity_mikado_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Logo', 'affinity'),
                'name'  => 'logo_meta'
            )
        );


        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_logo_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Default', 'affinity'),
                'description'   => esc_html__('Choose a default logo image to display ', 'affinity'),
                'parent'        => $logo_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_logo_image_dark_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Dark', 'affinity'),
                'description'   => esc_html__('Choose a default logo image to display ', 'affinity'),
                'parent'        => $logo_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_logo_image_light_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Light', 'affinity'),
                'description'   => esc_html__('Choose a default logo image to display ', 'affinity'),
                'parent'        => $logo_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_logo_image_sticky_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Sticky', 'affinity'),
                'description'   => esc_html__('Choose a default logo image to display ', 'affinity'),
                'parent'        => $logo_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'          => 'mkd_logo_image_mobile_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Mobile', 'affinity'),
                'description'   => esc_html__('Choose a default logo image to display ', 'affinity'),
                'parent'        => $logo_meta_box
            )
        );
    }

    add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_logo_meta_box_map');
}