<?php



class AffinityMikadoFieldFactory {

    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {


        switch(strtolower($field_type)) {

            case 'text':
                $field = new AffinityMikadoFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textsimple':
                $field = new AffinityMikadoFieldTextSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textarea':
                $field = new AffinityMikadoFieldTextArea();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textareasimple':
                $field = new AffinityMikadoFieldTextAreaSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'color':
                $field = new AffinityMikadoFieldColor();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'colorsimple':
                $field = new AffinityMikadoFieldColorSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'image':
                $field = new AffinityMikadoFieldImage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'imagesimple':
                $field = new AffinityMikadoFieldImageSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'font':
                $field = new AffinityMikadoFieldFont();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'fontsimple':
                $field = new AffinityMikadoFieldFontSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'select':
                $field = new AffinityMikadoFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectblank':
                $field = new AffinityMikadoFieldSelectBlank();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectsimple':
                $field = new AffinityMikadoFieldSelectSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectblanksimple':
                $field = new AffinityMikadoFieldSelectBlankSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesno':
                $field = new AffinityMikadoFieldYesNo();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesnosimple':
                $field = new AffinityMikadoFieldYesNoSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'onoff':
                $field = new AffinityMikadoFieldOnOff();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'portfoliofollow':
                $field = new AffinityMikadoFieldPortfolioFollow();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'zeroone':
                $field = new AffinityMikadoFieldZeroOne();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'imagevideo':
                $field = new AffinityMikadoFieldImageVideo();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesempty':
                $field = new AffinityMikadoFieldYesEmpty();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagpost':
                $field = new AffinityMikadoFieldFlagPost();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagpage':
                $field = new AffinityMikadoFieldFlagPage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagmedia':
                $field = new AffinityMikadoFieldFlagMedia();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagportfolio':
                $field = new AffinityMikadoFieldFlagPortfolio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagproduct':
                $field = new AffinityMikadoFieldFlagProduct();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'range':
                $field = new AffinityMikadoFieldRange();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'rangesimple':
                $field = new AffinityMikadoFieldRangeSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'radio':
                $field = new AffinityMikadoFieldRadio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'checkbox':
                $field = new AffinityMikadoFieldCheckBox();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'date':
                $field = new AffinityMikadoFieldDate();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'radiogroup':
                $field = new AffinityMikadoFieldRadioGroup();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            default:
                break;

        }

    }

}

/*
   Class: AffinityMikadoMultipleImages
   A class that initializes Mikado Multiple Images
*/

class AffinityMikadoMultipleImages implements iAffinityMikadoRender {
    private $name;
    private $label;
    private $description;


    function __construct($name, $label = "", $description = "") {
        global $affinity_Framework;
        $this->name        = $name;
        $this->label       = $label;
        $this->description = $description;
        $affinity_Framework->mkdMetaBoxes->addOption($this->name, "");
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($this->label); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="mkd-gallery-images-holder clearfix">
                                <?php
                                $image_gallery_val = get_post_meta($post->ID, $this->name, true);
                                if($image_gallery_val != '') {
                                    $image_gallery_array = explode(',', $image_gallery_val);
                                }

                                if(isset($image_gallery_array) && count($image_gallery_array) != 0):

                                    foreach($image_gallery_array as $gimg_id):

                                        $gimage_wp = wp_get_attachment_image_src($gimg_id, 'thumbnail', true);
                                        echo '<li class="mkd-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

                                    endforeach;

                                endif;
                                ?>
                            </ul>
                            <input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr($this->name) ?>" name="<?php echo esc_attr($this->name) ?>">

                            <div class="mkd-gallery-uploader">
                                <a class="mkd-gallery-upload-btn btn btn-sm btn-primary"
                                   href="javascript:void(0)"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                <a class="mkd-gallery-clear-btn btn btn-sm btn-default pull-right"
                                   href="javascript:void(0)"><?php esc_html_e('Remove All', 'affinity'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }
}

/*
   Class: AffinityMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class AffinityMikadoImagesVideos implements iAffinityMikadoRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>
        <div class="mkd_hidden_portfolio_images" style="display: none">
            <div class="mkd-page-form-section">


                <div class="mkd-field-desc">
                    <h4><?php echo esc_html($this->label); ?></h4>

                    <p><?php echo esc_html($this->description); ?></p>
                </div>
                <!-- close div.mkd-field-desc -->

                <div class="mkd-section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfolioimgordernumber_x"
                                       name="portfolioimgordernumber_x"
                                       /></div>
                            <div class="col-lg-10">
                                <em class="mkd-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfoliotitle_x"
                                       name="portfoliotitle_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="mkd-field-description"><?php esc_html_e( 'Image', 'affinity' ); ?></em>

                                <div class="mkd-media-uploader">
                                    <div style="display: none"
                                         class="mkd-media-image-holder">
                                        <img src="" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>"
                                             class="mkd-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="mkd-media-meta-fields">
                                        <input type="hidden" class="mkd-media-upload-url"
                                               name="portfolioimg_x"
                                               id="portfolioimg_x"/>
                                        <input type="hidden"
                                               class="mkd-media-upload-height"
                                               name="mkd_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="mkd-media-upload-width"
                                               name="mkd_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                       data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-3">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video type', 'affinity' ); ?></em>
                                <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                        name="portfoliovideotype_x" id="portfoliovideotype_x">
                                    <option value=""></option>
                                    <option value="youtube"><?php esc_html_e( 'Youtube', 'affinity' ); ?></option>
                                    <option value="vimeo"><?php esc_html_e( 'Vimeo', 'affinity' ); ?></option>
                                    <option value="self"><?php esc_html_e( 'Self hosted', 'affinity' ); ?></option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video ID', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfoliovideoid_x"
                                       name="portfoliovideoid_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video image', 'affinity' ); ?></em>

                                <div class="mkd-media-uploader">
                                    <div style="display: none"
                                         class="mkd-media-image-holder">
                                        <img src="" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>"
                                             class="mkd-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="mkd-media-meta-fields">
                                        <input type="hidden" class="mkd-media-upload-url"
                                               name="portfoliovideoimage_x"
                                               id="portfoliovideoimage_x"/>
                                        <input type="hidden"
                                               class="mkd-media-upload-height"
                                               name="mkd_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="mkd-media-upload-width"
                                               name="mkd_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                       data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-4">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video webm', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfoliovideowebm_x"
                                       name="portfoliovideowebm_x"
                                       /></div>
                            <div class="col-lg-4">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video mp4', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfoliovideomp4_x"
                                       name="portfoliovideomp4_x"
                                       /></div>
                            <div class="col-lg-4">
                                <em class="mkd-field-description"><?php esc_html_e( 'Video ogv', 'affinity' ); ?></em>
                                <input type="text"
                                       class="form-control mkd-input mkd-form-element"
                                       id="portfoliovideoogv_x"
                                       name="portfoliovideoogv_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'affinity' ); ?></a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- close div.mkd-section-content -->

            </div>
        </div>

        <?php
        $no               = 1;
        $portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
        if(count($portfolio_images) > 1) {
            usort($portfolio_images, "affinity_mikado_compare_portfolio_videos");
        }
        while(isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            ?>
            <div class="mkd_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

                <div class="mkd-page-form-section">


                    <div class="mkd-field-desc">
                        <h4><?php echo esc_html($this->label); ?></h4>

                        <p><?php echo esc_html($this->description); ?></p>
                    </div>
                    <!-- close div.mkd-field-desc -->

                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
                                           name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-10">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfoliotitle_<?php echo esc_attr($no); ?>"
                                           name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Image', 'affinity' ); ?></em>

                                    <div class="mkd-media-uploader">
                                        <div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                            class="mkd-media-image-holder">
                                            <img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(affinity_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url"
                                                   name="portfolioimg[]"
                                                   id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                            <input type="hidden"
                                                   class="mkd-media-upload-height"
                                                   name="mkd_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="mkd-media-upload-width"
                                                   name="mkd_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                           data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video type', 'affinity' ); ?></em>
                                    <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                        <option value=""></option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
                                            echo "selected='selected'";
                                        } ?> value="youtube">Youtube
                                        </option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
                                            echo "selected='selected'";
                                        } ?> value="vimeo">Vimeo
                                        </option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "self") {
                                            echo "selected='selected'";
                                        } ?> value="self">Self hosted
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video ID', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video image', 'affinity' ); ?></em>

                                    <div class="mkd-media-uploader">
                                        <div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                            class="mkd-media-image-holder">
                                            <img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(affinity_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url"
                                                   name="portfoliovideoimage[]"
                                                   id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                            <input type="hidden"
                                                   class="mkd-media-upload-height"
                                                   name="mkd_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="mkd-media-upload-width"
                                                   name="mkd_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                           data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-4">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video webm', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-4">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video mp4', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-4">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Video ogv', 'affinity' ); ?></em>
                                    <input type="text"
                                           class="form-control mkd-input mkd-form-element"
                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'affinity' ); ?></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- close div.mkd-section-content -->

                </div>
            </div>
            <?php
            $no++;
        }
        ?>
        <br/>
        <a class="mkd_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e( 'Add portfolio image/video', 'affinity' ); ?></a>
    <?php

    }
}


/*
   Class: AffinityMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class AffinityMikadoImagesVideosFramework implements iAffinityMikadoRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <!--Image hidden start-->
        <div class="mkd-hidden-portfolio-images" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">1</span><span class="mkd-toggle-inner"><?php esc_html_e( 'Image - ', 'affinity' ); ?><em><?php esc_html_e( '(Order Number, Image Title)', 'affinity' ); ?></em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="mkd-media-uploader">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Image ', 'affinity' ); ?></em>

                                        <div style="display: none" class="mkd-media-image-holder">
                                            <img src="" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail">
                                        </div>
                                        <div class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
                                            <input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'affinity' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'affinity' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'affinity' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
                                </div>
                                <div class="col-lg-8">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'affinity' ); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                </div>
                            </div>
                            <input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                            <input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
                            <input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
                            <input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
                            <input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
                            <input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                    <!-- close div.mkd-section-content -->
                </div>
            </div>
        </div>
        <!--Image hidden End-->

        <!--Video Hidden Start-->
        <div class="mkd-hidden-portfolio-videos" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">2</span><span class="mkd-toggle-inner"><?php esc_html_e( 'Video - ', 'affinity' ); ?><em><?php esc_html_e( '(Order Number, Video Title)', 'affinity' ); ?></em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="mkd-media-uploader">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Cover Video Image ', 'affinity' ); ?></em>

                                        <div style="display: none" class="mkd-media-image-holder">
                                            <img src="" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail">
                                        </div>
                                        <div style="display: none" class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                                            <input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'affinity' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'affinity' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'affinity' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
                                        </div>
                                        <div class="col-lg-10">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected)', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Video type', 'affinity' ); ?></em>
                                            <select class="form-control mkd-form-element mkd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
                                                <option value=""></option>
                                                <option value="youtube"><?php esc_html_e( 'Youtube', 'affinity' ); ?></option>
                                                <option value="vimeo"><?php esc_html_e( 'Vimeo', 'affinity' ); ?></option>
                                                <option value="self"><?php esc_html_e( 'Self hosted', 'affinity' ); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 mkd-video-id-holder">
                                            <em class="mkd-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" >
                                        </div>
                                    </div>

                                    <div class="row next-row mkd-video-self-hosted-path-holder">
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Video webm', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Video mp4', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Video ogv', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                    <!-- close div.mkd-section-content -->
                </div>
            </div>
        </div>
        <!--Video Hidden End-->


        <?php
        $no               = 1;
        $portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
        if(count((array)$portfolio_images) > 1) {
            usort($portfolio_images, "affinity_mikado_compare_portfolio_videos");
        }
        while(isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            if(isset($portfolio_image['portfolioimgtype'])) {
                $portfolio_img_type = $portfolio_image['portfolioimgtype'];
            } else {
                if(stripslashes($portfolio_image['portfolioimg']) == true) {
                    $portfolio_img_type = "image";
                } else {
                    $portfolio_img_type = "video";
                }
            }
            if($portfolio_img_type == "image") {
                ?>

                <div class="mkd-portfolio-images mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="mkd-portfolio-toggle-holder">
                        <div class="mkd-portfolio-toggle mkd-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner"><?php esc_html_e( 'Image - ', 'affinity' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
                        </div>
                        <div class="mkd-portfolio-toggle mkd-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="mkd-portfolio-toggle-content" style="display: none">
                        <div class="mkd-page-form-section">
                            <div class="mkd-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mkd-media-uploader">
                                                <em class="mkd-field-description"><?php esc_html_e( 'Image ', 'affinity' ); ?></em>

                                                <div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                                    class="mkd-media-image-holder">
                                                    <img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(affinity_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="mkd-media-meta-fields">
                                                    <input type="hidden" class="mkd-media-upload-url"
                                                           name="portfolioimg[]"
                                                           id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                                    <input type="hidden"
                                                           class="mkd-media-upload-height"
                                                           name="mkd_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="mkd-media-upload-width"
                                                           name="mkd_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                                   data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                        </div>
                                        <div class="col-lg-8">
                                            <em class="mkd-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'affinity' ); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
                                    <input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
                                    <input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
                                    <input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
                                    <input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
                                    <input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
                                </div>
                                <!-- close div.container-fluid -->
                            </div>
                            <!-- close div.mkd-section-content -->
                        </div>
                    </div>
                </div>

            <?php
            } else {
                ?>
                <div class="mkd-portfolio-videos mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="mkd-portfolio-toggle-holder">
                        <div class="mkd-portfolio-toggle mkd-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner"><?php esc_html_e( 'Video - ', 'affinity' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
                        </div>
                        <div class="mkd-portfolio-toggle mkd-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="mkd-portfolio-toggle-content" style="display: none">
                        <div class="mkd-page-form-section">
                            <div class="mkd-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mkd-media-uploader">
                                                <em class="mkd-field-description"><?php esc_html_e( 'Cover Video Image ', 'affinity' ); ?></em>

                                                <div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                                    class="mkd-media-image-holder">
                                                    <img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(affinity_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e('Image thumbnail', 'affinity'); ?>" class="mkd-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="mkd-media-meta-fields">
                                                    <input type="hidden" class="mkd-media-upload-url"
                                                           name="portfoliovideoimage[]"
                                                           id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                                    <input type="hidden"
                                                           class="mkd-media-upload-height"
                                                           name="mkd_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="mkd-media-upload-width"
                                                           name="mkd_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_html_e('Select Image', 'affinity'); ?>"
                                                   data-frame-button-text="<?php esc_html_e('Select Image', 'affinity'); ?>"><?php esc_html_e('Upload', 'affinity'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'affinity'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                                </div>
                                                <div class="col-lg-10">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected) ', 'affinity' ); ?></em>
                                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                                </div>
                                            </div>
                                            <div class="row next-row">
                                                <div class="col-lg-2">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video Type', 'affinity' ); ?></em>
                                                    <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                                        <option value=""></option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
                                                            echo "selected='selected'";
                                                        } ?> value="youtube"><?php esc_html_e( 'Youtube', 'affinity' ); ?>
                                                        </option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
                                                            echo "selected='selected'";
                                                        } ?> value="vimeo"><?php esc_html_e( 'Vimeo', 'affinity' ); ?>
                                                        </option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "self") {
                                                            echo "selected='selected'";
                                                        } ?> value="self"><?php esc_html_e( 'Self hosted', 'affinity' ); ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 mkd-video-id-holder">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video ID', 'affinity' ); ?></em>
                                                    <input type="text"
                                                           class="form-control mkd-input mkd-form-element"
                                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                                           />
                                                </div>
                                            </div>

                                            <div class="row next-row mkd-video-self-hosted-path-holder">
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video webm', 'affinity' ); ?></em>
                                                    <input type="text"
                                                           class="form-control mkd-input mkd-form-element"
                                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video mp4', 'affinity' ); ?></em>
                                                    <input type="text"
                                                           class="form-control mkd-input mkd-form-element"
                                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description"><?php esc_html_e( 'Video ogv', 'affinity' ); ?></em>
                                                    <input type="text"
                                                           class="form-control mkd-input mkd-form-element"
                                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                                           /></div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
                                </div>
                                <!-- close div.container-fluid -->
                            </div>
                            <!-- close div.mkd-section-content -->
                        </div>
                    </div>
                </div>
            <?php
            }
            $no++;
        }
        ?>

        <div class="mkd-portfolio-add">
            <a class="mkd-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( ' Add Image', 'affinity' ); ?></a>
            <a class="mkd-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( ' Add Video', 'affinity' ); ?></a>

            <a class="mkd-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'affinity' ); ?></a>
            <?php /* <a class="mkd-remove-last-row-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Remove last row', 'affinity' ); ?></a> */ ?>
        </div>
    <?php

    }
}

class AffinityMikadoTwitterFramework implements iAffinityMikadoRender {
    public function render($factory) {
        $twitterApi = MikadoTwitterApi::getInstance();
        $message    = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'affinity');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'affinity') : esc_html__('Connect with Twitter', 'affinity');
        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="mkd-page-form-section" id="mkd_enable_social_share">

            <div class="mkd-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'affinity'); ?></h4>

                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'affinity'); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="mkd-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php }
}

class AffinityMikadoInstagramFramework implements iAffinityMikadoRender {
    public function render($factory) {
        $instagram_api = MikadoInstagramApi::getInstance();
        $message       = '';

        //if code wasn't saved to database
        if(!get_option('mkd_instagram_code')) {
            //check if code parameter is set in URL. That means that user has connected with Instagram
            if(!empty($_GET['code'])) {
                //update code option so we can use it later
                $instagram_api->storeCode();
                $instagram_api->getAccessToken();
                $message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'affinity');

            } else {
                $instagram_api->storeCodeRequestURI();
            }
        }

        $buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'affinity') : esc_html__('Connect with Instagram', 'affinity');

        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="mkd-page-form-section" id="mkd_enable_social_share">

            <div class="mkd-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'affinity'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'affinity'); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php }
}

/*
   Class: AffinityMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class AffinityMikadoOptionsFramework implements iAffinityMikadoRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="mkd-portfolio-additional-item-holder" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">1</span><span class="mkd-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item ', 'affinity' ); ?><em><?php esc_html_e( '(Order Number, Item Title)', 'affinity' ); ?></em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" >
                                </div>
                                <div class="col-lg-10">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Item Title ', 'affinity' ); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_x" name="optionLabel_x" >
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Item Text', 'affinity' ); ?></em>
                                    <textarea class="form-control mkd-input mkd-form-element" id="optionValue_x" name="optionValue_x" ></textarea>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'affinity' ); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_x" name="optionUrl_x" >
                                </div>
                            </div>
                        </div>
                        <!-- close div.mkd-section-content -->
                    </div>
                    <!-- close div.container-fluid -->
                </div>
            </div>
        </div>
        <?php
        $no         = 1;
        $portfolios = get_post_meta($post->ID, 'mkd_portfolios', true);
        if(count((array)$portfolios) > 1) {
            usort($portfolios, "affinity_mikado_compare_portfolio_options");
        }
        while(isset($portfolios[$no - 1])) {
            $portfolio = $portfolios[$no - 1];
            ?>
            <div class="mkd-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
                <div class="mkd-portfolio-toggle-holder">
                    <div class="mkd-portfolio-toggle mkd-toggle-desc">
                        <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'affinity' ); ?><em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
                    </div>
                    <div class="mkd-portfolio-toggle mkd-portfolio-control">
                        <span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="mkd-portfolio-toggle-content" style="display: none">
                    <div class="mkd-page-form-section">
                        <div class="mkd-section-content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Order Number', 'affinity' ); ?></em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" >
                                    </div>
                                    <div class="col-lg-10">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Item Title ', 'affinity' ); ?></em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Item Text', 'affinity' ); ?></em>
                                        <textarea class="form-control mkd-input mkd-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" ><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="mkd-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'affinity' ); ?></em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" >
                                    </div>
                                </div>
                            </div>
                            <!-- close div.mkd-section-content -->
                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
            <?php
            $no++;
        }
        ?>

        <div class="mkd-portfolio-add">
            <a class="mkd-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'affinity' ); ?></a>


            <a class="mkd-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'affinity' ); ?></a>
            <?php /* <a class="mkd-remove-last-item-row btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Remove Last Row', 'affinity' ); ?></a> */ ?>
        </div>


    <?php

    }
}