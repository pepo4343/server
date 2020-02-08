<?php affinity_mikado_get_module_template_part('templates/lists/parts/filter', 'blog'); ?>

	<div class="<?php echo esc_attr($blog_classes) ?>"   <?php echo esc_attr($blog_data_params) ?> >

		<div class="mkd-blog-masonry-grid-sizer"></div>
		<div class="mkd-blog-masonry-grid-gutter"></div>

		<?php
		if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post();
			affinity_mikado_get_post_format_html($blog_type);
		endwhile;
			wp_reset_postdata();
		else:
			affinity_mikado_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;
		?>
	</div>

<?php /*pagination*/
if (affinity_mikado_options()->getOptionValue('pagination') == 'yes') :
	affinity_mikado_pagination($blog_query->max_num_pages, $blog_page_range, $paged, $blog_type);
endif;

do_action('affinity_mikado_generate_load_more_button');
do_action('affinity_mikado_generate_scroll_trigger');