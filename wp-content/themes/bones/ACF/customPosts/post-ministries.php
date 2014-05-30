<?php
/* This isn't being used yet.

add_action('init', 'cptui_register_my_cpt_ministry');

function cptui_register_my_cpt_ministry() {
	register_post_type('ministry', array(
	'label' => 'Ministries',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'capability_type' => 'page',
	'map_meta_cap' => true,
	'hierarchical' => true,
	'rewrite' => array('slug' => 'ministry', 'with_front' => false),
	'query_var' => true,
	'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
	'labels' => array (
	  'name' => 'Ministries',
	  'singular_name' => 'Ministry',
	  'menu_name' => 'Ministries',
	  'add_new' => 'Add Ministry',
	  'add_new_item' => 'Add New Ministry',
	  'edit' => 'Edit',
	  'edit_item' => 'Edit Ministry',
	  'new_item' => 'New Ministry',
	  'view' => 'View Ministry',
	  'view_item' => 'View Ministry',
	  'search_items' => 'Search Ministries',
	  'not_found' => 'No Ministries Found',
	  'not_found_in_trash' => 'No Ministries Found in Trash',
	  'parent' => 'Parent Ministry',
	)
	) ); 
}
?>