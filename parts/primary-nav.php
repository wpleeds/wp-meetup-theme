<?php
/**
 * Primary Nav.
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

if ( has_nav_menu( 'primary' ) ) {

	wp_nav_menu( [
		'theme_location'  => 'primary',
		'menu_id'         => 'primary-nav',
		'container_class' => 'nav primary-nav',
	] );

}
