<?php

if (!function_exists('affinity_mikado_social_options_map')) {

	function affinity_mikado_social_options_map() {

		affinity_mikado_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'affinity'),
				'icon'  => 'icon_group'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = affinity_mikado_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Social Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow social share on networks of your choice', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_panel_social_networks, #mkd_panel_show_social_share_on'
			),
			'parent'        => $panel_social_share
		));

		$panel_show_social_share_on = affinity_mikado_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_show_social_share_on',
			'title'           => esc_html__('Show Social Share On', 'affinity'),
			'hidden_property' => esc_html__('enable_social_share', 'affinity'),
			'hidden_value'    => 'no'
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_post',
			'default_value' => 'no',
			'label'         => esc_html__('Posts', 'affinity'),
			'description'   => esc_html__('Show Social Share on Blog Posts', 'affinity'),
			'parent'        => $panel_show_social_share_on
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_page',
			'default_value' => 'no',
			'label'         => esc_html__('Pages', 'affinity'),
			'description'   => esc_html__('Show Social Share on Pages', 'affinity'),
			'parent'        => $panel_show_social_share_on
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_attachment',
			'default_value' => 'no',
			'label'         => esc_html__('Media', 'affinity'),
			'description'   => esc_html__('Show Social Share for Images and Videos', 'affinity'),
			'parent'        => $panel_show_social_share_on
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_portfolio-item',
			'default_value' => 'no',
			'label'         => esc_html__('Portfolio Item', 'affinity'),
			'description'   => esc_html__('Show Social Share for Portfolio Items', 'affinity'),
			'parent'        => $panel_show_social_share_on
		));

		if (affinity_mikado_is_woocommerce_installed()) {
			affinity_mikado_add_admin_field(array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_product',
				'default_value' => 'no',
				'label'         => esc_html__('Product', 'affinity'),
				'description'   => esc_html__('Show Social Share for Product Items', 'affinity'),
				'parent'        => $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = affinity_mikado_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_social_networks',
			'title'           => esc_html__('Social Networks', 'affinity'),
			'hidden_property' => 'enable_social_share',
			'hidden_value'    => 'no'
		));

		/**
		 * Facebook
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'facebook_title',
			'title'  => esc_html__('Share on Facebook', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_facebook_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via Facebook', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_facebook_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_facebook_share_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_facebook_share_container',
			'hidden_property' => 'enable_facebook_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'facebook_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'twitter_title',
			'title'  => esc_html__('Share on Twitter', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_twitter_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via Twitter', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_twitter_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_twitter_share_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_twitter_share_container',
			'hidden_property' => 'enable_twitter_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'twitter_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_twitter_share_container
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'twitter_via',
			'default_value' => '',
			'label'         => esc_html__('Via', 'affinity'),
			'parent'        => $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'google_plus_title',
			'title'  => esc_html__('Share on Google Plus', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_google_plus_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via Google Plus', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_google_plus_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_google_plus_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_google_plus_container',
			'hidden_property' => 'enable_google_plus_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'google_plus_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'linkedin_title',
			'title'  => esc_html__('Share on LinkedIn', 'affinity')
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_linkedin_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via LinkedIn', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_linkedin_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_linkedin_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_linkedin_container',
			'hidden_property' => 'enable_linkedin_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'linkedin_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'tumblr_title',
			'title'  => esc_html__('Share on Tumblr', 'affinity')
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_tumblr_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via Tumblr', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_tumblr_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_tumblr_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_tumblr_container',
			'hidden_property' => 'enable_tumblr_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'tumblr_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'pinterest_title',
			'title'  => esc_html__('Share on Pinterest', 'affinity'),
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_pinterest_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via Pinterest', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_pinterest_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_pinterest_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_pinterest_container',
			'hidden_property' => 'enable_pinterest_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'pinterest_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_pinterest_container
		));

		/**
		 * VK
		 */
		affinity_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'vk_title',
			'title'  => esc_html__('Share on VK', 'affinity')
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_vk_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'affinity'),
			'description'   => esc_html__('Enabling this option will allow sharing via VK', 'affinity'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_vk_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_vk_container = affinity_mikado_add_admin_container(array(
			'name'            => 'enable_vk_container',
			'hidden_property' => 'enable_vk_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		affinity_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'vk_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'affinity'),
			'parent'        => $enable_vk_container
		));

		if (defined('MIKADO_TWITTER_FEED_VERSION')) {
			$twitter_panel = affinity_mikado_add_admin_panel(array(
				'title' => esc_html__('Twitter', 'affinity'),
				'name'  => 'panel_twitter',
				'page'  => '_social_page'
			));

			affinity_mikado_add_admin_twitter_button(array(
				'name'   => 'twitter_button',
				'parent' => $twitter_panel
			));
		}

		if (defined('MIKADO_INSTAGRAM_FEED_VERSION')) {
			$instagram_panel = affinity_mikado_add_admin_panel(array(
				'title' => esc_html__('Instagram', 'affinity'),
				'name'  => 'panel_instagram',
				'page'  => '_social_page'
			));

			affinity_mikado_add_admin_instagram_button(array(
				'name'   => 'instagram_button',
				'parent' => $instagram_panel
			));
		}
	}

	add_action('affinity_mikado_options_map', 'affinity_mikado_social_options_map', 15);
}