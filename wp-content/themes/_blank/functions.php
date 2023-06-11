<?php

/**
 * _blank functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _blank
 */

if (!defined('_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_VERSION', '1.0.0');
}

function _blank_setup()
{
	load_theme_textdomain('_blank', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', '_blank'),
			'footer-01' => esc_html__('Footer_01', '_blank'),
			'footer-02' => esc_html__('Footer_02', '_blank'),
			'footer-03' => esc_html__('Footer_03', '_blank'),
			'footer-04' => esc_html__('Footer_04', '_blank'),
			'footer-05' => esc_html__('Footer_05', '_blank'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'_blank_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', '_blank_setup');


function _blank_content_width()
{
	$GLOBALS['content_width'] = apply_filters('_blank_content_width', 640);
}
add_action('after_setup_theme', '_blank_content_width', 0);

function _blank_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', '_blank'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', '_blank'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', '_blank_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function _blank_styles()
{
	wp_enqueue_style('_blank-google-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap', array(), _VERSION);
	wp_enqueue_style('_blank-tailwind', _blank_asset('css/tailwind.css'), array(), _VERSION);
	wp_enqueue_style('_blank-style', _blank_asset('css/style.css'), array(), _VERSION);
	// wp_enqueue_style('_blank-app', _blank_asset('js/app.css'), array(), _VERSION); // JSでimportされたCSS、esbuildから出力
}
add_action('wp_enqueue_scripts', '_blank_styles');

function _blank_scripts()
{
	if (is_front_page()) {
		// wp_enqueue_script(
		// 	'_blank-yubinbango',
		// 	'https://yubinbango.github.io/yubinbango/yubinbango.js',
		// 	array(),
		// 	_VERSION,
		// 	true
		// );
		// wp_enqueue_script(
		// 	'_blank-autokana',
		// 	_blank_asset('js/autokana.js'),
		// 	array(),
		// 	_VERSION,
		// 	true
		// );
	}
	wp_enqueue_script('_blank-script', _blank_asset('js/app.js'), array(), _VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', '_blank_scripts');

// 特定のページで特定のCSS、js読み込みを除外
if (!function_exists('dp_deregister_files')) {
	function dp_deregister_files()
	{
		// $contactform = array(
		// 	'contact',
		// 	'request',
		// 	'entry',
		// );

		// 特定のページ以外で読み込まないよう条件分岐する
		if (!is_front_page()) {
			wp_deregister_style('contact-form-7'); // CSS を読み込まない
			wp_deregister_script('contact-form-7'); // JS を読み込まない
			wp_deregister_script('google-recaptcha'); // Google reCAPTCHA を読み込まない
		}
		wp_dequeue_style('wp-block-library');
	}
	// フックする
	add_action('wp_enqueue_scripts', 'dp_deregister_files', 100);
}

function _blank_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/assets/' . $path;
	}

	return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/assets/' . $path);
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* 投稿スラッグを自動的に生成する */
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
	if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
		$slug = utf8_uri_encode($post_type) . '-' . $post_ID;
	}
	return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);

// get_sidebar 時に add_class `withsidebar`
add_action('wp_head', function () {
	ob_start();
});
add_action('get_sidebar', 'my_sidebar_class');
add_action('wp_footer', 'my_sidebar_class_replace');

function my_sidebar_class($name = '')
{
	static $class = "withsidebar";
	if (!empty($name)) $class .= " sidebar-{$name}";
	my_sidebar_class_replace($class);
}

function my_sidebar_class_replace($c = '')
{
	static $class = '';
	if (!empty($c)) $class = $c;
	else {
		echo str_replace('<body class="', '<body class="' . $class . ' ', ob_get_clean());
		ob_start();
	}
}

function add_posts_columns_name($columns)
{
	$columns['slug'] = "スラッグ";
	return $columns;
}
function add_posts_column($column_name, $post_id)
{
	if ($column_name == 'slug') {
		$post = get_post($post_id);
		$slug = $post->post_name;
		echo esc_attr($slug);
	}
}
add_filter('manage_posts_columns', 'add_posts_columns_name');
add_action('manage_posts_custom_column', 'add_posts_column', 10, 2);
add_filter('manage_pages_columns', 'add_posts_columns_name');
add_action('manage_pages_custom_column', 'add_posts_column', 10, 2);

function common_info_id()
{
	global $common_info_id;
	$common_info_id = 19;
}
add_action('after_setup_theme', 'common_info_id');

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
	return false;
}

function authority_remove_menus()
{
	if (current_user_can('editor')) {
		remove_menu_page('edit.php?post_type=page');
		remove_menu_page('edit-comments.php');
		remove_menu_page('wpcf7');
		remove_menu_page('tools.php');
	}
}
add_action('admin_menu', 'authority_remove_menus', 999);

/**
 * ビジュアルエディタから見出し1を削除
 */
function custom_tiny_mce_formats($settings)
{
	$settings['block_formats'] = '段落=p;見出し2=h2;見出し3=h3;見出し4=h4;見出し5=h5;見出し6=h6;整形済みテキスト=pre;';
	return $settings;
}
add_filter('tiny_mce_before_init', 'custom_tiny_mce_formats');

if (!function_exists('wpdocs_get_post_top_ancestor_id')) {
	/**
	 * Gets the id of the topmost ancestor of the current page.
	 *
	 * Returns the current page's id if there is no parent.
	 *
	 * @return int ID of the top ancestor page.
	 */
	function wpdocs_get_post_top_ancestor_id($id)
	{
		if (!$post = get_post()) {
			return;
		}

		if (!empty($id)) $id = $post->ID;

		$top_ancestor = $id;
		if ($post->post_parent) {
			$ancestors = array_reverse(get_post_ancestors($id));
			$top_ancestor = $ancestors[0];
		}

		return $top_ancestor;
	}
} // Exists.

/**
 * 開発時のファイルはGitで管理し、All in One WP Migrationのエクスポートファイルから除外する。それ用の関数。
 * ai1wm_exclude_themes_from_export がプラグイン側で変更されると、この関数は無効になるので注意
 * https://wordpress.org/support/topic/excluding-node_modules-via-filter-not-working-anymore/
 */
$_theme_name = '_blank';
add_filter(
	'ai1wm_exclude_themes_from_export',
	function ($exclude_filters) {
		global $_theme_name;
		$exclude_filters = array(
			"{$_theme_name}/node_modules",
			"{$_theme_name}/src",
			"{$_theme_name}/safelists",
			"{$_theme_name}/tmp",
			"{$_theme_name}/imagemin.js",
			"{$_theme_name}/imagemin.mjs",
			"{$_theme_name}/pnpm-lock.yaml",
			"{$_theme_name}/yarn.lock",
			"{$_theme_name}/package-lock.json",
			"{$_theme_name}/package.json",
			"{$_theme_name}/phpcs.xml.dist",
			"{$_theme_name}/postcss.config.js",
			"{$_theme_name}/README.md",
			"{$_theme_name}/tailwind.config.js",
			"{$_theme_name}/webpack.config.js",
			"{$_theme_name}/theme.json",
			"{$_theme_name}/.gitignore",
			"{$_theme_name}/.eslintrc.js",
			"{$_theme_name}/.prettierrc.js",
			"{$_theme_name}/.stylelintrc.js",
			"{$_theme_name}/.git",
			"{$_theme_name}/.babelrc",
			"{$_theme_name}/.eslintrc",
			"{$_theme_name}/.jscsrc",
			"{$_theme_name}/.jshintignore",
			"{$_theme_name}/.node-version",
		);
		return $exclude_filters;
	}
);

/* wpcf7内でカスタムショートコード
**********************************************/
function shortcode_homeurl($atts, $content = '')
{
	return esc_url(home_url($content));
}
wpcf7_add_shortcode('homeurl', 'shortcode_homeurl');

function add_blog_prefix_to_posts($post_link, $post, $leavename)
{
	if ('post' === $post->post_type) {
		$post_link = home_url('/blog/' . $post->post_name . '/');
	}
	return $post_link;
}
add_filter('post_link', 'add_blog_prefix_to_posts', 10, 3);

function add_blog_rewrite_rule()
{
	add_rewrite_rule(
		'^blog/([^/]+)/?$',
		'index.php?name=$matches[1]',
		'top'
	);
}
add_action('init', 'add_blog_rewrite_rule');
