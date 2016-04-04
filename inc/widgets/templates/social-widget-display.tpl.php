
<?php echo $args['before_widget']; ?>

<?php if ( ! empty( $instance['title'] ) ) : ?>
	<?php echo $args['before_title']; ?>
		<?php echo esc_html( $instance['title'] ); ?>
	<?php echo $args['after_title']; ?>
<?php endif; ?>

<div class="wpmeetup-contact">

	<?php if ( ! empty( $instance['twitter_link'] ) && ! empty( $instance['twitter_text'] ) ) : ?>
		<div class="wpmeetup-contact-item wpmeetup-contact-item-twitter">
			<a href="<?php echo esc_url( $instance['twitter_link'] ); ?>">
				<?php echo esc_html( $instance['twitter_text'] ); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $instance['facebook_text'] ) && ! empty( $instance['facebook_link'] ) ) : ?>
		<div class="wpmeetup-contact-item wpmeetup-contact-item-facebook">
			<a href="<?php echo esc_url( $instance['facebook_link'] ); ?>">
				<?php echo esc_html( $instance['facebook_text'] ); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $instance['email_link'] ) && ! empty( $instance['email_text'] ) ) : ?>
		<div class="wpmeetup-contact-item wpmeetup-contact-item-email">
			<a href="<?php echo esc_url( $instance['email_link'] ); ?>">
				<?php echo esc_html( $instance['email_text'] ); ?>
			</a>
		</div>
	<?php endif; ?>

</div>

<?php echo $args['after_widget']; ?>
