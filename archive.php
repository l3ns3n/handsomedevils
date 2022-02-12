<?php
get_header();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="main">
<div class="wrapper">

<h1 class="page-title"><?php the_archive_title(); ?></h1>

<div class="archive-description"><?php the_archive_description(); ?></div>

<?php
while (have_posts()) : the_post();

	get_template_part('template-parts/post');

endwhile;
?>

<?php the_posts_pagination(); ?>

</div>
</main>

<?php
get_footer();
?>