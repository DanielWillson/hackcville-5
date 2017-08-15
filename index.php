<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); ?>

<!-- <div class="blue-divider"></div> -->
<div class="home-hero-1 flex">
	<div class="flex-2-of-3 image-bg split-pic" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/peiching.jpg');">
	</div>
	<div class="blue-bg flex-1-of-3 split-text">
		<div class="split-overlay">
			<h2>"HackCville is a place like no other. I'm surrounded by a passionate, entrepreneurial community and I'm learning practical skills to help me bring my ideas to life."</h2>
			<h5>- Rachel Malinowski, HackCville Member</h5>
			<h3>HackCville trains students like you in high-demand skills, accelerates your ideas, and connects you to jobs, opportunities, and a community you’ll love.</h3>
			<a class="button shorter-button" href="#" onclick="getToKnowUs()">
				Get to Know Us &darr;
			</a>
			<a class="button shorter-button" href="<?php echo esc_url( home_url( '/' ) ); ?>/programs">
				Fall Programs &rarr;
			</a>
		</div>
	</div>
</div>
<div class="involvement-options" id="get-to-know-us">
	<div class="hc-blue-bg">
		<div class="container">
			<h1>Welcome to HackCville.</h1>
			<h3>Here's how you can get involved.</h3>
			<div class="flex">
				<div class="flex-1-of-4">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/images/collaboration.png">
					</figure>
					<h2>Public Events</h2>
					<p>Get an introduction to everything from artifical intelligence to video production to entrepreneurship. Our events are free and open to all.</p>
					<a class="button shorter-button">
						Get Details &rarr;
					</a>
				</div>
				<div class="flex-1-of-4">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/images/airplane.png">
					</figure>
					<h2>Startup Trips</h2>
					<p>Tour dynamic startup offices and meet with hiring, young alumni in places like San Francisco, New York, Richmond, Washington DC, and more.</p>
					<a class="button shorter-button">
						Get Details &rarr;
					</a>
				</div>
				<div class="flex-1-of-4">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/images/whiteboard.png">
					</figure>
					<h2>Semester Programs</h2>
					<p>Learn the ins and outs of data science, marketing, social entrepreneurship, and more. Join our tight-knit community and complete real-world, hands-on projects.</p>
					<a class="button shorter-button">
						Get Details &rarr;
					</a>
				</div>
				<div class="flex-1-of-4">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/images/buildings.png">
					</figure>
					<h2>Internships + Jobs</h2>
					<p>Get to paid to learn in an immersive bootcamp and get matched with a guaranteed internship this summer. Or, get help finding a full-time job from our hiring partners.</p>
					<a class="button shorter-button">
						Get Details &rarr;
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="partners-home">
	<div class="white-bg">
		<div class="container">
			<h1>Our Sponsors + Hiring Partners</h1>
			<p>This is just a fraction of the dozens of companies, organizations, and UVA departments we work with. <br><a href="<?php echo esc_url( home_url( '/' ) ); ?>/partners">View all of our partners and sponsors &rarr;</a></p>
			<div class="flex holder">
				<div class='flex-1-of-2 flex'>
					<?php 

					$partner_count = 0;
					$presenting = array();
					$programming_community = array();
					
					$the_query2 = new WP_Query(array('post_type' => 'partner', 'orderby' => 'rand', 'posts_per_page'=> '20'));
					if ( $the_query2->have_posts() ) {
						while ( $the_query2->have_posts() ) { 
							$the_query2->the_post();
							
							$id = get_the_ID();
							$types = get_field("type");

							if ($types && ($partner_count <= 12)) {
								foreach ($types as $type) {
									if (!strcmp("Presenting Partner", $type)) {
										array_push($presenting, $id);
										$partner_count++; 
									}
									else if (!strcmp("Programming Partner", $type) || !strcmp("Community Partner", $type)) {
										array_push($programming_community, $id);
										$partner_count++; 
									}
								}
							}
						}
						wp_reset_postdata();
					} 
					foreach ($presenting as $partner) { ?>
						<div class='flex-1-of-3 partner-logo'>
							<img src="<?php echo get_field("logo", $partner); ?>">
						</div>
					<?php } 
					if ($partner_count > 0) {
						foreach ($programming_community as $partner) { 
							if ($partner_count > 0) { ?>
								<div class='flex-1-of-3 partner-logo'>
									<img src="<?php echo get_field("logo", $partner); ?>">
								</div>
					<?php } } } ?>
				</div>
				<div class="flex-1-of-2">
					<h3>"HackCville is an incredible institution", a "unicorn", and "like nothing else at any university we work with."</h3>
					<p class="byline">- Brendan Collins, College Recruiter at Google</p>
					<h3>"I literally completely owe you guys for getting me my dream job."</h3>
					<p class="byline">- Peter Simonsen, HackCville Alumnus, Data Analyst at Dataminr in NYC</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="our-community flex">
	<div class="flex-1-of-2 split-pic image-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/launch2.jpg');">
	</div>
	<div class="blue-bg flex-1-of-2 split-text">
		<div class="split-overlay">
			<h1>Our Community</h1>
			<h3>Talented, inspiring, empowering, and inclusive - ask any HackCville member and you’ll hear just how incredible our community is. We're 300+ strong.</h3>
			<h3>We have two clubhouses on the UVA Corner that we call home. Our members get 24/7 access to these fun and functional spaces on Elliewood Avenue. Members also get exclusive events, job opportunities, and more.</h3>
			<h3>Anyone, regardless of year or major, can apply to join HackCville. We're mostly UVA students, but also some alumni and Cville community members, too. Applications for our fall and summer programs open this August.</h3>
			<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>/programs">
				How to Apply &rarr;
			</a>
		</div>
	</div>
</div>
<div class="for-companies">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-1">
					<h1>Looking to hire a superstar?</h1>
				</div>
				<div class="flex-3-of-5">
					<p>We vet and train top talent in software development, design, marketing, video production, and more. We have freelance, part-time, and full-time hires available for companies of any size.</p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>/companies" class="button">Get details &rarr; </a>
				</div>
				<div class="flex-2-of-5">
					<h3>"As we seek to build our creative economy, HackCville will play a crucial role in training and keeping talent here in Charlottesville."</h3>
					<p class="byline">- Mike Signer, Mayor of Charlottesville</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="testimonials-home table-list">
	<div class="blue-bg">
		<div class="container">
			<h1>Hear what our members have to say.</h1>
			<div class="flex">
				<?php
				$the_query = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand', 'posts_per_page'=> '5'));
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) { $the_query->the_post();

						$name = get_the_title(); // name of testimonial giver
						$id = get_the_ID(); // ID of current testimonial

						$t_categories = get_field("testimonial_category");
						if ($t_categories) {
							foreach($t_categories as $t_category) {
								if (
									strcmp($t_category, "Program") &&
									strcmp($t_category, "Trip") &&
									strcmp($t_category, "Launch") &&
									strcmp($t_category, "Talent") ) {
									
									$t_content = get_field("testimonial", $id);
									$t_headshot = get_field("headshot", $id);
									?>

									<figure class="image-pullquote flex-1-of-2 list-heading">
										<img src="<?php echo $t_headshot; ?>">
									</figure>
									<div class="flex-1-of-2 list-info">
										<h3>"<?php echo $t_content; ?>"</h3>
										<p class="byline">- <?php echo $name; ?>, HackCville Member</p>
									</div><?php 
								
								} else { /*unrelated testimonial */ }
							}
						}
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="cta">
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>/programs">
					Our Fall Programs &rarr;
				</a>
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>/launch">
					Our Summer Programs &rarr;
				</a>
			</div>
		</div>
	</div>
</div>


<!-- 
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
 -->
		<!-- <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			//the_posts_navigation();

		else :

			//get_template_part( 'template-parts/content', 'none' );

		endif; ?> -->

	<!-- 	</main><!-- #main -->
	</div><!-- #primary -->
 
<?php
// get_sidebar();
get_footer();
