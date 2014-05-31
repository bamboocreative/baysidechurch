<?php

/* Renders TWIG */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
global $params;
Timber::render(array( 'pages/' . $params['page'] . '.twig', 'page.twig'), $context);