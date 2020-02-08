<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkd-post-content">
		<div class="mkd-post-text">
			<div class="mkd-post-text-inner">
				<?php affinity_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php affinity_mikado_excerpt($excerpt_length); ?>
				<div class="mkd-post-info">
					<?php affinity_mikado_post_info(array('date' => 'yes')) ?>
				</div>
			</div>
		</div>
	</div>
</article>