<?php

// Grivity Form integration
$form = get_field('registration_form');
$gform = '';

if($form){
	$gform = '[gravityform id='. $form->id .' title=true description=true ajax=true tabindex=49]';
}

$event = get_single_event();
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['event'] = $event;
$context['form'] = $gform;
$context['weekend'] = get_single_video();

/* Renders Twig */
Timber::render(array('single-' . $post->post_type . '.twig', 'single.twig'), $context);

