<?php

/* Renders Twig */

$context = Timber::get_context();

// Params defined in routes.php
global $params;
$context['series'] = Timber::get_terms('series', array('include' => $params['cat']));
$context['weekends'] = get_videos($params['cat']);

Timber::render('media/media-single-series.twig', $context);