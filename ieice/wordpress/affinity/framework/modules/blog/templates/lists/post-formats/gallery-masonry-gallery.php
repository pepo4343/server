<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php affinity_mikado_get_module_template_part('templates/lists/parts/gallery', 'blog', '', array('image_size' => $image_size)); ?>
</article>