<?php
$link = get_the_permalink();
?>
<article class="c-card is-<?php echo get_post_type(); ?>">
	<div class="c-card-media">
		<?php if (has_post_thumbnail()) {
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail = wp_get_attachment_image($thumbnail_id, 'large');
		} else {
			$thumbnail_src = get_template_directory_uri() . '/assets/img/common/noimage_01.webp';
			if (!empty($args['image_src'])) $thumbnail_src = $args['image_src'];

			$thumbnail = '<img src="' . $thumbnail_src . '" alt="noimage" width="300" height="300" loading="lazy">';
		} ?>
		<a href="<?php echo $link; ?>" title="<?php the_title(); ?>"><?php echo $thumbnail; ?></a>
	</div><!-- /.c-card-media -->
	<div class="c-card-body">
		<h3 class="c-card-title"><a href="<?php echo $link; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

		<?php
		// if (in_array(get_post_type(), array('post'))) :
		?>
		<div class="mt-auto text-xs opacity-90">
			<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
		</div><!-- /.mt-4 -->
		<?php
		// endif;
		?>
		<?php if (in_array(get_post_type(), array('post'))) : ?>
			<div class="flex flex-wrap gap-1 text-xs lg:text-sm">
				<?php
				$separator = ' ';
				if ('post' === get_post_type()) :
					$categories = get_the_category();
					$output = '';
					if ($categories) {
						foreach ($categories as $category) {
							$output .= '<a class="inline-block px-2 py-1 text-xs leading-none text-white bg-primary md:hover:opacity-90" href="' . get_category_link($category->term_id) . '" title="'
								. esc_attr(sprintf(__("%s の投稿を見る"), $category->name))
								. '">' . $category->cat_name . '</a>' . $separator;
						}
						echo trim($output, $separator);
					}
				?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</article>