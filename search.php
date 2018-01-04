<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HackCville_5.0
 */

get_header(); ?>

<div class="search-page">
	<div class="white-bg">
		<div class="container">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'hackcville-5-0' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->
			<div class="search-form">
				<?php get_search_form(); ?>
			</div>
			<?php
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			echo "<hr>";
			the_posts_navigation();

		else :
			?>
			<!-- <div class="search-form">
				<?php //get_search_form(); ?>
			</div> -->
			<?php
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>
	</div>
</div>

<?php
get_footer();
