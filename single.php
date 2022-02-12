<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <?php if (has_post_thumbnail()) { ?>
            <div class="header--bg-image-wrapper js-adjust-header-image"><?php the_post_thumbnail('blog-detail', array('class' => 'header--bg-image')); ?></div>
	<?php } ?>

<main>
	<article class="wrapper-small">

        <?php get_template_part('template-parts/post-detail'); ?>

        <div class="comments-wrapper section-inner">

            <?php comments_template(); ?>

        </div><!-- .comments-wrapper -->

	</article>

</main>

<?php endwhile; ?>

<?php
get_footer();
?>
