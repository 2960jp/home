<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _blank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="mb-12 entry-header">
		<?php
		if (in_array(get_post_type(), array('post', 'news'))) :
		?>
			<div class="flex flex-wrap items-center gap-4 mb-4 entry-meta">
				<div>
					<?php
					_blank_posted_on();
					?>
				</div>
				<?php
				if ('post' === get_post_type()) :
				?>
					<div class="flex flex-wrap gap-1">
						<?php the_category(); ?>
					</div>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;
		?>

	</header><!-- .entry-header -->

	<?php _blank_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', '_blank'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', '_blank'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _blank_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->