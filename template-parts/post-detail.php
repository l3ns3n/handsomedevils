<h1 class="post-detail--title"><?php the_title(); ?></h1>

<div class="post-detail--avatar-wrapper">
    <div class="post-detail--avatar-name"><i class="fas fa-pencil-alt margin-right-s"></i> verfasst von <?php echo the_author_meta('first_name'); ?></div>
    <div class="post-detail--date"><i class="far fa-clock margin-right-s"></i> <?php the_time(get_option('date_format')); ?></div>
</div>
<?php
    $categories = get_the_category();
    if ($categories) {
        ?>
        <div class="post-detail--category-wrapper">
        <?php
            echo __('Kategorie: ', 'handsome');
            foreach ($categories as $category) {
                $categoryLink = get_category_link($category);
                $categoryName = $category->name;
                echo '<a class="post-detail--category-link" href="' . $categoryLink . '">' . $categoryName . '</a>';
            }
        ?>
        </div>
        <?php
    }
?>
<div class="post-detail--inner-wrapper">
    <div class="post-detail--content"><?php the_content(); ?>
        <?php echo get_post_meta(get_the_ID(), 'custom-slogan', true); ?>
    </div>
</div>
<div class="post-detail--back-to-blog">
    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>" class="btn post-detail--back-to-blog-button">
        <?php echo __('Zurück zur allen Beiträgen', 'handsome'); ?>
    </a>
</div>

<h2 class="detail-teaser__title">
    <?php _e('Artikel aus dieser Kategorie', 'handsome'); ?>
</h2>

<?php

    $categories = wp_get_post_categories(get_the_id());

    $args = array(
        'category__in' => $categories,
        'order' => 'DESC',
        'orderby' => 'date',
        'posts_per_page' => 6,
        'post__not_in' => array(get_the_id())
    );

    $custom_query = new WP_Query( $args );

    // The Loop
    if ( $custom_query->have_posts() ) {
        ?>
        <div class="detail-teaser__wrapper js-detail-teaser-slider">
        <?php

        while ( $custom_query->have_posts() ) {
            $custom_query->the_post();
            ?>
                <article class="detail-teaser__element">
                    <a href="<?php the_permalink( get_the_id() ) ?>">
                        <?php the_post_thumbnail( $size = 'blog-overview' ); ?>
                        <?php the_title( '<h3 class="detail-teaser__headline">', '</h3>' ); ?>
                    </a>
                </article>
            <?php
        }
        wp_reset_postdata();

        ?>
        </div>
        <?php
    }
?>
