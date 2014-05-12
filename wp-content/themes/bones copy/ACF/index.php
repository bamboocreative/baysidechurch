<?php
/*
Plugin Name: Bamboo Multisite Support
Plugin URI: http://bamboocreative.com.com/
Description: Applies function.php style code into all sites on a network.
Author: Garrett Boatman
Author URI: http://garrettboatman.com
Version: 1.0
*/ 


// This function removes the comments and Media menu items
function wpse28782_remove_menu_items(){
	remove_menu_page('edit-comments.php');
	remove_menu_page('upload.php');
}



function custom_css() {
   echo '<style type="text/css">
           .acf_postbox .field select{width: auto;}
           input.hasDatepicker{width:auto !important;}
         </style>';
}

add_action( 'admin_menu', 'wpse28782_remove_menu_items' );
add_action('admin_head', 'custom_css');


?>