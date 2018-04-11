<?php

add_action( 'init', 'masygal_gallery_init' );

function masygal_gallery_init() {
	$labels = array(
		'name'               => _x( 'Masy Gallery', 'post type general name', 'masy-gallery' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name', 'masy-gallery' ),
		'menu_name'          => _x( 'Masy Gallery', 'admin menu', 'masy-gallery' ),
		'name_admin_bar'     => _x( 'Galleries', 'add new on admin bar', 'masy-gallery' ),
		'add_new'            => _x( 'Add New', 'masy-gallery', 'masy-gallery' ),
		'add_new_item'       => __( 'Add New Gallery', 'masy-gallery' ),
		'new_item'           => __( 'New Gallery', 'masy-gallery' ),
		'edit_item'          => __( 'Edit Gallery', 'masy-gallery' ),
		'view_item'          => __( 'View Gallery', 'masy-gallery' ),
		'all_items'          => __( 'All Galleries', 'masy-gallery' ),
		'search_items'       => __( 'Search Galleries', 'masy-gallery' ),
		'parent_item_colon'  => __( 'Parent Galleries:', 'masy-gallery' ),
		'not_found'          => __( 'No Galleries found.', 'masy-gallery' ),
		'not_found_in_trash' => __( 'No Galleries found in Trash.', 'masy-gallery' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'masy-gallery' ),
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'menu_icon'			 => 'dashicons-images-alt2',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type( 'masy-gallery', $args );
}

add_filter( 'manage_masy-gallery_posts_columns', 'masygal_add_custom_columns' );
add_action( 'manage_masy-gallery_posts_custom_column' , 'custom_book_column', 10, 2 );

function masygal_add_custom_columns($columns) {
    $columns['masonry_gallery'] = __( 'Masonry Gallery Shortcode', 'masy-gallery' );
    $columns['justified_gallery'] = __( 'Justified Gallery Shortcode', 'masy-gallery' );
    return $columns;
}

function custom_book_column( $column, $post_id ) {
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
	<?php
	if($column =='masonry_gallery'){
		?>
		<input type="text" onfocus="this.select();" class="large-text code" readonly="readonly" value='[masonry-gallery id="<?= $post_id ?>"]' />
		<?php
	}elseif($column =='justified_gallery'){
		?>
		<input type="text" onfocus="this.select();" class="large-text code" readonly="readonly" value='[justified-gallery id="<?= $post_id ?>"]' />
		<?php
	}
}
?>