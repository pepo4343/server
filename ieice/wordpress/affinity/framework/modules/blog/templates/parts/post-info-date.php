<div class="mkd-post-info-date">
    <?php if(!affinity_mikado_post_has_title()) { ?>
    <a href="<?php the_permalink() ?>">
        <?php } ?>
		<span class="mkd-post-info-date-icon">
			<?php echo affinity_mikado_icon_collections()->renderIcon('icon-calendar', 'simple_line_icons'); ?>
		</span>
        <span class="mkd-date"><?php the_time(get_option('date_format')); ?></span>
        <?php if(!affinity_mikado_post_has_title()) { ?>
    </a>
<?php } ?>
</div>