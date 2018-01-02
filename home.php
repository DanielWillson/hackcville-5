<?php
/**
 * Template Name: Pioneer Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 


// $template_url = get_template_directory() . '/template-parts/pioneer-home-nav.php';
// include ($template_url);
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$pioneer = 1;
?>

<div class="pioneer-home page pioneer top-stories-container" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<div class="pioneer-intro">
				<h2>Top Stories</h2>
			</div>
			<div class="flex top-stories">
				<?php
				$current_category = "Top Stories";
				$args = array( 
					'post_type' => 'post',
					'posts_per_page' => 3,
					'category_name' => $current_category );
				$loop = new WP_Query( $args );
				/* Requests the posts via The Loop */
				while ( $loop->have_posts() ) : $loop->the_post(); 
					if (has_post_thumbnail( $post->ID ) ) {
						$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$f_i = $f_i[0]; 
					} ?>
					<div class="story flex-1-of-3">
						<div class="picture">
							<a class="image-link" href="<?php the_permalink(); ?>">
								<div class="featured-image" style="background-image: url('<?php echo $f_i; ?>');">
								</div>
							</a>
						</div>
						<div class="content">
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
									coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
									?>
								</span>
							</div>
						</div>
					</div>
					<?php wp_reset_postdata();
				endwhile; ?>
			</div>
		</div>
	</div>
</div>
<div class="first-category">
	<div class="white-bg">
		<div class="container">
			<?php 
			// Sets up $current_category and $current_category_headline for the category hero (cat-hero)
			// $current_category is the category passed to the hero
			// $current_category_headline is the text passed to the headline seen on the site
			$current_category = '';
			$current_category_headline = 'Technology Stories';
			$current_category = 'Technology';

			$template_url = get_template_directory();
			$template_url .= '/template-parts/cat-hero.php';
			include ($template_url); ?>
		</div>
	</div>
</div>
<div class="about-pioneer-teaser">
	<div class="hc-blue-bg" style="background-color: #1F435D;">
		<div class="container">
			<h3>You're reading <i>The Pioneer</i>, the publication of HackCville.</h3>
			<a href="<?php echo get_home_url(); ?>/about-the-pioneer" class="button">
				<h4>Learn more &rarr;</h4>
			</a>
		</div>
	</div>
</div>
<div class="pioneer-category page pioneer" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<?php

			// Resets the 2 category variables and imports again to create the technology section
			$current_category_headline = 'Community Stories';
			$current_category = 'Community';
			include ($template_url);

			?>
		</div>
	</div>
</div>

<?php

// Imports the newsletter subscribe section
	$newsletter = get_template_directory() . '/template-parts/newsletter-subscribe.php';
	include $newsletter;

?>

<div class="pioneer-category page pioneer" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<?php
			// Resets the 2 category variables and imports again to create the art section
			$current_category_headline = 'Art and Design Stories';
			$current_category = 'Art';
			include ($template_url);

			// Resets the 2 category variables and imports again to create the music section
			$current_category_headline = 'Pioneer Voices';
			$current_category = 'Voices';
			include ($template_url);

			// Resets the 2 category variables and imports again to create the HackCville section
			$current_category_headline = 'HackCville Stories';
			$current_category = 'HackCville';
			include ($template_url);


				?>			
		</div>
	</div>
</div>


	

<?php 
// Get Pioneer footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
