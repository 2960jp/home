<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _blank
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php if (have_posts()) : ?>

			<header class="page-header">
				<?php
				the_archive_title('<h2 class="px-4 text-xl font-bold text-white page-title max-w-fit bg-primary-lighten">', '</h2>');
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->

			<div class="l-grid">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/c-card');

				endwhile;

				?>
			</div><!-- /.l-grid -->

			<?php if (get_the_posts_pagination()) : ?>
				<div class="flex justify-center my-12"><?php get_template_part('template-parts/content', 'pagination'); ?></div>
			<?php endif; ?>

		<?php else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

	</div><!-- /.container -->


</main><!-- #main -->

<?php
get_footer();
