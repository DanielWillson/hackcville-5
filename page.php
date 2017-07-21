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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post(); ?>

			<hr>
				<div class="style-guide">
					<div class="text-samples">
						<div class="container">
							<h1>Style Guide</h1>
							<h1>This is heading 1.</h1>
							<h2>This is heading 2.</h2>
							<h3>This is heading 3.</h3>
							<h4>This is heading 4.</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="white-bg">
							<div class="container">
								<h1>Buttons on a white background</h1>
								<a class="button" href="#">Subscribe to Our Newsletter</a>
								<a class="button" href="#">Subscribe to Our Newsletter</a>
							</div>
						</div>
						<div class="blue-bg">
							<div class="container">
								<h1>Buttons on a blue background</h1>
								<a class="button" href="#">Subscribe to Our Newsletter</a>
								<a class="button" href="#">Subscribe to Our Newsletter</a>
							</div>
						</div>
					</div>
					<div class="image-pullquotes">
						<div class="white-bg">
							<div class="container">
								<h1>Image pullquotes on a white background</h1>
								<figure class="image-pullquote left ex1">
							   		<img src="http://hackcville.com/summer/images/learn.jpg" />
							    	<figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							    	consequat.</figcaption>
								</figure>
								<div class="text-example">
									<h2>This is some sample text</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
								<div class="text-example">
									<h2>This is some sample text</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
								<figure class="image-pullquote right ex1">
							   		<img src="http://hackcville.com/summer/images/whiteboard.jpg" />
							    	<figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							    	consequat.</figcaption>
								</figure>
							</div>
						</div>
						<div class="blue-bg">
							<div class="container">
								<h1>Image pullquotes on a blue background</h1>
								<figure class="image-pullquote left ex1">
							   		<img src="http://hackcville.com/summer/images/learn.jpg" />
							    	<figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							    	consequat.</figcaption>
								</figure>
								<div class="text-example">
									<h2>This is some sample text</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
								<div class="text-example">
									<h2>This is some sample text</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
								<figure class="image-pullquote right ex1">
							   		<img src="http://hackcville.com/summer/images/whiteboard.jpg" />
							    	<figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							    	consequat.</figcaption>
								</figure>
							</div>
						</div>

					</div>

				</div>
				<hr>


				<?php
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
