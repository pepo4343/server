<?php if($footer_top_border != '') {
	//Footer top border
	if($footer_top_border_in_grid !== '') { ?>
		<div class="mkd-footer-ingrid-border-holder-outer">
	<?php } ?>
	<div class="mkd-footer-top-border-holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php affinity_mikado_inline_style($footer_top_border); ?>></div>
	<?php if($footer_top_border_in_grid !== '') { ?>
		</div>
	<?php }
} ?>

<div class="mkd-footer-top-holder">
	<div class="mkd-footer-top <?php echo esc_attr($footer_top_classes) ?>">
		<?php if($footer_in_grid) { ?>

		<div class="mkd-container">
			<div class="mkd-container-inner">

				<?php }

				switch($footer_top_columns) {
					case 6:
						affinity_mikado_get_footer_sidebar_50_25_25();
						break;
					case 5:
						affinity_mikado_get_footer_sidebar_25_25_50();
						break;
					case 4:
						affinity_mikado_get_footer_sidebar_four_columns();
						break;
					case 3:
						affinity_mikado_get_footer_sidebar_three_columns();
						break;
					case 2:
						affinity_mikado_get_footer_sidebar_two_columns();
						break;
					case 1:
						affinity_mikado_get_footer_sidebar_one_column();
						break;
				}

				if($footer_in_grid) { ?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
