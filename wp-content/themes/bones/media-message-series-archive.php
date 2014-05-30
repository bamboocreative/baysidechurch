<?php

/* Renders Twig */
$post = new TimberPost();
$context['post'] = $post;
$context = Timber::get_context();

// Params defined in routes.php
global $params;
$context['messageseries'] = Timber::get_terms('series', array('parent' => $params['cat']));
$context['archivename'] = 'Message Series Archive';
$context['posttype'] = 'weekends';

Timber::render('seriesarchive.twig', $context);