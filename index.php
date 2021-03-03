<?php
get_header();
?>

<main id="main">
<div class="wrapper">

<?php if (get_option('page_for_posts')) { ?>
	<h1 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
<?php } ?>

<div class="post--container">
<?php
while (have_posts()) : the_post();

	get_template_part('template-parts/post');

endwhile;
?>
</div>

<?php the_posts_pagination(array(
    'mid_size' => 1,
    'prev_text' => __( '<', 'handsome' ),
    'next_text' => __( '>', 'handsome' ),
) ); ?>

</div>
</main>

<?php
get_footer();
?>
