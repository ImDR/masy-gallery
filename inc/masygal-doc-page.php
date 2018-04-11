<?php

add_action('admin_menu', 'masygal_doc_page_create_menu');

function masygal_doc_page_create_menu() {

	add_submenu_page(
		'edit.php?post_type=masy-gallery',
		__('Documentation', 'masy-gallery'),
		__('Documentation', 'masy-gallery'),
		'manage_options',
		'masygal-doc-page',
		'masygal_doc_page_callback'
	);

}

function masygal_doc_page_callback() {
	?>
	<style type="text/css">
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
	<div class="wrap">
		<table width="100%" cellspacing="10" cellpadding="0">
			<tbody>
				<tr>
					<td><h3>Shortcode:</h3></td>
					<td><span class="shortcode"><input type="text" onfocus="this.select();" readonly="readonly" value="[masonry-gallery]" class="large-text code"></span></td>
				</tr>
				<tr>
					<td colspan="2"><hr><h3>Options</h3></td>
				</tr>
				<tr>
					<td><b>fancybox</b></td>
					<td>true (default), false</td>
				</tr>
				<tr>
					<td><b>margin</b></td>
					<td>Integer (default 15)</td>
				</tr>
				<tr>
					<td><b>fancybox_title</b></td>
					<td>false (default), true</td>
				</tr>
				<tr>
					<td><b>col_large_desktop</b></td>
					<td>Integer (default 4)</td>
				</tr>
				<tr>
					<td><b>col_small_desktop</b></td>
					<td>Integer (default 3)</td>
				</tr>
				<tr>
					<td><b>col_tablet</b></td>
					<td>Integer (default 2)</td>
				</tr>
				<tr>
					<td><b>col_mobile</b></td>
					<td>Integer (default 1)</td>
				</tr>
				<tr>
					<td><b>shuffle</b></td>
					<td>false (default), true</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><h3>Demo</h3></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style1</h4>
						<img src="<?php echo MASYGAL_PLUGIN; ?>img/masonry-gallery-demo.jpg">
						<hr>
					</td>
				</tr>
				<tr>
					<td><h3>Shortcode:</h3></td>
					<td><span class="shortcode"><input type="text" onfocus="this.select();" readonly="readonly" value="[justified-gallery]" class="large-text code"></span></td>
				</tr>
				<tr>
					<td colspan="2"><hr><h3>Options</h3></td>
				</tr>
				<tr>
					<td><b>fancybox</b></td>
					<td>true (default), false</td>
				</tr>
				<tr>
					<td><b>margin</b></td>
					<td>Integer (default 0)</td>
				</tr>
				<tr>
					<td><b>fancybox_title</b></td>
					<td>false (default), true</td>
				</tr>
				<tr>
					<td><b>row_height</b></td>
					<td>Integer (default 150)</td>
				</tr>
				<tr>
					<td><b>last_row</b></td>
					<td>nojustify (default), justify, hide, center, right</td>
				</tr>
				<tr>
					<td><b>shuffle</b></td>
					<td>false (default), true</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><h3>Demo</h3></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<h4>Style1</h4>
						<img src="<?php echo MASYGAL_PLUGIN; ?>img/justified-gallery-demo.jpg">
						<hr>
					</td>
				</tr>
				<tr>
					<td><b>PHP function:</b></td>
					<td>
						<code>$images = masygal_get_image_ids($gallery_id);</code>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
	<?php
}
?>