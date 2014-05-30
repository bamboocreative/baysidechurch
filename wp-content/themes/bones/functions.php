<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

date_default_timezone_set('America/Los_Angeles');

/************* INCLUDE NEEDED FILES ***************/

	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/

require_once( 'library/bayside.php' ); // if you remove this, bones will break


// Includes custom post types for all sites using the theme.
include 'ACF/customPosts/post-events.php';
// include 'ACF/customPosts/post-ministries.php';


// Includes custom fields for all sites using the theme.
// include 'ACF/customFields/ministry-repo.php';
// include 'ACF/customFields/campus.php';
// include 'ACF/customFields/event.php';
// include 'ACF/customFields/video.php';


// This removes the comments and Media menu items
function wpse28782_remove_menu_items(){
	remove_menu_page('edit-comments.php');
	remove_menu_page('upload.php');
	remove_menu_page('edit.php');
	
	if(get_current_blog_id() == 1){
		remove_menu_page('edit.php?post_type=event');
		remove_menu_page('admin.php?page=gf_edit_forms');
	}
}


// Custom CSS for the Admin Dashboard
function custom_css() {
   echo '<style type="text/css">
           .acf_postbox .field select{width: auto;}
           input.hasDatepicker{width:auto !important;}
         </style>';
}

add_action( 'admin_menu', 'wpse28782_remove_menu_items' );
add_action('admin_head', 'custom_css');


/*



3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/


// TIMBER
define('THEME_URL', get_template_directory_uri());

// Adding dashicons for a prettier dashboard
function add_menu_icons_styles(){
	?>
	<style>
	
	*, *:active{
		outline: 0 !important;
	}
	
	.toplevel_page_gf_edit_forms .dashicons-before img{
	display: none;
	
	}
	
	#adminmenu .menu-icon-event div.wp-menu-image:before {
	  content: '\f145';
	}
	
	#adminmenu .toplevel_page_gf_edit_forms div.wp-menu-image:before {
	  content: "\f123";
	}
	
	#adminmenu #menu-posts-weekend div.wp-menu-image:before {
	  content: "\f126";
	}
	
	#adminmenu #menu-posts-devotional div.wp-menu-image:before {
	  content: "\f330";
	}
	
	</style>
	<?php
}

add_action( 'admin_head', 'add_menu_icons_styles' );

require_once( 'library/routes.php' );
?>