<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkd-post-content">
		<div class="mkd-post-text">
			<div class="mkd-post-text-inner clearfix">
				<?php the_content(); ?>
			</div>
			<div class="mkd-tags-share-holder clearfix">
				<?php do_action('affinity_mikado_before_blog_article_closed_tag'); ?>
				<div class="mkd-share-icons-single">
					<?php if ( affinity_mikado_core_installed() ) { ?>
						<?php $post_info_array['share'] = affinity_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
						<?php if ($post_info_array['share'] == 'yes'): ?>
							<span class="mkd-share-label"><?php esc_html_e('Share', 'affinity'); ?></span>
						<?php endif; ?>
						<?php echo affinity_mikado_get_social_share_html(array(
							'type'      => 'list',
							'icon_type' => 'normal'
						)); ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>
