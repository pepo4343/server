<?php do_action('affinity_mikado_before_page_header'); ?>

<header class="mkd-page-header">
	<?php if($show_fixed_wrapper) : ?>
	<div class="mkd-fixed-wrapper">
		<?php endif; ?>
		<div class="mkd-menu-area">
            <?php do_action('affinity_mikado_after_header_menu_area_html_open') ?>
            <div class="mkd-vertical-align-containers">
                <div class="mkd-position-left">
                    <div class="mkd-position-left-inner">
                        <?php if(!$hide_logo) {
                            affinity_mikado_get_logo();
                        } ?>

                    </div>
                </div>
                <div class="mkd-position-center">
                    <div class="mkd-position-center-inner">
                        <?php affinity_mikado_get_main_menu(); ?>
                    </div>
                </div>
                <div class="mkd-position-right">
                    <div class="mkd-position-right-inner">
                        <?php if(is_active_sidebar('mkd-tabbed-right-from-main-menu')) : ?>
                            <div class="mkd-main-menu-widget-area">
                                <div class="mkd-main-menu-widget-area-inner">
                                    <?php dynamic_sidebar('mkd-tabbed-right-from-main-menu'); ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
		</div>
		<?php if($show_fixed_wrapper) : ?>
	</div>
<?php endif; ?>
	<?php if($show_sticky) {
		affinity_mikado_get_sticky_header();
	} ?>
</header>

<?php do_action('affinity_mikado_after_page_header'); ?>

