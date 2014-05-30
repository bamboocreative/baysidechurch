<?php

/* Renders Twig */
$post = new TimberPost();
$context['post'] = $post;
$context = Timber::get_context();

// Params defined in routes.php
global $params;
$context['messageseries'] = Timber::get_terms('devo_series');
$context['archivename'] = 'Devotional Series Archive';
$context['posttype'] = 'devotionals';

Timber::render('seriesarchive.twig', $context);