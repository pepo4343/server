<?php
$blog_archive_pages_classes = affinity_mikado_blog_archive_pages_classes(affinity_mikado_get_default_blog_list());
?>
<?php get_header(); ?>
<?php affinity_mikado_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
	<?php do_action('affinity_mikado_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php affinity_mikado_get_blog(affinity_mikado_get_default_blog_list()); ?>
	</div>
	<?php do_action('affinity_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>
