<?php
/**
 * Template Name: Pioneer Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$pioneer = 1;

if ( have_posts() ) : 
?>
<div class="pioneer-archive" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<header class="page-header">
				<h2>All Stories</h2>
			</header>
			<div class="flex">
				<div class="left-list">
					<div class="flex-4-of-5 flex">
					<?php
					/* Start the Loop */
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array( 
							'post_type' => 'post',
							'posts_per_page' => 10,
							'paged' => $paged );
					$loop = new WP_Query( $args );
					/* Requests the posts via The Loop */
					while ( $loop->have_posts() ) : $loop->the_post(); 
						//get_template_part( 'template-parts/content', get_post_format() );
						if (has_post_thumbnail( $post->ID ) ) {
							$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							$f_i = $f_i[0]; 
						} ?>
						<div class="story flex">
							<div class="image flex-1-of-4" style="background-image: url('<?php echo $f_i; ?>')">
							</div>
							<div class="content flex-3-of-4">
								<h3>
									<a href="<?php the_permalink(); ?>">
										<?php the_title() ?>		
									</a>
								</h3>
								<div class="excerpt">
									<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
								</div>
								<div class="hero-article-date-author">
									<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - by <span class="author"><?php 
										coauthors( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
										?>
									</span>
								</div>
							</div>
						</div>
						

						<?php
						// wp_reset_postdata();
						endwhile;
						?>

						<div class="pagination-links">
							<div class="flex">
							<?php
							$big = 999999999; // need an unlikely integer
							echo "Page: " . paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $loop->max_num_pages
							) );

							?>
							</div>
						</div>

						<?php endif; ?>
					</div>
				</div>
				<div class="sidebar">
					<div class="recent-stories">
						<a href="" class="heading button not-active">
							<h4>Recent Stories</h4>
						</a>
						<?php 
						$the_query2 = new WP_Query(array('post_type' => 'post', 'posts_per_page'=> '3'));
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
											<img src="<?php echo $f_i; ?>">
										</a>
										<a href="<?php the_permalink(); ?>">
											<?php the_title() ?>
										</a>
									</div>
								<?php }
							wp_reset_postdata();
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
			

		</div>
	</div>
</div>

<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
