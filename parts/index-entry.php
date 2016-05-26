<?php
/**
 * Single entry in entry list template. Used in archive templates.
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

?>

<article class="entry">

	<h3 class="entry-title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>

	<small class="entry-meta">
		<?php the_date( 'jS F Y, H:i' ); ?> | <?php the_author_posts_link(); ?>
	</small>

	<div class="post-content">
		<?php the_content(); ?>
	</div>

</article>
