<?php

add_action('add_meta_boxes','masygal_meta_box_init');

function masygal_meta_box_init(){
	add_meta_box('masygal-meta-box','Images','masygal_meta_box_ctr', 'masy-gallery' ,'normal','default');
}

function masygal_meta_box_ctr(){
	global $post;
	wp_nonce_field(basename(__FILE__),'masygal_meta_box_nonce');
	?>
	<style type="text/css">
	
	div#masygal_images {
		display: flex;
		flex-wrap: wrap;
	}
	
	#masygal_images .item {
		display: flex;
		justify-content: center;
		align-items: center;
		position: relative;
		height: 110px;
		width: 110px;
		margin-right: 10px;
		margin-bottom: 10px;
		padding: 5px;
		border: 1px solid #f1f1f1;
		border-radius: 3px;
		box-shadow: 1px 4px 12px #d6d6d6;
		background-color: #fff;
		cursor: move;
	}
	
	#masygal_images .item img {
		max-width: 100%;
	    height: 110px;
	    overflow: hidden;
	    object-fit: cover;
	    object-position: center;
	}

	#masygal_images .item span.remove {
	    position: absolute;
	    top: -5px;
    	right: -5px;
	    background-color: rgba(237, 30, 54, 0.8);
	    color: #fff;
	    height: 18px;
	    width: 18px;
	    font-size: 14px;
	    line-height: 18px;
	    text-align: center;
	    border-radius: 50%;
	    cursor: pointer;
	}

	#masygal_images .item span.remove:hover{
		background-color: #ed1e36;
	}

	span.shortcode {
	    display: block;
	    margin: 2px 0;
	}

	span.shortcode > input {
	    background: inherit;
	    color: inherit;
	    font-size: 12px;
	    border: none;
	    box-shadow: none;
	    padding: 4px 8px;
	    margin: 0;
	}
	
	</style>
	<div id="masygal_images" class="masygal_images">
		<?php
		$images = get_post_meta($post->ID, 'masygal-images', true);
		if (!empty($images)) {
			foreach ($images as $image) {
				if(file_exists(get_attached_file($image))){
				?>
					<div class='item'><img src="<?php echo esc_url(wp_get_attachment_url($image)); ?>"><input type="hidden" name="masygal-images[]" value="<?php echo $image; ?>"><span class="remove">&times;</span></div>
				<?php	
				}
			}
		}
		?>
	</div>
	<button type="button" id="masygal_add_images" data-meta-key="masygal-images" class="button button-primary button-large">Add Images</button>
	<hr/>
	<h4>Shortcodes:</h4>
	<input type="text" onfocus="this.select();" readonly="readonly" value='[masonry-gallery id="<?= $post->ID ?>"]' class="large-text code"/>
	<br/>
	<br/>
	<br/>
	<input type="text" onfocus="this.select();" readonly="readonly" value='[justified-gallery id="<?= $post->ID ?>"]' class="large-text code"/>
	<?php
}

add_action('save_post','masygal_meta_box_save',10,2);

function masygal_meta_box_save($post_id, $post){
	if(!isset($_POST['masygal_meta_box_nonce'])|| !wp_verify_nonce($_POST['masygal_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	
	if(!current_user_can('edit_post', $post->ID))
		return $post_id;
	
	if(get_post_type($post_id)=='masy-gallery'){
		update_post_meta($post_id, 'masygal-images', filter_var_array($_POST['masygal-images'],FILTER_SANITIZE_NUMBER_INT));
	}
}


function masygal_get_image_ids($gid){
	$images = get_post_meta($gid, 'masygal-images', true);
	if (!empty($images))
		return $images;
	
	return false;
}

?>