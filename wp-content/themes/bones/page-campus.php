<?php
/*
Template Name: Campus Homepage
*/

// Sets up an array of badges to be passed to TWIG. Defined in bones.php. Queury has nothing to do with the page loop, so we'll leave it out.
$badges = getEventBadges();


$events = getEvents(array('homepage'), null, 15, 'in');

$currentDate = time();


// Standard wordpress loop
if (have_posts()) : while (have_posts()) : the_post();
	// Sets up location info
	$location = get_field('campus_location');
	$coordinates = $location['coordinates'];
	$address = $location['address'];
	
	// Inception loop for services
	if(get_field('service_times')):
		// Loops through days that have services
		while(has_sub_field('service_times')):
			//Loops through service times for each day
			while(has_sub_field('services')):
				// Builds array for each service
				$services[] = array(
					'time' => get_sub_field('service_time'),
					'features' => get_sub_field('service_features')
				);
			endwhile;
			// Builds array for each day containing the array for each service
			$days[] = array(
				'day' => get_sub_field('service_day'),
				'services' => $services
			);
			// Clears the services array after they have been added to their day.
			$services = array();
		endwhile;
	endif;
	
	// Getting static pages and then adding them at specific indexes to the badges array before passing them to twig.
	if(get_field('static_badge')):
				
		while(has_sub_field('static_badge')):
			
			// Get the activation fields
			$deactiveDate = get_sub_field('badge_deactive_date');
			$activeDate = get_sub_field('badge_activation_date');
			
			// Check to see if the badge is active
			if($deactiveDate){
				if($currentDate < $deactiveDate){
					$active = true;
				} else{
					$active = false;
				}
			} else{
				$active = true;
			}
						
			// If it's active, continue
			if($active == true && $currentDate >= $activeDate){
				// Takes the column number for readablility and subtracts for the array index.
				$arrayIndex = get_sub_field('position') - 1;
				
				// Here's our new static badge
				$staticBadge = array(
					'image' => get_sub_field('badge_image'), 
					'permalink' => get_sub_field('badge_link'), 
					'title' => get_sub_field('badge_title'),
					'date' => get_sub_field('display_date')
				);
				
				// Splice up the array and insert our static badge at the specified index
				array_splice( $badges, $arrayIndex, 0, array($staticBadge) );
				
			}
			
		endwhile;
	endif;
	
endwhile; endif;

// Sets up an array to pass to the TWIG template
$campus = array(
	'coordinates' => $coordinates,
	'address' => $address,
	'days' => $days
);

/* Renders TWIG */
$context = Timber::get_context();
$post = new TimberPost();
$context['events'] = $events;
$context['post'] = $post;
$context['campus'] = $campus;
$context['badges'] = $badges;
Timber::render('campus_homepage.twig', $context);