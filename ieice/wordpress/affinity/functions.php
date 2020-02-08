<?php
include_once get_template_directory() . '/theme-includes.php';

//remove auto update od theme - start
$theme = 'affinity';
add_filter('site_transient_update_themes', function ($value) use ($theme) {
	unset($value->response[$theme]);
	return $value;
}, 10, 1);
//remove auto update od theme - end

if (!function_exists('affinity_mikado_styles')) {
	/**
	 * Function that includes theme's core styles
	 */
	function affinity_mikado_styles() {
		wp_register_style('affinity-mikado-blog', MIKADO_ASSETS_ROOT . '/css/blog.min.css');

		//include theme's core styles
		wp_enqueue_style('affinity-mikado-default-style', MIKADO_ROOT . '/style.css');
		wp_enqueue_style('affinity-mikado-modules-plugins', MIKADO_ASSETS_ROOT . '/css/plugins.min.css');

		if (affinity_mikado_load_blog_assets() || is_singular('portfolio-item')) {
			wp_enqueue_style('wp-mediaelement');
		}

		//define files afer which style dynamic needs to be included. It should be included last so it can override other files
		$style_deps_array = array();

		//is woocommerce installed?
		if (affinity_mikado_is_woocommerce_installed()) {
			if (affinity_mikado_load_woo_assets() || affinity_mikado_is_ajax_enabled()) {

				//include theme's woocommerce styles
				wp_enqueue_style('affinity-mikado-woocommerce', MIKADO_ASSETS_ROOT . '/css/woocommerce.min.css');
				$style_deps_array[] = 'affinity-mikado-woocommerce';
			}
		}

		wp_enqueue_style('affinity-mikado-modules', MIKADO_ASSETS_ROOT . '/css/modules.min.css');

		affinity_mikado_icon_collections()->enqueueStyles();

		if (affinity_mikado_load_blog_assets()) {
			wp_enqueue_style('affinity-mikado-blog');
		}

		//is responsive option turned on?
		if (affinity_mikado_is_responsive_on()) {
			wp_enqueue_style('affinity-mikado-modules-responsive', MIKADO_ASSETS_ROOT . '/css/modules-responsive.min.css');
			wp_enqueue_style('affinity-mikado-blog-responsive', MIKADO_ASSETS_ROOT . '/css/blog-responsive.min.css');

			//include theme's woocommerce responsive styles
			wp_enqueue_style('affinity-mikado-woocommerce-responsive', MIKADO_ASSETS_ROOT . '/css/woocommerce-responsive.min.css', $style_deps_array);
			$style_deps_array[] = 'affinity-mikado-woocommerce-responsive';
		}

		if (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css') && affinity_mikado_is_css_folder_writable() && !is_multisite()) {
			wp_enqueue_style('affinity-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic.css', $style_deps_array, filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
		} else if (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css') && affinity_mikado_is_css_folder_writable() && is_multisite()) {
			wp_enqueue_style('affinity-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css', $style_deps_array, filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css')); //it must be included after woocommerce styles so it can override it
		}

		if (affinity_mikado_is_responsive_on()) {
			//include proper styles
			if (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && affinity_mikado_is_css_folder_writable() && !is_multisite()) {
				wp_enqueue_style('affinity-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
			} elseif (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css') && affinity_mikado_is_css_folder_writable() && is_multisite()) {
				wp_enqueue_style('affinity-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css', array(), filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . affinity_mikado_get_multisite_blog_id() . '.css'));
			}
		}

		//include Visual Composer styles
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style('js_composer_front');
		}
	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_styles');
}

if (!function_exists('affinity_mikado_get_multisite_blog_id')) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function affinity_mikado_get_multisite_blog_id() {
		if (is_multisite()) {
			return get_blog_details()->blog_id;
		}
	}

}

if (!function_exists('affinity_mikado_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function affinity_mikado_google_fonts_styles() {
		$font_simple_field_array = affinity_mikado_options()->getOptionsByType('fontsimple');
		if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
			$font_simple_field_array = array();
		}

		$font_field_array = affinity_mikado_options()->getOptionsByType('font');
		if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
			$font_field_array = array();
		}

		$available_font_options = array_merge($font_simple_field_array, $font_field_array);
		$font_weight_str = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

		//define available font options array
		$fonts_array = array();
		foreach ($available_font_options as $font_option) {
			//is font set and not set to default and not empty?
			$font_option_value = affinity_mikado_options()->getOptionValue($font_option);
			if (affinity_mikado_is_font_option_valid($font_option_value) && !affinity_mikado_is_native_font($font_option_value)) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				if (!in_array($font_option_string, $fonts_array)) {
					$fonts_array[] = $font_option_string;
				}
			}
		}

		$fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
		$google_fonts_string = implode('|', $fonts_array);

		//default fonts should be separated with %7C because of HTML validation
		$default_font_string = 'Raleway:' . $font_weight_str . '|Poppins:' . $font_weight_str;
		$protocol = is_ssl() ? 'https:' : 'http:';

		//is google font option checked anywhere in theme?
		if (count($fonts_array) > 0) {

			//include all checked fonts
			$fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
			$fonts_full_list_args = array(
				'family' => urlencode($fonts_full_list),
				'subset' => urlencode('latin,latin-ext'),
			);

			$affinity_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('affinity-mikado-google-fonts', esc_url_raw($affinity_fonts), array(), '1.0.0');

		} else {
			//include default google font that theme is using
			$default_fonts_args = array(
				'family' => urlencode($default_font_string),
				'subset' => urlencode('latin,latin-ext'),
			);
			$affinity_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('affinity-mikado-google-fonts', esc_url_raw($affinity_fonts), array(), '1.0.0');
		}

	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_google_fonts_styles');
}

if (!function_exists('affinity_mikado_scripts')) {
	/**
	 * Function that includes all necessary scripts
	 */
	function affinity_mikado_scripts() {
		global $wp_scripts;

		//init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('wp-mediaelement');
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'appear', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', MIKADO_ASSETS_ROOT . '/js/modules/plugins/modernizr.custom.85257.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-countdown', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', MIKADO_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'parallax', MIKADO_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'select2', MIKADO_ASSETS_ROOT . '/js/modules/plugins/select2.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'easypiechart', MIKADO_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'chart', MIKADO_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'counter', MIKADO_ASSETS_ROOT . '/js/modules/plugins/counter.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'absolute-counter', MIKADO_ASSETS_ROOT . '/js/modules/plugins/absoluteCounter.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fluidvids', MIKADO_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery.nicescroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ScrollToPlugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'tweenLite', MIKADO_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'TimelineLite', MIKADO_ASSETS_ROOT . '/js/modules/plugins/TimelineLite.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'CSSPlugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/CSSPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'EasePack', MIKADO_ASSETS_ROOT . '/js/modules/plugins/EasePack.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-mixitup', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.mixitup.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'multiscroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.multiscroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-infinitescroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.infinitescroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'skrollr', MIKADO_ASSETS_ROOT . '/js/modules/plugins/skrollr.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'slick', MIKADO_ASSETS_ROOT . '/js/modules/plugins/slick.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'bootstrapCarousel', MIKADO_ASSETS_ROOT . '/js/modules/plugins/bootstrapCarousel.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'touchSwipe', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.touchSwipe.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'flexslider', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.flexslider-min.js', array( 'jquery' ), false, true );
		wp_enqueue_script('isotope', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.isotope.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery-mode', MIKADO_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('isotope'), false, true);


		if (affinity_mikado_is_smoth_scroll_enabled()) {
			wp_enqueue_script("affinity-mikado-smooth-page-scroll", MIKADO_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

		//include google map api script
		if (affinity_mikado_options()->getOptionValue('google_maps_api_key') != '') {
			$google_maps_api_key = affinity_mikado_options()->getOptionValue('google_maps_api_key');
			wp_enqueue_script('affinity-mikado-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
		}
		
		wp_enqueue_script('affinity-mikado-modules', MIKADO_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

		if (affinity_mikado_load_blog_assets()) {
			wp_enqueue_script('affinity-mikado-blog', MIKADO_ASSETS_ROOT . '/js/blog.min.js', array('jquery'), false, true);
		}

		//include comment reply script
		$wp_scripts->add_data('comment-reply', 'group', 1);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script("comment-reply");
		}

		//include Visual Composer script
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_script('wpb_composer_front_js');
		}



	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_scripts');
}

if (!function_exists('affinity_mikado_is_ajax_enabled')) {
	/**
	 * Function that checks if ajax is enabled
	 */
	function affinity_mikado_is_ajax_enabled() {

		return affinity_mikado_options()->getOptionValue('smooth_page_transitions') === 'yes' && affinity_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'yes';

	}
}

if (!function_exists('affinity_mikado_ajax_meta')) {
	/**
	 * Function that echoes meta data for ajax
	 *
	 * @since 4.3
	 * @version 0.2
	 */
	function affinity_mikado_ajax_meta() {

		$id = affinity_mikado_get_page_id();

		$page_transition = get_post_meta($id, "mkd_page_transition_type", true);
		?>

		<div class="mkd-seo-title"><?php echo wp_get_document_title(); ?></div>

		<?php if ($page_transition !== '') { ?>
			<div class="mkd-page-transition"><?php echo esc_html($page_transition); ?></div>
		<?php } else if (affinity_mikado_options()->getOptionValue('default_page_transition')) { ?>
			<div
				class="mkd-page-transition"><?php echo esc_html(affinity_mikado_options()->getOptionValue('default_page_transition')); ?></div>
		<?php }
	}

	add_action('affinity_mikado_ajax_meta', 'affinity_mikado_ajax_meta');
}

if (!function_exists('affinity_mikado_no_ajax_pages')) {
	/**
	 * Function that echoes pages on which ajax should not be applied
	 *
	 * @since 4.3
	 * @version 0.2
	 */
	function affinity_mikado_no_ajax_pages($global_variables) {

		//is ajax enabled?
		if (affinity_mikado_is_ajax_enabled()) {
			$no_ajax_pages = array();

			//get posts that have ajax disabled and merge with main array
			$no_ajax_pages = array_merge($no_ajax_pages, affinity_mikado_get_objects_without_ajax());

			//is wpml installed?
			if (affinity_mikado_is_wpml_installed()) {
				//get translation pages for current page and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, affinity_mikado_get_wpml_pages_for_current_page());
			}

			//is woocommerce installed?
			if (affinity_mikado_is_woocommerce_installed()) {
				//get all woocommerce pages and products and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, affinity_mikado_get_woocommerce_pages());
			}
			//do we have some internal pages that want to be without ajax?
			if (affinity_mikado_options()->getOptionValue('internal_no_ajax_links') !== '') {
				//get array of those pages
				$options_no_ajax_pages_array = explode(',', affinity_mikado_options()->getOptionValue('internal_no_ajax_links'));

				if (is_array($options_no_ajax_pages_array) && count($options_no_ajax_pages_array)) {
					$no_ajax_pages = array_merge($no_ajax_pages, $options_no_ajax_pages_array);
				}
			}

			//add logout url to main array
			$no_ajax_pages[] = wp_specialchars_decode(wp_logout_url());

			$global_variables['no_ajax_pages'] = $no_ajax_pages;
		}

		return $global_variables;
	}

	add_filter('affinity_mikado_js_global_variables', 'affinity_mikado_no_ajax_pages');
}

if (!function_exists('affinity_mikado_get_objects_without_ajax')) {
	/**
	 * Function that returns urls of objects that have ajax disabled.
	 * Works for posts, pages and portfolio pages.
	 * @return array array of urls of posts that have ajax disabled
	 *
	 * @version 0.1
	 */
	function affinity_mikado_get_objects_without_ajax() {
		$posts_without_ajax = array();

		$posts_args = array(
			'post_type'   => array('post', 'portfolio-item', 'page'),
			'post_status' => 'publish',
			'meta_key'    => 'mkd_page_transition_type',
			'meta_value'  => 'no-animation'
		);

		$posts_query = new WP_Query($posts_args);

		if ($posts_query->have_posts()) {
			while ($posts_query->have_posts()) {
				$posts_query->the_post();
				$posts_without_ajax[] = get_permalink(get_the_ID());
			}
		}

		wp_reset_postdata();

		return $posts_without_ajax;
	}
}


//defined content width variable
if (!isset($content_width)) {
	$content_width = 1060;
}

if (!function_exists('affinity_mikado_theme_setup')) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function affinity_mikado_theme_setup() {
		//add support for feed links
		add_theme_support('automatic-feed-links');

		//add support for post formats
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

		//add theme support for post thumbnails
		add_theme_support('post-thumbnails');

		//add theme support for title tag
		if (function_exists('_wp_render_title_tag')) {
			add_theme_support('title-tag');
		}

		//define thumbnail sizes
		add_image_size('affinity_mikado_square', 550, 550, true);
		add_image_size('affinity_mikado_landscape', 800, 600, true);
		add_image_size('affinity_mikado_portrait', 600, 800, true);
		add_image_size('affinity_mikado_large_width', 1125, 550, true);
		add_image_size('affinity_mikado_large_height', 550, 1125, true);
		add_image_size('affinity_mikado_large_width_height', 1125, 1125, true);

		load_theme_textdomain('affinity', get_template_directory() . '/languages');
	}

	add_action('after_setup_theme', 'affinity_mikado_theme_setup');
}

if ( ! function_exists( 'affinity_mikado_enqueue_editor_customizer_styles' ) ) {
    /**
     * Enqueue supplemental block editor styles
     */
    function affinity_mikado_enqueue_editor_customizer_styles() {
        wp_enqueue_style( 'affinity-mikado-modules-admin-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkd-modules-admin.css' );
        wp_enqueue_style( 'affinity-mikado-style-handle-editor-customizer-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
    }

    // add google font
    add_action( 'enqueue_block_editor_assets', 'affinity_mikado_google_fonts_styles' );
    // add action
    add_action( 'enqueue_block_editor_assets', 'affinity_mikado_enqueue_editor_customizer_styles' );
}


if (!function_exists('affinity_mikado_rgba_color')) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function affinity_mikado_rgba_color($color, $transparency) {
		if ($color !== '' && $transparency !== '') {
			$rgba_color = '';

			$rgb_color_array = affinity_mikado_hex2rgb($color);
			$rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if (!function_exists('affinity_mikado_wp_title')) {
	/**
	 * Function that outputs title tag. It checks if _wp_render_title_tag function exists
	 * and if it does'nt it generates output. Compatible with versions of WP prior to 4.1
	 */
	function affinity_mikado_wp_title() {
		if (!function_exists('_wp_render_title_tag')) { ?>
			<title><?php wp_title(''); ?></title>
		<?php }
	}
}

if (!function_exists('affinity_mikado_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function affinity_mikado_header_meta() { ?>
		<meta charset="<?php bloginfo('charset'); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php }

	add_action('affinity_mikado_header_meta', 'affinity_mikado_header_meta');
}

if (!function_exists('affinity_mikado_user_scalable_meta')) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to affinity_mikado_header_meta action
	 */
	function affinity_mikado_user_scalable_meta() {
		//is responsiveness option is chosen?
		if (affinity_mikado_is_responsive_on()) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=no">
		<?php }
	}

	add_action('affinity_mikado_header_meta', 'affinity_mikado_user_scalable_meta');
}

if (!function_exists('affinity_mikado_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see affinity_mikado_is_woocommerce_installed()
	 * @see affinity_mikado_is_woocommerce_shop()
	 */
	function affinity_mikado_get_page_id() {
		if (affinity_mikado_is_woocommerce_installed() && affinity_mikado_is_woocommerce_shop()) {
			return affinity_mikado_get_woo_shop_page_id();
		}

		if (is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if (!function_exists('affinity_mikado_is_default_wp_template')) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function affinity_mikado_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if (!function_exists('affinity_mikado_get_page_template_name')) {
	/**
	 * Returns current template file name without extension
	 * @return string name of current template file
	 */
	function affinity_mikado_get_page_template_name() {
		$file_name = '';

		if (!affinity_mikado_is_default_wp_template()) {
			$file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

			if ($file_name_without_ext !== '') {
				$file_name = $file_name_without_ext;
			}
		}

		return $file_name;
	}
}

if (!function_exists('affinity_mikado_has_shortcode')) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function affinity_mikado_has_shortcode($shortcode, $content = '') {
		$has_shortcode = false;

		if ($shortcode) {
			//if content variable isn't past
			if ($content == '') {
				//take content from current post
				$page_id = affinity_mikado_get_page_id();
				if (!empty($page_id)) {
					$current_post = get_post($page_id);

					if (is_object($current_post) && property_exists($current_post, 'post_content')) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if (stripos($content, '[' . $shortcode) !== false) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if (!function_exists('affinity_mikado_get_dynamic_sidebar')) {
	/**
	 * Return Custom Widget Area content
	 *
	 * @return string
	 */
	function affinity_mikado_get_dynamic_sidebar($index = 1) {
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();

		return $sidebar_contents;
	}
}

if (!function_exists('affinity_mikado_get_sidebar')) {
	/**
	 * Return Sidebar
	 *
	 * @return string
	 */
	function affinity_mikado_get_sidebar() {

		$id = affinity_mikado_get_page_id();

		$sidebar = "sidebar";

		if (get_post_meta($id, 'mkd_custom_sidebar_meta', true) != '') {
			$sidebar = get_post_meta($id, 'mkd_custom_sidebar_meta', true);
		} else {
			if (is_single() && affinity_mikado_options()->getOptionValue('blog_single_custom_sidebar') != '') {
				$sidebar = esc_attr(affinity_mikado_options()->getOptionValue('blog_single_custom_sidebar'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && affinity_mikado_options()->getOptionValue('blog_custom_sidebar') != '') {
				$sidebar = esc_attr(affinity_mikado_options()->getOptionValue('blog_custom_sidebar'));
			} elseif (is_page() && affinity_mikado_options()->getOptionValue('page_custom_sidebar') != '') {
				$sidebar = esc_attr(affinity_mikado_options()->getOptionValue('page_custom_sidebar'));
			}
		}

		if (affinity_mikado_is_product_category() || affinity_mikado_is_product_tag()) {
			$woo_sidebar = get_post_meta(affinity_mikado_get_woo_shop_page_id(), 'mkd_custom_sidebar_meta', true);
			$sidebar = $woo_sidebar != '' ? $woo_sidebar : 'sidebar';
		}

		return apply_filters('affinity_mikado_sidebar', $sidebar);
	}
}


if (!function_exists('affinity_mikado_sidebar_columns_class')) {

	/**
	 * Return classes for columns holder when sidebar is active
	 *
	 * @return array
	 */

	function affinity_mikado_sidebar_columns_class() {

		$sidebar_class = array();
		$sidebar_layout = affinity_mikado_sidebar_layout();

		switch ($sidebar_layout):
			case 'sidebar-33-right':
				$sidebar_class[] = 'mkd-two-columns-66-33';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'mkd-two-columns-75-25';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'mkd-two-columns-33-66';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'mkd-two-columns-25-75';
				break;

		endswitch;

		$sidebar_class[] = 'clearfix';

		return affinity_mikado_class_attribute($sidebar_class);

	}
}

if (!function_exists('affinity_mikado_get_content_sidebar_class')) {
	/**
	 * @return string
	 */
	function affinity_mikado_get_content_sidebar_class() {
		$sidebar_layout = affinity_mikado_sidebar_layout();
		$content_class = array('mkd-page-content-holder');

		switch ($sidebar_layout) {
			case 'sidebar-33-right':
				$content_class[] = 'mkd-grid-col-8';
				break;
			case 'sidebar-25-right':
				$content_class[] = 'mkd-grid-col-9';
				break;
			case 'sidebar-33-left':
				$content_class[] = 'mkd-grid-col-8';
				$content_class[] = 'mkd-grid-col-push-4';
				break;
			case 'sidebar-25-left':
				$content_class[] = 'mkd-grid-col-9';
				$content_class[] = 'mkd-grid-col-push-3';
				break;
			default:
				$content_class[] = 'mkd-grid-col-12';
				break;
		}

		return affinity_mikado_get_class_attribute($content_class);
	}
}

if (!function_exists('affinity_mikado_get_sidebar_holder_class')) {
	/**
	 * @return string
	 */
	function affinity_mikado_get_sidebar_holder_class() {
		$sidebar_layout = affinity_mikado_sidebar_layout();

		$sidebar_class = array('mkd-sidebar-holder');

		switch ($sidebar_layout) {
			case 'sidebar-33-right':
				$sidebar_class[] = 'mkd-grid-col-4';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'mkd-grid-col-3';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'mkd-grid-col-4';
				$sidebar_class[] = 'mkd-grid-col-pull-8';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'mkd-grid-col-3';
				$sidebar_class[] = 'mkd-grid-col-pull-9';
				break;
		}

		return affinity_mikado_get_class_attribute($sidebar_class);
	}
}

if (!function_exists('affinity_mikado_sidebar_layout')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */

	function affinity_mikado_sidebar_layout() {

		$sidebar_layout = '';
		$page_id = affinity_mikado_get_page_id();

		$page_sidebar_meta = get_post_meta($page_id, 'mkd_sidebar_meta', true);

		if (($page_sidebar_meta !== '') && $page_id !== -1) {
			$sidebar_layout = $page_sidebar_meta !== 'no-sidebar' ? $page_sidebar_meta : '';
		} else {
			if (is_single() && affinity_mikado_options()->getOptionValue('blog_single_sidebar_layout')) {
				$sidebar_layout = esc_attr(affinity_mikado_options()->getOptionValue('blog_single_sidebar_layout'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && affinity_mikado_options()->getOptionValue('archive_sidebar_layout')) {
				$sidebar_layout = esc_attr(affinity_mikado_options()->getOptionValue('archive_sidebar_layout'));
			} elseif (is_page() && affinity_mikado_options()->getOptionValue('page_sidebar_layout')) {
				$sidebar_layout = esc_attr(affinity_mikado_options()->getOptionValue('page_sidebar_layout'));
			}
		}

		if (affinity_mikado_is_product_category() || affinity_mikado_is_product_tag()) {
			$woo_sidebar_meta = get_post_meta(affinity_mikado_get_woo_shop_page_id(), 'mkd_sidebar_meta', true);
			$sidebar_layout = $woo_sidebar_meta !== 'no-sidebar' ? $woo_sidebar_meta : '';
		}

        if ( ! empty( $sidebar_layout ) && ! is_active_sidebar( affinity_mikado_get_sidebar() ) ) {
            $sidebar_layout = '';
        }

		return apply_filters('affinity_mikado_sidebar_layout', $sidebar_layout);
	}
}

if (!function_exists('affinity_mikado_page_custom_style')) {

	/**
	 * Function that print custom page style
	 */

	function affinity_mikado_page_custom_style() {
		$style = array();
		$html = '';
		$style = apply_filters('affinity_mikado_add_page_custom_style', $style);
		if (is_array($style) && count($style)) {
			$html .= '<style type="text/css">';
			$html .= implode(' ', $style);
			$html .= '</style>';
		}

        echo affinity_mikado_get_module_part($html);
	}
}

if (!function_exists('affinity_mikado_register_page_custom_style')) {

	/**
	 * Function that print custom page style
	 */

	function affinity_mikado_register_page_custom_style() {
		add_action((affinity_mikado_is_ajax_enabled() && affinity_mikado_is_ajax_request()) ? 'affinity_mikado_ajax_meta' : 'wp_head', 'affinity_mikado_page_custom_style');
	}

	add_action('affinity_mikado_after_options_map', 'affinity_mikado_register_page_custom_style');
}


if (!function_exists('affinity_mikado_vc_custom_style')) {

	/**
	 * Function that print custom page style
	 */

	function affinity_mikado_vc_custom_style() {
		if (affinity_mikado_visual_composer_installed()) {
			$id = affinity_mikado_get_page_id();
			if (is_page() || is_single() || is_singular('portfolio-item')) {

				$shortcodes_custom_css = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
				if (!empty($shortcodes_custom_css)) {
					echo '<style type="text/css" data-type="vc_shortcodes-custom-css-' . esc_attr($id) . '">';
					echo get_post_meta($id, '_wpb_shortcodes_custom_css', true);
					echo '</style>';
				}

				$post_custom_css = get_post_meta($id, '_wpb_post_custom_css', true);
				if (!empty($post_custom_css)) {
					echo '<style type="text/css" data-type="vc_custom-css-' . esc_attr($id) . '">';
					echo get_post_meta($id, '_wpb_post_custom_css', true);
					echo '</style>';
				}
			}
		}
	}

}


if (!function_exists('affinity_mikado_register_vc_custom_style')) {

	/**
	 * Function that print custom page style
	 */

	function affinity_mikado_register_vc_custom_style() {
		if (affinity_mikado_is_ajax_enabled() && affinity_mikado_is_ajax_request()) {
			add_action('affinity_mikado_ajax_meta', 'affinity_mikado_vc_custom_style');
		}

	}

	add_action('affinity_mikado_after_options_map', 'affinity_mikado_register_vc_custom_style');
}

if (!function_exists('affinity_mikado_container_style')) {

	/**
	 * Function that return container style
	 */

	function affinity_mikado_container_style($style) {
		$id = affinity_mikado_get_page_id();
		$class_prefix = affinity_mikado_get_unique_page_class();

		$container_selector = array(
			$class_prefix . ' .mkd-content .mkd-content-inner > .mkd-container',
			$class_prefix . ' .mkd-content .mkd-content-inner > .mkd-full-width',
			$class_prefix . ' .mkd-content',
		);

		if (is_page_template('blog-split.php')) {
			$container_selector = array(
				$class_prefix . '.page-template-blog-split .mkd-blog-holder.mkd-blog-type-split'
			);
		}

		$container_class = array();
		$page_backgorund_color = get_post_meta($id, "mkd_page_background_color_meta", true);

		if ($page_backgorund_color) {
			$container_class['background-color'] = $page_backgorund_color;
		}

		$current_style = affinity_mikado_dynamic_css($container_selector, $container_class);
		$style[] = $current_style;

		return $style;
	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_container_style');
}

if (!function_exists('affinity_mikado_comments_style')) {

	/**
	 * Function that return container style
	 */

	function affinity_mikado_comments_style($style) {
		$id = affinity_mikado_get_page_id();
		$class_prefix = affinity_mikado_get_unique_page_class();

		$container_selector = array(
			$class_prefix . ' .mkd-comment-holder .mkd-comment'
		);

		$container_class = array();
		$comments_backgorund_color = get_post_meta($id, 'mkd_comments_background_color_meta', true);

		if ($comments_backgorund_color) {
			$container_class['background-color'] = $comments_backgorund_color;
		}

		$current_style = affinity_mikado_dynamic_css($container_selector, $container_class);
		$style[] = $current_style;

		return $style;
	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_comments_style');
}

if (!function_exists('affinity_mikado_boxed_style')) {

	/**
	 * Function that return container style
	 */

	function affinity_mikado_boxed_style($style) {

		$id = affinity_mikado_get_page_id();

		$class_prefix = affinity_mikado_get_unique_page_class();

		$container_selector = array(
			$class_prefix . '.mkd-boxed .mkd-wrapper'
		);

		$container_style = array();

		if (get_post_meta($id, "mkd_boxed_meta", true) == 'yes') {
			$page_backgorund_color = get_post_meta($id, "mkd_page_background_color_in_box_meta", true);
			$page_backgorund_image = get_post_meta($id, "mkd_boxed_background_image_meta", true);
			$page_backgorund_image_pattern = get_post_meta($id, "mkd_boxed_pattern_background_image_meta", true);
			$page_backgorund_attachment = get_post_meta($id, "mkd_boxed_background_image_attachment_meta", true);

			if ($page_backgorund_color) {
				$container_style['background-color'] = $page_backgorund_color;
			}

			if ($page_backgorund_image_pattern) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image_pattern . ')';
				$container_style['background-position'] = '0px 0px';
				$container_style['background-repeat'] = 'repeat';
			}

			if ($page_backgorund_image) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image . ')';
				$container_style['background-position'] = 'center 0px';
				$container_style['background-repeat'] = 'no-repeat';
			}

			if ($page_backgorund_attachment && $page_backgorund_image != '') {
				$container_style['background-attachment'] = $page_backgorund_attachment;
				if ($page_backgorund_attachment == 'fixed') {
					$container_style['background-size'] = 'cover';
				} else {
					$container_style['background-size'] = 'contain';
				}
			}

			if (!empty($container_style)) {

				$style[] = affinity_mikado_dynamic_css($container_selector, $container_style);
			}
		}

		return $style;

	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_boxed_style');
}

if (!function_exists('affinity_mikado_get_unique_page_class')) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * @return string
	 */
	function affinity_mikado_get_unique_page_class() {
		$id = affinity_mikado_get_page_id();
		$page_class = '';

		if (is_single()) {
			$page_class = '.postid-' . $id;
		} elseif ($id === affinity_mikado_get_woo_shop_page_id()) {
			$page_class = '.archive';
		} elseif (is_home()) {
			$page_class .= '.home';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if (!function_exists('affinity_mikado_page_padding')) {

	/**
	 * Function that return container style
	 */

	function affinity_mikado_page_padding($style) {

		$id = affinity_mikado_get_page_id();
		$class_prefix = affinity_mikado_get_unique_page_class();

		if (is_page_template('blog-split.php')) {
			$page_selector = array(
				$class_prefix . '.page-template-blog-split .mkd-blog-holder.mkd-blog-type-split'
			);
		} else {
			$page_selector = array(
				$class_prefix . ' .mkd-content .mkd-content-inner > .mkd-container > .mkd-container-inner',
				$class_prefix . ' .mkd-content .mkd-content-inner > .mkd-full-width > .mkd-full-width-inner'
			);
		}

		$page_css = array();

		$page_padding = get_post_meta($id, 'mkd_page_padding_meta', true);


		if ($page_padding !== '') {
			$page_css['padding'] = $page_padding;
		}

		$current_style = affinity_mikado_dynamic_css($page_selector, $page_css);

		$style[] = $current_style;

		return $style;

	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_page_padding');
}

if (!function_exists('affinity_mikado_per_page_paspartu_styles')) {

	function affinity_mikado_per_page_paspartu_styles($style) {
		$id = affinity_mikado_get_page_id();
		$class_prefix = affinity_mikado_get_unique_page_class();

		$paspartu_enabled = affinity_mikado_get_meta_field_intersect('enable_paspartu', $id) == 'yes';


		if ($paspartu_enabled) {

			$paspartu_style = array();

			$paspartu_selectors = array(
				'body' . $class_prefix . '.mkd-paspartu-enabled .mkd-wrapper-paspartu'
			);

			$paspartu_color = get_post_meta($id, "mkd_paspartu_color_meta", true);
			$paspartu_size = get_post_meta($id, "mkd_paspartu_size_meta", true);

			if ($paspartu_color !== '') {
				$paspartu_style['background-color'] = $paspartu_color;
			}

			if ($paspartu_size !== '') {
				$paspartu_style['padding'] = affinity_mikado_filter_px($paspartu_size) . 'px';
			}

			if (!empty($paspartu_style)) {

				$style[] = affinity_mikado_dynamic_css($paspartu_selectors, $paspartu_style);
			}

		}

		return $style;

	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_per_page_paspartu_styles');
}

if (!function_exists('affinity_mikado_print_custom_css')) {
	/**
	 * Prints out custom css from theme options
	 */
	function affinity_mikado_print_custom_css() {
		$custom_css = affinity_mikado_options()->getOptionValue('custom_css');

		if ($custom_css !== '') {
			wp_add_inline_style('affinity-mikado-modules', $custom_css);
		}
	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_print_custom_css');
}

if (!function_exists('affinity_mikado_print_custom_js')) {
	/**
	 * Prints out custom css from theme options
	 */
	function affinity_mikado_print_custom_js() {
		$custom_js = affinity_mikado_options()->getOptionValue('custom_js');

		if ($custom_js !== '') {
			wp_add_inline_script('affinity-mikado-modules', $custom_js);
		}
	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_print_custom_js');
}


if (!function_exists('affinity_mikado_get_global_variables')) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function affinity_mikado_get_global_variables() {

		$global_variables = array();
		$element_appear_amount = -150;

		$global_variables['mkdAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
		$global_variables['mkdElementAppearAmount'] = affinity_mikado_options()->getOptionValue('element_appear_amount') !== '' ? affinity_mikado_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
		$global_variables['mkdFinishedMessage'] = esc_html__('No more posts', 'affinity');
		$global_variables['mkdMessage'] = esc_html__('Loading new posts...', 'affinity');
		$global_variables['mkdPtfLoadMoreMessage'] = esc_html__('Loading...', 'affinity');

		$global_variables = apply_filters('affinity_mikado_js_global_variables', $global_variables);

		wp_localize_script('affinity-mikado-modules', 'mkdGlobalVars', array(
			'vars' => $global_variables
		));

	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_get_global_variables');
}

if (!function_exists('affinity_mikado_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function affinity_mikado_per_page_js_variables() {
		$per_page_js_vars = apply_filters('affinity_mikado_per_page_js_vars', array());

		wp_localize_script('affinity-mikado-modules', 'mkdPerPageVars', array(
			'vars' => $per_page_js_vars
		));
	}

	add_action('wp_enqueue_scripts', 'affinity_mikado_per_page_js_variables');
}

if (!function_exists('affinity_mikado_content_elem_style_attr')) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function affinity_mikado_content_elem_style_attr() {
		$styles = apply_filters('affinity_mikado_content_elem_style_attr', array());

		affinity_mikado_inline_style($styles);
	}
}

if (!function_exists('affinity_mikado_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function affinity_mikado_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if (!function_exists('affinity_mikado_visual_composer_installed')) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function affinity_mikado_visual_composer_installed() {
//is Visual Composer installed?
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('affinity_mikado_contact_form_7_installed')) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function affinity_mikado_contact_form_7_installed() {
//is Contact Form 7 installed?
		if (defined('WPCF7_VERSION')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('affinity_mikado_is_wpml_installed')) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function affinity_mikado_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if ( ! function_exists( 'affinity_mikado_get_module_part' ) ) {
    function affinity_mikado_get_module_part( $module ) {
        return $module;
    }
}

if (!function_exists('affinity_mikado_get_first_main_color')) {
	/**
	 * Returns first main color from options if set, else returns default first main color
	 *
	 * @return bool|string|void
	 */
	function affinity_mikado_get_first_main_color() {
		return affinity_mikado_options()->getOptionValue('first_color') ? affinity_mikado_options()->getOptionValue('first_color') : '#a8a8a8';
	}
}


if (!function_exists('affinity_mikado_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function affinity_mikado_max_image_width_srcset() {
		return 1920;
	}

	add_filter('max_srcset_image_width', 'affinity_mikado_max_image_width_srcset');
}

if (!function_exists('affinity_mikado_is_ajax_request')) {
	/**
	 * Function that checks if the incoming request is made by ajax function
	 */
	function affinity_mikado_is_ajax_request() {

		return isset($_POST['ajaxReq']) && $_POST['ajaxReq'] == 'yes';

	}
}

if (!function_exists('affinity_mikado_generate_first_main_color_per_page')) {
	/**
	 * Function that checks first main color in page options and generate css if color is set
	 */
	function affinity_mikado_generate_first_main_color_per_page($style) {
		$id = affinity_mikado_get_page_id();
		$first_color = affinity_mikado_get_meta_field_intersect('first_color', $id);
		if ($first_color !== '') {

			extract(affinity_mikado_generate_first_color_selectors());

			$style[] = affinity_mikado_dynamic_css($color_selector, array('color' => $first_color));
			$style[] = affinity_mikado_dynamic_css($color_important_selector, array('color' => $first_color . ' !important'));
			$style[] = affinity_mikado_dynamic_css('::selection', array('background' => $first_color));
			$style[] = affinity_mikado_dynamic_css('::-moz-selection', array('background' => $first_color));
			$style[] = affinity_mikado_dynamic_css($background_color_selector, array('background-color' => $first_color));
			$style[] = affinity_mikado_dynamic_css($border_color_selector, array('border-color' => $first_color));
			$style[] = affinity_mikado_dynamic_css($border_color_important_selector, array('border-color' => $first_color . ' !important'));
		}
		return $style;
	}

	add_filter('affinity_mikado_add_page_custom_style', 'affinity_mikado_generate_first_main_color_per_page');
}

if (!function_exists('affinity_mikado_generate_first_color_selectors')) {
	/**
	 * Function generate arrays of selectors for first color option
	 */
	function affinity_mikado_generate_first_color_selectors() {

		$return_array = array();
		//generate color selector array
		$return_array['color_selector'] = array(
			'a',
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover',
			'p a',
			'.mkd-type1-gradient-left-to-right-text i',
			'.mkd-type1-gradient-left-to-right-text i:before',
			'.mkd-type1-gradient-left-to-right-text span',
			'.mkd-type1-gradient-bottom-to-top-text i',
			'.mkd-type1-gradient-bottom-to-top-text i:before',
			'.mkd-type1-gradient-bottom-to-top-text span',
			'ul.mkd-comment-list .children>li:before',
			'.mkd-pagination li.active span',
			'.mkd-pagination li:hover a',
			'.mkd-like.liked',
			'.wpb_widgetised_column .widget ul li a:hover',
			'aside.mkd-sidebar .widget ul li a:hover',
			'.wpb_widgetised_column .widget.widget_nav_menu .current-menu-item>a',
			'.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a.mkd-custom-menu-active',
			'.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a:hover',
			'aside.mkd-sidebar .widget.widget_nav_menu .current-menu-item>a',
			'aside.mkd-sidebar .widget.widget_nav_menu ul.menu li a.mkd-custom-menu-active',
			'aside.mkd-sidebar .widget.widget_nav_menu ul.menu li a:hover',
			'.mkd-main-menu ul .mkd-menu-featured-icon',
			'.mkd-drop-down .second .inner ul li ul li:hover>a',
			'.mkd-drop-down .second .inner ul li.current-menu-item>a',
			'.mkd-drop-down .second .inner ul li.sub ul li:hover>a',
			'.mkd-drop-down .second .inner>ul>li:hover>a',
			'.mkd-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
			'.mkd-drop-down .wide .second ul li .flexslider ul li a:hover',
			'.mkd-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
			'.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li.mkd-active-item>a',
			'.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li:hover>a',
			'.mkd-header-vertical .mkd-vertical-menu .mkd-menu-featured-icon',
			'.mkd-header-vertical-compact .mkd-vertical-dropdown-float .second .inner ul li.mkd-active-item>a',
			'.mkd-header-vertical-compact .mkd-vertical-dropdown-float .second .inner ul li:hover>a',
			'.mkd-header-vertical-compact .mkd-vertical-menu .mkd-menu-featured-icon',
			'.mkd-mobile-header .mkd-mobile-nav a:hover',
			'.mkd-mobile-header .mkd-mobile-nav h4:hover',
			'.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
			'.mkd-side-menu-button-opener:hover',
			'footer .mkd-footer-bottom-holder .widget ul li a:hover',
			'footer .mkd-footer-top-holder .widget ul li a:hover',
			'nav.mkd-fullscreen-menu ul>li:hover>a',
			'.mkd-search-cover .mkd-search-close a:hover',
			'.mkd-portfolio-single-holder .mkd-portfolio-author-holder .mkd-author-position',
			'.mkd-portfolio-single-nav .mkd-single-nav-content-holder .mkd-single-nav-label-holder:hover',
			'.mkd-countdown .countdown-amount',
			'.mkd-countdown .countdown-period',
			'.mkd-message .mkd-message-inner a.mkd-close i:hover',
			'.mkd-ordered-list ol>li:before',
			'.mkd-icon-list-item .mkd-icon-list-icon-holder-inner .font_elegant',
			'.mkd-icon-list-item .mkd-icon-list-icon-holder-inner i',
			'.mkd-blog-slider-holder.simple .mkd-blog-slider-item .mkd-avatar-date-author .mkd-date-author .mkd-author a:hover',
			'.mkd-testimonials .mkd-testimonial-quote span',
			'.mkd-price-table .mkd-price-table-inner .mkd-price-in-table',
			'.no-touch .mkd-horizontal-timeline .mkd-timeline-navigation a:hover',
			'.mkd-pie-chart-with-icon-holder .mkd-percentage-with-icon i',
			'.mkd-pie-chart-with-icon-holder .mkd-percentage-with-icon span',
			'.mkd-tab-slider-holder .mkd-tab-slider-nav .mkd-tab-slider-nav-item.flex-active h6.mkd-tab-slider-nav-title',
			'.mkd-tab-slider-holder .mkd-tab-slider-nav .mkd-tab-slider-nav-item:hover h6.mkd-tab-slider-nav-title',
			'.mkd-accordion-holder .mkd-title-holder.ui-state-active',
			'.mkd-accordion-holder .mkd-title-holder.ui-state-active .mkd-accordion-mark',
			'.mkd-accordion-holder .mkd-title-holder.ui-state-hover',
			'.mkd-accordion-holder .mkd-title-holder.ui-state-hover .mkd-accordion-mark',
			'.mkd-accordion-holder.mkd-boxed .mkd-title-holder .mkd-accordion-mark',
			'.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-hover',
			'.mkd-restaurant-menu .mkd-rstrnt-price-holder .mkd-rstrnt-old-price',
			'.mkd-blog-list-holder.mkd-simple .mkd-blog-list-item .mkd-avatar-date-author .mkd-date-author .mkd-author a:hover',
			'.mkd-btn.mkd-btn-outline',
			'blockquote .mkd-icon-quotations-holder',
			'.mkd-title-description .mkd-image-gallery-title',
			'.mkd-video-button-play .mkd-video-button-wrapper',
			'.mkd-dropcaps',
			'.mkd-portfolio-list-holder-outer.mkd-ptf-gallery article .mkd-ptf-item-excerpt-holder',
			'.mkd-portfolio-list-holder-outer.mkd-ptf-gallery.mkd-hover-type-three .mkd-ptf-category-holder',
			'.mkd-portfolio-filter-holder .mkd-portfolio-filter-holder-inner ul li.active',
			'.mkd-portfolio-filter-holder .mkd-portfolio-filter-holder-inner ul li.current',
			'.mkd-portfolio-filter-holder .mkd-portfolio-filter-holder-inner ul li:hover',
			'.mkd-portfolio-filter-holder.light .mkd-portfolio-filter-holder-inner ul li.active',
			'.mkd-portfolio-filter-holder.light .mkd-portfolio-filter-holder-inner ul li.current',
			'.mkd-portfolio-filter-holder.light .mkd-portfolio-filter-holder-inner ul li:hover',
			'.mkd-video-banner-holder .mkd-vb-overlay-tc .mkd-vb-play-icon i',
			'.mkd-social-share-holder.mkd-list li a:hover',
			'.mkd-comparision-pricing-tables-holder .mkd-cpt-features-holder .mkd-cpt-features-title-holder.mkd-cpt-table-head-holder .mkd-cpt-features-title strong',
			'.mkd-icon-progress-bar .mkd-ipb-active',
			'.mkd-pl-holder .mkd-pl-item .product-price span',
			'.mkd-playlist .mkd-playlist-subtitle',
			'.mkd-playlist .mkd-playlist-item.playing .mkd-playlist-control',
			'.mkd-playlist .mkd-playlist-item.playing .mkd-playlist-item-title h5',
			'.mkd-table-shortcode-holder .mkd-table-shortcode-item .mkd-table-content-item-holder.mkd-table-content-trending .mkd-table-content-item-title:after',
			'.mkd-latest-posts-widget .mkd-blog-list-holder.mkd-image-in-box .mkd-blog-list-item .mkd-item-title a:hover',
			'.mkd-page-footer .mkd-latest-posts-widget .mkd-blog-list-holder.mkd-image-in-box .mkd-blog-list-item .mkd-item-title a:hover',
			'.mkd-page-footer .mkd-latest-posts-widget .mkd-blog-list-holder.mkd-minimal .mkd-blog-list-item .mkd-item-title a:hover',
			'.mkd-blog-holder article.sticky .mkd-post-title a',
			'.mkd-filter-blog-holder li.mkd-active',
			'.mejs-controls .mejs-button button:hover',
			'.mkd-woocommerce-page .woocommerce-error .button.wc-forward',
			'.mkd-woocommerce-page .woocommerce-info .button.wc-forward',
			'.mkd-woocommerce-page .woocommerce-message .button.wc-forward',
			'.mkd-woocommerce-page .woocommerce-error .button.wc-forward:hover',
			'.mkd-woocommerce-page .woocommerce-info .button.wc-forward:hover',
			'.mkd-woocommerce-page .woocommerce-message .button.wc-forward:hover',
			'.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-minus:hover',
			'.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-plus:hover',
			'div.woocommerce .mkd-quantity-buttons .mkd-quantity-minus:hover',
			'div.woocommerce .mkd-quantity-buttons .mkd-quantity-plus:hover',
			'.mkd-single-product-summary .price',
			'ul.products>.product .mkd-pl-text-wrapper .price span',
			'.mkd-woocommerce-page table.cart tr.cart_item td.product-subtotal',
			'.mkd-woocommerce-page .cart-collaterals table tr.order-total .amount',
			'.mkd-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
			'.mkd-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
			'.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
			'.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
			'.widget.woocommerce.widget_layered_nav_filters a:hover',
			'.widget.woocommerce.widget_products ul li a:hover .product-title',
			'.widget.woocommerce.widget_recently_viewed_products ul li a:hover .product-title',
			'.widget.woocommerce.widget_top_rated_products ul li a:hover .product-title',
			'.widget.woocommerce.widget_products ul li .amount',
			'.widget.woocommerce.widget_recently_viewed_products ul li .amount',
			'.widget.woocommerce.widget_top_rated_products ul li .amount',
			'.widget.woocommerce.widget_recent_reviews a:hover',
			'.mkd-shopping-cart-dropdown .mkd-item-info-holder .remove:hover',
			'.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-subtotal-holder .mkd-total-amount span',
			'.mkd-footer-inner #lang_sel>ul>li>ul li a:hover span',
			'.mkd-side-menu #lang_sel>ul>li>ul li a:hover span',
			'.mkd-footer-inner #lang_sel a:hover',
			'.mkd-side-menu #lang_sel a:hover',
			'.mkd-fullscreen-menu-holder #lang_sel>ul>li>ul a:hover',
			'.mkd-top-bar #lang_sel .lang_sel_sel:hover',
			'.mkd-top-bar #lang_sel ul ul a:hover',
			'.mkd-top-bar #lang_sel_list ul li a:hover',
			'.mkd-main-menu .menu-item-language .submenu-languages a:hover',
			'.mkd-menu-area .mkd-position-right #lang_sel .lang_sel_sel:hover',
			'.mkd-sticky-header .mkd-position-right #lang_sel .lang_sel_sel:hover',
			'.mkd-menu-area .mkd-position-right #lang_sel ul ul li a:hover',
			'.mkd-sticky-header .mkd-position-right #lang_sel ul ul li a:hover',
			'.mkd-menu-area .mkd-position-right #lang_sel_list ul li a:hover',
			'.mkd-sticky-header .mkd-position-right #lang_sel_list ul li a:hover'
		);

		//generate color important selector array
		$return_array['color_important_selector'] = array(
			'.mkd-btn.mkd-btn-hover-outline:not(.mkd-btn-custom-hover-color):hover',
			'.mkd-btn.mkd-btn-hover-white:not(.mkd-btn-custom-hover-color):hover',
			'.mkd-dark-header .mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-subtotal-holder .mkd-total-amount span',
			'.mkd-light-header .mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-subtotal-holder .mkd-total-amount span'
		);

		//generate background color selectors array
		$return_array['background_color_selector'] = array(
			'body.mkd-paspartu-enabled .mkd-wrapper-paspartu',
			'.mkd-smooth-transition-loader',
			'.mkd-st-loader .pulse',
			'.mkd-st-loader .double_pulse .double-bounce1',
			'.mkd-st-loader .double_pulse .double-bounce2',
			'.mkd-st-loader .cube',
			'.mkd-st-loader .rotating_cubes .cube1',
			'.mkd-st-loader .rotating_cubes .cube2',
			'.mkd-st-loader .stripes>div',
			'.mkd-st-loader .wave>div',
			'.mkd-st-loader .two_rotating_circles .dot1',
			'.mkd-st-loader .two_rotating_circles .dot2',
			'.mkd-st-loader .five_rotating_circles .container1>div',
			'.mkd-st-loader .five_rotating_circles .container2>div',
			'.mkd-st-loader .five_rotating_circles .container3>div',
			'.mkd-st-loader .atom .ball-1:before',
			'.mkd-st-loader .clock .ball:before',
			'.mkd-st-loader .fussion .ball',
			'.mkd-st-loader .mitosis .ball',
			'.mkd-st-loader .pulse_circles .ball',
			'.mkd-st-loader .wave_circles .ball',
			'.mkd-st-loader .atom .ball-2:before',
			'.mkd-st-loader .atom .ball-3:before',
			'.mkd-st-loader .atom .ball-4:before',
			'.mkd-st-loader .lines .line1',
			'.mkd-st-loader .lines .line2',
			'.mkd-st-loader .lines .line3',
			'.mkd-st-loader .lines .line4',
			'.mkd-st-loader .fussion .ball-1',
			'.mkd-st-loader .fussion .ball-2',
			'.mkd-st-loader .fussion .ball-3',
			'.mkd-st-loader .fussion .ball-4',
			'.mkd-comment-holder .mkd-comment-reply-holder a:after',
			'.post-password-form input[type=submit]',
			'input.wpcf7-form-control.wpcf7-submit',
			'.mkd-newsletter-footer input.wpcf7-form-control.wpcf7-submit',
			'.mkd-newsletter .wpcf7-form-control.wpcf7-submit',
			'#ui-datepicker-div .ui-datepicker-today',
			'.mkd-drop-down .second .inner ul li a .item_text:after',
			'.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li a .item_text:after',
			'.mkd-header-vertical-compact .mkd-vertical-dropdown-float .second .inner ul li a .item_text:after',
			'.mkd-side-menu .widget .searchform input[type=submit]',
			'.mkd-side-menu-slide-from-right .mkd-side-menu .widget .searchform input[type=submit]',
			'nav.mkd-fullscreen-menu ul>li:hover>a .mkd-underline',
			'.mkd-team .mkd-phone-number-holder',
			'.mkd-icon-shortcode.circle',
			'.mkd-icon-shortcode.square',
			'.mkd-progress-bar .mkd-progress-content-outer .mkd-progress-content',
			'.mkd-blog-slider-holder.masonry article.format-quote .mkd-post-text',
			'.mkd-price-table.mkd-pt-active .mkd-active-label .mkd-active-label-inner',
			'.mkd-horizontal-timeline .mkd-horizontal-timeline-events a.selected:after',
			'.no-touch .mkd-horizontal-timeline .mkd-horizontal-timeline-events a:hover:after',
			'.mkd-horizontal-timeline .mkd-horizontal-timeline-filling-line',
			'.mkd-pie-chart-doughnut-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
			'.mkd-pie-chart-pie-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
			'.mkd-tabs.mkd-horizontal .mkd-tabs-nav li.ui-tabs-active:after',
			'.mkd-tab-slider-holder .mkd-tab-slider-nav .mkd-tab-slider-nav-item h6.mkd-tab-slider-nav-title:after',
			'.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-active',
			'.mkd-restaurant-menu .mkd-rstrnt-item .mkd-rsrnt-recommended',
			'.mkd-btn.mkd-btn-solid',
			'.mkd-btn.mkd-btn-underline .mkd-btn-underline-line',
			'blockquote .mkd-blockquote-text:after',
			'.mkd-dropcaps.mkd-circle',
			'.mkd-dropcaps.mkd-square',
			'.mkd-portfolio-list-holder-outer.mkd-ptf-standard .mkd-ptf-item-image-holder .mkd-portfolio-standard-overlay',
			'.mkd-comparision-pricing-tables-holder .mkd-comparision-table-holder .mkd-featured-comparision-package',
			'.mkd-vertical-progress-bar-holder .mkd-vpb-active-bar',
			'.mkd-pl-holder .mkd-pl-item .add-to-cart-holder a.added_to_cart',
			'#multiscroll-nav ul li .active span',
			'.mkd-mini-text-slider .owl-controls .owl-next:hover',
			'.mkd-mini-text-slider .owl-controls .owl-prev:hover',
			'.mkd-table-shortcode-holder .mkd-table-shortcode-item:nth-child(odd) .mkd-table-shortcode-item-title',
			'.mkd-advanced-holder .mkd-advanced-slider-holder .controls .button',
			'.widget_mkd_call_to_action_button .mkd-call-to-action-button',
			'.mkd-sidebar-holder aside.mkd-sidebar .widget_mkd_info_widget',
			'.mkd-blog-holder.mkd-blog-type-masonry article.format-quote .mkd-post-text',
			'.mkd-blog-list-holder.mkd-masonry article.format-quote .mkd-post-text',
			'.mkd-blog-holder.mkd-blog-type-masonry-gallery article.format-quote',
			'.mkd-blog-holder.mkd-blog-type-standard article.format-link .mkd-post-content',
			'.mkd-blog-holder.mkd-blog-type-standard article.format-quote .mkd-post-content',
			'.mkd-blog-holder.mkd-blog-single.mkd-blog-standard .format-quote .mkd-post-quote',
			'.mejs-controls .mejs-time-rail .mejs-time-current:after',
			'.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
			'.mejs-controls .mejs-time-rail .mejs-time-current',
			'.woocommerce-page .mkd-content a.added_to_cart',
			'.woocommerce-page .mkd-content a.button',
			'.woocommerce-page .mkd-content button[type=submit]',
			'.woocommerce-page .mkd-content input[type=submit]',
			'div.woocommerce a.added_to_cart',
			'div.woocommerce a.button',
			'div.woocommerce button[type=submit]',
			'div.woocommerce input[type=submit]',
			'.mkd-woo-single-page .woocommerce-tabs ul.tabs>li.active a:after',
			'.mkd-woo-single-page .woocommerce-tabs ul.tabs>li:hover a:after',
			'ul.products>.product .mkd-pl-outer .mkd-pl-inner .mkd-pl-cart a:hover',
			'ul.products>.product .mkd-pl-outer .mkd-pl-inner .mkd-pl-cart a.added_to_cart',
			'.mkd-shopping-cart-holder .mkd-header-cart .mkd-cart-number',
			'.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-checkout',
			'.mkd-menu-area .mkd-position-right #lang_sel ul ul li a:before',
			'.mkd-sticky-header .mkd-position-right #lang_sel ul ul li a:before',
			'.mkd-header-vertical-compact .mkd-vertical-menu>ul>li:hover'
		);

		//generate border color selectors array
		$return_array['border_color_selector'] = array(
			'.mkd-st-loader .pulse_circles .ball',
			'.wpcf7-form-control.wpcf7-date:focus',
			'.wpcf7-form-control.wpcf7-number:focus',
			'.wpcf7-form-control.wpcf7-quiz:focus',
			'.wpcf7-form-control.wpcf7-select:focus',
			'.wpcf7-form-control.wpcf7-text:focus',
			'.wpcf7-form-control.wpcf7-textarea:focus',
			'#respond input[type=text]:focus',
			'#respond textarea:focus',
			'.post-password-form input[type=password]:focus',
			'.mkd-confirmation-form .wpcf7-form-control.wpcf7-date:focus',
			'.mkd-confirmation-form .wpcf7-form-control.wpcf7-email:focus',
			'.mkd-confirmation-form .wpcf7-form-control.wpcf7-text:focus',
			'.mkd-confirmation-form .wpcf7-form-control.wpcf7-textarea:focus',
			'.mkd-side-menu-button-opener:hover .mkd-sai-first-line',
			'.mkd-side-menu-button-opener:hover .mkd-sai-second-line',
			'.mkd-side-menu-button-opener:hover .mkd-sai-third-line',
			'.mkd-horizontal-timeline .mkd-horizontal-timeline-events a.selected:after',
			'.no-touch .mkd-horizontal-timeline .mkd-horizontal-timeline-events a:hover:after',
			'.mkd-horizontal-timeline .mkd-horizontal-timeline-events a.older-event:after',
			'.mkd-btn.mkd-btn-solid',
			'.mkd-btn.mkd-btn-outline',
			'.mkd-video-button-play',
			'.mkd-progress-bar .mkd-progress-number-wrapper.mkd-floating .mkd-down-arrow',
			'.mkd-comparision-pricing-tables-holder .mkd-comparision-table-holder',
			'.mkd-menu-area .mkd-position-right #lang_sel_list ul li a:hover',
			'.mkd-sticky-header .mkd-position-right #lang_sel_list ul li a:hover'
		);

		$return_array['border_color_important_selector'] = array(
			'.mkd-btn.mkd-btn-hover-outline:not(.mkd-btn-custom-border-hover):hover'
		);

		return $return_array;

	}

}

if (!function_exists('affinity_mikado_attachment_image_additional_fields')) {
	/**
	 *
	 * @param $form_fields array, fields to include in attachment form
	 * @param $post object, attachment record in database
	 *
	 * @return mixed
	 */
	function affinity_mikado_attachment_image_additional_fields($form_fields, $post) {


		// ADDING IMAGE LINK FILED - START //

		$form_fields['attachment-image-link'] = array(
			'label'       => 'Image Link',
			'input'       => 'text',
			'application' => 'image',
			'exclusions'  => array('audio', 'video'),
			'value'       => get_post_meta($post->ID, 'attachment_image_link', true)
		);

		// ADDING IMAGE LINK FILED - END //

		// ADDING IMAGE TARGET FILED - START //

		$options_image_target = array(
			'_selft' => esc_html__('Same Window', 'affinity'),
			'_blank' => esc_html__('New Window', 'affinity'),
		);

		$html_image_target = '';
		$selected_image_target = get_post_meta($post->ID, 'attachment_image_target', true);

		$html_image_target .= '<select name="attachments[' . $post->ID . '][attachment-image-target]" class="attachment-image-target" data-setting="attachment-image-target">';
		// Browse and add the options
		foreach ($options_image_target as $key => $value) {
			if ($key == $selected_image_target) {
				$html_image_target .= '<option value="' . $key . '" selected>' . $value . '</option>';
			} else {
				$html_image_target .= '<option value="' . $key . '">' . $value . '</option>';
			}
		}

		$html_image_target .= '</select>';

		$form_fields['attachment-image-target'] = array(
			'label'       => 'Image Target',
			'input'       => 'html',
			'html'        => $html_image_target,
			'application' => 'image',
			'exclusions'  => array('audio', 'video'),
			'value'       => get_post_meta($post->ID, 'attachment_image_target', true)
		);

		// ADDING IMAGE TARGET FILED - END //

		return $form_fields;
	}

	add_filter('attachment_fields_to_edit', 'affinity_mikado_attachment_image_additional_fields', 10, 2);

}

if (!function_exists('affinity_mikado_attachment_image_additional_fields_save')) {
	/**
	 * Save values of Attachment Image sizes in media uploader
	 *
	 * @param $post array, the post data for database
	 * @param $attachment array, attachment fields from $_POST form
	 *
	 * @return mixed
	 */
	function affinity_mikado_attachment_image_additional_fields_save($post, $attachment) {

		if (isset($attachment['attachment-image-link'])) {
			update_post_meta($post['ID'], 'attachment_image_link', $attachment['attachment-image-link']);
		}

		if (isset($attachment['attachment-image-target'])) {
			update_post_meta($post['ID'], 'attachment_image_target', $attachment['attachment-image-target']);
		}


		return $post;

	}

	add_filter('attachment_fields_to_save', 'affinity_mikado_attachment_image_additional_fields_save', 10, 2);

}