<?php if(mos_has_content('comments-enabled')): ?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyeleven' ); ?></p>
	</div><!-- #comments -->
	<?php	return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php
				printf( _n( 'En kommentar på &ldquo;%2$s&rdquo;', '%1$s kommentarer på &ldquo;%2$s&rdquo;', get_comments_number(), 'mos' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<div class="commentlist"><?=wp_list_comments( array( 'callback' => 'mos_comment'))?></div>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyeleven' ); ?></p>
	<?php endif; ?>

  <?=comment_form(array('title_reply'=>'Lämna en kommentar'))?>

</div><!-- #comments -->
<?php endif; ?>