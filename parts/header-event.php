<?php
/**
 * Header - latest event template.
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

use WP_Query;

$events = new WP_Query( [
	'post_type'      => 'wpleeds_event',
	'posts_per_page' => 1,
	'no_found_rows'  => true,
] );

while ( $events->have_posts() ) :

	$events->the_post();

	?>

	<div class="header-event">

		<article <?php post_class( 'entry' ); ?>>

			<div class="header-event-image">

				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'medium' ); ?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/dist/images/wpmess.png' ); ?>" />
				<?php endif; ?>

			</div>

			<div class="header-event-content">

				<small class="header-event-label">Next event</small>

				<h2 class="header-event-title h3">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>

				<p><?php Events\the_event_date( 'jS F, H:i' ); ?> @ <?php Events\the_event_location(); ?></p>

				<?php the_excerpt(); ?>

				<p class="btn-container">

					<a class="btn btn-white" href="<?php the_permalink(); ?>">Find out more</a>

					<?php if ( Events\is_future_event() && $url = Events\get_event_ticket_link() ) : ?>
						<a class="btn btn-primary" href="<?php echo esc_url( $url ); ?>">Book ticket</a>
					<?php endif; ?>

				</p>
			</div>

		</article>
	</div>

<?php

endwhile;
wp_reset_postdata();
