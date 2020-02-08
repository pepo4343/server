<?php
namespace Affinity\Modules\Header\Types;

use Affinity\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Divided layout and option
 *
 * Class HeaderDivided
 */
class HeaderDivided extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-divided';

        if(!is_admin()) {

            $menuAreaHeight       = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('menu_area_height_header_divided'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 100;

            $mobileHeaderHeight       = affinity_mikado_filter_px(affinity_mikado_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? intval($mobileHeaderHeight) : 100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('affinity_mikado_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('affinity_mikado_per_page_js_vars', array($this, 'getPerPageJSVariables'));
            add_filter('affinity_mikado_add_page_custom_style', array($this, 'headerPerPageStyles'));
        }
    }

    public function headerPerPageStyles($style) {
        $id                     = affinity_mikado_get_page_id();
        $class_prefix           = affinity_mikado_get_unique_page_class();
        $main_menu_style        = array();
        $main_menu_grid_style   = array();
        $disable_grid_shadow = affinity_mikado_get_meta_field_intersect('menu_area_in_grid_shadow_header_divided',$id) == 'no';

        $main_menu_selector = array($class_prefix.'.mkd-header-divided .mkd-menu-area');
        $main_menu_grid_selector = array($class_prefix.'.mkd-header-divided .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers');

        /* header style - start */

        $menu_area_background_color        = get_post_meta($id, 'mkd_menu_area_background_color_header_divided_meta', true);
        $menu_area_background_transparency = get_post_meta($id, 'mkd_menu_area_background_transparency_header_divided_meta', true);

        if($menu_area_background_transparency === '') {
            $menu_area_background_transparency = 1;
        }

        $menu_area_background_color_rgba = affinity_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);

        if($menu_area_background_color_rgba !== null) {
            $main_menu_style['background-color'] = $menu_area_background_color_rgba;
        }
        /* header style - end */

        /* header in grid style - start */

        if(!$disable_grid_shadow) {
            $main_menu_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
        }

        $menu_area_grid_background_color        = get_post_meta($id, 'mkd_menu_area_grid_background_color_header_divided_meta', true);
        $menu_area_grid_background_transparency = get_post_meta($id, 'mkd_menu_area_grid_background_transparency_header_divided_meta', true);

        if($menu_area_grid_background_transparency === '') {
            $menu_area_grid_background_transparency = 1;
        }

        $menu_area_grid_background_color_rgba = affinity_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);

        if($menu_area_grid_background_color_rgba !== null) {
            $main_menu_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
        }

        /* header in grid style - end */

        $style[] = affinity_mikado_dynamic_css($main_menu_selector, $main_menu_style);
        $style[] = affinity_mikado_dynamic_css($main_menu_grid_selector, $main_menu_grid_style);

        return $style;
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {
        $id  = affinity_mikado_get_page_id();

        $parameters['menu_area_in_grid'] = affinity_mikado_get_meta_field_intersect('menu_area_in_grid_header_divided',$id) == 'yes' ? true : false;

        $parameters = apply_filters('affinity_mikado_header_divided_parameters', $parameters);
    
        affinity_mikado_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = affinity_mikado_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'mkd_menu_area_background_transparency_header_divided_meta', true) !== '1' && get_post_meta($id, 'mkd_menu_area_background_transparency_header_divided_meta', true) !== ''){
            $menuAreaTransparent = true;
        } else if (affinity_mikado_options()->getOptionValue('menu_area_background_transparency_header_divided') !== '1' && affinity_mikado_options()->getOptionValue('menu_area_background_transparency_header_divided') !== '') {
            $menuAreaTransparent = true;
        } else if (is_404() && affinity_mikado_options()->getOptionValue('404_menu_area_background_transparency_header') !== '1' && affinity_mikado_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
            $menuAreaTransparent = true;
        } else {
            $menuAreaTransparent = false;
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if(affinity_mikado_is_top_bar_enabled() || affinity_mikado_is_top_bar_enabled() && affinity_mikado_is_top_bar_transparent()) {
                $transparencyHeight += affinity_mikado_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = affinity_mikado_get_page_id();
        $transparencyHeight = 0;

        $menuAreaTransparent = affinity_mikado_options()->getOptionValue('fixed_header_transparency') === '0';

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(affinity_mikado_is_top_bar_enabled()) {
            $headerHeight += affinity_mikado_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['mkdLogoAreaHeight'] = 0;
        $globalVariables['mkdMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['mkdMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(affinity_mikado_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['mkdHeaderTransparencyHeight'] = $this->headerHeight - (affinity_mikado_get_top_bar_height() + $this->heightOfCompleteTransparency);
        } else {
            $perPageVars['mkdHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}