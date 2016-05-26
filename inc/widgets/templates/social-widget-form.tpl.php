<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'wpmeetup' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_text' ) ); ?>"><?php esc_html_e( 'Twitter Text:', 'wpmeetup' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter_text'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>"><?php esc_html_e( 'Twitter Link:', 'wpmeetup' ); ?></label>
	<input class="widefat code" id="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_link' ) ); ?>" type="text" value="<?php echo esc_url( $instance['twitter_link'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_text' ) ); ?>"><?php esc_html_e( 'Facebook Text:', 'wpmeetup' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook_text'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_link' ) ); ?>"><?php esc_html_e( 'Facebook Link:', 'wpmeetup' ); ?></label>
	<input class="widefat code" id="<?php echo esc_attr( $this->get_field_id( 'facebook_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_link' ) ); ?>" type="text" value="<?php echo esc_url( $instance['facebook_link'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>"><?php esc_html_e( 'Email Text:', 'wpmeetup' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['email_text'] ); ?>">
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'email_link' ) ); ?>"><?php esc_html_e( 'Email Link:', 'wpmeetup' ); ?></label>
	<input class="widefat code" id="<?php echo esc_attr( $this->get_field_id( 'email_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email_link' ) ); ?>" type="text" value="<?php echo esc_url( $instance['email_link'] ); ?>">
</p>
