<?php

if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div class="comments" id="comments">

		<?php
		$comments_number = absint( get_comments_number() );
		?>

		<div class="comments-header section-inner small max-percentage">

			<h2 class="comment-reply-title">
			<?php
			if ( ! have_comments() ) {
				_e( 'Du willst uns deine Meinung mitteilen? Hinterlasse einen Kommentar.', 'handsome' );
			} elseif ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'handsome' ), esc_html( get_the_title() ) );
			} else {
				echo sprintf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Kommentar zu &ldquo;%2$s&rdquo;',
						'%1$s Kommentare zu &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'handsome'
					),
					number_format_i18n( $comments_number ),
					esc_html( get_the_title() )
				);
			}

			?>
			</h2><!-- .comments-title -->
			<p>
				<?php
				_e('Du hast etwas auf dem Herzen? Dann hinterlasse einen Kommentar. Dafür musst du deine E-Mail angeben. Die Daten werden vertraulich behandelt, dienen nur der technischen Vorgehensweise und werden nicht weitergegeben.', 'handsome');
				?>
			</p>
		</div><!-- .comments-header -->


		<div class="comments-inner section-inner thin max-percentage">

			<?php
			if (have_comments()) : ?>
		    <ol class="post-comments">
		        <?php
		            wp_list_comments(array(
		                'style'       => 'ol',
		                'short_ping'  => true,
		            ));
		        ?>
		    </ol>
			<?php
		endif;

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Neuere Kommentare', 'handsome' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Ältere Kommentare', 'handsome' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'handsome' ); ?>">
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</div><!-- .comments-inner -->

	</div><!-- comments -->

	<?php
}

if ( comments_open() || pings_open() ) {

	comment_form(
		array(
			'class_form'         => 'section-inner thin max-percentage',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);

} elseif ( is_single() ) {

	?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e( 'Kommentare sind geschlossen.', 'handsome' ); ?></p>

	</div><!-- #respond -->

	<?php
}
