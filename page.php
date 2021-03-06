<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); ?>
	<div class="page" >
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
get_footer();
