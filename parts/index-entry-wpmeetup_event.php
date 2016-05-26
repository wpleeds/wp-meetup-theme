<?php
/**
 * Single entry in entry list template. Used in archive templates.
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

?>

<article class="entry entry-event">

	<div class="entry-event-date"><?php Events\the_event_date( 'd/m/Y' ); ?></div>

	<div class="entry-event-content">

		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>

		<p><?php the_excerpt(); ?></p>

		<?php if ( ! empty( Events\get_event_location( $post_id ) ) ) : ?>
			<p><b>Location:</b> <?php Events\the_event_location(); ?></p>
		<?php endif; ?>

	</div>

</article>
