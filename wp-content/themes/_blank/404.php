<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _blank
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="container max-w-screen-md error-404 not-found">
		<header class="mb-12 page-header">
			<h1 class="text-3xl font-bold text-center lg:text-4xl page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', '_blank'); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<div class="mb-8">
				<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', '_blank'); ?></p>
			</div><!-- /.mb-4 -->

			<?php
			get_search_form();

			// the_widget('WP_Widget_Recent_Posts');
			/*
			?>

			<div class="widget widget_categories">
				<h2 class="widget-title"><?php esc_html_e('Most Used Categories', '_blank'); ?></h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div><!-- .widget -->

			<?php
			*/
			/* translators: %1$s: smiley */
			// $_blank_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', '_blank' ), convert_smilies( ':)' ) ) . '</p>';
			// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$_blank_archive_content" );

			// the_widget( 'WP_Widget_Tag_Cloud' );
			?>

			<div class="flex justify-center my-8">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn">HOME</a>
			</div><!-- /.my-8 -->

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
