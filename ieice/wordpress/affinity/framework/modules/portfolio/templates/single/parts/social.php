<div class="mkd-portfolio-item-social">
	<?php if(affinity_mikado_options()->getOptionValue('enable_social_share') == 'yes'
	         && affinity_mikado_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes'
	         && affinity_mikado_core_installed()
	) : ?>
		<div class="mkd-portfolio-single-share-holder">
				<span class="mkd-share-label">
				    <?php esc_html_e('Share', 'affinity'); ?>
			    </span>
			<?php echo affinity_mikado_get_social_share_html() ?>
		</div>
	<?php endif; ?>
	<div class="mkd-portfolio-single-likes">
		<?php echo affinity_mikado_like_portfolio_list(get_the_ID()); ?>
	</div>
</div>
