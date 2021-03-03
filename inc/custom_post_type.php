<?php
// Our custom post type function
function create_posttype() {

    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( '100 Wörter' ),
                'singular_name' => __( '100 Wörter' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-status',
            'rewrite' => array('slug' => '100_woerter'),
            'show_in_rest' => true,

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
