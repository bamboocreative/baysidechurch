<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

/* Ministry Repository Items */
$currentTime = time();
while ( have_rows('ministry_items') ) : the_row();
	// If the current time is before the expiration date and if a file exists, or if there's no expiration date
	if(get_sub_field('repo_file')):
		if(get_sub_field('item_expiration_date') >= $currentTime):
			$repo[] = array(
				'name' => get_sub_field('repo_item_name'),
				'file' => get_sub_field('repo_file')
			);
		endif;
	endif;				
endwhile; 
$events = getEvents(array('featured'),null, 10, 'or');
wp_reset_postdata();

/* Renders Twig */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['repo'] = $repo;
$context['events'] = $events;
Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);