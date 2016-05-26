<?php
/**
 * The Single WPMeetup Event template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

get_header();

?>

<div class="container entry-single">

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="entry">

			<h2><?php the_title(); ?></h2>

			<p>
				<b>Date:</b> <?php Events\the_event_date( 'jS F, H:i' ); ?> <br/>

				<?php if ( ! empty( Events\get_event_location_link() ) ) : ?>
					<b>Location:</b> <a href="<?php Events\the_event_location_link(); ?>"><?php Events\the_event_location(); ?></a>
				<?php else : ?>
					<b>Location:</b> <?php Events\the_event_location(); ?>
				<?php endif; ?>

			</p>

			<?php if ( Events\is_future_event() && $url = Events\get_event_ticket_link() ) : ?>
				<p class="btn-container">
					<a class="btn btn-primary" href="<?php echo esc_url( $url ); ?>">Book tickets</a>
				</p>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="pull-image-container">
					<span class="alignright">
						<?php the_post_thumbnail( 'large' ); ?>
					</span>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>

			<?php get_template_part( 'parts/entry-taxonomies' ); ?>

		</div>


	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
