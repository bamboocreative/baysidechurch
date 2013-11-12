<?php get_header(); ?>

						<div id="main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							
							<?php if($feat_image){ ?>
							<div style="background-image:url('<?php echo $feat_image ?>');" class="header-image"></div>
							<?php } ?>
							
							<div class="container">
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
									<header class="article-header">
										<!-- We keep the h1 in no matter what for SEO purposes, but hide it if a featured image exists. -->
										<h1 style="<?php if($feat_image){ echo 'display:none;';} ?>" class="page-title" itemprop="headline"><?php the_title(); ?></h1>
										
	
	
									</header> <?php // end article header ?>
	
									<section class="entry-content clearfix" itemprop="articleBody">
										<?php the_content(); ?>
								</section> <?php // end article section ?>
	
									<footer class="article-footer">
										<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>
	
									</footer> <?php // end article footer ?>
	
								</article> <?php // end article ?>
	
								<?php endwhile;	endif; ?>
							</div>
							<div class="events-outer container">
							
							<?php 
							$categories = array();
							$featured = 'featured';
							$eventLimit = get_field('event_limit');
							if(!$eventLimit){
								$eventLimit = 10;
							}
							?>
							
							
							<?php if(get_field('custom_categories') == 'Yes'){ ?>
								<?php while(has_sub_field('event_categories')){ ?>
									<?php $categories[] = get_sub_field('event_category'); ?>
								<?php } ?>
							<?php } else{ ?>
								<?php $categories[] = $post->post_name;?>
							<?php } ?>
							
							<?php var_dump($categories); ?>
							
							
							<?php $featQuery = $categories;?>
							<?php $featQuery[] = $featured; ?>
							
							
							<?php 
							// Defined in bones.php
							displayEvents($featQuery,'', 9999, 'and');
							displayEvents($categories,$featured, $eventLimit, 'and');
							?>
							</div>

						</div> <?php // end #main ?>
<?php get_footer(); ?>
