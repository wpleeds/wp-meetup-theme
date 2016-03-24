<?php
/**
 * The Single template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

get_header();

?>

<div class="container entry-single">

	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="entry">
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
