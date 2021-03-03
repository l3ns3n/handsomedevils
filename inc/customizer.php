<?php

require_once('latest_posts.php');


function lm_customizer($wp_customize)  {

    // 404 Template
    $wp_customize->add_section('lm_customizer_section_404', array(
       'title' => __('Spezielle Hintergrundseiten', 'handsome'),
       'priority' => 82
    ));

    $wp_customize->add_setting('lm_customizer_setting_404_header_image', array(
       'capability' => 'edit_theme_options',
       'default' => ''
    ));

   $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'lm_customizer_setting_404_header_image', array(
      'section' => 'lm_customizer_section_404',
      'label' => __('Headerbild (404)', 'handsome'),
      'description' => 'Das Bild wird automatisch anhand der Einstellungen im Theme zugeschnitten.',
      'mime_type' => 'image'
   )));

   $wp_customize->add_setting('lm_customizer_setting_category_header_image', array(
      'capability' => 'edit_theme_options',
      'default' => ''
   ));

   $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'lm_customizer_setting_category_header_image', array(
     'section' => 'lm_customizer_section_404',
     'label' => __('Headerbild (Kategorien)', 'handsome'),
     'description' => 'Das Bild wird automatisch anhand der Einstellungen im Theme zugeschnitten.',
     'mime_type' => 'image',
     'settings' => 'blog-detail'
   )));

   // logo
   $wp_customize->add_section('lm_customizer_section_logo', array(
      'title' => __('Logo', 'handsome'),
      'priority' => 83
   ));

   $wp_customize->add_setting('lm_customizer_setting_logo_image', array(
      'capability' => 'edit_theme_options',
      'default' => ''
   ));

   $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'lm_customizer_setting_logo_image', array(
     'section' => 'lm_customizer_section_logo',
     'label' => __('Logo!', 'handsome'),
     'description' => 'Das Bild wird automatisch anhand der Einstellungen im Theme zugeschnitten.',
     'mime_type' => 'image'
   )));

   // front page posts
   $wp_customize->add_section('lm_customizer_section_frontpage', array(
      'title' => __('Startseiteneinstellungen', 'handsome'),
      'priority' => 84
   ));

   $wp_customize->add_setting('lm_customizer_setting_frontpage', array(
      'capability' => 'edit_theme_options',
      'default' => ''
   ));

    $wp_customize->add_control(
        new WP_Customize_Latest_Post_Control(
            $wp_customize,
            'lm_customizer_setting_frontpage',
            array(
            'label' => __('Startseite-Beitrag (links)', 'handsome'),
            'section' => 'lm_customizer_section_frontpage',
            'settings' => 'lm_customizer_setting_frontpage',
            'post_type' => 'post'
            )
        )
    );

    $wp_customize->add_setting('lm_customizer_setting_frontpage_two', array(
       'capability' => 'edit_theme_options',
       'default' => ''
    ));

     $wp_customize->add_control(
         new WP_Customize_Latest_Post_Control(
             $wp_customize,
             'lm_customizer_setting_frontpage_two',
             array(
             'label' => __('Startseite-Beitrag (rechts)', 'handsome'),
             'section' => 'lm_customizer_section_frontpage',
             'settings' => 'lm_customizer_setting_frontpage_two',
             'post_type' => 'post'
             )
         )
     );

   $wp_customize->add_setting('lm_customizer_setting_frontpage_title', array(
      'capability' => 'edit_theme_options',
      'default' => ''
   ));

   $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lm_customizer_setting_frontpage_title', array(
     'section' => 'lm_customizer_section_frontpage',
     'setting' => 'lm_customizer_setting_frontpage_title',
     'label' => __('Überschrift für ausgewählte Beiträge', 'handsome'),
     'description' => 'Wird auf der Startseite ausgegeben.',
     'type' => 'text'
   )));

    // remove wordpress custom css when not admin
   if (!current_user_can('administrator')) {
      $wp_customize->remove_section('custom_css');
   }
}
add_action('customize_register', 'lm_customizer', 15);
