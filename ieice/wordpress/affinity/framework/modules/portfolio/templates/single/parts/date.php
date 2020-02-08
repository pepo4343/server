<?php if(affinity_mikado_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

	<div class="mkd-portfolio-info-item mkd-portfolio-date clearfix">
		<h5><?php esc_html_e('Date', 'affinity'); ?></h5>

		<p><?php the_time(get_option('date_format')); ?></p>
	</div>

<?php endif; ?>