<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

		while ( have_posts() ) : the_post();


			if (is_singular( 'trip' )) {

				echo "This is a trip page.<br>";
				$trip_title = get_the_title();
				echo "<h1>" . $trip_title . "</h1><br>";

				$authors = get_users();

				echo "<h2>The Trip Team:</h2>";
				foreach ($authors as $author) {
					$user_id = $author->data->ID;
					$trips = get_field('trip_team', 'user_'.$user_id);

					if($trips) {
						
						foreach($trips as $trip) {
							$user_trip_title = get_the_title($trip);
							
							if (!strcmp($user_trip_title, $trip_title)) {
								echo "<h3>" . $author->data->display_name . "</h3>";
							}
							else {
								// This user isn't involved in planning this trip
							}
						}
					}
				}

				echo "<br>____________________________________<br>";
			}


			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
