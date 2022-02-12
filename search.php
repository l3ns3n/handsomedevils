<?php
get_header();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="main">
<div class="wrapper">

<h1 class="page-title"><?php _e('Suche', 'handsome'); ?></h1>

<?php echo get_search_form(); ?>

<?php
if (have_posts()) {

	echo '<p class="align-center">' . $wp_query->found_posts . ' ' . ($wp_query->found_posts == 1 ? __('Suchergebnis gefunden', 'handsome') : __('Suchergebnisse gefunden', 'handsome')) . '</p>';

	while (have_posts()) : the_post();

		get_template_part('template-parts/search-result');

	endwhile;

	the_posts_pagination();

} else {

	echo '<p class="align-center">'.__('Keine passenden Suchergebnisse', 'handsome').'</p>';
}
?>
</div>
</main>

<?php
get_footer();
?>