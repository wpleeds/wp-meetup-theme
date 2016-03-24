<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class( 'has-primary-nav' ); ?>>

	<?php get_template_part( 'parts/primary-nav' ); ?>

	<div class="site-header" role="banner">

		<div class="container">

			<header class="site-branding">

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>

				<p class="site-description">
					<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
				</p>

			</header>

			<?php

			if ( is_front_page() ) {
				get_template_part( 'parts/header-event' );
			}

			?>


		</div>

	</div>
