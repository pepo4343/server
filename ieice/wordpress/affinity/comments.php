<div class="mkd-comment-holder clearfix" id="comments">
	<div class="mkd-comment-number">
		<div class="mkd-comment-number-inner">
			<h5 class="mkd-comment-number-title"><?php comments_number(esc_html__('No Comments', 'affinity'), '1' . esc_html__(' Comment ', 'affinity'), '% ' . esc_html__(' Comments ', 'affinity')); ?></h5>
		</div>
	</div>
	<div class="mkd-comments">
		<?php if (post_password_required()) : ?>
		<p class="mkd-no-password"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'affinity'); ?></p>
	</div>
</div>
<?php
return;
endif;
?>
<?php if (have_comments()) : ?>

	<ul class="mkd-comment-list">
		<?php wp_list_comments(array('callback' => 'affinity_mikado_comment')); ?>
	</ul>


	<?php // End Comments ?>

<?php else : // this is displayed if there are no comments so far

	if (!comments_open()) :
		?>
		<!-- If comments are open, but there are no comments. -->


		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'affinity'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');
$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$args = array(
	'id_form'              => 'commentform',
	'id_submit'            => 'submit_comment',
	'title_reply'          => esc_html__('Add Comment', 'affinity'),
	'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h5>',
	'title_reply_to'       => esc_html__('Post a Reply to %s', 'affinity'),
	'cancel_reply_link'    => esc_html__('Cancel Reply', 'affinity'),
	'comment_field'        => '<textarea id="comment" placeholder="' . esc_html__('Write comment', 'affinity') . '" name="comment" cols="45" rows="7" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'fields'               => apply_filters('comment_form_default_fields', array(
		'author' => '<div class="mkd-comment-author">
							<div class="mkd-comment-author-label">
								<h5 class="mkd-comment-label-title">' . esc_html__('Name*', 'affinity') . '</h5>
							</div>
							<div class="mkd-comment-author-input">
								<input id="author" name="author" placeholder="' . esc_html__('Your full name', 'affinity') . '" type="text" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . ' />
							</div>
						</div>',
		'email'  => '<div class="mkd-comment-email">
						<div class="mkd-comment-email-label">
							<h5 class="mkd-comment-label-title">' . esc_html__('Email*', 'affinity') . '</h5>
						</div>
						<div class="mkd-comment-email-input">
							<input id="email" name="email" type="text" placeholder="' . esc_html__('Your email address', 'affinity') . '" value="' . esc_attr($commenter['comment_author_email']) . '"' . $aria_req . ' />
						</div>
					</div>',
		'url'    => '<div class="mkd-comment-url">
						<div class="mkd-comment-url-label">
							<h5 class="mkd-comment-label-title">' . esc_html__('Website', 'affinity') . '</h5>
						</div>
						<div class="mkd-comment-url-input">
							<input id="url" name="url" placeholder="' . esc_html__('Your website', 'affinity') . '" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" />
						</div>
					</div>',
        'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
            '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'affinity' ) . '</label></p>'
	)));
?>
<?php if (get_comment_pages_count() > 1) {
	?>
	<div class="mkd-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<div class="mkd-comment-form">
	<?php comment_form($args); ?>
</div>
</div>