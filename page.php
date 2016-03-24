<?php
/**
 * The Single template file.
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

			<h2><?php the_title(); ?></h2>

			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
