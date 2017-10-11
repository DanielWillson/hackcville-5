<?php
/**
 * Template Name: Company Page - Blank
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/company-nav.php';
include ($template_url);

?>
<div class="page company-hero" id="">
	<div class="white-bg">
		<div class="container">
			<?php
			while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>
<?php
// Get Company CTA
$template_url = get_template_directory() . '/template-parts/company-cta.php';
include ($template_url);
?>



<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
