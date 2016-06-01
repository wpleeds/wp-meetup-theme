<?php
/**
 * The single page template file.
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

			<small class="entry-meta">
				<?php the_date( 'jS F Y, H:i' ); ?> | <?php the_author_posts_link(); ?>
			</small>

			<div class="post-featured-image">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

			<?php get_template_part( 'parts/entry-taxonomies' ); ?>

		</div>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
