<?php
/**
 * Template Name: Pioneer Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

$pioneer = 1;

if ( have_posts() ) : 
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
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


			$args = array( 
					'post_type' => 'post',
					'posts_per_page' => 5,
					'paged' => $paged );
				$loop = new WP_Query( $args );
				/* Requests the posts via The Loop */
				while ( $loop->have_posts() ) : $loop->the_post(); 


				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
				?>
			

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
