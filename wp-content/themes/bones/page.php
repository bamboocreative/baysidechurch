<?php get_header(); ?>

						<div id="main" class="container" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link());
									?></p>


								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									<div class="container">
										Readymade deserunt vinyl fixie. Whatever Schlitz yr, narwhal selfies VHS synth. Photo booth messenger bag +1 mumblecore, disrupt Neutra next level pug labore <a href="http://google.com">Williamsburg vinyl</a> paleo irony magna. <strong>Stumptown</strong> non as<em>sumenda kitsch banjo</em>, quinoa butcher hashtag Godard chia ullamco culpa blog magna Vice. Bitters cray sartorial fap, master cleanse lomo cillum actually. Fashion axe single-origin coffee adipisicing vero. Vero shabby chic Cosby sweater nostrud, +1 bicycle rights cupidatat stumptown narwhal 8-bit in elit kogi locavore et.
									</div>
									
									<div class="container">
										<p></p>
										<a href="" class="btn btn-lg btn-success">Button</a>
										<form>
										<br>
										<input placeholder="Name" type="text"><br>
										<textarea placeholder="Your info..."></textarea><br>
										<input class="btn btn-lg btn-success" type="submit">
									</form>
									</div>
							</section> <?php // end article section ?>

								<footer class="article-footer">
									<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>

								</footer> <?php // end article footer ?>

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


<?php get_footer(); ?>
