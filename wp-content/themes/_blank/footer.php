<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _blank
 */

global $common_info_id;
?>

<footer id="colophon" class="site-footer">
	<div class="c-bg-transparent-dark">
		<div class="c-footer-links">
			<a href="<?php echo get_post_type_archive_link('post'); ?>" class="">
				<?php get_template_part('template-parts/icon/pencil'); ?>
				<span class="uppercase">blog</span>
			</a>
			<?php
			$instagram = get_field('instagram', $common_info_id);
			$twitter = get_field('twitter', $common_info_id);
			$store = get_field('store', $common_info_id);
			?>
			<?php if ($instagram) : ?>
				<a href="<?php echo esc_url($instagram); ?>" class="">
					<?php get_template_part('template-parts/icon/instagram'); ?>
					<span class="capitalize">instagram</span>
				</a>
			<?php endif;
			if ($twitter) :
			?>
				<a href="<?php echo esc_url($twitter); ?>" class="">
					<?php get_template_part('template-parts/icon/twitter'); ?>
					<span class="capitalize">twitter</span>
				</a>
			<?php endif;
			if ($store) :
			?>
				<a href="<?php echo esc_url($store); ?>" class="">
					<?php get_template_part('template-parts/icon/cart3'); ?>
					<span class="uppercase">store</span>
				</a>
			<?php endif;
			?>
		</div>
	</div>
	<div class="py-16 overflow-hidden text-white bg-dark">
		<?php
		/*
		<div class="container relative">
			<?php get_template_part('template-parts/c-to-top'); ?>
		</div><!-- /.container -->
		*/
		?>
		<div class="container">
			<div class="flex justify-center items-center">
				<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_get_attachment_image(25, 'thumbnail'); ?></a>
			</div><!-- /.flex -->

			<ul class="mt-8 flex justify-center flex-wrap divide-x text-sm">
				<li><a href="<?php echo get_page_link(3); ?>" class="px-4">プライバシーポリシー</a></li>
				<li><a href="<?php echo get_post_type_archive_link('post'); ?>" class="px-4">ブログ</a></li>
				<li><a href="<?php echo get_post_type_archive_link('news'); ?>" class="px-4">お知らせ</a></li>
			</ul><!-- / -->
		</div><!-- /.container -->
	</div><!-- /.bg -->
	<?php if (get_field('copyright', $common_info_id)) : ?>
		<div class="text-center bg-black text-white py-16 px-4"><small><?php the_field('copyright', $common_info_id); ?></small></div>
	<?php endif; ?>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php
$scripts_footer = get_field('scripts_footer', $common_info_id, false);
if ($scripts_footer) {
	echo $scripts_footer;
} ?>
</body>

</html>