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
	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php _blank_post_thumbnail(); ?>

			<div class="entry-content">
				<h2>宣言</h2>
				<p class="mt-0"><?php bloginfo('name'); ?>（以下「当社」）は、ここに個人情報保護方針を定め公開し、スタッフ並び当社関係者に個人情報保護の重要性と認識に取組み、徹底させることにより、個人情報の保護を推進致します。</p>

				<h2>個人情報の管理</h2>
				<p class="mt-0">当社は、個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。</p>

				<h2>個人情報の利用目的</h2>
				<p class="mt-0">お客さまからお預かりした個人情報は、当社からのご連絡や業務のご案内やご質問に対する回答などに電子メールや資料を利用します。</p>

				<h2>個人情報の第三者への開示・提供の禁止</h2>
				<p class="mt-0">当社は、お預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。</p>
				<ol>
					<li>お客さまの同意が得られた場合、お客さまが希望されるサービスを行なうために当社が業務を委託する関係者に対して開示する場合、法令に基づき開示することが必要である場合</li>
					<li>法令に基づき裁判所や警察等の公的機関から要請があった場合</li>
					<li>法令に特別の規定がある場合</li>
					<li>お客様や第三者の生命・身体・財産・名誉を損なうおそれがあり、本人の同意を得ることができない場合</li>
					<li>法令や当社のご利用規約・注意事項に反する行動から、当社の権利、財産またはサービスを保護または防禦する必要があり、本人の同意を得ることができない場合</li>
				</ol>

				<h2>アクセス解析ツールについて</h2>
				<p class="mt-0">当ウェブサイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。このGoogleアナリティクスはトラフィックデータの収集のためにクッキー（Cookie）を使用しております。トラフィックデータは匿名で収集されており、個人を特定するものではありません。</p>

				<h2>著作権について</h2>
				<p class="mt-0">当ウェブサイトで掲載している文章や画像などにつきましては、無断転載することを禁止します。<br>
					当ウェブサイトは著作権や肖像権の侵害を目的としたものではありません。著作権や肖像権に関して問題がございましたら、お問い合わせフォームよりご連絡ください。迅速に対応いたします。</p>

				<h2>ご本人の照会</h2>
				<p class="mt-0">お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。</p>

				<h2>個人情報の安全対策</h2>
				<p class="mt-0">当社は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。</p>

				<h2>法令、規範の遵守と見直し</h2>
				<p class="mt-0">当社は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。</p>

				<h2>公開と改正について</h2>
				<p class="mt-0">公開開始日の日付を西暦で表示し、公示日を記載し、改正した日付を、必ず分かるようにさせていただきます。</p>

				<h2>お問い合わせ</h2>
				<p class="mt-0">当社の個人情報の取扱に関するお問い合せは下記までご連絡ください。</p>
				<?php
				$company_name = get_field('company_name', $common_info_id);
				$postal_code = get_field('postal_code', $common_info_id);
				$tel = get_field('tel', $common_info_id);
				$address_01 = get_field('address_01', $common_info_id);
				$address_02 = get_field('address_02', $common_info_id);
				$address_text = '';
				if ($postal_code) $address_text .= '〒' . $postal_code;
				if ($address_01) $address_text .= ' ' . $address_01;
				if ($address_02) $address_text .= ' ' . $address_02;
				$ceo = get_field('ceo', $common_info_id);
				?>
				<p><?php if ($company_name) echo $company_name . '<br>';
						if ($ceo) echo '個人情報保護管理者 ' . $ceo . '<br>';
						if ($tel) echo '連絡先 ' . $tel . '<br>';
						if (!empty($address_text)) echo $address_text;
						?></p>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->
	</div><!-- /.container -->

</main><!-- #main -->

<?php
get_footer();
