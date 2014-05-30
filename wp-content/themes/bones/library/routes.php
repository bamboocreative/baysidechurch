<?php

// Media Routes
Timber::add_route('media', function($params){
    Timber::load_template('media.php');
});

Timber::add_route('weekends/archive/:campus', function($params){

	$term = get_term_by('slug', $params['campus'], 'series');
	$params['cat'] = $term->term_id;
	
    Timber::load_template('media-message-series-archive.php', '', 200, $params);
});

Timber::add_route('devotionals/archive', function($params){
	
    Timber::load_template('media-devo-series-archive.php', '', 200, $params);
});

Timber::add_route('weekends/:series', function($params){
    
    $term = get_term_by('slug', $params['series'], 'series');
	$params['cat'] = $term->term_id;
    
    Timber::load_template('media-single-series.php', '', 200, $params);
    
});

Timber::add_route('devotionals/:series', function($params){
    
    $term = get_term_by('slug', $params['series'], 'devo_series');
	$params['cat'] = $term->term_id;
    
    Timber::load_template('media-single-devo_series.php', '', 200, $params);
    
});