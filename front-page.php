<?php
/**
 * Front page.
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

			<?php // Don't display page title & meta if is a static page. ?>
			<?php if ( ! is_page() ) : ?>

				<h2><?php the_title(); ?></h2>

				<small class="entry-meta">
					<?php the_date( 'jS F Y, H:i' ); ?> | <?php the_author_posts_link(); ?>
				</small>

			<?php endif; ?>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

		</div>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
