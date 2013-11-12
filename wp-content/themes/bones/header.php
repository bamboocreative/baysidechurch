<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

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
									<img class="logo" src="<?php echo get_template_directory_uri(); ?>/library/images/bayside-white.svg">
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
				        <div class="container">
				        <?php bones_main_nav(); ?>
				        </div>
				    </nav>	
				</header> <?php // end header ?>
			</div>