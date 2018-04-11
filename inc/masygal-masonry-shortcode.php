<?php

function masygal_masonry_shortcode_handler($atts) {
	if (!isset($atts['id'])) {
		return;
	}

	extract(shortcode_atts(array(
		'fancybox' => 'true',
		'margin' => 15,
		'fancybox_title' => 'false',
		'col_large_desktop' => 4,
		'col_small_desktop' => 3,
		'col_tablet' => 2,
		'col_mobile' => 1,
		'shuffle' => 'false',
	), $atts));

	ob_start();
	$images = masygal_get_image_ids($atts['id']);
	if ($shuffle == 'true') {
		shuffle($images);
	}

	?>
    <style type="text/css">
    	#masygal-masonry-gallery-<?=$atts['id']?> a.item{
    		text-decoration: none !important;
    		box-shadow: none !important;
    	}
    </style>

    <div id="masygal-masonry-gallery-<?=$atts['id']?>">
    	<?php
if (!empty($images)) {
		foreach ($images as $image) {
			?>
			<a class="item"
			<?php if ($fancybox == 'true') {?>
				<?php if ($fancybox_title == 'true') {?>
				data-caption="<b><?=get_the_title($image)?></b>"
				<?php }?>
				data-fancybox="gallery" href="<?=esc_url(wp_get_attachment_url($image));?>"
			<?php }?>
			>
				<img src="<?=esc_url(wp_get_attachment_url($image));?>">
			</a>
			<?php
}
	}
	?>
	</div>

	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				var macy = Macy({
				    container: '#masygal-masonry-gallery-<?=$atts['id']?>',
				    trueOrder: false,
				    waitForImages: false,
				    margin: parseInt(<?=$margin?>),
				    columns: parseInt(<?=$col_large_desktop?>),
				    breakAt: {
				        1199: parseInt(<?=$col_small_desktop?>),
				        991: parseInt(<?=$col_tablet?>),
				        767: parseInt(<?=$col_mobile?>)
				    }
				});
			});
		})(jQuery);
	</script>
	<?php
return ob_get_clean();
}

add_shortcode('masonry-gallery', 'masygal_masonry_shortcode_handler');

?>