<?php

function lm_setup_theme()
{
	load_theme_textdomain('handsome', get_template_directory() . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-background');
	add_theme_support('custom-header', array('width' => 1920, 'height' => 500, 'header-text' => false));

	add_theme_support('custom-header', array('width' => 1920, 'height' => 500, 'header-text' => false));
	add_theme_support('custom-logo');

	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));

	add_editor_style('css/fontawesome-all.min.css');
	add_editor_style('css/editor.css');

	add_image_size('blog-overview', 600, 400, true);
	add_image_size('teaser', 910, 400, true);
	add_image_size('blog-detail', 1920, 500, true);

	register_nav_menus(array(
		'hnavi' => __('Hauptmenü', 'handsome'),
		'custom-footer-menu' => __('Fußzeile', 'handsome'),
		'hnavi-top' => __('Topbarmenü', 'handsome')
	));

	if (!isset($content_width)) {
		$content_width = 1100;
	}
}
add_action('after_setup_theme', 'lm_setup_theme');

add_action( 'enqueue_block_editor_assets', function() {
//wp_enqueue_style( 'handsome-editor-styles', get_stylesheet_directory_uri() . '/css/editor.css', false, '1.0', 'all' );
} );

function lm_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'lm_custom_excerpt_length', 50 );



function lm_enqueue_scripts()
{
    wp_enqueue_style('cs-font-style', get_stylesheet_uri());
    wp_enqueue_style('cs-font-awesome-5', get_theme_file_uri('/css/fontawesome-all.min.css'));
    wp_enqueue_style('cs-font-fancybox', get_theme_file_uri('/css/fancybox.css'));
    wp_enqueue_style('cs-css-slick', get_theme_file_uri('/css/slick.css'));
    wp_enqueue_style('cs-font-editor', get_theme_file_uri('/css/editor.css'));
    wp_enqueue_style('cs-font-form', get_theme_file_uri('/css/form.css'));
    wp_enqueue_style('cs-font-media', get_theme_file_uri('/css/media.css'));
    wp_enqueue_style('cs-font-navigation', get_theme_file_uri('/css/navigation.css'));
    wp_enqueue_style('cs-font-screen', get_theme_file_uri('/css/screen.css'));
    wp_enqueue_style('cs-font-content', get_theme_file_uri('/css/content.css'));

	// Javascript
	wp_enqueue_script('jquery');
    wp_enqueue_script('cs-slick', get_theme_file_uri('/js/slick.min.js'), array(), false, true);
    wp_enqueue_script('cs-font-fancybox', get_theme_file_uri('/js/fancybox.js'), array(), false, true);
    wp_enqueue_script('cs-font-main', get_theme_file_uri('/js/main.js'), array(), false, true);
}
add_action('wp_enqueue_scripts', 'lm_enqueue_scripts');

function lm_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Sidebar', 'handsome'),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => __('Footer Links', 'handsome'),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s wpb_content_element">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));

	register_sidebar(array(
		'name'          => __('Footer Rechts', 'handsome'),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s wpb_content_element">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>'
	));
}
add_action('widgets_init', 'lm_widgets_init');

// styling the backend login page
function cs_wp_login_css() {
	wp_enqueue_style('cs-style-wp-login', get_theme_file_uri('/css/wp-login.css', array(), ''));
}
add_action('login_enqueue_scripts', 'cs_wp_login_css');

function lm_wp_login_logo_url($url) {

	return get_bloginfo('url');
}
add_filter('login_headerurl', 'lm_wp_login_logo_url');

add_filter('comment_form_default_fields', 'cs_unset_url_field');
function cs_unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

function remove_comment_ip()
{
return "127.0.0.1";
}
add_filter( 'pre_comment_user_ip', 'remove_comment_ip', 50);

add_filter( 'comment_form_field_comment', 'my_comment_form_field_comment' );
function my_comment_form_field_comment( $comment_field )
{
return $comment_field.
'<input type="checkbox" id="comment-privacy" name="comment-privacy" value="privacy-key" class="privacyBox" aria-req="true">
<label for="comment-privacy" class="comment-privacy-label">Ich akzeptiere, dass meine Daten für die korrekte Funktionsweise der Website gespeichert werden.</label>';
}
add_action('wp_footer','valdate_privacy_comment_javascript');
function valdate_privacy_comment_javascript(){
    if (is_single() && comments_open()){
        wp_enqueue_script('jquery');
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($){
            $("#submit").click(function(e){
                if (!$('.privacyBox').prop('checked')){
                    e.preventDefault();
                    $('.comment-form-cookies-consent').after('Sie müssen die Datenschutz-Checkbox anhaken.');
                    return false;
                }
            })
        });
        </script>
        <?php
    }
}
add_filter( 'preprocess_comment', 'verify_comment_privacy' );
function verify_comment_privacy( $commentdata ) {
    if ( ! isset( $_POST['privacy'] ) )
        wp_die( __( 'Bitte akzeptieren Sie die Checkbox.' ) );

    return $commentdata;
}
add_action( 'comment_post', 'save_comment_privacy' );
function save_comment_privacy( $comment_id ) {
    add_comment_meta( $comment_id, 'privacy', $_POST[ 'privacy' ] );
}

// remove default tablepress css
add_filter('tablepress_use_default_css', '__return_false');

define('FS_METHOD', 'direct');
define('ENABLE_CACHE', false);

require_once('inc/customizer.php');
require_once('inc/editor_styles.php');
