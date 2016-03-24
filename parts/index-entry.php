<?php
/**
 * Single entry in entry list template. Used in archive templates.
 *
 * @package wpleeds-theme
 */

namespace WPLeeds;

?>

<article class="entry">

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>

	<small class="entry-meta">
		<?php the_date( 'jS F, H:i' ); ?> | <?php the_author_posts_link(); ?>
	</small>

	<div class="post-content">
		<?php the_content(); ?>
	</div>

</article>
