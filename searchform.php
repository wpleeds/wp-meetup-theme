<?php
/**
 * Search form template file.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label for="search-field">
		<p><?php echo esc_html_x( 'Search for:', 'label', 'wpleeds' ) ?></p>
	</label>

	<input id="search-field" type="search" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		value="<?php echo esc_attr( get_search_query() ) ?>" name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label', 'wpleeds' ) ?>" />

	<input type="submit" class="search-submit btn btn-secondary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wpleeds' ) ?>" />

</form>
