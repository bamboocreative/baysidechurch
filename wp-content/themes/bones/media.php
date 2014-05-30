<?php
$post = new TimberPost();
$context['post'] = $post;
Timber::render('media.twig', $context);