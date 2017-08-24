<?php
/**
 * Template Name: Pioneer Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 


$template_url = get_template_directory() . '/template-parts/pioneer-home-nav.php';
include ($template_url);

?>

<div class="pioneer-home page pioneer" id="pioneer-check">
	<div class="white-bg">
		<div class="container">
				
			<?php

			while ( have_posts() ) : the_post();

					
				if (has_post_thumbnail( $post->ID ) ) {
					$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$f_i = $f_i[0]; 
				} ?>

				<div class="story flex">
					<div class="flex-1-of-2">
						<a class="image-link" href="<?php the_permalink(); ?>">
							<img src="<?php echo $f_i; ?>">
						</a>
					</div>
					<div class="flex-1-of-2">
						<a href="<?php the_permalink(); ?>">
							<h2><?php the_title() ?></h2>
						</a>
						<div class="excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="button">
							Read more &rarr;
						</a>
					</div>
				</div>

				<?php
				
				
				wp_reset_postdata();

			endwhile;
			the_posts_navigation();

			?>
				
			
		</div>
	</div>
</div>


	

<?php 
get_footer();
