<?php
// add custom editor styles
function cs_add_editor_button_styleselect($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'cs_add_editor_button_styleselect');

function cs_add_editor_button_styleselect_formats($init_array)
{
	$style_formats = array(

		array(
			'title' => 'Stil H1',
			'selector' => 'h2, h3, h4, h5, h6, p',
			'classes' => 'h1',
			'wrapper' => false
		),
		array(
			'title' => 'Stil H2',
			'selector' => 'h1, h3, h4, h5, h6, p',
			'classes' => 'h2',
			'wrapper' => false
		),
		array(
			'title' => 'Stil H3',
			'selector' => 'h1, h2, h4, h5, h6, p',
			'classes' => 'h3',
			'wrapper' => false
		),
		array(
			'title' => 'Stil H4',
			'selector' => 'h1, h2, h3, h5, h6, p',
			'classes' => 'h4',
			'wrapper' => false
		),
		array(
			'title' => 'Stil H5',
			'selector' => 'h1, h2, h3, h4, h6, p',
			'classes' => 'h5',
			'wrapper' => false
		),
		array(
			'title' => 'Stil H6',
			'selector' => 'h1, h2, h3, h4, h5, p',
			'classes' => 'h6',
			'wrapper' => false
		),
		array(
			'title' => 'Aufzählung',
			'selector' => 'ul, ol',
			'classes' => 'list-default',
			'wrapper' => false
		),
		array(
			'title' => 'Download-Link',
			'selector' => 'a',
			'classes' => 'link-download',
			'wrapper' => false
		),
		array(
			'title' => 'Download-Liste',
			'selector' => 'ul, ol',
			'classes' => 'list-download',
			'wrapper' => false
		),
		array(
			'title' => 'Button',
			'selector' => 'a, button, input',
			'classes' => 'btn',
			'wrapper' => false
		),
		array(
			'title' => 'Schrift Hell',
			'selector' => 'p, span',
			'classes' => 'color-light',
			'wrapper' => false
		),
		array(
			'title' => 'Schrift Groß',
			'selector' => 'p, span, a',
			'classes' => 'font-size-large',
			'wrapper' => false
		),
		array(
			'title' => 'Schrift klein',
			'selector' => 'p, span, a',
			'classes' => 'font-size-small',
			'wrapper' => false
		),
        array(
            'title' => 'Auszeichnungsfarbe (orange)',
            'selector' => 'p, span, a',
            'classes' => 'text-special',
            'wrapper' => false
        ),
        array(
            'title' => 'Link nicht unterstrichen',
            'selector' => 'p, span, a',
            'classes' => 'no-text-decoration',
            'wrapper' => false
        ),
		array(
			'title' => 'Rahmen',
			'selector' => 'img',
			'classes' => 'border',
			'wrapper' => false
		),
		array(
			'title' => 'Icon Info',
			'block' => 'div',
			'classes' => 'icon-box ion-ios-information-outline',
			'wrapper' => true
		),
		array(
			'title' => 'Icon Clock',
			'block' => 'div',
			'classes' => 'icon-box ion-ios-clock-outline',
			'wrapper' => true
		),
		array(
			'title' => 'Icon Location',
			'block' => 'div',
			'classes' => 'icon-box ion-ios-location-outline',
			'wrapper' => true
		),
		array(
			'title' => 'Icon Telephone',
			'block' => 'div',
			'classes' => 'icon-box ion-ios-telephone-outline',
			'wrapper' => true
		),
		array(
			'title' => 'Icon E-Mail',
			'block' => 'div',
			'classes' => 'icon-box ion-ios-email-outline',
			'wrapper' => true
		)
	);

	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;
}
add_filter('tiny_mce_before_init', 'cs_add_editor_button_styleselect_formats');