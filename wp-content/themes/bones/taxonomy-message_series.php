<?php get_header(); ?>
			<div id="content" role="main">
				<div class="container">
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
								<?php 
								
								$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );								
								?>
								<div class="col-md-4"><img src="<?php echo $feat_image; ?>">
								<header class="article-header">
									<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<?php the_field('speaker'); ?><br>
									<?php echo date('Y', get_field('service_date')); ?>
								</header> <?php // end article header ?>
							</div>
							</div>
						</article> <?php // end article ?>
						<?php endwhile; ?>
					</div>
				</div>
				<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
					<?php bones_page_navi(); ?>
				<?php } else { ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
						<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
					</ul>
				</nav>
				<?php } ?>					
				<?php endif; ?>
			</div> <?php // end #content ?>
<?php get_footer(); ?>
