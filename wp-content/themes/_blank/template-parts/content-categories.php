<?php
echo '<h3 class="c-heading-02 mb-4 font-bold">カテゴリー</h3>';
$current_page = get_query_var('paged');
$current_page = $current_page == 0 ? '1' : $current_page;
// var_dump($current_page);
if (is_home() && 'post' === get_post_type() && '1' == $current_page) {
	// index.php 且つ post 且つ 1ページ目（初期表示）である場合
	$args = array(
		'show_option_all'    => '全て見る',
		// 'child_of' => 1,
		// 'hide_empty' =>  false,
		'hierarchical' =>  false,
		'parent' =>  0,
		'title_li' => '',
		// 'style' => '',
		'echo' => 0
	);
	$categories = wp_list_categories($args);

	if ($categories) {
		$categories = str_replace('<li', '<div', $categories); // <li を <div に変更
		$categories = str_replace('</li', '</div', $categories); // </li を </div に変更
		$categories = str_replace('cat-item-all', 'cat-item-all is-active', $categories); // </li を </div に変更

		echo '<div class="mb-12 c-categories">';
		echo $categories;
		echo '</div>';
	}
} else {
	$args = array(
		'show_option_all'    => '全て見る',
		'hierarchical' =>  false,
		'parent' =>  0,
		'title_li' => '',
	);
	echo '<ul class="c-categories">';
	wp_list_categories($args);
	echo '</ul>';
}

// var_dump(wp_list_categories($args));
// wp_list_categories($args);
