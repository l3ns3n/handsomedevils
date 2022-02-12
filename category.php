<?php
get_header();
?>

<?php
if (get_theme_mod( 'lm_customizer_setting_category_header_image' )) {
?>
<div class="header--bg-image-wrapper js-adjust-header-image">
    <img class="header--bg-image" src="<?php echo wp_get_attachment_url( get_theme_mod( 'lm_customizer_setting_category_header_image' ) ); ?>" alt="Product 1">
</div>
<?php } ?>

<main>
<div class="wrapper">

<h1 class="category--title"><?php the_archive_title(); ?></h1>

<div class="category--description"><?php the_archive_description(); ?></div>

<div class="post--container">
    <?php
    while (have_posts()) : the_post();

    	get_template_part('template-parts/post');

    endwhile;
    ?>
</div>

<?php the_posts_pagination(); ?>

</div>
</main>

<?php
get_footer();
?>
