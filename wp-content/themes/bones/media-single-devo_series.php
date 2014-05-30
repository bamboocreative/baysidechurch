<?php

/* Renders Twig */

$context = Timber::get_context();

// Params defined in routes.php
global $params;
$context['series'] = Timber::get_terms('devo_series', array('include' => $params['cat']));
$context['devos'] = get_videos($params['cat'], 'devotional', 'devo_series');

Timber::render('media-single-devo_series.twig', $context);