<?php do_action('affinity_mikado_before_mobile_logo'); ?>

	<div class="mkd-mobile-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php affinity_mikado_inline_style($logo_styles); ?>>
			<img <?php echo affinity_mikado_get_inline_attrs($logo_dimensions_attr); ?> src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e( 'mobile-logo', 'affinity' ); ?>"/>
		</a>
	</div>

<?php do_action('affinity_mikado_after_mobile_logo'); ?>