<?php

function masygal_justified_shortcode_handler($atts) {
	if (!isset($atts['id'])) {
		return;
	}

	extract(shortcode_atts(array(
		'fancybox' => 'true',
		'margin' => 0,
		'fancybox_title' => 'false',
		'row_height' => 150,
		'last_row' => 'nojustify',
		'shuffle' => 'false',
	), $atts));

	ob_start();
	$images = masygal_get_image_ids($atts['id']);
	if ($shuffle == 'true') {
		shuffle($images);
	}

	?>
    <style type="text/css">
    	#masygal-justified-gallery-<?=$atts['id']?> a.item{
    		text-decoration: none !important;
    		box-shadow: none !important;
    	}
    </style>

    <div id="masygal-justified-gallery-<?=$atts['id']?>">
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
				$("#masygal-justified-gallery-<?=$atts['id']?>").justifiedGallery({
					rowHeight: parseInt(<?=$row_height?>),
					margins: parseInt(<?=$margin?>),
					lastRow: '<?=$last_row?>'
				});
			});
		})(jQuery);
	</script>
	<?php
return ob_get_clean();
}

add_shortcode('justified-gallery', 'masygal_justified_shortcode_handler');

?>