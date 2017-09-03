<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

$pioneer = -1;

?>

		<?php




		if ( have_posts() ) : 



			if (is_author()) {

				echo "This is an author page.<br>";
				$user_id = get_the_author_meta('ID');
				echo get_field('title', 'user_'.$user_id);

				$post_objects = get_field('trip_team', 'user_'.$user_id);
				if($post_objects) {
					echo '<ul>';

					foreach($post_objects as $post) {
						setup_postdata($post);
						echo '<li>' . the_title() . '</li>';
					}

					echo '</ul>';
					wp_reset_postdata();
				}
			}


			

			



			?>

<div class="pioneer-archive">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
						

			<?php

			

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			?>
			<h3 class="previous-next"><?php posts_nav_link(' | ','&larr; Previous Page','Next Page &rarr;'); ?></h3>
			<?php
			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			</div>
		</div>
	</div>
</div>



<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
