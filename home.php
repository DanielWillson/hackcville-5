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

<div class="pioneer-home page pioneer" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2>Recent Stories</h2>
			</div>
			<div class="flex">
				<?php

			
				$args = array( 
					'post_type' => 'post',
					'posts_per_page' => 4 );
				$loop = new WP_Query( $args );
				/* Requests the posts via The Loop */
				while ( $loop->have_posts() ) : $loop->the_post(); 

					
				if (has_post_thumbnail( $post->ID ) ) {
					$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$f_i = $f_i[0]; 
				} ?>

				<div class="story flex-1-of-2 flex">
					<div class="flex-1-of-2">
						<a class="image-link" href="<?php the_permalink(); ?>">
							<img src="<?php echo $f_i; ?>">
						</a>
					</div>
					<div class="flex-1-of-2">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title() ?></h3>
						</a>
						<div class="excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
						<!-- <a href="<?php the_permalink(); ?>" class="">
							Read more &rarr;
						</a> -->
					</div>
				</div>

				<?php
				
				
				wp_reset_postdata();

			endwhile;
			?>

			<?php
			//the_posts_navigation();

			?>

			</div>
<?php 
// Sets up $current_category and $current_category_headline for the category hero (cat-hero)
// $current_category is the category passed to the hero
// $current_category_headline is the text passed to the headline seen on the site
$current_category = '';
$current_category_headline = 'Entrepreneurship Stories';
$current_category = 'Entrepreneurship';

$template_url = get_template_directory();
$template_url .= '/template-parts/cat-hero.php';

// Works like the Starkers Utilities function and includes the cat-hero in this doc.
// Must use this include() function instead of Starkers so that the variable passing can work
include ($template_url);

// Resets the 2 category variables and imports again to create the technology section
$current_category_headline = 'Technology Stories';
$current_category = 'Technology';
include ($template_url);

// Imports the newsletter subscribe section
// ADD IN NEWSLETTER

// Resets the 2 category variables and imports again to create the art section
$current_category_headline = 'Art and Design Stories';
$current_category = 'Art';
include ($template_url);

// Resets the 2 category variables and imports again to create the music section
$current_category_headline = 'Music Stories';
$current_category = 'Music';
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
get_footer();
