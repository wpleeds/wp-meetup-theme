<?php

namespace WPMeetup\Events;

require_once( __DIR__ . '/event-template-functions.php' );

add_action( 'init',  __NAMESPACE__ . '\\register_post_type' );
add_filter( 'cmb_meta_boxes',  __NAMESPACE__ . '\\cmb_meta_boxes' );

function register_post_type() {

	$labels = [
		'name'               => _x( 'Events', 'post type general name', 'wpmeetup-theme' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'wpmeetup-theme' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'wpmeetup-theme' ),
		'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'wpmeetup-theme' ),
		'add_new'            => _x( 'Add New', 'event', 'wpmeetup-theme' ),
		'add_new_item'       => __( 'Add New Event', 'wpmeetup-theme' ),
		'new_item'           => __( 'New Event', 'wpmeetup-theme' ),
		'edit_item'          => __( 'Edit Event', 'wpmeetup-theme' ),
		'view_item'          => __( 'View Event', 'wpmeetup-theme' ),
		'all_items'          => __( 'All Events', 'wpmeetup-theme' ),
		'search_items'       => __( 'Search Events', 'wpmeetup-theme' ),
		'parent_item_colon'  => __( 'Parent Events:', 'wpmeetup-theme' ),
		'not_found'          => __( 'No events found.', 'wpmeetup-theme' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'wpmeetup-theme' )
	];

	$args = [
		'labels'             => $labels,
		'public'             => true,
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_icon'          => 'dashicons-calendar-alt',
		'menu_position'      => 5,
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
	];

	\register_post_type( 'wpmeetup_event', $args );


}

function cmb_meta_boxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'title' => 'Event information',
		'pages' => 'wpmeetup_event',
		'fields' => [
			[ 'id' => 'event-date', 'name' => 'Event date', 'type' => 'datetime_unix' ],
			[ 'id' => 'event-location-string', 'name' => 'Event Location (display)', 'type' => 'text' ],
			// [ 'id' => 'event-location-coordinates', 'name' => 'Event Location (coordinates)', 'type' => 'gmap', 'cols' => 6 ],
			[ 'id' => 'event-ticket-link', 'name' => 'Event Ticket Link', 'type' => 'url' ],
		]
	);

	return $meta_boxes;

}
