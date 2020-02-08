<?php

if(!defined('ABSPATH')) exit;

/**
 * Interface iAffinityMikadoIconCollection
 */
interface iAffinityMikadoIconCollection {
    /**
     * @param string $title_lable title of icon collection
     * @param string $param param that will be used in shortcodes
     */
    public function __construct($title_lable = "", $param = "");

    /**
     * Method that returns $icons property
     * @return mixed
     */
    public function getIconsArray();

    /**
     * Generates HTML for provided icon and parameters
     * @param $icon string
     * @param array $params
     * @return mixed
     */
    public function render($icon, $params = array());

    /**
     * Checks if icon collection has social icons
     * @return mixed
     */
    public function hasSocialIcons();


}