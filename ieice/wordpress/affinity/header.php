<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php if (!affinity_mikado_is_ajax_request()) affinity_mikado_wp_title(); ?>
    <?php
    /**
     * @see affinity_mikado_header_meta() - hooked with 10
     * @see mkd_user_scalable - hooked with 10
     */
    ?>
	<?php if (!affinity_mikado_is_ajax_request()) do_action('affinity_mikado_header_meta'); ?>

	<?php if (!affinity_mikado_is_ajax_request()) wp_head(); ?>
</head>

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
<?php if (!affinity_mikado_is_ajax_request()) affinity_mikado_get_side_area(); ?>


<?php
if((!affinity_mikado_is_ajax_request()) && affinity_mikado_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$ajax_class = 'mkd-mimic-ajax';
?>
<div class="mkd-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
    <div class="mkd-st-loader">
        <div class="mkd-st-loader1">
            <?php echo affinity_mikado_loading_spinners(true); ?>
        </div>
    </div>
</div>
<?php } ?>
<?php if(affinity_mikado_is_paspartu_on()){ ?>
    <div class="mkd-wrapper-paspartu">
<?php } ?>
<div class="mkd-wrapper">
    <div class="mkd-wrapper-inner">
	    <?php if (!affinity_mikado_is_ajax_request()) affinity_mikado_get_header(); ?>

	    <?php if ((!affinity_mikado_is_ajax_request()) && affinity_mikado_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='mkd-back-to-top'  href='#'>
                <span class="mkd-icon-stack">
                     <?php echo affinity_mikado_icon_collections()->renderIcon('arrow_carrot-up', 'font_elegant'); ?>
                </span>
                  <span class="mkd-back-to-top-inner">
                    <span class="mkd-back-to-top-text"><?php esc_html_e('Top', 'affinity'); ?></span>
                </span>
            </a>
        <?php } ?>
	    <?php if (!affinity_mikado_is_ajax_request()) affinity_mikado_get_full_screen_menu(); ?>

        <div class="mkd-content" <?php affinity_mikado_content_elem_style_attr(); ?>>
            <?php if(affinity_mikado_is_ajax_enabled()) { ?>
            <div class="mkd-meta">
                <?php do_action('affinity_mikado_ajax_meta'); ?>
                <span id="mkd-page-id"><?php echo esc_html($wp_query->get_queried_object_id()); ?></span>
                <div class="mkd-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="mkd-content-inner">