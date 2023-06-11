<?php
$heading_level = 'h3';
if (isset($args)) {
	if (!empty($args['count'])) $count = $args['count'];
	if (!empty($args['heading_level'])) $heading_level = $args['heading_level'];
}
?>
<li class="c-faq js-faq" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
	<<?php echo $heading_level; ?> id="faq-heading-<?php echo $count; ?>">
		<button class="c-faq-header" itemprop="name" aria-controls="faq-body-<?php echo $count; ?>" aria-expanded="false"><?php the_title(); ?><span class="c-faq-icon" aria-hidden="true"><?php get_template_part('template-parts/icon/chevron-down'); ?></span></button>
	</<?php echo $heading_level; ?>>
	<div id="faq-body-<?php echo $count; ?>" aria-labelledby="faq-heading-<?php echo $count; ?>" class="c-faq-body" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
		<?php the_content(); ?>
	</div>
</li>