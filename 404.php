<?php
/**
 * The Single template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

get_header();

?>

<div class="container entry-single">

	<div class="entry">

		<h2><?php esc_html_e( 'Page not found', 'wpmeetup' ) ?></h2>
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>
		<?php get_search_form(); ?>

	</div>

</div>

<?php get_footer(); ?>
