<?php get_header(); ?>

						<div id="main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php
							// $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							
							<?php 
							// Sets up page variables
							$facebook = get_field('facebook_url');
							$twitter = get_field('twitter_username');
							$instagram = get_field('instagram_username');
							$email = get_field('contact_email');
							
							
							;
							
								
							?>
							
							<?php if(get_field('page_title_image') == 'yes'){ ?>
							<table class="header-image-wrapper">
								<tr>
									<td style="
										background-color:<?php the_field('page_title_background_color'); ?>; 
										background-image:url('<?php the_field('page_title_background_image') ?>');
										padding-top:<?php the_field('custom_image_padding') ?>px;
										padding-bottom:<?php the_field('custom_image_padding') ?>px
										" 
										class="header-image
									">
										<?php if(get_field('page_title_image_(svg)')){ ?>
											<img style="width:<?php the_field('page_title_image_width');  ?>px" class="img_svg" src="<?php the_field('page_title_image_(svg)'); ?>">
										<?php } ?>
										
										<?php if(get_field('page_title_image_(png)')){ ?>
											<img style="width:<?php the_field('page_title_image_width'); ?>px" class="img_png" src="<?php the_field('page_title_image_(png)'); ?>">
										<?php } ?>
										
									</td>
								</tr>
							</table>
							
							
							<?php } ?>
							
							<div class="ministry-page">
								<div class="container">
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		
										
		
										<section class="entry-content clearfix" itemprop="articleBody">
											<div class="row">
												<div class="col-md-8 col-sm-7">
												<header class="article-header">
													<table>
														<tr>
															<td><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></td>
															<td><h4 class="page-title ages" itemprop="headline">ALL AGES</h4></td>
														</tr>
													</table>
													
												</header> <?php // end article header ?>
												
												<?php the_content(); ?>
												</div>
												<div class="col-md-4 col-sm-5">
													<?php if($facebook || $twitter || $instagram || $email){ ?>
													<h4 class="in-touch">GET IN TOUCH</h4>
													<div class="social">
														<?php if($facebook){ ?><a class="facebook soicon" href="<?php echo 'http://www.' . $facebook ?>"><i class="fa fa-facebook"></i></a><?php } ?><!--
														--><?php if($twitter){ ?><a class="twitter soicon" href="<?php echo 'http://www.twitter.com/' . $twitter ?>"><i class="fa fa-twitter"></i></a><?php } ?><!--
														--><?php if($instagram){ ?><a class="instagram soicon" href="<?php echo 'http://www.twitter.com/' . $instagram ?>"><i class="fa fa-instagram"></i></a><?php } ?>
														<br>
														<?php if($email){ ?><a href="mailto:<?php echo $email ?>"><h4><?php echo $email ?></h4></a><?php } ?>
													</div>
													<?php } ?>
												</div>
											</div>
										</section> <?php // end article section ?>
		
										<footer class="article-footer">
											<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>
		
										</footer> <?php // end article footer ?>
		
									</article> <?php // end article ?>
		
									<?php endwhile;	endif; ?>
								</div>
							</div>
							<div class="events-outer container">
							
							<?php 
							$categories = array();
							$Stringcategories = array();
							$featured = 'featured';
							$eventLimit = get_field('event_limit');
							
							
							
							if(!$eventLimit){
								$eventLimit = 10;
							}
							?>
														
							<?php if(get_field('custom_categories') == 'Yes'){ ?>
								<?php $categories = get_field('event_categories'); ?>
							<?php } else{ ?>
								<?php $categories = $post->post_name;?>
							<?php } ?>
							
							<?php 
								foreach($categories as $cats){
									
									$slug = $cats->slug;
									$Stringcategories[] = $slug;
								}
							?>
															
							<?php $featQuery = $Stringcategories;?>
							<?php $featQuery[] = $featured; ?>
							
							
							<?php 
							// Defined in bones.php
							displayEvents($featQuery,'', 9999, 'and');
							displayEvents($Stringcategories,$featured, $eventLimit, 'or');
							?>
							</div>

						</div> <?php // end #main ?>
<?php get_footer(); ?>
