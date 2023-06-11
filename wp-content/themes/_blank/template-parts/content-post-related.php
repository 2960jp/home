<?php
$categories = get_the_category($post->ID);

if ($categories && !is_wp_error($categories)) :
	$category_id = array();

	foreach ($categories as $category) :
		array_push($category_id, $category->cat_ID);
	endforeach;

	$args = array(
		'post__not_in' => array($post->ID),
		'posts_per_page' => 4,
		'category__in' => $category_id,
		'orderby' => 'rand',
	);

	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
?>
		<hr>
		<section class="py-12">
			<h2 class="c-heading"><span class="c-heading__sm">関連する投稿</span><span class="c-heading__lg">related posts</span></h2>
			<div class="mt-12 l-grid">
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<?php get_template_part('template-parts/c-card'); ?>
				<?php endwhile;
				wp_reset_postdata();
				?>
			</div><!-- /.grid -->
		</section>
<?php
	endif;
endif;
?>