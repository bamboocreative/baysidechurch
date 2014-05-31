<?php


$events = getEvents('', null, 100);

/* Renders TWIG */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['events'] = $events;
Timber::render('event-archive.twig', $context);