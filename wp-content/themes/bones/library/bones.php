<?php
/*

Developed by: Garrett Boatman
URL: http://bamboocreative.com/
*/

function getEvents($category, $notIn, $limit, $handle){

	$categoryHandler = 'category__' . $handle;
	$currentTime = time();
	$categories = array();
	// ToDo: NOT DONE
	
	if (in_array("featured", $category)) {
	    $featured = true;
	}
	
	if($category){
		foreach($category as $cat){
			$categories[] = get_cat_ID( $cat );
		}
	}
	
	// Arguments for the events query
	$args = array(
		'posts_per_page' => $limit,
		'post_type' => 'event',
		//Customizable for categories
		$categoryHandler => $categories,
		'category__not_in' => array( get_cat_ID($notIn), get_cat_ID('hidden') ),

		// Orders the events by date
		'meta_key' => 'date',
		'meta_type' => 'NUMERIC',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		
		// Query post if the event's end date is greater than the current time.
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key'     => 'end_date',
				'value'   => $currentTime,
				'type'    => 'NUMERIC',
				'compare' => '>='
			),
			
			/*
			TODO: Support empty "end date" field. This breaks the date() funtion the loop for some fucking reason.
			array(
				'key'     => 'date',
				'value'   => $currentTime,
				'type'    => 'NUMERIC',
				'compare' => '>='
			) */
		)
	);
	
	// Sets up the events array
	$events = array();
	$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ) {
		while ( $my_query->have_posts() ) {
			// Setting up post data
			$my_query->the_post();
			
			$events[] = get_single_event();
			
		}
	
		// Returns an array of events.
		return $events;
		// Restores original Post Data
		wp_reset_postdata();
	}
}

function get_single_event(){
	
	if(has_category('featured')){
		$featured = true;
	} else{
		$featured = false;
	}
	
	$date = get_field('date');
				
	// Return shortented content for event archive.
	$trimmed_content = wp_trim_words( get_field('content'), 30, '... <a href="'. get_permalink() .'">Read More</a>' );
	
	// Return the featured image of the event
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
	
	// Sets up the start date variables
	$startDate  = date('M j, Y', get_field('date'));
	$startMonth = date('M', get_field('date'));
	$startDay   = date('j', get_field('date'));
	$startYear  = date('Y', get_field('date'));
	$startTime  = date('g:ia', get_field('date'));
	$startHour  = date('g', get_field('date'));
	$startMin   = date('i', get_field('date'));
	$startMerid = date('a', get_field('date'));
	
	// Sets up the end date variables
	$endDate    = date('M j, Y', get_field('end_date'));
	$endMonth   = date('M', get_field('end_date'));
	$endDay     = date('j', get_field('end_date'));
	$endYear    = date('Y', get_field('end_date'));
	$endTime    = date('g:ia', get_field('end_date'));
	$endHour    = date('g', get_field('end_date'));
	$endMin     = date('i', get_field('end_date'));
	$endMerid   = date('a', get_field('end_date'));
	
	// If there's an end date set, make it pretty. Currently, no end date breaks the function.
	if(get_field('end_date')){
		// If the event occurs on the same date, just display one date.
		$year = '';
		$month = '';
		
		if($startDate == $endDate){
			$date = $startDate;
		} else{
			// If the event occurs in the same month, just display one month.
			if($startMonth != $endMonth){
				$month = $startMonth;
			}
			// If the event occurs in the same year, just display one year.
			if($startYear != $endYear){
				$year = ', ' . $startYear;
				$month = $startMonth;
			}
			
			// Return the pretty date.
			$date = $startMonth . ' ' . $startDay . $year . ' - ' .  $month . ' ' . $endDay . ', ' . $endYear;
		}
	} else{
		// If there's no end date, just use the start date. Currently, no end date breaks the function.
		$date = $startDate;
	}
	
	// If the event has a separate end time
	if($startTime !== $endTime){
		
		// If the end time isn't midnight, show it and make it pretty.
		if($endTime !== '12:00am'){
			
			// If the event occurs with the same meridiem, just display one meridiem.
			if($startMerid == $endMerid){
				$startTime = $startHour . ':' . $startMin;
			}
			
			// Return the pretty time.
			$time = $startTime . ' - ' . $endTime;
		
		} else{
			// If the end time is midnight, just show the start time.
			$time = $startTime;
		}
		
	} else{
		// If the event occurs at the same time, just show the start time.
		$time = $startTime;
	}
	
	
	// If the time is set to 12:00am, treat it as all day.
	if($time == '12:00am'){
		$time = 'All Day';
	}
	
	// Return the custom location name.
	$location = get_field('custom_location_name');
	// If none is set, assume it's at Bayside Church
	if(!$location){
		$location = 'Bayside Church';
	}
	
	// Return the custonm cost.
	$cost = get_field('cost');
	// If none is set, assime it's free.
	if(!$cost){
		$cost ='Free';
	}
	
	// Builds an event array with all its data.
	$event = array(
		'id' => get_the_id(),
		'title' => get_the_title(),
		'content' => get_field('content'),
		'trimmed_content' => $trimmed_content,
		'thumb' => get_field('thumbnail'),
		'header' => get_field('header'),
		'featured' => $featured,
		'permalink' => get_permalink(),
		'all_day' => get_field('all_day'),
		'badge_activation_date' => get_field('badge_activation_date'),
		'badge_deactive_date' => get_field('badge_deactive_date'),
		'contact' => get_field('contact'),
		'contact?_' => get_field('contact?_'),
		'contact_email_address' => get_field('contact_email_address'),
		'date' => $date,
		'month' => date('M', get_field('date')),
		'day' => date('j', get_field('date')),
		'end_date' => get_field('end_date'),
		'end_time' => $endTime,
		'time' => $time,
		'event_badge' => get_field('event_badge'),
		'location' => $location,
		'map' => get_field('location'),
		'multi-date' => get_field('multi-date'),
		'registration' => get_field('registration'),
		'registration_link' => get_field('registration_link'),
		'start_time' => get_field('start_time'), 
		'custom_location_name' => get_field('custom_location_name'), 
		'cost' => $cost,
		'video' => get_field('video_embed')
	);
	
	return $event;
}

// This function handles all badge related items (EVENT)
function getEventBadges(){
	$currentTime = time();
	// Arguments for the badge query
	$args = array(
		'post_type' => 'event',
				
		// Orders the badges by date
		'meta_key' => 'date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		
		// Meta Query
		'meta_query' => array(
			'relation' => 'AND',
			// Only query if a badge image is set.
			array(
				'key' => 'event_badge',
				'value' => NULL,
				'compare' => '!='
			),
			// And only query if the activation date is smaller than the current date.
			array(
				'key' => 'badge_activation_date',
				'value' => $currentTime,
				'type' => 'numeric',
				'compare' => '<='
			), 
			array(
				'key' => 'badge_deactive_date',
				'value' => $currentTime,
				'type' => 'numeric',
				'compare' => '>='
			)
		)
	);
		
	// Creating badge query
	$my_query = new WP_Query( $args );
	
	if ( $my_query->have_posts() ) {
		
		// Loop through ($limit) badges.
		while ( $my_query->have_posts() ) {
			
			// Setting up post data
			$my_query->the_post();		
			
			// Gets this from the date custom field (EVENT)
			$dateString = get_field('date');
			
			// Gets the badge display date;
			$date = get_field('display_date');
			if(!$date){
				$date = date('M d', get_field('date'));
			}
			
			// Sets up the title;
			$title = get_field('custom_badge_title');
			if(!$title){
				$title = get_the_title();
			}

			// Builds the array of URLs.
			// $URLarray[] = date('m d y', $dateString);
			$URLarray[] = array(
				'image' => get_field('event_badge'), 
				'permalink' => get_permalink(), 
				'title' => $title,
				'date' => $date
			);
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		
		// Returns the badges
		return $URLarray;
	}
	
}
	
// This takes the ID of a blog & returns the current URL replaced with the prober blog's subdomain.
function theNewURL($blog_id){
	switch_to_blog( $blog_id );
	$parsedUrl = parse_url(get_permalink());
	restore_current_blog();
	$subDomain = explode('.', $parsedUrl['host']);
	$newURL = 'http://' . $parsedUrl['host'] . $parsedUrl['path'];
	if(is_front_page()){
		$newURL = 'http://' . $parsedUrl['host'];
	}
	// Styles the output
	return $newURL;
}

add_filter('timber_context', 'add_to_context');
function add_to_context($data){
    
    /*
    $blog_list = wp_get_sites();
	//Todo:: SORTBY BLOG NUMBER
	foreach ($blog_list as $blog) {
		$blogID = $blog['blog_id'];	
		// echo '<a href="' . theNewURL($blogID) . '">' . theNewURL($blogID) . '</a> ';
		$newURL[] = theNewURL($blogID);
	}
    
    $data['campusSwitcher'] = $newURL;
    */
    
    $data['aboutMenu'] = new TimberMenu('About');
    $data['campusMenu'] = new TimberMenu('Campuses');
    $data['ministryMenu'] = new TimberMenu('Ministries');
    $data['mediaMenu'] = new TimberMenu('Media');
    $data['devotionalsMenu'] = new TimberMenu('Devotionals');
    
    return $data;
}
	
// we're firing all out initial functions at the start
add_action( 'after_setup_theme', 'bones_ahoy', 16 );

function bones_ahoy() {

    // Add Blog-(var) to body
	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
		global $blog_id;
		// add 'class-name' to the $classes array
		$classes[] = 'site-' . $blog_id;
		// return the $classes array
		return $classes;
	}
    
    
    // launching operation cleanup
    add_action( 'init', 'bones_head_cleanup' );
    // remove WP version from RSS
    add_filter( 'the_generator', 'bones_rss_version' );
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
    // clean up gallery output in wp
    add_filter( 'gallery_style', 'bones_gallery_style' );

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
    // ie conditional wrapper

    // launching this stuff after theme setup
    bones_theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'bones_register_sidebars' );
    // adding the bones search form (created in functions.php)
    add_filter( 'get_search_form', 'bones_wpsearch' );

    // cleaning up random code around images
    add_filter( 'the_content', 'bones_filter_ptags_on_images' );
    // cleaning up excerpt
    add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

    // modernizr (without media query polyfill)
    wp_register_script( 'bones-modernizr', get_stylesheet_directory_uri() . '/bootstrap/js/modernizr.custom.min.js', array(), '2.5.3', false );

    // register main stylesheet
    wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css', array(), '', 'all' );

    // ie-only style sheet
    wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/bootstrap/css/ie.css', array(), '' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
    wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_script( 'bones-modernizr' );
    wp_enqueue_style( 'bones-stylesheet' );
    wp_enqueue_style( 'bones-ie-only' );

    $wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    /*
    I recommend using a plugin to call jQuery
    using the google cdn. That way it stays cached
    and your site will load faster.
    */
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bones-js' );

  }
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'bonestheme' ) // secondary nav in footer
		)
	);
} /* end bones theme support */


/*********************
MENUS & NAVIGATION
*********************/

/* the main menu */
function bones_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
    	'menu' => 'The Main Menu',  // nav name
    	'menu_class' => 'nav nav-pills pull-right',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
	));
} /* end bones main nav */

// the footer menu (should you choose to use one)
function bones_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    	'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
	));
} /* end bones footer link */

// this is the fallback for header menu
function bones_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function bones_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) { 
			$tag_arr .= $tag->slug . ',';
		}
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts( $args );
        if($related_posts) {
        	foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
	return;
	
	echo '<nav class="pagination">';
	
		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
	
	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'bonestheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function bones_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

?>
