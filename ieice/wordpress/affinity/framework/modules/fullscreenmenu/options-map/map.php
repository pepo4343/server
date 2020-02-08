<?php

if(!function_exists('affinity_mikado_fullscreen_menu_options_map')) {

    function affinity_mikado_fullscreen_menu_options_map() {

        $fullscreen_panel = affinity_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Fullscreen Menu', 'affinity'),
                'name'            => 'panel_fullscreen_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-standard',
                    'header-standard-extended',
                    'header-box',
                    'header-vertical',
                    'header-divided',
                    'header-centered',
                    'header-tabbed',
                    'header-vertical-compact',
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'select',
                'name'          => 'fullscreen_menu_animation_style',
                'default_value' => 'fade-push-text-top',
                'label'         => esc_html__('Fullscreen Menu Overlay Animation', 'affinity'),
                'description'   => esc_html__('Choose animation type for fullscreen menu overlay', 'affinity'),
                'options'       => array(
                    'fade-push-text-top'   => esc_html__('Fade Push Text Top', 'affinity'),
                    'fade-push-text-right' => esc_html__('Fade Push Text Right', 'affinity'),
                    'fade-text-scaledown'  => esc_html__('Fade Text Scaledown', 'affinity')
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_logo',
                'default_value' => '',
                'label'         => esc_html__('Logo in Fullscreen Menu Overlay', 'affinity'),
                'description'   => esc_html__('Place logo in top left corner of fullscreen menu overlay', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'yesno',
                'name'          => 'fullscreen_in_grid',
                'default_value' => 'no',
                'label'         => esc_html__('Fullscreen Menu in Grid', 'affinity'),
                'description'   => esc_html__('Enabling this option will put fullscreen menu content in grid', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'selectblank',
                'name'          => 'fullscreen_alignment',
                'default_value' => '',
                'label'         => esc_html__('Fullscreen Menu Alignment', 'affinity'),
                'description'   => esc_html__('Choose alignment for fullscreen menu content', 'affinity'),
                'options'       => array(
                    "left"   => esc_html__("Left", 'affinity'),
                    "center" => esc_html__("Center", 'affinity'),
                    "right"  => esc_html__("Right", 'affinity')
                )
            )
        );

        $background_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'background_group',
                'title'       => esc_html__('Background', 'affinity'),
                'description' => esc_html__('Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)', 'affinity')

            )
        );

        $background_group_row = affinity_mikado_add_admin_row(
            array(
                'parent' => $background_group,
                'name'   => 'background_group_row'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $background_group_row,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'affinity')
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $background_group_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_background_transparency',
                'default_value' => '',
                'label'         => esc_html__('Transparency (values:0-1)', 'affinity')
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_menu_background_image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'affinity'),
                'description'   => esc_html__('Choose a background image for Fullscreen Menu background', 'affinity')
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_menu_pattern_image',
                'default_value' => '',
                'label'         => esc_html__('Pattern Background Image', 'affinity'),
                'description'   => esc_html__('Choose a pattern image for Fullscreen Menu background', 'affinity')
            )
        );

//1st level style group
        $first_level_style_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'first_level_style_group',
                'title'       => esc_html__('1st Level Style', 'affinity'),
                'description' => esc_html__('Define styles for 1st level in Fullscreen Menu', 'affinity')
            )
        );

        $first_level_style_row1 = affinity_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row1'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_active_color',
                'default_value' => '',
                'label'         => esc_html__('Active Text Color', 'affinity'),
            )
        );

        $first_level_style_row2 = affinity_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row2'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_active_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Active Color', 'affinity'),
            )
        );

        $first_level_style_row3 = affinity_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row3'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $first_level_style_row4 = affinity_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row4'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'affinity'),
                'options'       => affinity_mikado_get_font_style_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'affinity'),
                'options'       => affinity_mikado_get_font_weight_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'affinity'),
                'options'       => affinity_mikado_get_text_transform_array()
            )
        );

//2nd level style group
        $second_level_style_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'second_level_style_group',
                'title'       => esc_html__('2nd Level Style', 'affinity'),
                'description' => esc_html__('Define styles for 2nd level in Fullscreen Menu', 'affinity')
            )
        );

        $second_level_style_row1 = affinity_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row1'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'affinity'),
            )
        );

        $second_level_style_row2 = affinity_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row2'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts_2nd',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight_2nd',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_style_row3 = affinity_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row3'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'affinity'),
                'options'       => affinity_mikado_get_font_style_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'affinity'),
                'options'       => affinity_mikado_get_font_weight_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing_2nd',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform_2nd',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'affinity'),
                'options'       => affinity_mikado_get_text_transform_array()
            )
        );

        $third_level_style_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'third_level_style_group',
                'title'       => esc_html__('3rd Level Style', 'affinity'),
                'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu', 'affinity')
            )
        );

        $third_level_style_row1 = affinity_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'third_level_style_row1'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'affinity'),
            )
        );

        $third_level_style_row2 = affinity_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'second_level_style_row2'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts_3rd',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight_3rd',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_style_row3 = affinity_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'second_level_style_row3'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'affinity'),
                'options'       => affinity_mikado_get_font_style_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'affinity'),
                'options'       => affinity_mikado_get_font_weight_array()
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing_3rd',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform_3rd',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'affinity'),
                'options'       => affinity_mikado_get_text_transform_array()
            )
        );

        $icon_colors_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'fullscreen_menu_icon_colors_group',
                'title'       => esc_html__('Full Screen Menu Icon Style', 'affinity'),
                'description' => esc_html__('Define styles for Fullscreen Menu Icon', 'affinity')
            )
        );

        $icon_colors_row1 = affinity_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row1'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_color',
                'label'  => esc_html__('Color', 'affinity'),
            )
        );
        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'affinity'),
            )
        );
        $icon_colors_row2 = affinity_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row2',
                'next'   => true
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row2,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_light_icon_color',
                'label'  => esc_html__('Light Menu Icon Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row2,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_light_icon_hover_color',
                'label'  => esc_html__('Light Menu Icon Hover Color', 'affinity'),
            )
        );

        $icon_colors_row3 = affinity_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row3',
                'next'   => true
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row3,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_dark_icon_color',
                'label'  => esc_html__('Dark Menu Icon Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row3,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_dark_icon_hover_color',
                'label'  => esc_html__('Dark Menu Icon Hover Color', 'affinity'),
            )
        );

        $icon_colors_row4 = affinity_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row4',
                'next'   => true
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row4,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_background_color',
                'label'  => esc_html__('Background Color', 'affinity'),
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row4,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_background_hover_color',
                'label'  => esc_html__('Background Hover Color', 'affinity'),
            )
        );

        $icon_spacing_group = affinity_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'icon_spacing_group',
                'title'       => esc_html__('Full Screen Menu Icon Spacing', 'affinity'),
                'description' => esc_html__('Define padding and margin for full screen menu icon', 'affinity')
            )
        );

        $icon_spacing_row = affinity_mikado_add_admin_row(
            array(
                'parent' => $icon_spacing_group,
                'name'   => 'icon_spacing_row'
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Padding Left', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Right', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_margin_left',
                'default_value' => '',
                'label'         => esc_html__('Margin Left', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        affinity_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_margin_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Right', 'affinity'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

    }

    add_action('affinity_mikado_header_options_map', 'affinity_mikado_fullscreen_menu_options_map');

}