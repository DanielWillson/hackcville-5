<?php
/**
 * Template Name: Launch Fellowship General Page
 *The template for displaying Launch Fellowship General Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

// Import Launch Fellowship Nav
get_header(); 

$template_url = get_template_directory() . '/template-parts/launch-fellowship-nav.php';
include ($template_url);

$af = 1;

?>
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
	// Import Launch More
	$template_url = get_template_directory() . '/template-parts/launch-more.php';
	include ($template_url);
?>

<?php
get_footer();
