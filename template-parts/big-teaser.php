<?php
    if (get_theme_mod("lm_customizer_setting_frontpage") && get_theme_mod("lm_customizer_setting_frontpage_two")) {
        $postIds = [];
        array_push($postIds, get_theme_mod("lm_customizer_setting_frontpage"), get_theme_mod("lm_customizer_setting_frontpage_two"));
    ?>
    
        <h2 class="h1 align-center">
            <?php
                if (get_theme_mod("lm_customizer_setting_frontpage_title")) {
                    $frontpageTitle = get_theme_mod("lm_customizer_setting_frontpage_title");
                    echo $frontpageTitle;
                }
            ?>
        </h2>
        <section class="big-teaser__wrapper">
            <?php foreach ($postIds as $id) {
                $post = get_post($id); ?>
                    <article class="big-teaser__item">
                        <a href="<?php echo get_permalink($id); ?>" class="big-teaser__link">
                            <?php echo get_the_post_thumbnail( $id, 'blog-overview', array( 'class' => 'big-teaser__image' ) ); ?>
                            <h3 class="big-teaser__title"><?php echo $post->post_title; ?></h3>
                        </a>
                    </article>
            <?php } ?>
        </section>
    <?php
    }
?>
