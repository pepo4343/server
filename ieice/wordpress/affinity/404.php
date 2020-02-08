<?php get_header(); ?>

<div class="mkd-container"
	 style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/assets/css/img/404-background.png') ?>)">
	<?php do_action('affinity_mikado_after_container_open'); ?>
	<div class="mkd-container-inner mkd-404-page">
		<div class="mkd-page-not-found">
			<div class="mkd-404-image">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/404.png') ?>"
					 alt="<?php esc_attr_e('404', 'affinity'); ?>"/>
			</div>
			<h1>
				<?php if (affinity_mikado_options()->getOptionValue('404_title')) {
					echo esc_html(affinity_mikado_options()->getOptionValue('404_title'));
				} else {
					esc_html_e('PAGE NOT FOUND', 'affinity');
				} ?>
			</h1>

			<p>
				<?php if (affinity_mikado_options()->getOptionValue('404_text')) {
					echo esc_html(affinity_mikado_options()->getOptionValue('404_text'));
				} else {
					esc_html_e('The page requested couldn\'t be found. This could be a spelling error in the URL or a removed page.', 'affinity');
				} ?>
			</p>
			<?php
			if(affinity_mikado_core_installed()) {
                $params = array();
                if (affinity_mikado_options()->getOptionValue('404_back_to_home')) {
                    $params['text'] = affinity_mikado_options()->getOptionValue('404_back_to_home');
                } else {
                    $params['text'] = esc_html__('Back to Homepage', 'affinity');
                }

                $params['link'] = esc_url(home_url('/'));
                $params['target'] = '_self';
                echo affinity_mikado_execute_shortcode('mkd_button', $params);
            }?>
		</div>
	</div>
	<?php do_action('affinity_mikado_before_container_close'); ?>
</div>

<?php wp_footer(); ?>
