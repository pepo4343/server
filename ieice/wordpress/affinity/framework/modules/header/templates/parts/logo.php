<?php do_action('affinity_mikado_before_site_logo'); ?>

	<div class="mkd-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php affinity_mikado_inline_style($logo_styles); ?>>
			<img <?php echo affinity_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e( 'logo', 'affinity' ); ?>"/>
			<?php if(!empty($logo_image_dark)) { ?>
				<img <?php echo affinity_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_attr_e( 'dark logo', 'affinity' ); ?>"/><?php } ?>
			<?php if(!empty($logo_image_light)) { ?>
				<img <?php echo affinity_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_attr_e( 'light logo', 'affinity' ); ?>"/><?php } ?>
		</a>
	</div>

<?php do_action('affinity_mikado_after_site_logo'); ?>