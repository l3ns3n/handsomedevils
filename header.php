<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#cf6766">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">

<header id="header-top">
	<div class="wrapper align-right">
        <div class="header-top--wrapper">
            <div class="header-top--logo-container">
				<?php if(get_theme_mod("lm_customizer_setting_logo_image")) {
				    $mediaId = get_theme_mod("lm_customizer_setting_logo_image");
				    $mediaSrc = wp_get_attachment_image_src($mediaId, 'full');

				    echo '<img class="header-top--logo lazyload" alt="Handsome Devils" data-src="' . $mediaSrc[0] . '">';
				} ?>
				<a href="<?php echo home_url(); ?>" class="header-top--logo-link link--special"><?php echo __('Handsome Devils', 'handsome'); ?></a>

			</div>
            <div class="header-top--info-container">
				<?php
				if (has_nav_menu('hnavi-top')) {

					wp_nav_menu(array(
						'theme_location' => 'hnavi-top',
						'container' => 'div',
						'container_class' => 'link--special',
						'menu_id' => 'hnavi-top',
						'menu_class' => 'clean',
						'link_before' => '<i class="fas fa-hand-peace"></i> ',
						'link_after' => '',
					));
				}
				?>
			</div>
        </div>
	</div>
</header>

<header id="header">
	<div id="header-inner">
		<div class="wrapper">
			<?php if (has_custom_logo()) {echo the_custom_logo();} ?>

			<a href="<?php echo home_url(); ?>" class="header-bottom--mobile-link js-header-mobile-title">
				<?php _e('Handsome Devils', 'handsome'); ?>
			</a>

			<ul id="toggle-buttons" class="clean">
				<li><button class="js-toggle-hnavi" type="button"><i class="header-bottom--mobile-icon fal fa-bars"></i></button></li>
			</ul>

			<?php
			if (has_nav_menu('hnavi')) {

				wp_nav_menu(array(
					'theme_location' => 'hnavi',
					'container' => 'nav',
					'container_id' => 'hnavi',
					'container_class' => 'menu-container',
					'menu_id' => 'hnavi-menu',
					'menu_class' => 'clean clearfix',
					'link_before' => '<span>',
					'link_after' => '</span>',
					'after' => '<i class="fa fa-plus js-toggle-sub-menu"></i>'
				));
			}
			?>
		</div>
	</div>
</header>
