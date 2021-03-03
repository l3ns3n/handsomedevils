<article id="post-<?php the_ID(); ?>" <?php post_class('post--wrapper'); ?>>
	<div class="post--thumbnail-wrapper">
		<?php if (has_post_thumbnail()) { ?>
		<div class="post--thumbnail--inner">
			<a href="<?php the_permalink(); ?>">
            	<?php the_post_thumbnail('blog-overview', array('class' => 'post--thumbnail-img')); ?>
			</a>
		</div>
		<?php } ?>

		<div class="post--content-wrapper">
			<div class="post--content-inner">
	            <h2 class="post--title">
					<a href="<?php the_permalink(); ?>" class="link--special"><?php the_title(); ?></a>
				</h2>
			</div>
		</div>
	</div>
</article>
