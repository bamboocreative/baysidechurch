<?php

$currentTime = time();

// Set up post arrays
$searchpages = false;
$events = false;
$media = false;
$devos = false;

// The Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		
		$type = get_post_type();
		
		
		if($type == 'page'){
			
			if(get_the_title()){
			
				$searchpages[] = array(
					'title' => get_the_title(),
					'content' => get_the_content(),
					'image' => get_field('search_image'),
					'permalink' => get_the_permalink()
				);
			
			}
						
		} elseif($type == 'event'){
			
			$event = get_single_event();
			
			if($event['end_date'] > $currentTime){
				$events[] = $event;
			}
		} elseif($type == 'video'){
			$media[] = new TimberPost(get_the_ID());
		} elseif($type == 'devotionals'){
			$devos[] = new TimberPost(get_the_ID());
		}
	}
}

/* Renders Twig */
$context = Timber::get_context();

$context['searchpages'] = $searchpages;
$context['events'] = $events;
$context['media'] = $media;
$context['devotionals'] = $devos;
Timber::render('search.twig', $context);