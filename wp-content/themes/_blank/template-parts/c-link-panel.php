<?php
$image_class = array('class' => 'w-full h-full mx-auto object-cover');
if (!empty($args['id'])) $id = $args['id'];
if (!empty($args['link'])) $link = $args['link'];
if (!empty($args['title'])) $title = $args['title'];
if (!empty($args['description'])) $description = $args['description'];
if (!empty($args['thumbnail_id'])) $thumbnail_id = $args['thumbnail_id'];

$image = wp_get_attachment_image(252, 'full', false, $image_class);

if (!empty($thumbnail_id)) $image = wp_get_attachment_image($thumbnail_id, 'full', false, $image_class);
?>
<a href="<?php echo $link ?>" class="">
	<div class="relative flex flex-col w-full bg-white border-b-primary-lighten border-r-primary-lighten shadow-md border-primary border-8 lg:border-[1rem]">
		<?php if (!empty($image)) : ?>
			<div class="w-full overflow-hidden aspect-video"><?php echo $image; ?></div>
		<?php endif; ?>
		<?php
		if (!empty($title) || !empty($description)) :
		?>
			<div class="relative pt-2 pb-4 text-center">
				<?php
				if (!empty($title)) :
				?>
					<span class="block pt-4 px-2 pb-2 text-lg xl:text-xl font-bold font-miti text-center"><span class="c-marker"><?php echo $title; ?></span></span>
					<?php
					$en = get_post($id)->post_name;
					if (get_field('h1_en')) $en = get_field('h1_en');
					?>
					<span class="block text-primary-lighten uppercase text-sm font-bold font-interstate"><?php echo $en; ?></span>
					<span class="flex w-full justify-end pr-2 -mt-4">
						<?php get_template_part('template-parts/icon/arrow-right-circle-fill'); ?>
					</span>
				<?php endif; ?>
			</div><!-- /.p-4 -->
		<?php
		endif;
		?>

	</div>
	<?php if (!empty($description)) : ?>
		<span class="block px-4 mt-2 text-sm"><?php echo $description; ?></span>
	<?php
	endif;
	?>
</a>