<?php get_header(); ?>
			<div id="content" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
					<div class="container">
						<header class="article-header">
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							<p class="byline vcard"><?php
											printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
							?>
							</p>
						</header> <?php // end article header ?>
					</div>
					<div class="container">
						<section class="entry-content clearfix">
							<?php the_content(); ?>
						</section> <?php // end article section ?>
					</div>
					<footer class="article-footer">
						<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>
					</footer> <?php // end article footer ?>
								<?php // comments_template(); // uncomment if you want to use them ?>
				</article> <?php // end article ?>
				<?php endwhile; ?>
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
