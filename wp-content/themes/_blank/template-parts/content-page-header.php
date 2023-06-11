<?php
global $common_info_id;

$image_attr = array(
	'class' => '',
);
$image_src = get_template_directory_uri() . '/assets/img/common/bg_page_header_01.webp';
$image = '<img src="' . $image_src . '" alt="" loading="lazy" width="1920" height="600">';
$post_type = get_post_type();
$en = '2960';
$secondary_text = '';

$hdg_tag = 'h1';
if (is_single()) $hdg_tag = 'div';
if (is_search()) {
	$en = 'search';
	$secondary_text = '検索結果';
} elseif (is_404()) {
	$en = '404';
	$secondary_text = 'PAGE NOT FOUND';
} elseif (('post' === $post_type)) {
	$en = 'blog';
	$secondary_text = 'ブログ';
	$column_page_id = 10;

	if (has_post_thumbnail($column_page_id)) $image = wp_get_attachment_image(get_post_thumbnail_id($column_page_id), 'full', false, $image_attr);
} elseif (is_page()) {
	global $wp_query;
	$post_obj = $wp_query->get_queried_object();
	$slug = $post_obj->post_name;
	$en = $slug;
	if (has_post_thumbnail()) {
		$image = get_the_post_thumbnail();
	}

	$h1 = get_field('h1');
	if ($h1) {
		$secondary_text = $h1;
	} else {
		$secondary_text = get_the_title();
	}

	$h1_en = get_field('h1_en');
	if ($h1_en) $en = $h1_en;

	if ($post->post_parent) {
		$args = array(
			'post_parent' => $post->ID,
		);
		/**
		 * 子(孫)ページの際の処理
		 */
		$parent_id = $post->post_parent;
		// $en .= ' | ' . get_post($parent_id)->post_name;
		$en = '<span class="block text-base">' . get_post($parent_id)->post_name . '</span>' . $en;

		if (count(get_children($args)) > 0) {
			// child
		} else {
			// grand children
			/**
			 * 孫ページで限定的な処理が必要な場合に使用
			 */
			$parent_id = $post->post_parent;
			$grand_parent = get_post($parent_id);
			$grand_parent_id = $grand_parent->post_parent;
			if (!$grand_parent_id == 0) {
				// $en = $slug . ' | ' . get_post($grand_parent_id)->post_name;
			}
		}
	}
} else {
	$post_type_object = get_post_type_object($post_type);
	if ($post_type_object) {
		$slug = $post_type_object->rewrite['slug'];
		$secondary_text = $post_type_object->label;
	}
	if (isset($slug)) $en = $slug;
}
?>
<div class="c-page-header">
	<div class="c-page-header-image-container">
		<?php echo $image; ?>
	</div>
	<div class="container c-page-header-hdg-container">
		<<?php echo $hdg_tag; ?> class="c-page-header-hdg">
			<span class="c-page-header-hdg-primary"><?php echo $en; ?></span>
			<?php if (!empty($secondary_text)) : ?>
				<span class="c-page-header-hdg-secondary"><?php echo $secondary_text; ?></span>
			<?php endif; ?>
		</<?php echo $hdg_tag; ?>>
	</div><!-- /.container -->
</div>