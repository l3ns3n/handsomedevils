<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<main>
	<div class="wrapper">
		<?php get_template_part('template-parts/teaser'); ?>

		<section class="wrapper-small">
			<?php the_content(); ?>
		</section>

		<?php get_template_part('template-parts/icon-wrapper'); ?>

		<?php get_template_part('template-parts/big-teaser'); ?>
	</div>
</main>

<?php endwhile; ?>

<?php
get_footer();
?>
