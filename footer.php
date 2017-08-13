<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HackCville_5.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="hc-blue-bg">
			<div class="container">
				<div class="flex">
					<div class="flex-3-of-4">
						<figure>
							<img src="<?php echo get_template_directory_uri(); ?>/images/hackcville-logo.png" class="logo" >
						</figure>
						<h2>About HackCville</h2>
						<p>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">HackCville</a> is a platform for experiential education and career development. We train students in high-demand skills, accelerate their ideas, and connect them to jobs, opportunities, and a tight-knit community.
						</p>
						<p>
							In turn, we provide talent to Charlottesville’s growing tech and startup scene. Our home is our clubhouses near the <a href="http://virginia.edu" target="_blank">University of Virginia</a>, but our broader network of 1,200+ spans the globe. <a href="<?php echo esc_url( home_url( '/' ) ); ?>/about">More about us &rarr;</a>
						</p>
						<div class="social-icons">

						</div>
						<div class="subscribe">

						</div>
					</div>
					<div class="flex-1-of-4">
						<h2>Explore</h2>
						<?php 
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="sub-footer">
			<div class="container">
				<span>
					© 2017 HackCville. All rights reserved. -- HackCville is a 501(c)(3) non-profit. --  Website designed & built in-house.
				</span>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
