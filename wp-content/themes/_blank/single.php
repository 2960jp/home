<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _blank
 */

get_header();
?>

<div class="l-container">
	<main id="primary" class="site-main">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__('', '_blank') . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__('', '_blank') . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

		<div class="flex justify-center my-8">
			<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="c-btn bg-secondary">一覧に戻る</a>
		</div>
		<?php
		get_template_part('template-parts/content', 'post-related');
		?>

	</main><!-- #main -->
</div><!-- /.l-container -->
<?php
get_footer();
