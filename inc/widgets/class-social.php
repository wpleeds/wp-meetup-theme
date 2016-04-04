<?php

namespace WPMeetup\Widgets;

use WP_Widget;

class Social extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$widget_ops = array(
			'classname' => 'wpmeetup_social',
			'description' => 'Display contnact links.',
		);

		parent::__construct( 'wpmeetup_social', 'WPMeetup Social', $widget_ops );

	}

	/**
	 * Get default widget args.
	 *
	 * Saves calling this over and over.
	 *
	 * @param  array $args
	 * @return [type]       [description]
	 */
	private function parse_args( array $args ) {
		return wp_parse_args( $args, [
			'title'         => __( 'Social', 'wpmeetup' ),
			'twitter_text'  => '',
			'twitter_link'  => '',
			'facebook_text' => '',
			'facebook_link' => '',
			'email_text'    => '',
			'email_link'    => '',
		] );
	}
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		include( __DIR__ . '/templates/social-widget-display.tpl.php' );
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $data The widget options
	 */
	public function form( $instance ) {
		$instance = $this->parse_args( $instance );
		include( __DIR__ . '/templates/social-widget-form.tpl.php' );
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 */
	public function update( $new_instance, $old_instance ) {

		$new_instance = $this->parse_args( $new_instance );

		return [
			'title'         => sanitize_text_field( $new_instance['title'] ),
			'twitter_text'  => sanitize_text_field( $new_instance['twitter_text'] ),
			'twitter_link'  => esc_url_raw( sanitize_text_field( $new_instance['twitter_link'] ) ),
			'facebook_text' => sanitize_text_field( $new_instance['facebook_text'] ),
			'facebook_link' => esc_url_raw( sanitize_text_field( $new_instance['facebook_link'] ) ),
			'email_text'    => sanitize_text_field( $new_instance['email_text'] ),
			'email_link'    => esc_url_raw( sanitize_text_field( $new_instance['email_link'] ) ),
		];

	}

}
