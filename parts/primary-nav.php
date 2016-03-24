<?php
/**
 * Primary Nav.
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

wp_nav_menu( [
	'theme_location'  => 'primary',
	'menu_id'         => 'primary-nav',
	'container_class' => 'nav primary-nav',
] );

?>
