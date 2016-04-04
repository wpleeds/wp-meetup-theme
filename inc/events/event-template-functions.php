<?php

namespace WPMeetup\Events;

use WP_Query;

/**
 * Get event date.
 *
 * @param  string $format  Date format. Passed to PHP date function.
 * @param  mixed $post_id  Event Post ID. If null, current global post.
 *
 * @return string formatted date.
 */
function get_event_date( $format = 'd/m/Y h:i', $post_id = null ) {
	$post_id  = $post_id ?: get_the_ID();
	$date_raw = get_post_meta( $post_id, 'event-date', true );
	return date( $format, $date_raw );
}

/**
 * Output the event date.
 *
 * @param  string $format Date format. Passed to PHP date function.
 * @return null
 */
function the_event_date( $format ) {
	echo esc_html( get_event_date( $format ) );
}


/**
 * Get event location display text.
 *
 * @param  mixed $post_id  Event Post ID. If null, current global post.
 *
 * @return string Location string.
 */
function get_event_location( $post_id = null ) {
	$post_id  = $post_id ?: get_the_ID();
	return get_post_meta( $post_id, 'event-location-string', true );
}

/**
 * Output the event location.
 *
 * @param  string $format Date format. Passed to PHP date function.
 * @return null
 */
function the_event_location() {
	echo esc_html( get_event_location() );
}

/**
 * Get event ticket link
 *
 * @param  mixed $post_id  Event Post ID. If null, current global post.
 *
 * @return string URL string.
 */
function get_event_ticket_link( $post_id = null ) {
	$post_id  = $post_id ?: get_the_ID();
	return get_post_meta( $post_id, 'event-ticket-link', true );
}

/**
 * Is the event in the future.
 *
 * @param  mixed $post_id  Event Post ID. If null, current global post.
 *
 * @return boolean
 */
function is_future_event( $post_id = null ) {
	$post_id  = $post_id ?: get_the_ID();
	$date = get_post_meta( $post_id, 'event-date', true );
	return $date > time();
}

/**
 * Do a query of future events.
 *
 * @param  array $args Custom query args. Note defaults to a standard query of all future events.
 * @return WP_Query future events.
 */
function query_future_events( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'post_type'      => 'wpmeetup_event',
		'posts_per_page' => 1,
		'no_found_rows'  => true,
		'orderby'        => 'meta_value_num',
		'meta_key'       => 'event-date',
		'order'          => 'ASC',
		'meta_compare'   => '>',
		'meta_value'     => time(),
	] );

	return new WP_Query( $args );

}
