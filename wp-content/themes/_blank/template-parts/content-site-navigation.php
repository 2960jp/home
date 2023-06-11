<?php
global $common_info_id;
$active_class_name = 'is-current';
?>
<div class="js-mainnav-close mainnav-close"></div><!-- /.js-mainnav-close -->
<nav id="site-navigation" class="main-navigation">
	<h2 class="sr-only">メインナビゲーション</h2><!-- /.sr-only -->
	<div class="menu-menu-1-container">
		<ul id="primary-menu" class="menu">
			<li><a href="<?php echo get_post_type_archive_link('post'); ?>">ブログ</a></li>
			<li><a href="<?php echo get_post_type_archive_link('news'); ?>">お知らせ</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#company">会社概要</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>#contact">お問い合わせ</a></li>
			<?php
			$store = get_field('store', $common_info_id);
			if ($store) :
			?>
				<li class="is-store lg:ml-8"><a href="<?php echo esc_url($store); ?>" class="flex justify-center items-center w-full h-8 lg:w-12 lg:h-12 bg-secondary lg:bg-primary text-white lg:rounded-full lg:hover:bg-secondary"><?php get_template_part('template-parts/icon/cart3'); ?></a></li>
			<?php endif;
			?>
		</ul>
	</div>

</nav><!-- #site-navigation -->