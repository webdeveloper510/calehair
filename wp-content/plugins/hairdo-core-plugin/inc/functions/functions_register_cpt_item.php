<?php

/**************************************
INDEX

REGISTER CUSTOM POST FORMAT: ITEM
CUSTOM MESSAGES: ITEM
CUSTOM TAXONOMIES: ITEM CATEGORY
CUSTOM EDIT.PHP COLUMNS

***************************************/


/**************************************
REGISTER CUSTOM POST FORMAT: ITEM
***************************************/

add_action( 'init', 'canon_register_cpt_items' );

function canon_register_cpt_items() {

	$labels = array(
		'name'               => _x( 'Items', 'post type general name', 'loc_hairdo_core_plugin' ),
		'singular_name'      => _x( 'Item', 'post type singular name', 'loc_hairdo_core_plugin' ),
		'add_new'            => _x( 'Add New', 'book', 'loc_hairdo_core_plugin' ),
		'add_new_item'       => __( 'Add New Item', 'loc_hairdo_core_plugin' ),
		'edit_item'          => __( 'Edit Item', 'loc_hairdo_core_plugin' ),
		'new_item'           => __( 'New Item', 'loc_hairdo_core_plugin' ),
		'all_items'          => __( 'All Items', 'loc_hairdo_core_plugin' ),
		'view_item'          => __( 'View Item', 'loc_hairdo_core_plugin' ),
		'search_items'       => __( 'Search Items', 'loc_hairdo_core_plugin' ),
		'not_found'          => __( 'No items found', 'loc_hairdo_core_plugin' ),
		'not_found_in_trash' => __( 'No items found in the Trash', 'loc_hairdo_core_plugin' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Listing Items'
	);

	$args = array(
		'labels'        	=> $labels,
		'description'   	=> 'Holds our items and item specific data',
		'public'        	=> true,
		'menu_position' 	=> 5,
		'supports'      	=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   	=> true,
		'rewrite' 			=> array('slug' => 'items'),
		'show_in_nav_menus'	=> false,
	);

	register_post_type( 'cpt_item', $args );	
}

/**************************************
CUSTOM MESSAGES:ITEM
***************************************/

add_filter( 'post_updated_messages', 'canon_cpt_items_messages' );

function canon_cpt_items_messages($messages) {
	global $post, $post_ID;

	$messages['cpt_item'] = array(
		0 => '', 
		1 => sprintf( __('Item updated. <a href="%s">View item</a>'), esc_url( get_permalink($post_ID), 'loc_hairdo_core_plugin' ) ),
		2 => __('Custom field updated.', 'loc_hairdo_core_plugin'),
		3 => __('Custom field deleted.', 'loc_hairdo_core_plugin'),
		4 => __('Item updated.', 'loc_hairdo_core_plugin'),
		5 => isset($_GET['revision']) ? sprintf( __('Item restored to revision from %s', 'loc_hairdo_core_plugin'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Item published. <a href="%s">View item</a>'), esc_url( get_permalink($post_ID) ), 'loc_hairdo_core_plugin' ),
		7 => __('Item saved.', 'loc_hairdo_core_plugin'),
		8 => sprintf( __('Item submitted. <a target="_blank" href="%s">Preview item</a>', 'loc_hairdo_core_plugin'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview item</a>', 'loc_hairdo_core_plugin'), date_i18n( __( 'M j, Y @ G:i', 'loc_hairdo_core_plugin' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Item draft updated. <a target="_blank" href="%s">Preview item</a>', 'loc_hairdo_core_plugin'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

/**************************************
CUSTOM TAXONOMIES: ITEM CATEGORY
***************************************/

add_action( 'init', 'canon_register_taxonomy_item_category', 0 );

function canon_register_taxonomy_item_category () {
	$labels = array(
		'name'              => _x( 'Item Categories', 'taxonomy general name', 'loc_hairdo_core_plugin' ),
		'singular_name'     => _x( 'Item Category', 'taxonomy singular name', 'loc_hairdo_core_plugin' ),
		'search_items'      => __( 'Search Item Categories', 'loc_hairdo_core_plugin' ),
		'all_items'         => __( 'All Item Categories', 'loc_hairdo_core_plugin' ),
		'parent_item'       => __( 'Parent Item Category', 'loc_hairdo_core_plugin' ),
		'parent_item_colon' => __( 'Parent Item Category:', 'loc_hairdo_core_plugin' ),
		'edit_item'         => __( 'Edit Item Category', 'loc_hairdo_core_plugin' ), 
		'update_item'       => __( 'Update Item Category', 'loc_hairdo_core_plugin' ),
		'add_new_item'      => __( 'Add New Item Category', 'loc_hairdo_core_plugin' ),
		'new_item_name'     => __( 'New Item Category', 'loc_hairdo_core_plugin' ),
		'menu_name'         => __( 'Item Categories', 'loc_hairdo_core_plugin' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_in_nav_menus'	=> false,
	);
	register_taxonomy( 'item_category', 'cpt_item', $args );
}

/**************************************
CUSTOM EDIT.PHP COLUMNS
***************************************/


// first add the custom columns
add_filter('manage_edit-cpt_item_columns', 'add_cpt_item_columns', 4);
function add_cpt_item_columns($defaults){

	$defaults['item_category'] = __('Item Categories', 'loc_worker_core_plugin');
	return $defaults;

}

// now fill custom columns with actual data
add_action('manage_posts_custom_column', 'fill_cpt_item_columns', 4, 2);
function fill_cpt_item_columns($column, $post_id){

	if($column === 'item_category'){
		// get terms and sort
		$terms = get_the_terms($post_id, 'item_category');
		if ($terms) {
			$terms = array_values($terms);
			// output terms with links
			for ($i = 0; $i < count($terms); $i++) {  
				printf('<a href="?post_type=cpt_item&item_category=%s">%s</a>', $terms[$i]->slug, $terms[$i]->name);
				if ($i !== count($terms)-1 ) { echo ", "; }	// add comma separator unless it is the last item
			}
		}
	}

}