<?php

echo $args['before_widget']; // xss ok

if ( ! empty( $instance['title'] ) ) {
	echo $args['before_title']; // xss ok
	echo esc_html( $instance['title'] );
	echo $args['after_title']; // xss ok
}

?>

<div class="wpmeetup-contact">

	<?php foreach ( $contact_methods as $method ) : ?>
		<?php if ( ! empty( $method['link'] ) && ! empty( $method['text'] ) ) : ?>
			<div class="wpmeetup-contact-item wpmeetup-contact-item-<?php echo sanitize_html_class( $method['type'] ); ?>">
				<a href="<?php echo esc_url( $method['link'] ); ?>">
					<?php echo esc_html( $method['text'] ); ?>
				</a>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

</div>

<?php echo $args['after_widget']; // xss ok ?>
