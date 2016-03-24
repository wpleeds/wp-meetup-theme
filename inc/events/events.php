<?php

namespace WPLeeds\Events;

require_once( __DIR__ . '/event-template-functions.php' );

add_action( 'init',  __NAMESPACE__ . '\\register_post_type' );
add_filter( 'cmb_meta_boxes',  __NAMESPACE__ . '\\cmb_meta_boxes' );

function register_post_type() {

	$labels = [
		'name'               => _x( 'Events', 'post type general name', 'wpleeds-theme' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'wpleeds-theme' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'wpleeds-theme' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'wpleeds-theme' ),
		'add_new'            => _x( 'Add New', 'event', 'wpleeds-theme' ),
		'add_new_item'       => __( 'Add New Event', 'wpleeds-theme' ),
		'new_item'           => __( 'New Event', 'wpleeds-theme' ),
		'edit_item'          => __( 'Edit Event', 'wpleeds-theme' ),
		'view_item'          => __( 'View Event', 'wpleeds-theme' ),
		'all_items'          => __( 'All Events', 'wpleeds-theme' ),
		'search_items'       => __( 'Search Events', 'wpleeds-theme' ),
		'parent_item_colon'  => __( 'Parent Events:', 'wpleeds-theme' ),
		'not_found'          => __( 'No events found.', 'wpleeds-theme' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'wpleeds-theme' )
	];

	$args = [
		'labels'             => $labels,
		'public'             => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_icon'          => 'dashicons-calendar-alt',
		'menu_position'      => 5,
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
	];

	\register_post_type( 'wpleeds_event', $args );


}

function cmb_meta_boxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'title' => 'Event information',
		'pages' => 'wpleeds_event',
		'fields' => [
			[ 'id' => 'event-date', 'name' => 'Event date', 'type' => 'datetime_unix' ],
			[ 'id' => 'event-location-string', 'name' => 'Event Location (display)', 'type' => 'text' ],
			// [ 'id' => 'event-location-coordinates', 'name' => 'Event Location (coordinates)', 'type' => 'gmap', 'cols' => 6 ],
			[ 'id' => 'event-ticket-link', 'name' => 'Event Ticket Link', 'type' => 'url' ],
		]
	);


	return $meta_boxes;

}
