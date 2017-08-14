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
						<div class="subscribe">
							<h3>Get exclusive news about upcoming programs and community events.</h3>
							
							<!-- Begin MailChimp Signup Form -->
							<div id="mc_embed_signup">
							<form action="//hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&amp;id=97161904f1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							    <div id="mc_embed_signup_scroll">
									<input type="email" placeholder="you@youremail.com" value="" name="EMAIL" class="required email" id="mce-EMAIL">
									<div class="clear submit-holder">
							    		<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="submit">
						    		</div>
						    		<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							    	<div style="position: absolute; left: -5000px;" aria-hidden="true">
							    		<input type="text" name="b_dae9a7242f836507908a2f2d6_97161904f1" tabindex="-1" value="">
						    		</div>
							    </div>
							</form>
							</div>

							<!--End mc_embed_signup-->
							
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
						<div class="social-icons">

						</div>
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
