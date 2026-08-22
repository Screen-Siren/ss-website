<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo">
		Screen Siren<span>Pictures Inc.</span>
	</a>
	<nav class="site-header__nav" aria-label="Primary">
		<a href="#projects">Projects</a>
		<a href="#story">Story</a>
		<a href="#team">Team</a>
		<a href="#contact">Contact</a>
	</nav>
</header>
