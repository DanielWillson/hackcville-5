<?php
/**
 * Template Name: Company Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$pioneer = 1;
?>
	<div class="page" id="pioneer-check">
		<div class="white-bg">
			<div class="container">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<?php
				get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>
			</div>
		</div>
	</div>


<?php
// Get Pioneer footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
