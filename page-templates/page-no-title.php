<?php
/**
 * Page with no title template file.
 *
 * Template Name: No title

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
