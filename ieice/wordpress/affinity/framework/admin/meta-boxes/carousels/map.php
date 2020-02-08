<?php

//Carousels

if (!function_exists('affinity_mikado_carousel_meta_box_map')) {
    function affinity_mikado_carousel_meta_box_map() {

        $carousel_meta_box = affinity_mikado_create_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'affinity'),
                'name' => 'carousel_meta'
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_carousel_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Image', 'affinity'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'affinity'),
                'parent'      => $carousel_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_carousel_hover_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Hover Image', 'affinity'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'affinity'),
                'parent'      => $carousel_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_carousel_item_link',
                'type'        => 'text',
                'label'       => esc_html__('Link', 'affinity'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'affinity'),
                'parent'      => $carousel_meta_box
            )
        );

        affinity_mikado_create_meta_box_field(
            array(
                'name'        => 'mkd_carousel_item_target',
                'type'        => 'selectblank',
                'label'       => esc_html__('Target', 'affinity'),
                'description' => esc_html__('Specify where to open the linked document', 'affinity'),
                'parent'      => $carousel_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'affinity'),
                    '_blank' => esc_html__('Blank', 'affinity')
                )
            )
        );

    }
    add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_carousel_meta_box_map');
}