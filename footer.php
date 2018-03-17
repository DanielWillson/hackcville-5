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
					<div class="flex-3-of-4 left">
						<?php if ($pioneer != 1) { ?>
							<figure>
								<img src="<?php echo get_template_directory_uri(); ?>/images/hackcville-logo.png" class="logo" >
							</figure>
						<?php } ?>
						<?php if ($pioneer == 1) { ?>
							<h2>About The Pioneer + HackCville</h2>
							<p>
								The Pioneer is the publication of <a href="http://hackcville.com" alt="HackCville">HackCville</a>. All of our producers are either current students or graduates of HackCville’s <a href="http://hackcville.com/programs" target="_blank" alt="HackCville Programs">media education programs</a>.
							</p>
							<p>
								Our producers develop skills in modern media production through publishing stories about creative, civic, and entrepreneurial innovators in the University of Virginia and greater Charlottesville community. <a href="https://hackcville.com/about-the-pioneer/">Learn more &rarr;</a>
							</p>
							<p>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">HackCville</a> develops the skills, networks, and entrepreneurial ability of talented U.Va. students. We accelerate our students’ ideas, projects, and startups through our experiential programs and tight-knit community. <a href="<?php echo esc_url( home_url( '/' ) ); ?>about">More about us &rarr;</a></p>
							</p>
						<?php } else { ?>
							<h2>About HackCville</h2>
							<p>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">HackCville</a> develops the skills, networks, and entrepreneurial ability of talented U.Va. students. We accelerate our students’ ideas, projects, and startups through our experiential programs and tight-knit community. 
							</p>
							<p>
								In turn, we provide talent to 50+ companies in Charlottesville’s growing tech and startup scene and empower top students to start companies of their own. Our home is our clubhouses near the <a href="http://virginia.edu" target="_blank">University of Virginia</a>, but our broader network of 1,200+ spans the globe. <a href="<?php echo esc_url( home_url( '/' ) ); ?>about">More about us &rarr;</a>
							</p>
						<?php } ?>
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
					<div class="flex-1-of-4 right">
						<h2>Founding Partners</h2>
							<div class="partner">
								<img src="<?php echo get_template_directory_uri(); ?>/images/qf.png">
							</div>
							<div class="partner">
								<img class="galant" src="<?php echo get_template_directory_uri(); ?>/images/galant.png">
							</div>
							<div class="partner">
								<img class="dsi" src="<?php echo get_template_directory_uri(); ?>/images/dsi-simple.png">
							</div>
						<!-- <h2>Explore</h2> -->
						<?php 
						//wp_nav_menu( array(
							//'theme_location' => 'menu-1',
							//'menu_id'        => 'primary-menu',
						//) );
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
					© 2018 HackCville. All rights reserved. -- HackCville is a 501(c)(3) non-profit. --  Website designed & built in-house. -- <a href="<?php echo get_home_url(); ?>/wp-admin">Staff Login</a>
				</span>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ($pioneer == 1) { ?>
	<!-- START Parse.ly Include: Standard -->
	<div id="parsely-root" style="display: none">
	  <span id="parsely-cfg" data-parsely-site="thepioneer.co"></span>
	</div>
	<script>
	    (function(s, p, d) {
	      var h=d.location.protocol, i=p+"-"+s,
	          e=d.getElementById(i), r=d.getElementById(p+"-root"),
	          u=h==="https:"?"d1z2jf7jlzjs58.cloudfront.net"
	          :"static."+p+".com";
	      if (e) return;
	      e = d.createElement(s); e.id = i; e.async = true;
	      e.src = h+"//"+u+"/p.js"; r.appendChild(e);
	    })("script", "parsely", document);
	</script>
	<!-- END Parse.ly Include: Standard -->

<?php }
wp_footer(); ?>

</body>
</html>
