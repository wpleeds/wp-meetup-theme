<?php

namespace WPMeetup\Events;

use WP_Query;

require_once( __DIR__ . '/event-template-functions.php' );

add_action( 'init',                                      __NAMESPACE__ . '\\register_post_type' );
add_filter( 'cmb_meta_boxes',                            __NAMESPACE__ . '\\cmb_meta_boxes' );
add_filter( 'manage_wpmeetup_event_posts_columns',       __NAMESPACE__ . '\\post_list_table_column_head' );
add_action( 'manage_wpmeetup_event_posts_custom_column', __NAMESPACE__ . '\\post_list_table_column_content', 10, 2 );
add_action( 'pre_get_posts',                             __NAMESPACE__ . '\\modify_events_query' );

/**
 * Register event post type.
 *
 * @return null
 */
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
		'taxonomies'         => [ 'post_tag' ],
	];

	\register_post_type( 'wpmeetup_event', $args );

}

/**
 * Register event meta boxes.
 *
 * @param  array $meta_boxes Meta Boxes.
 * @return array Meta Boxes.
 */
function cmb_meta_boxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'title'  => 'Event information',
		'pages'  => 'wpmeetup_event',
		'fields' => array( // Need long array syntax to please coding standards sniffer.
			[ 'id' => 'event-date', 'name' => 'Event date', 'type' => 'datetime_unix' ],
			[ 'id' => 'event-location-string', 'name' => 'Event Location (display)', 'type' => 'text' ],
			[ 'id' => 'event-location-link', 'name' => 'Event Location (link)', 'type' => 'url' ],
			[ 'id' => 'event-ticket-link', 'name' => 'Event Ticket Link', 'type' => 'url' ],
		),
	);

	return $meta_boxes;

}

/**
 * Add Event date column to posts list table.
 *
 * @param  array $defaults Columns.
 * @return array Columns.
 */
function post_list_table_column_head( $defaults ) {
	$defaults['wpmeetup_event_date'] = 'Event Date';
	unset( $defaults['date'] );
	return $defaults;
}

/**
 * Output event date posts list table column content.
 *
 * @param  string $column_name
 * @param  mixed $post_id
 * @return null
 */
function post_list_table_column_content( $column_name, $post_id ) {
	if ( $column_name === 'wpmeetup_event_date' ) {
		echo get_event_date( 'd/m/Y H:i', $post_id );
	}
}

/**
 * Modify the events query to order by event date.
 *
 * @param  WP_Query $query WP_Query.
 * @return null
 */
function modify_events_query( WP_Query $query ) {

	if ( $query->is_main_query() && is_post_type_archive( 'wpmeetup_event' ) ) {
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'meta_key', 'event-date' );
		$query->set( 'order', 'DESC' );
	}

	if ( $query->is_main_query() && $query->is_tag() ) {

		$post_types = $query->get( 'post_type' );
		$post_types = ! empty( $post_type ) ? $post_type : [ 'post' ];
		$post_types[] = 'wpmeetup_event';

		$query->set( 'post_type', $post_types );
	}

}
