<?php
/*
Template Name: Message Archive
*/
?>

<?php get_header(); ?>

<div id="main" role="main">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
				<div class="row">
				<?php 
				
				$tax = 'message_series';
				$terms = get_terms( $tax );
				
				foreach($terms as $term){ 
				$image = s8_get_taxonomy_image_src($term, 'full');	
				?>
					<a href="<?php echo get_term_link( $term->slug, $tax ); ?>">
						<div class="col-md-3">
							<img src="<?php echo $image['src']; ?>">
							<h5><?php echo $term->name; ?></h5>
						</div>
					</a>
				<?php } ?>
				</div>						
			</article> <?php // end article ?>
		<?php endwhile; endif; ?>
		</div>
</div> <?php // end #main ?>
<?php get_footer(); ?>