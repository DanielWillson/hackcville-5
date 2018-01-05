<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); 

// Get Pioneer header
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$currentID = -1;
$pioneer = 1;
?>

<div class="single-article" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<?php while ( have_posts() ) : the_post(); 
					$currentID = get_the_ID();

					if (has_post_thumbnail( $post->ID ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0];
					endif; ?>
				<header class="entry-header">
						
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="excerpt"><?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?></div>
						<div class="entry-meta">
							<span class="author">by <?php 
								//coauthors( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true );
								coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true );
										?>
							 - </span>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
						</div>
						
					</header>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<img src="<?php echo $image; ?>">
					<div class="entry-content">
						<?php
							the_content( sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hackcville-5-0' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							) );

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hackcville-5-0' ),
								'after'  => '</div>',
							) );
						?>
					</div>

					<footer class="entry-footer">
						<div class="social-buttons-container">
							<?php
							// Import Social Buttons
							$template_url = get_template_directory() . '/template-parts/share-this-page.php';
							include ($template_url);
							?>
						</div>
						<?php if (get_field("cta_1") || (get_field("cta_2"))) { ?>
							<div class="ctas">
								<?php if (get_field("cta_1")) { ?>
								<div class="cta flex">
									<div class="flex-2-of-5 image" style="background-image: url('<?php echo get_field("cta_i1"); ?>');">
									</div>
									<div class="flex-3-of-5 link">
										<h3>
											<?php echo get_field("cta_h1"); ?>
										</h3>
										<h4><a href="<?php echo get_field("cta_l1"); ?>">
											<?php echo get_field("cta_lt1"); ?> &rarr;
										</a></h4>
									</div>
								</div>
								<?php } if (get_field("cta_2")) { ?>
								<div class="cta flex">
									<div class="flex-2-of-5 image" style="background-image: url('<?php echo get_field("cta_i2"); ?>');">
									</div>
									<div class="flex-3-of-5 link">
										<h3>
											<?php echo get_field("cta_h2"); ?>
										</h3>
										<h4><a href="<?php echo get_field("cta_l2"); ?>">
											<?php echo get_field("cta_lt2"); ?> &rarr;
										</a></h4>
									</div>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
					</footer>
				</article>
				<div class="sidebar">
					<div class="recent-stories">
						<a href="" class="heading button not-active">
							<h4>Recent Stories</h4>
						</a>
						<?php 
						$the_query2 = new WP_Query(array('post_type' => 'post', 'posts_per_page'=> '6'));
						if ( $the_query2->have_posts() ) {
							while ( $the_query2->have_posts() ) { 
								$the_query2->the_post(); 
								$post_ID = get_the_ID();
								if ($post_ID != $currentID) {
									if (has_post_thumbnail( $post->ID ) ) {
										$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
										$f_i = $f_i[0]; 
									} ?>

									<div class="recent-story">
										<a class="image-link" href="<?php the_permalink(); ?>">
											<div class="image" style="background-image: url('<?php echo $f_i; ?>');">
											</div>
											<!-- <img src="<?php echo $f_i; ?>"> -->
										</a>

										

										<a href="<?php the_permalink(); ?>">
											<?php the_title() ?>
										</a>
									</div>
								<?php }
							}
						}
						?>
					</div>
					<div class="about">
						<a href="" class="heading button not-active">
							<h4>About The Pioneer</h4>
						</a>
						<p>You're reading The Pioneer, the publication of <a href="<?php get_home_url(); ?>">HackCville</a>. All of our producers are either current students or graduates of HackCville’s <a href="<?php get_home_url(); ?>/programs">media education programs</a>.</p>
						<p>Our producers develop skills in modern media production through publishing stories about creative, civic, and entrepreneurial innovators in the University of Virginia and greater Charlottesville community.</a>
					</div>
					<div class="subscribe">
						<a href="" class="heading button not-active">
							<h4>Don't Miss Stories</h4>
						</a>
						<p>Join 4,000+ others on our newsletter. We email about once a week and never spam.</p>
						<!-- Begin MailChimp Signup Form -->
						<div id="mc_embed_signup">
						<form action="//hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&amp;id=97161904f1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						    <div id="mc_embed_signup_scroll">
								<input type="email" placeholder="you@youremail.com" value="" name="EMAIL" class="required email" id="mce-EMAIL">
								<div class="clear submit-holder">
						    		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="submit">
					    		</div>
					    		<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    	<div style="position: absolute; left: -5000px;" aria-hidden="true">
						    		<input type="text" name="b_dae9a7242f836507908a2f2d6_97161904f1" tabindex="-1" value="">
					    		</div>
						    </div>
						</form>
					</div>
				</div>
			</div>
			<?php
				$categories = get_the_category();
				$disallowed_categories = array("Feature", "Sponsored", "Photo Essays", "Videos", "Articles", "Uncategorized");
				$catNames = array();

				foreach ($categories as $cat) {
				    $catNames[] = $cat->name;
				}

				$goodCategories = array_diff($catNames, $disallowed_categories);

				$current_category = "";
				$current_category_headline = "";

				if ( ! empty( $goodCategories ) ) {
				    $current_category = array_rand($goodCategories);   
				    $current_category = $goodCategories[$current_category];
					$current_category_headline = 'Related Stories';
				}
				else {
					$current_category_headline = 'Recent Stories';
				}

				$template_url = get_template_directory();
				$template_url .= '/template-parts/cat-hero.php';

				include ($template_url); ?>
				<?php

			endwhile; ?>
		</div>
	</div>
</div>

<?php
// Get Pioneer footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
