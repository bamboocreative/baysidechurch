<?php
$post = new TimberPost();
$context['post'] = $post;
Timber::render('media/media.twig', $context);