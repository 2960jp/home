<?php
get_header();
?>

<main id="primary" class="site-main">
	<div class="bg-white max-w-screen-2xl mx-auto">
		<div class="container">
			<?php
			// get_template_part('template-parts/content', 'categories');
			?>

			<?php
			if (have_posts()) :
			?>
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

	</div><!-- /.bg-white -->
</main><!-- #main -->

<?php
get_footer();
