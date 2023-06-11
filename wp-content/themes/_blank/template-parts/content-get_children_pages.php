<?php
// $args['parent_slug'] 呼び出し時に必須
$parent_slug = $args['parent_slug'];
// Get the ID of the parent page
$parent_page = get_page_by_path($parent_slug);
$parent_id = $parent_page->ID;
if ($parent_id != $post->ID) :
	$link = get_permalink($parent_page);
	$title = get_the_title($parent_page);
	$description = get_field('light_description', $parent_id);
	$thumbnail_id = get_field('panel_thumbnail', $parent_id);

	$args = array(
		'id' => $parent_id,
		'link' => $link,
		'title' => $title,
		'description' => $description,
		'thumbnail_id' => $thumbnail_id,
	);
	get_template_part('template-parts/c-link-panel', null, $args);
endif;

$post_not_in = array($post->ID);
if (!empty($args['exclude'])) $post_not_in = array_merge($post_not_in, $args['exclude']);

// Output the list of child pages
$child_pages = array(
	'posts_per_page' => -1, //全件表示
	'post_type'      => 'page', //固定ページのみ
	'post_parent'    => $parent_id,
	'post__not_in' => $post_not_in,
);
$the_query = new WP_Query($child_pages);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) :
		$the_query->the_post();
		$child_page = $post->ID;
		$link = get_permalink($child_page);
		$title = get_the_title($child_page);
		$description = get_field('light_description', $child_page);
		$thumbnail_id = get_field('panel_thumbnail', $child_page);

		$args = array(
			'id' => $child_page,
			'link' => $link,
			'title' => $title,
			'description' => $description,
			'thumbnail_id' => $thumbnail_id,
		);
		get_template_part('template-parts/c-link-panel', null, $args);

	endwhile;
	wp_reset_postdata();
endif;
