<?php do_action('affinity_mikado_before_sticky_header'); ?>

    <div class="mkd-sticky-header">
        <?php do_action('affinity_mikado_after_sticky_menu_html_open'); ?>
        <div class="mkd-sticky-holder">
            <?php if($sticky_header_in_grid) : ?>
            <div class="mkd-grid">
                <?php endif; ?>
                <div class=" mkd-vertical-align-containers">
                    <div class="mkd-position-left">
                        <div class="mkd-position-left-inner">
                            <?php if(!$hide_logo) {
                                affinity_mikado_get_logo('sticky');
                            } ?>
                            <?php affinity_mikado_get_sticky_menu('mkd-sticky-nav'); ?>
                        </div>
                    </div>
                    <div class="mkd-position-right">
                        <div class="mkd-position-right-inner">
                            <?php if(get_post_meta(affinity_mikado_get_page_id(), 'mkd_custom_sidebar_header_standard_meta', true) !== ''){ ?>
                                <div class="mkd-sticky-right-widget">
                                    <div class="mkd-sticky-right-widget-inner">
                                        <?php dynamic_sidebar(get_post_meta(affinity_mikado_get_page_id(), 'mkd_custom_sidebar_header_standard_meta', true));?>
                                    </div>
                                </div>
                            <?php }else if(is_active_sidebar('mkd-sticky-right')){ ?>
                                <div class="mkd-sticky-right-widget-area">
                                    <?php dynamic_sidebar('mkd-sticky-right'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('affinity_mikado_after_sticky_header'); ?>