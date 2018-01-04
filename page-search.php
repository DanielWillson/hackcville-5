<?php
/**
 * Template Name: Search Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$pioneer = 1;
?>

<div class="search-page lead">
	<div class="white-bg">
		<div class="container">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Search HackCville</h1>
			</header><!-- .page-header -->
			<div class="search-form">
				<?php get_search_form(); ?>
			</div>
			<?php

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
