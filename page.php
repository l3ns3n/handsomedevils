<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<?php

if (has_post_thumbnail()) {

	echo '<div id="header-image">' . the_post_thumbnail('header_image_large', array('class' => 'full-width')) . '</div>';

} else {
    if (get_header_image()) {
        echo '<div class="header--bg-image-wrapper js-adjust-header-image"><img class="header--bg-image" src="'.get_header_image().'" alt="header-image" /></div>';
    }
}
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="main">
	<div class="wrapper">
		<?php the_content(); ?>
	</div>
</main>

<?php endwhile; ?>

<?php
get_footer();
?>
