<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php affinity_mikado_get_title(); ?>
		<?php get_template_part('slider'); ?>
		<div class="mkd-container">
			<?php affinity_mikado_image_title_featured_image(); ?>
			<div class="mkd-container-inner">
				<?php do_action('affinity_mikado_after_container_open'); ?>
				<?php affinity_mikado_get_blog_single(); ?>
				<?php do_action('affinity_mikado_before_container_close'); ?>
			</div>
			<?php affinity_mikado_get_single_post_navigation_template(); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>