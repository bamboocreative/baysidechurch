<?php
/*
Template Name: Campus Home
*/
?>


<?php get_header(); ?>

						<?php $headerBG = get_field('campus_photo'); ?>
						<div class="campus-header-wrapper" <?php if(get_field('campus_photo')){echo 'style="background-image:url(' . $headerBG . ');"';} ?>>
							<table>
								<tr>
									<td class="campus-logo">
										<?php if(get_field('campus_logo')){ ?>
											<img src="<?php echo get_field('campus_logo'); ?>">
										<?php }else{ ?>
											<?php echo get_bloginfo( 'name' );?>
										<?php }  ?>
									</td>
								</tr>
							</table>		
						</div>
						
						<div id="main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
							<div class="container">
								<div class="row">
									<div class="col-md-6  ">
										<?php if(get_field('about_campus')){
											the_field('about_campus');
										} ?>
										<?php 
										$location = get_field('campus_location');
										$coordinates = $location['coordinates']; 
										echo $location['address']; 
										?>	
										
										<!-- Inception loop for services -->
										<?php if(get_field('service_times')): ?>
											<ul>
											<?php while(has_sub_field('service_times')): ?>
												<li>
												<?php the_sub_field('service_day') ?>
													
												<?php while(has_sub_field('services')): ?>
													<?php the_sub_field('service_time'); ?>
													<?php the_sub_field('service_features'); ?>
												<?php endwhile; ?>
												</li>
											<?php endwhile; ?>
											</ul>
										<?php endif; ?>	
									</div>
									<div class="col-md-6">								
										<div id="campus-map" style="width: 100%; height: 300px"></div>
									</div>
								</div>	
							</div>
							
							<?php // Defined in bones.php ?>
							<div class="badge-wrapper">
								<div class="container">
									<div class="row">
									<?php $badges = getEventBadges(4); ?>
									
									<?php if($badges){ ?>
									<?php foreach($badges as $badges){
										echo '<div class="col-md-3 col-sm-6">';
										echo '<img class="event-badge" src="' . $badges .  '">';
										echo '</div>';
									}?>
									<?php } ?>
									</div>
								</div>
							</div>
						
							
							<?php 
							
							function displayEvents($category, $notIn){
								// Array key's == custom field names
								$events = getEvents($category, $notIn);
								if($events){
									foreach($events as $events){ ?>
										<?php 
										$trimmed_content = wp_trim_words( $events['content'], 40, '... <a href="'. $events['permalink'] .'">Read More</a>' );
										$startTime = date('g:ia', $events['date']);
										$endTime = date('g:ia', $events['end_date']);
										$location = $events['custom_location_name'];
										$cost = $events['cost'];
										if($startTime !== $endTime){
											$time = $startTime . ' - ' . $endTime;
										} else{
											$time = $startTime;
										}
										if($time == '12:00am'){
											$time = 'All Day';
										}
										if(!$location){
											$location = 'Bayside Church';
										}
										if(!$cost){
											$cost ='Free';
										}
										?>
										<div class="event-wrapper">
											<div class="row">
												<div class="col-md-12">
													<div class="calendar"></div>
													<h1><a href="<?php $events['permalink']; ?>"><?php echo $events['title']; ?></a></h1>
													<table class="event-details">
														<tr>
															<td><i class="fa fa-calendar-o"></i> &nbsp; <?php echo date('F j, Y', $events['date']); ?></td>
															<td><i class="fa fa-clock-o"></i> &nbsp; <?php echo $time; ?></td>
															<td><i class="fa fa-map-marker"></i> &nbsp; <?php echo $location ?></td>
															<td><i class="fa fa-usd"></i> &nbsp; <?php echo $cost ?></td>
														</tr>
													</table>
													<p class="event-content">
													<?php
													echo $trimmed_content;
													?>
													</p>
												</div>
											</div>
										</div>
										<?php 
									}
								}
							}?>
							
							<div class="events-outer container">
							<?php 
							displayEvents('featured','');
							displayEvents('','featured');
							?>
							</div>
														
							
							</article> <?php // end article ?>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqf_tUZR5C_oTNOML0nyR2WLLdIhvykiw&sensor=true"></script>
						<script>
							var myLatlng = new google.maps.LatLng(<?php echo $coordinates; ?>);
							
							var mapOptions = {
							  center: myLatlng,
							  zoom: 12,
							  scrollwheel: false,
							  mapTypeId: google.maps.MapTypeId.ROADMAP
							};
							
							var map = new google.maps.Map(document.getElementById("campus-map"), mapOptions);
							
							var marker = new google.maps.Marker({
							    position: myLatlng,
							    map: map,
							    title:"Hello World!"
							});	
						</script>
<?php get_footer(); ?>
