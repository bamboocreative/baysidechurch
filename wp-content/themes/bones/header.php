<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title('Bayside' . ' ' . get_bloginfo('name') . ' |')?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		
		<!-- Typekit -->
		<script type="text/javascript" src="//use.typekit.net/qoa3yga.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
	
		<div id="content">
			<div class="header-wrapper">
				<header class="header" role="banner">
					<div class="top-level container">
						<table>
							<tr>
								<td>
									<a href="<?php echo bloginfo('wpurl'); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/library/images/bayside-white.svg"></a>
								</td>
								<td>
									<select>
									<?php // This runs through all oft he blogs and returns custom links. Check out "theNewURL()" in bones.php
									$blog_list = wp_get_sites();
									//Todo:: SORT MY BLOG NUMBER
									foreach ($blog_list as $blog) {
										$blogID = $blog['blog_id'];	
										// echo '<a href="' . theNewURL($blogID) . '">' . theNewURL($blogID) . '</a> ';
										echo '<option>'. theNewURL($blogID) .'</option>';
									}?>
									</select>
								</td>
							</tr>
						</table>
					</div>
					
					<nav class="header">
				        <div class="container mainnav">
					        <div class="nav top-nav clearfix">
						        <ul>
								   <li><a id="about" href="javascript:void(0)">About</a></li>
								   <li><a id="events" href="javascript:void(0)">Events</a></li>
								   <li><a id="campuses" href="javascript:void(0)">Campuses</a></li>
								   <li><a id="ministries" href="javascript:void(0)">Ministries</a></li>
								   <li><a id="media" href="javascript:void(0)">Media</a></li>
								   <li><a id="give" href="javascript:void(0)">Give</a></li>
						        </ul>
					        </div>
				        </div>
				    </nav>	
				</header> <?php // end header ?>
			</div>
			<div class="page-wrapper">
				<div class="subnav">
					<div class="subnav-inner">
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<h4>Children's</h4>
									<ul>
										<li><a href="">8wks-Kindergarten</a></li><!-- 
										--><li><a href="">1st-4th</a></li><!-- 
										--><li><a href="">5th & 6th</a></li><!-- 
										--><li><a href="">Special Needs</a></li><!-- 
										--><li><a href="">Breakaway Camps</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h4>Student</h4>
									<ul>
										<li><a href="">Junior High</a></li><!-- 
										--><li><a href="">Senior High</a></li><!-- 
										--><li><a href="">College/20-Somethings</a></li><!-- 
										--><li><a href="">Special Needs</a></li><!-- 
										--><li><a href="">Thrive Leadership School</a></li>
									</ul>
								</div>
								<div class="col-md-3">
									<h4>Adult</h4>
									<ul>
										<li><a href="">Men</a></li><!-- 
										--><li><a href="">Women</a></li><!-- 
										--><li><a href="">Singles</a></li><!-- 
										--><li><a href="">Classes</a></li><!-- 
										--><li><a href="">Marriage & Family</a></li><!--
										--><li><a href="">Small Groups</a></li><!-- 
										--><li><a href="">Purposeful Parenting</a></li><!-- 
										--><li><a href="">Adventure Sports</a></li><!--
										--><li><a href="">Health and Fitness</a></li>							
									</ul>
								</div>
								<div class="col-md-3">
									<h4>Compassion</h4>
									<ul>
										<li><a href="">8wks-Kindergarten</a></li><!-- 
										--><li><a href="">1st-4th</a></li><!-- 
										--><li><a href="">5th & 6th</a></li><!-- 
										--><li><a href="">Special Needs</a></li><!-- 
										--><li><a href="">Breakaway Camps</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>