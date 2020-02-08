<?php

//Slider

if (!function_exists('affinity_mikado_slider_meta_box_map')) {
	function affinity_mikado_slider_meta_box_map() {

		global $affinity_options_fontstyle;
		global $affinity_options_fontweight;
		global $affinity_options_texttransform;
		global $affinity_IconCollections;

		$slider_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Background Type', 'affinity'),
				'name'  => 'slides_type'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_background_type',
				'type'          => 'imagevideo',
				'default_value' => 'image',
				'label'         => esc_html__('Slide Background Type', 'affinity'),
				'description'   => esc_html__('Do you want to upload an image or video?', 'affinity'),
				'parent'        => $slider_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd-meta-box-mkd_slides_video_settings",
					"dependence_show_on_yes" => "#mkd-meta-box-mkd_slides_image_settings"
				)
			)
		);


		//Slide Image

		$slider_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Background Image', 'affinity'),
				'name'            => 'mkd_slides_image_settings',
				'hidden_property' => 'mkd_slide_background_type',
				'hidden_values'   => array('video')
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_image',
				'type'        => 'image',
				'label'       => esc_html__('Slide Image', 'affinity'),
				'description' => esc_html__('Choose background image', 'affinity'),
				'parent'      => $slider_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'affinity'),
				'description' => esc_html__('Choose overlay image (pattern) for background image', 'affinity'),
				'parent'      => $slider_meta_box
			)
		);


		//Slide Video

		$video_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Background Video', 'affinity'),
				'name'            => 'mkd_slides_video_settings',
				'hidden_property' => 'mkd_slide_background_type',
				'hidden_values'   => array('image')
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_video_webm',
				'type'        => 'text',
				'label'       => esc_html__('Video - webm', 'affinity'),
				'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'affinity'),
				'parent'      => $video_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_video_mp4',
				'type'        => 'text',
				'label'       => esc_html__('Video - mp4', 'affinity'),
				'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'affinity'),
				'parent'      => $video_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_video_ogv',
				'type'        => 'text',
				'label'       => esc_html__('Video - ogv', 'affinity'),
				'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'affinity'),
				'parent'      => $video_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_video_image',
				'type'        => 'image',
				'label'       => esc_html__('Video Preview Image', 'affinity'),
				'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'affinity'),
				'parent'      => $video_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_video_overlay',
				'type'          => 'yesempty',
				'default_value' => '',
				'label'         => esc_html__('Video Overlay Image', 'affinity'),
				'description'   => esc_html__('Do you want to have a overlay image on video?', 'affinity'),
				'parent'        => $video_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkd_mkd_slide_video_overlay_container"
				)
			)
		);

		$slide_video_overlay_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_video_overlay_container',
			'parent'          => $video_meta_box,
			'hidden_property' => 'mkd_slide_video_overlay',
			'hidden_values'   => array('', 'no')
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_video_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'affinity'),
				'description' => esc_html__('Choose overlay image (pattern) for background video.', 'affinity'),
				'parent'      => $slide_video_overlay_container
			)
		);


		//Slide General

		$general_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide General', 'affinity'),
				'name'  => 'mkd_slides_general_settings'
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'mkd_text_content_title',
				'title'  => esc_html__('Slide Text Content', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_hide_title',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Hide Slide Title', 'affinity'),
				'description'   => esc_html__('Do you want to hide slide title?', 'affinity'),
				'parent'        => $general_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd_mkd_slide_hide_title_container, #mkd-meta-box-mkd_slides_title",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$slide_hide_title_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_hide_title_container',
			'parent'          => $general_meta_box,
			'hidden_property' => 'mkd_slide_hide_title',
			'hidden_value'    => 'yes'
		));

		$group_title_link = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Title Link', 'affinity'),
			'name'        => 'group_title_link',
			'description' => esc_html__('Define styles for title', 'affinity'),
			'parent'      => $slide_hide_title_container
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_title_link
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_link',
				'type'   => 'textsimple',
				'label'  => esc_html__('Link', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'mkd_slide_title_target',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'affinity'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'affinity'),
					"_blank" => esc_html__("Blank", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_subtitle',
				'type'        => 'text',
				'label'       => esc_html__('Subtitle Text', 'affinity'),
				'description' => esc_html__('Enter text for subtitle', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_text',
				'type'        => 'text',
				'label'       => esc_html__('Body Text', 'affinity'),
				'description' => esc_html__('Enter slide body text', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_label',
				'type'        => 'text',
				'label'       => esc_html__('Button 1 Text', 'affinity'),
				'description' => esc_html__('Enter text to be displayed on button 1', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		$group_button1 = affinity_mikado_add_admin_group(array(
			'title'  => esc_html__('Button 1 Link', 'affinity'),
			'name'   => 'group_button1',
			'parent' => $general_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_button1
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_link',
				'type'          => 'textsimple',
				'label'         => esc_html__('Link', 'affinity'),
				'default_value' => '',
				'parent'        => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'mkd_slide_button_target',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'affinity'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'affinity'),
					"_blank" => esc_html__("Blank", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_label2',
				'type'        => 'text',
				'label'       => esc_html__('Button 2 Text', 'affinity'),
				'description' => esc_html__('Enter text to be displayed on button 2', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		$group_button2 = affinity_mikado_add_admin_group(array(
			'title'  => esc_html__('Button 2 Link', 'affinity'),
			'name'   => 'group_button2',
			'parent' => $general_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_button2
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_link2',
				'type'          => 'textsimple',
				'default_value' => '',
				'label'         => esc_html__('Link', 'affinity'),
				'parent'        => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'mkd_slide_button_target2',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'affinity'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'affinity'),
					"_blank" => esc_html__("Blank", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_text_content_top_margin',
				'type'        => 'text',
				'label'       => esc_html__('Text Content Top Margin', 'affinity'),
				'description' => esc_html__('Enter top margin for text content', 'affinity'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_text_content_bottom_margin',
				'type'        => 'text',
				'label'       => esc_html__('Text Content Bottom Margin', 'affinity'),
				'description' => esc_html__('Enter bottom margin for text content', 'affinity'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'mkd_graphic_title',
				'title'  => esc_html__('Slide Graphic', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_thumbnail',
				'type'        => 'image',
				'label'       => esc_html__('Slide Graphic', 'affinity'),
				'description' => esc_html__('Choose slide graphic', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_thumbnail_link',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Link', 'affinity'),
				'description' => esc_html__('Enter URL to link slide graphic', 'affinity'),
				'parent'      => $general_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_graphic_top_padding',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Top Padding', 'affinity'),
				'description' => esc_html__('Enter top padding for slide graphic', 'affinity'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_graphic_bottom_padding',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Bottom Padding', 'affinity'),
				'description' => esc_html__('Enter bottom padding for slide graphic', 'affinity'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'mkd_general_styling_title',
				'title'  => esc_html__('General Styling', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $general_meta_box,
				'type'          => 'selectblank',
				'name'          => 'mkd_slide_header_style',
				'default_value' => '',
				'label'         => esc_html__('Header Style', 'affinity'),
				'description'   => esc_html__('Header style will be applied when this slide is in focus', 'affinity'),
				'options'       => array(
					"light" => esc_html__("Light", 'affinity'),
					"dark"  => esc_html__("Dark", 'affinity'),
				)
			)
		);

		//Slide Behaviour

		$behaviours_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Behaviours', 'affinity'),
				'name'  => 'mkd_slides_behaviour_settings'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_scroll_to_section',
				'type'        => 'text',
				'label'       => esc_html__('Scroll to Section', 'affinity'),
				'description' => esc_html__('An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, "#contact\"', 'affinity'),
				'parent'      => $behaviours_meta_box
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_scroll_to_section_position',
				'type'        => 'select',
				'label'       => esc_html__('Scroll to Section Icon Position', 'affinity'),
				'description' => esc_html__('Choose position for anchor icon - scroll to section', 'affinity'),
				'parent'      => $behaviours_meta_box,
				'options'     => array(
					"in_content"       => esc_html__("In Text Content", 'affinity'),
					"bottom_of_slider" => esc_html__("Bottom of the slide", 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name'   => 'mkd_image_animation_title',
				'title'  => esc_html__('Slide Image Animation', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_enable_image_animation',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Image Animation', 'affinity'),
				'description'   => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'affinity'),
				'parent'        => $behaviours_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkd_mkd_enable_image_animation_container"
				)
			)
		);

		$enable_image_animation_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_enable_image_animation_container',
			'parent'          => $behaviours_meta_box,
			'hidden_property' => 'mkd_enable_image_animation',
			'hidden_value'    => 'no'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $enable_image_animation_container,
				'type'          => 'select',
				'name'          => 'mkd_enable_image_animation_type',
				'default_value' => 'zoom_center',
				'label'         => esc_html__('Animation Type', 'affinity'),
				'options'       => array(
					"zoom_center"       => esc_html__("Zoom In Center", 'affinity'),
					"zoom_top_left"     => esc_html__("Zoom In to Top Left", 'affinity'),
					"zoom_top_right"    => esc_html__("Zoom In to Top Right", 'affinity'),
					"zoom_bottom_left"  => esc_html__("Zoom In to Bottom Left", 'affinity'),
					"zoom_bottom_right" => esc_html__("Zoom In to Bottom Right", 'affinity'),
				)
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name'   => 'mkd_content_animation_title',
				'title'  => esc_html__('Slide Content Entry Animations', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $behaviours_meta_box,
				'type'          => 'select',
				'name'          => 'mkd_slide_thumbnail_animation',
				'default_value' => 'flip',
				'label'         => esc_html__('Graphic Entry Animation', 'affinity'),
				'description'   => esc_html__('Choose entry animation for graphic', 'affinity'),
				'options'       => array(
					"flip"              => esc_html__("Flip", 'affinity'),
					"fade"              => esc_html__("Fade In", 'affinity'),
					"from_bottom"       => esc_html__("From Bottom", 'affinity'),
					"from_top"          => esc_html__("From Top", 'affinity'),
					"from_left"         => esc_html__("From Left", 'affinity'),
					"from_right"        => esc_html__("From Right", 'affinity'),
					"clip_anim_hor"     => esc_html__("Clip Animation Horizontal", 'affinity'),
					"clip_anim_ver"     => esc_html__("Clip Animation Vertical", 'affinity'),
					"clip_anim_puzzle"  => esc_html__("Clip Animation Puzzle", 'affinity'),
					"without_animation" => esc_html__("No Animation", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $behaviours_meta_box,
				'type'          => 'select',
				'name'          => 'mkd_slide_content_animation',
				'default_value' => 'all_at_once',
				'label'         => esc_html__('Content Entry Animation', 'affinity'),
				'description'   => esc_html__('Choose entry animation for whole slide content group (title, subtitle, text, button)', 'affinity'),
				'options'       => array(
					"all_at_once"       => esc_html__("All At Once", 'affinity'),
					"one_by_one"        => esc_html__("One By One", 'affinity'),
					"without_animation" => esc_html__("No Animation", 'affinity'),
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"all_at_once"       => "",
						"one_by_one"        => "",
						"without_animation" => "#mkd_mkd_slide_content_animation_container"
					),
					"show"       => array(
						"all_at_once"       => "#mkd_mkd_slide_content_animation_container",
						"one_by_one"        => "#mkd_mkd_slide_content_animation_container",
						"without_animation" => ""
					)
				)
			)
		);

		$slide_content_animation_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_content_animation_container',
			'parent'          => $behaviours_meta_box,
			'hidden_property' => 'mkd_slide_content_animation',
			'hidden_value'    => 'without_animation'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $slide_content_animation_container,
				'type'          => 'select',
				'name'          => 'mkd_slide_content_animation_direction',
				'default_value' => 'from_bottom',
				'label'         => esc_html__('Animation Direction', 'affinity'),
				'options'       => array(
					"from_bottom" => esc_html__("From Bottom", 'affinity'),
					"from_top"    => esc_html__("From Top", 'affinity'),
					"from_left"   => esc_html__("From Left", 'affinity'),
					"from_right"  => esc_html__("From Right", 'affinity'),
					"fade"        => esc_html__("Fade In", 'affinity'),
				)
			)
		);

		//Slide Title Styles

		$title_style_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Title Style', 'affinity'),
				'name'            => 'mkd_slides_title',
				'hidden_property' => 'mkd_slide_hide_title',
				'hidden_values'   => array('yes')
			)
		);

		$title_text_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Title Text Style', 'affinity'),
			'description' => esc_html__('Define styles for title text', 'affinity'),
			'name'        => 'mkd_title_text_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$row2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $title_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'affinity'),
				'parent' => $row2
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_title_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontstyle
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_title_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontweight
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_title_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_texttransform
			)
		);

		$title_background_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Background', 'affinity'),
			'description' => esc_html__('Define background for title', 'affinity'),
			'name'        => esc_html__('mkd_title_background_group', 'affinity'),
			'parent'      => $title_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_background_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'affinity'),
				'parent' => $row1
			)
		);

		$title_margin_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Margin Bottom (px)', 'affinity'),
			'description' => esc_html__('Enter value for title bottom margin (default value is 14)', 'affinity'),
			'name'        => 'mkd_title_margin_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_margin_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_margin_bottom',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		$title_padding_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Padding', 'affinity'),
			'description' => esc_html__('Define padding for title', 'affinity'),
			'name'        => 'mkd_title_padding_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_padding_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$slide_title_border = affinity_mikado_create_meta_box_field(array(
			'label'         => esc_html__('Border', 'affinity'),
			'description'   => esc_html__('Do you want to have a title border?', 'affinity'),
			'name'          => 'mkd_slide_title_border',
			'type'          => 'yesno',
			'default_value' => 'no',
			'parent'        => $title_style_meta_box,
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_mkd_title_border_container'
			)
		));

		$title_border_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_title_border_container',
			'parent'          => $title_style_meta_box,
			'hidden_property' => 'mkd_slide_title_border',
			'hidden_value'    => 'no'
		));

		$title_border_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Title Border', 'affinity'),
			'description' => esc_html__('Define border for title', 'affinity'),
			'name'        => 'mkd_title_border_group',
			'parent'      => $title_border_container
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_border_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_title_border_thickness',
				'type'   => 'textsimple',
				'label'  => esc_html__('Thickness (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_title_border_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__('Style', 'affinity'),
				'parent'  => $row1,
				'options' => array(
					"solid"  => esc_html__("solid", 'affinity'),
					"dashed" => esc_html__("dashed", 'affinity'),
					"dotted" => esc_html__("dotted", 'affinity'),
					"double" => esc_html__("double", 'affinity'),
					"groove" => esc_html__("groove", 'affinity'),
					"ridge"  => esc_html__("ridge", 'affinity'),
					"inset"  => esc_html__("inset", 'affinity'),
					"outset" => esc_html__("outset", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slider_title_border_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Color', 'affinity'),
				'parent' => $row1
			)
		);

		//Slide Subtitle Styles

		$subtitle_style_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Subtitle Style', 'affinity'),
				'name'  => 'mkd_slides_subtitle'
			)
		);

		$subtitle_text_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Subtitle Text Style', 'affinity'),
			'description' => esc_html__('Define styles for subtitle text', 'affinity'),
			'name'        => 'mkd_subtitle_text_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$row2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $subtitle_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'affinity'),
				'parent' => $row2
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_subtitle_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontstyle
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_subtitle_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontweight
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_subtitle_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_texttransform
			)
		);

		$subtitle_background_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Background', 'affinity'),
			'description' => esc_html__('Define background for subtitle', 'affinity'),
			'name'        => 'mkd_subtitle_background_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_background_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'affinity'),
				'parent' => $row1
			)
		);

		$subtitle_margin_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Margin Bottom (px)', 'affinity'),
			'description' => esc_html__('Enter value for subtitle bottom margin (default value is 14)', 'affinity'),
			'name'        => 'mkd_subtitle_margin_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_margin_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_margin_bottom',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		$subtitle_padding_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Padding', 'affinity'),
			'description' => esc_html__('Define padding for subtitle', 'affinity'),
			'name'        => 'mkd_subtitle_padding_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_padding_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_subtitle_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		//Slide Text Styles

		$text_style_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Text Style', 'affinity'),
				'name'  => 'mkd_slides_text'
			)
		);

		$text_common_text_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Text Color and Size', 'affinity'),
			'description' => esc_html__('Define text color and size', 'affinity'),
			'name'        => 'mkd_text_common_text_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_common_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$text_without_separator_padding_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Padding', 'affinity'),
			'description' => esc_html__('Define padding for text', 'affinity'),
			'name'        => 'mkd_text_without_separator_padding_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_padding_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$text_without_separator_text_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'affinity'),
			'description' => esc_html__('Define styles for slide text', 'affinity'),
			'name'        => 'mkd_text_without_separator_text_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'affinity'),
				'parent' => $row1
			)
		);

		$row2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $text_without_separator_text_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'affinity'),
				'parent' => $row2
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_text_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontstyle
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_text_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_fontweight
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_text_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'affinity'),
				'parent'  => $row2,
				'options' => $affinity_options_texttransform
			)
		);

		$text_without_separator_background_group = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Background', 'affinity'),
			'description' => esc_html__('Define background for text', 'affinity'),
			'name'        => 'mkd_text_without_separator_background_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_background_group
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'affinity'),
				'parent' => $row1
			)
		);

		//Slide Buttons Styles

		$buttons_style_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Buttons Style', 'affinity'),
				'name'  => 'mkd_slides_buttons'
			)
		);

		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $buttons_style_meta_box,
				'name'   => 'mkd_button_1_styling_title',
				'title'  => esc_html__('Button 1', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_size',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Size', 'affinity'),
				'description'   => esc_html__('Choose button size', 'affinity'),
				'default_value' => '',
				'options'       => array(
					""                => esc_html__("Default", 'affinity'),
					"small"           => esc_html__("Small", 'affinity'),
					"medium"          => esc_html__("Medium", 'affinity'),
					"large"           => esc_html__("Large", 'affinity'),
					"huge"            => esc_html__("Extra Large", 'affinity'),
					"huge-full-width" => esc_html__("Extra Large Full Width", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_type',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Type', 'affinity'),
				'description'   => esc_html__('Choose button type', 'affinity'),
				'default_value' => '',
				'options'       => array(
					""        => esc_html__("Default", 'affinity'),
					"outline" => esc_html__("Outline", 'affinity'),
					"solid"   => esc_html__("Solid", 'affinity'),
				)
			)
		);

		$buttons_style_group_1 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'affinity'),
			'description' => esc_html__('Define text style', 'affinity'),
			'name'        => 'mkd_buttons_style_group_1',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_1
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Size(px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_button_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'affinity'),
				'parent'  => $row1,
				'options' => $affinity_options_fontweight
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Hover Color', 'affinity'),
				'parent' => $row1
			)
		);

		$buttons_style_group_2 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Background', 'affinity'),
			'description' => esc_html__('Define background', 'affinity'),
			'name'        => 'mkd_buttons_style_group_2',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_2
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_background_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Hover Color', 'affinity'),
				'parent' => $row1
			)
		);


		$buttons_style_group_4 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Border', 'affinity'),
			'description' => esc_html__('Define border style', 'affinity'),
			'name'        => 'mkd_buttons_style_group_4',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_4
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_border_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_border_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Hover Color', 'affinity'),
				'parent' => $row1
			)
		);

		$buttons_style_group_5 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Margin (px)', 'affinity'),
			'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'affinity'),
			'name'        => 'mkd_buttons_style_group_5',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_5
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_margin1',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		//init icon pack hide and show array. It will be populated dinamically from collections array
		$button1_icon_pack_hide_array = array();
		$button1_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if (is_array($affinity_IconCollections->iconCollections) && count($affinity_IconCollections->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$button1_icon_collections_params = $affinity_IconCollections->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach ($affinity_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
				$button1_icon_pack_hide_array[$dep_collection_key] = '';
				$button1_icon_pack_hide_array["no_icon"] = "";

				//button1_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
				$button1_icon_pack_hide_array["no_icon"] .= "#mkd_slider_button1_icon_size,";

				//we need to include only current collection in show string as it is the only one that needs to show
				$button1_icon_pack_show_array[$dep_collection_key] = '#mkd_slider_button1_icon_size, #mkd_button1_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($button1_icon_collections_params as $button1_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($button1_icon_collections_param !== $dep_collection_object->param) {
						$button1_icon_pack_hide_array[$dep_collection_key] .= '#mkd_button1_icon_' . $button1_icon_collections_param . '_container,';
					}

					$button1_icon_pack_hide_array["no_icon"] .= '#mkd_button1_icon_' . $button1_icon_collections_param . '_container,';
				}

				//remove remaining ',' character
				$button1_icon_pack_hide_array[$dep_collection_key] = rtrim($button1_icon_pack_hide_array[$dep_collection_key], ',');
				$button1_icon_pack_hide_array["no_icon"] = rtrim($button1_icon_pack_hide_array["no_icon"], ',');
			}

		}

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_button1_icon_pack',
				'type'          => 'select',
				'label'         => esc_html__('Button 1 Icon Pack', 'affinity'),
				'description'   => esc_html__('Choose icon pack for the first button', 'affinity'),
				'default_value' => 'no_icon',
				'parent'        => $buttons_style_meta_box,
				'options'       => $affinity_IconCollections->getIconCollectionsEmpty("no_icon"),
				'args'          => array(
					"dependence" => true,
					"hide"       => $button1_icon_pack_hide_array,
					"show"       => $button1_icon_pack_show_array
				)
			)
		);


		if (is_array($affinity_IconCollections->iconCollections) && count($affinity_IconCollections->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach ($affinity_IconCollections->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = $affinity_IconCollections->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$button1_icon_hide_values = $icon_collections_keys;
				$button1_icon_hide_values[] = "no_icon";
				$button1_icon_container = affinity_mikado_add_admin_container(array(
					'name'            => "button1_icon_" . $collection_object->param . "_container",
					'parent'          => $buttons_style_meta_box,
					'hidden_property' => 'mkd_button1_icon_pack',
					'hidden_value'    => '',
					'hidden_values'   => $button1_icon_hide_values
				));

				affinity_mikado_create_meta_box_field(
					array(
						'name'    => "button1_icon_" . $collection_object->param,
						'type'    => 'select',
						'label'   => esc_html__('Button 1 Icon', 'affinity'),
						'parent'  => $button1_icon_container,
						'options' => $icons_array
					)
				);
			}

		}


		affinity_mikado_add_admin_section_title(
			array(
				'parent' => $buttons_style_meta_box,
				'name'   => 'mkd_button_2_styling_title',
				'title'  => esc_html__('Button 2', 'affinity'),
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_size2',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Size', 'affinity'),
				'description'   => esc_html__('Choose button size', 'affinity'),
				'default_value' => '',
				'options'       => array(
					""                => esc_html__("Default", 'affinity'),
					"small"           => esc_html__("Small", 'affinity'),
					"medium"          => esc_html__("Medium", 'affinity'),
					"large"           => esc_html__("Large", 'affinity'),
					"huge"            => esc_html__("Extra Large", 'affinity'),
					"huge-full-width" => esc_html__("Extra Large Full Width", 'affinity'),
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_button_type2',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Type', 'affinity'),
				'description'   => esc_html__('Choose button type', 'affinity'),
				'default_value' => '',
				'options'       => array(
					""        => esc_html__("Default", 'affinity'),
					"outline" => esc_html__("Outline", 'affinity'),
					"solid"   => esc_html__("Solid", 'affinity'),
				)
			)
		);

		$buttons2_style_group_1 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'affinity'),
			'description' => esc_html__('Define text style', 'affinity'),
			'name'        => 'mkd_buttons2_style_group_1',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_1
		));
		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_font_size2',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Size(px)', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'    => 'mkd_slide_button_font_weight2',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'affinity'),
				'parent'  => $row1,
				'options' => $affinity_options_fontweight
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_text_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_text_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Hover Color', 'affinity'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_2 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Background', 'affinity'),
			'description' => esc_html__('Define background', 'affinity'),
			'name'        => 'mkd_buttons2_style_group_2',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_2
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_background_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_background_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Hover Color', 'affinity'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_4 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Border', 'affinity'),
			'description' => esc_html__('Define border style', 'affinity'),
			'name'        => 'mkd_buttons2_style_group_4',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_4
		));


		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_border_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Color', 'affinity'),
				'parent' => $row1
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_border_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Hover Color', 'affinity'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_5 = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Margin (px)', 'affinity'),
			'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'affinity'),
			'name'        => 'mkd_buttons2_style_group_5',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_5
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_button_margin2',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);
		//init icon pack hide and show array. It will be populated dinamically from collections array
		$button2_icon_pack_hide_array = array();
		$button2_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if (is_array($affinity_IconCollections->iconCollections) && count($affinity_IconCollections->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$button2_icon_collections_params = $affinity_IconCollections->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach ($affinity_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
				$button2_icon_pack_hide_array[$dep_collection_key] = '';
				$button2_icon_pack_hide_array["no_icon"] = "";

				//button2_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
				$button2_icon_pack_hide_array["no_icon"] .= "#mkd_slider_button2_icon_size,";

				//we need to include only current collection in show string as it is the only one that needs to show
				$button2_icon_pack_show_array[$dep_collection_key] = '#mkd_slider_button2_icon_size, #mkd_button2_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($button2_icon_collections_params as $button2_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($button2_icon_collections_param !== $dep_collection_object->param) {
						$button2_icon_pack_hide_array[$dep_collection_key] .= '#mkd_button2_icon_' . $button2_icon_collections_param . '_container,';
					}

					$button2_icon_pack_hide_array["no_icon"] .= '#mkd_button2_icon_' . $button2_icon_collections_param . '_container,';
				}

				//remove remaining ',' character
				$button2_icon_pack_hide_array[$dep_collection_key] = rtrim($button2_icon_pack_hide_array[$dep_collection_key], ',');
				$button2_icon_pack_hide_array["no_icon"] = rtrim($button2_icon_pack_hide_array["no_icon"], ',');
			}

		}

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_button2_icon_pack',
				'type'          => 'select',
				'label'         => esc_html__('Button 2 Icon Pack', 'affinity'),
				'description'   => esc_html__('Choose icon pack for the first button', 'affinity'),
				'default_value' => 'no_icon',
				'parent'        => $buttons_style_meta_box,
				'options'       => $affinity_IconCollections->getIconCollectionsEmpty("no_icon"),
				'args'          => array(
					"dependence" => true,
					"hide"       => $button2_icon_pack_hide_array,
					"show"       => $button2_icon_pack_show_array
				)
			)
		);

		if (is_array($affinity_IconCollections->iconCollections) && count($affinity_IconCollections->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach ($affinity_IconCollections->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = $affinity_IconCollections->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$button2_icon_hide_values = $icon_collections_keys;
				$button2_icon_hide_values[] = "no_icon";
				$button2_icon_container = affinity_mikado_add_admin_container(array(
					'name'            => "button2_icon_" . $collection_object->param . "_container",
					'parent'          => $buttons_style_meta_box,
					'hidden_property' => 'mkd_button2_icon_pack',
					'hidden_value'    => '',
					'hidden_values'   => $button2_icon_hide_values
				));

				affinity_mikado_create_meta_box_field(
					array(
						'name'    => "button2_icon_" . $collection_object->param,
						'type'    => 'select',
						'label'   => esc_html__('Button 2 Icon', 'affinity'),
						'parent'  => $button2_icon_container,
						'options' => $icons_array
					)
				);
			}

		}


		//Slide Content Positioning

		$content_positioning_meta_box = affinity_mikado_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Content Positioning', 'affinity'),
				'name'  => 'mkd_content_positioning_settings'
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $content_positioning_meta_box,
				'type'          => 'selectblank',
				'name'          => 'mkd_slide_content_alignment',
				'default_value' => '',
				'label'         => esc_html__('Text Alignment', 'affinity'),
				'description'   => esc_html__('Choose an alignment for the slide text', 'affinity'),
				'options'       => array(
					"left"   => esc_html__("Left", 'affinity'),
					"center" => esc_html__("Center", 'affinity'),
					"right"  => esc_html__("Right", 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $content_positioning_meta_box,
				'type'          => 'selectblank',
				'name'          => 'mkd_slide_separate_text_graphic',
				'default_value' => 'no',
				'label'         => esc_html__('Separate Graphic and Text Positioning', 'affinity'),
				'description'   => esc_html__('Do you want to separately position graphic and text?', 'affinity'),
				'options'       => array(
					"no"  => "No",
					"yes" => "Yes"
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""   => "#mkd_mkd_slide_graphic_positioning_container",
						"no" => "#mkd_mkd_slide_graphic_positioning_container, #mkd_mkd_content_vertical_positioning_group_container"
					),
					"show"       => array(
						"yes" => "#mkd_mkd_slide_graphic_positioning_container, #mkd_mkd_content_vertical_positioning_group_container"
					)
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_content_vertical_middle',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Vertically Align Content to Middle', 'affinity'),
				'parent'        => $content_positioning_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd_mkd_slide_content_vertical_middle_no_container",
					"dependence_show_on_yes" => "#mkd_mkd_slide_content_vertical_middle_yes_container"
				)
			)
		);

		$slide_content_vertical_middle_yes_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_content_vertical_middle_yes_container',
			'parent'          => $content_positioning_meta_box,
			'hidden_property' => 'mkd_slide_content_vertical_middle',
			'hidden_value'    => 'no'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $slide_content_vertical_middle_yes_container,
				'type'          => 'selectblank',
				'name'          => 'mkd_slide_content_vertical_middle_type',
				'default_value' => '',
				'label'         => esc_html__('Align Content Vertically Relative to the Height Measured From', 'affinity'),
				'options'       => array(
					"bottom_of_header" => esc_html__("Bottom of Header", 'affinity'),
					"window_top"       => esc_html__("Window Top", 'affinity')
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_vertical_content_full_width',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Content Holder Full Width', 'affinity'),
				'description'   => esc_html__('Do you want to set slide content holder to full width?', 'affinity'),
				'parent'        => $slide_content_vertical_middle_yes_container
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_vertical_content_width',
				'type'        => 'text',
				'label'       => esc_html__('Content Width', 'affinity'),
				'description' => esc_html__('Enter Width for Content Area', 'affinity'),
				'parent'      => $slide_content_vertical_middle_yes_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$group_space_around_content = affinity_mikado_add_admin_group(array(
			'title'  => esc_html__('Space Around Content in Slide', 'affinity'),
			'name'   => 'group_space_around_content',
			'parent' => $slide_content_vertical_middle_yes_container
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_space_around_content
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_vertical_content_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_vertical_content_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$slide_content_vertical_middle_no_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_content_vertical_middle_no_container',
			'parent'          => $content_positioning_meta_box,
			'hidden_property' => 'mkd_slide_content_vertical_middle',
			'hidden_value'    => 'yes'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'          => 'mkd_slide_content_full_width',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Content Holder Full Width', 'affinity'),
				'description'   => esc_html__('Do you want to set slide content holder to full width?', 'affinity'),
				'parent'        => $slide_content_vertical_middle_no_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkd_mkd_slide_content_width_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$slide_content_width_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_content_width_container',
			'parent'          => $slide_content_vertical_middle_no_container,
			'hidden_property' => 'mkd_slide_content_full_width',
			'hidden_value'    => 'yes'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'        => 'mkd_slide_content_width',
				'type'        => 'text',
				'label'       => esc_html__('Content Holder Width', 'affinity'),
				'description' => esc_html__('Enter Width for Content Holder Area', 'affinity'),
				'parent'      => $slide_content_width_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$group_space_around_content = affinity_mikado_add_admin_group(array(
			'title'  => esc_html__('Space Around Content in Slide', 'affinity'),
			'name'   => 'group_space_around_content',
			'parent' => $slide_content_vertical_middle_no_container
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_space_around_content
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_content_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Top', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_content_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_content_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Bottom', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_content_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$row2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_space_around_content
		));

		$content_vertical_positioning_group_container = affinity_mikado_add_admin_container_no_style(array(
			'name'            => 'mkd_content_vertical_positioning_group_container',
			'parent'          => $row2,
			'hidden_property' => 'mkd_slide_separate_text_graphic',
			'hidden_value'    => 'no'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_text_width',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Holder Width', 'affinity'),
				'parent' => $content_vertical_positioning_group_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$slide_graphic_positioning_container = affinity_mikado_add_admin_container(array(
			'name'            => 'mkd_slide_graphic_positioning_container',
			'parent'          => $slide_content_vertical_middle_no_container,
			'hidden_property' => 'mkd_slide_separate_text_graphic',
			'hidden_value'    => 'no'
		));

		affinity_mikado_create_meta_box_field(
			array(
				'parent'        => $slide_graphic_positioning_container,
				'type'          => 'selectblank',
				'name'          => 'mkd_slide_graphic_alignment',
				'default_value' => 'left',
				'label'         => esc_html__('Choose an alignment for the slide graphic', 'affinity'),
				'options'       => array(
					"left"   => esc_html__("Left", 'affinity'),
					"center" => esc_html__("Center", 'affinity'),
					"right"  => esc_html__("Right", 'affinity')
				)
			)
		);

		$group_graphic_positioning = affinity_mikado_add_admin_group(array(
			'title'       => esc_html__('Graphic Positioning', 'affinity'),
			'description' => esc_html__('Positioning for slide graphic', 'affinity'),
			'name'        => 'group_graphic_positioning',
			'parent'      => $slide_graphic_positioning_container
		));

		$row1 = affinity_mikado_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_graphic_positioning
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_graphic_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Top', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_graphic_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_graphic_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Bottom', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_graphic_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'affinity'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$row2 = affinity_mikado_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_graphic_positioning
		));

		affinity_mikado_create_meta_box_field(
			array(
				'name'   => 'mkd_slide_graphic_width',
				'type'   => 'textsimple',
				'label'  => esc_html__('Graphic Holder Width', 'affinity'),
				'parent' => $row2,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

	}

	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_slider_meta_box_map');
}