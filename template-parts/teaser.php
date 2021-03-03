<?php
    $the_query = new WP_Query( array(
        'posts_per_page' => 6,
    ));
?>

<?php if ( $the_query->have_posts() ) : ?>
    <div class="teaser--wrapper">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <article class="teaser--content">
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('teaser', array('class' => 'teaser--image')); ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="teaser--link-wrapper link--special">
                    <?php the_title('<h3 class="teaser--title">', '</h3>'); ?>
                </a>
                <div class="teaser--excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php
            endwhile;
            wp_reset_postdata();
        ?>
    </div>
    <div class="teaser__link--bottom">
        <a class="btn" href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>"><?php _e('Alle Blogbeiträge anzeigen', 'handsome'); ?> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
    </div>
<?php else : ?>
    <p><?php __('No News'); ?></p>
<?php endif; ?>
