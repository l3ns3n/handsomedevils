<?php
get_header();
?>

<?php if (has_post_thumbnail()) { ?>
	<div class="header--bg-image-wrapper js-adjust-header-image"><?php the_post_thumbnail('blog-detail', array('class' => 'header--bg-image')); ?></div>
<?php } ?>

<main id="main">
	<div class="wrapper">
		<h1 class="page-title"><?php _e('Ohhhh, what a day.', 'handsome'); ?></h1>
		<div class="page-content">
			<p class="error-page--error-text"><?php _e('Die von dir aufgerufene Seite kann nicht angezeigt werden.', 'handsome'); ?></p>
			<p><?php _e('Wir wollen dir nichts unterstellen, aber kann es sein, dass:.', 'handsome'); ?></p>
			<ul class="list-default">
				<li><?php _e('du dich bei der <strong>Adresse vertippt</strong> hast', 'handsome'); ?></li>
				<li><?php _e('du ein <strong>veraltetes Lesezeichen</strong> aufgerufen hast', 'handsome'); ?></li>
				<li><?php _e('du über eine Suchmaschine einen <strong>veralteten Index</strong> dieser Webseite aufgerufen hast', 'handsome'); ?></li>
			</ul>
			<a class="btn" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php _e('Hier geht es ab zur Startseite', 'handsome'); ?></a>
		</div>
	</div>
</main>

<?php
get_footer();
?>
