<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _blank
 */
global $common_info_id;
get_header();
?>

<main id="primary" class="site-main">
	<div class="relative w-full overflow-hidden front-main bg-gray-custom">

		<div class="flex gap-12 w-full mx-auto max-w-[1920px]">
			<div class="flex gap-8 flex-none w-full max-w-[1400px] relative justify-center md:justify-normal">
				<div class="absolute w-full inset-0 md:relative overflow-hidden rounded-tr-[4rem] md:w-3/5 max-w-[960px]">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/img_main_01.webp" alt="" width="960" height="830" class="w-full h-full object-cover">
				</div>
				<div class="relative md:absolute md:right-4 md:bottom-0 xl:relative md:self-end py-12 px-4 lg:p-0 lg:pb-24">
					<div class="p-4 bg-gray-custom bg-opacity-50">
						<p class="font-nunito uppercase lg:text-lg">fukurokujyu</p><!-- /.font-nunito -->
						<p class="text-3xl md:text-4xl lg:text-5xl !leading-normal mt-4 lg:mt-8">あなたと、<br>あなたの大切な人を、<br>ずっと健康に―。</p>
						<p class="text-sm font-nunito mt-4 leading-relaxed">Keep you and your loved<br>ones healthy.</p>
					</div>
				</div>
			</div><!-- /.flex -->

			<div class="hidden xl:block w-[calc(100%-1300px)] overflow-hidden rounded-tl-[4rem] min-w-[400px]">
				<div class="overflow-hidden rounded-tl-[4rem] h-full">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/img_main_02.webp" alt="" width="960" height="830" loading="lazy" class="max-w-none w-full h-full object-cover object-[-200px_0]">
				</div>
			</div><!-- / -->
		</div>
	</div><!-- /.front-main -->

	<section id="mission" class="bg-gray-100">
		<div class="container pt-24">
			<div class="grid gap-8 lg:grid-cols-2">
				<h2 class="c-heading"><span class="c-heading__sm">2960について</span><span class="c-heading__lg">OUR MISSION</span></h2>

				<div class="leading-loose">
					<p>あなたと、あなたの大切な人の幸せで有り続けるために、<br>
						私たちは「健康」で有り続けるお手伝いをします。<br>
						「健康」が土台にあるから「幸せ」がある。<br>
						日々のお食事をまずは正しく「選ぶ」ことから。<br>
						「健康」「幸せ」がずっと続く商品、サービスをご提供いたします。</p>
				</div><!-- /.leading-loose -->

			</div><!-- /.grid -->
		</div><!-- /.container -->

		<div class="c-bg mt-12">
			<div class="container">
				<div class="bg-white border border-primary px-4 pt-12 pb-8">
					<div class="flex flex-col items-center gap-8 justify-center">
						<?php echo wp_get_attachment_image(21, 'thumbnail'); ?>

						<div class="leading-loose md:text-center">
							<p>ふくろくじゅうと呼びます。七福神様の一人、福禄寿様にあやかり命名いたしました。<br>
								福（ふく）とは幸福であり、禄（ろく）とは財・金銭、寿（じゅ）とは健康を指します。<br>
								私たちは健康であり続けることが、経済面を含めて、すべての幸福の基本と考えます。</p>
						</div><!-- /.leading-loose -->
					</div><!-- /.flex -->
				</div>
			</div><!-- /.container -->
		</div><!-- /.c-bg -->
	</section>
	<section id="service" class="bg-primary text-white">
		<div class="container py-16">
			<h2 class="c-heading"><span class="c-heading__sm">事業について</span><span class="c-heading__lg">SERVICE</span></h2>
			<div class="mt-12 grid gap-4 xl:gap-8 grid-cols-2 md:grid-cols-3">
				<?php
				$service_args = array(
					array(
						'title' => '無添加食材事業',
						'text' => '身体は食べたもので作られます。<br>健康であり続けるための無添加食品の開発と<br>販売を行います。',
					),
					array(
						'title' => 'パーソナル栄養指導事業',
						'text' => '主にビジネスマンや経営者の<br>パフォーマンスを最大化する目的で、<br>パーソナルダイエットや健康指導を行います。',
					),
					array(
						'title' => '健康応援メディア事業',
						'text' => '無添加食材や健康に関する情報を、<br>医師や管理栄養士が定期的に配信します。',
					),
				);
				if ($service_args) :
					foreach ($service_args as $key => $val) :
						$key++;
						// var_dump($key);
				?>
						<div class="relative bg-white text-text overflow-hidden rounded-tl-[4rem]">
							<div class="aspect-square">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/img_service_<?php echo sprintf('%02d', (int)$key); ?>.webp" alt="" width="420" height="420" loading="lazy" class="w-full h-full object-cover">
							</div><!-- /.overflow-hidden -->
							<div class="bg-white text-text p-4">
								<h3 class="text-base md:text-lg lg:text-xl font-bold"><?php echo $val['title']; ?></h3>
								<div class="mt-2 text-sm">
									<p><?php echo $val['text']; ?></p>
								</div><!-- /.mt-4 -->
							</div>
						</div><!-- /.relative -->

				<?php
					endforeach;
				endif;
				?>
			</div><!-- /.grid -->
		</div>
	</section>
	<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4
	);
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
	?>

		<section id="service" class="bg-gray-100">
			<div class="container py-16">
				<h2 class="c-heading"><span class="c-heading__sm">ブログ</span><span class="c-heading__lg">BLOG</span></h2>
				<div class="mt-12 grid gap-4 xl:gap-8 grid-cols-2 lg:grid-cols-4">
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<?php get_template_part('template-parts/c-card'); ?>
					<?php endwhile; ?>

				</div><!-- /.grid -->
				<div class="mt-12 text-center">
					<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="c-btn">一覧をみる</a><!-- /.c-btn -->
				</div><!-- /.text-center -->

			</div><!-- /.container -->
		</section>
	<?php
	endif;
	wp_reset_postdata(); ?>

	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 4
	);
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
	?>

		<section id="service" class="bg-primary text-white">
			<div class="container py-16">
				<h2 class="c-heading"><span class="c-heading__sm">お知らせ</span><span class="c-heading__lg">NEWS</span></h2>
				<div class="mt-12 grid gap-4 xl:gap-8 grid-cols-2 lg:grid-cols-4">
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<?php get_template_part('template-parts/c-card'); ?>
					<?php endwhile; ?>

				</div><!-- /.grid -->
				<div class="mt-12 text-center">
					<a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="c-btn bg-secondary">一覧をみる</a><!-- /.c-btn -->
				</div><!-- /.text-center -->

			</div><!-- /.container -->
		</section>
	<?php
	endif;
	wp_reset_postdata(); ?>


	<section id="company" class="bg-white">
		<div class="container py-16">
			<div class="grid gap-8 lg:grid-cols-2">
				<h2 class="c-heading"><span class="c-heading__sm">会社概要</span><span class="c-heading__lg">COMPANY</span></h2>

				<div class="relative">
					<?php
					$company_name = get_field('company_name', $common_info_id);
					$postal_code = get_field('postal_code', $common_info_id);
					$address_01 = get_field('address_01', $common_info_id);
					$address_02 = get_field('address_02', $common_info_id);
					$address_text = '';
					if ($postal_code) $address_text .= '〒' . $postal_code;
					if ($address_01) $address_text .= ' ' . $address_01;
					if ($address_02) $address_text .= ' ' . $address_02;
					$ceo = get_field('ceo', $common_info_id);
					$establishment = get_field('establishment', $common_info_id);
					$capital = get_field('capital', $common_info_id);
					if ($company_name) :
					?>
						<dl class="c-dl">
							<dt>会社名</dt>
							<dd><?php echo $company_name; ?></dd>
						</dl>
					<?php endif;
					if (!empty($address_text)) :
					?>
						<dl class="c-dl">
							<dt>所在地</dt>
							<dd><?php echo $address_text; ?></dd>
						</dl>
					<?php endif;
					if ($ceo) :
					?>
						<dl class="c-dl">
							<dt>代表</dt>
							<dd><?php echo $ceo; ?></dd>
						</dl>
					<?php endif;
					if ($establishment) :
					?>
						<dl class="c-dl">
							<dt>設立</dt>
							<dd><?php echo $establishment; ?></dd>
						</dl>
					<?php endif;
					if ($capital) :
					?>
						<dl class="c-dl">
							<dt>資本金</dt>
							<dd><?php echo $capital; ?></dd>
						</dl>
					<?php endif; ?>
				</div><!-- / -->

			</div><!-- /.grid -->
		</div>
	</section>
	<section id="contact" class="bg-gray-custom">
		<div class="container py-16">
			<div class="grid gap-8 lg:grid-cols-2">
				<h2 class="c-heading"><span class="c-heading__sm">お問い合わせ</span><span class="c-heading__lg">CONTACT</span></h2>

				<div class="relative">
					<?php
					echo do_shortcode('[contact-form-7 id="36" title="お問い合わせ"]');
					?>
				</div><!-- / -->

			</div><!-- /.grid -->
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
