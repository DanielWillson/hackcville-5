<?php
/**
 * Template Name: Launch Fellowship Curriculum
 *The template for displaying Launch Fellowship Curriculum
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

// Import Launch Fellowship Nav
get_header(); 

$template_url = get_template_directory() . '/template-parts/launch-Fellowship-nav.php';
include ($template_url);

$af = 1;

$launch_tracks = array();
$launch_track_query = new WP_Query(array('post_type' => 'launch-track'));
?>

<div class="page">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-3">
					<h1>Launuch Curriculum</h1>
					<h3>Click on one of the tracks to learn more about what's covered during Launch Fellowship.</h3>
				</div>
				<div class="flex-2-of-3 flex">
				<?php

				if ( $launch_track_query->have_posts() ) {
					while ( $launch_track_query->have_posts() ) { $launch_track_query->the_post();
						
						$id = get_the_ID(); // ID of current testimonial
						if ($af == 1) { // Fellowship
							if (has_term( "Fellowship", "launch_track_type", $id )) {
								array_push($launch_tracks, $id);
							}
						}
					}
					wp_reset_postdata();
				}

				if ( $launch_tracks ) {
					foreach ($launch_tracks as $id) { ?>
						<div class="flex-1-of-2">
							<a class="button" href="<?php echo get_the_permalink($id); ?>?type=<?php echo $af; ?>"><?php echo get_the_title($id); ?> Track</a>
						</div>
					<?php }
				} 

				?>
				</div>
			</div>
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
