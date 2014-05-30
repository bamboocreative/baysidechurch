<?php
/*
Template Name: Non-campus-specific Homepage
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('homepage_scroller.twig', $context);