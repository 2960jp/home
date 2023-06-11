<?php global $common_info_id; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
	<?php
	$scripts_head = get_field('scripts_head', $common_info_id, false);
	if ($scripts_head) {
		echo $scripts_head;
	}
	?>
</head>

<body <?php body_class(); ?>>
	<?php
	$scripts_body = get_field('scripts_body', $common_info_id, false);
	if ($scripts_body) {
		echo $scripts_body;
	} ?>
	<?php wp_body_open(); ?>
	<div id="page" class="site bg-gray-custom">
		<header id="masthead" class="py-4 site-header bg-gray-custom">
			<div class="container max-w-[1920px] w-full">
				<div class="flex flex-wrap items-center gap-2 lg:gap-4">
					<div class="site-branding">
						<div class="w-36">
							<?php
							the_custom_logo();
							?>
						</div><!-- /. -->
						<?php
						if (is_front_page()) :
							$h1_text = get_bloginfo('name');
							$_blank_description = get_bloginfo('description', 'display');
							if ($_blank_description || is_customize_preview()) $h1_text .= $_blank_description;
							echo '<h1 class="sr-only site-title"><a href="' . esc_url(home_url('/')) . '" rel="home">' . $h1_text . '</a></h1>';
						?>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<?php get_template_part('template-parts/content', 'hamburger'); ?>
					<?php get_template_part('template-parts/content', 'site-navigation'); ?>
				</div>
			</div><!-- /.container -->
		</header><!-- #masthead -->


		<?php
		if (!is_front_page()) {
			get_template_part('template-parts/content-page-header');

			if (function_exists('bcn_display')) {
				get_template_part('template-parts/breadcrumbs');
			}
		}
		?>