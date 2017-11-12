<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

if ( is_tax('launch_track_type')) {
	get_header(); 

	$af = -1;

	if(is_tax( "launch_track_type", "Academy" )) {
		$af = 0; // Academy
		$template_url = get_template_directory() . '/template-parts/launch-academy-nav.php';
		include ($template_url);
	}
	else if(is_tax( "launch_track_type", "Fellowship" )) {
		$af = 1; // Fellowship
		$template_url = get_template_directory() . '/template-parts/launch-fellowship-nav.php';
		include ($template_url);
	} 

	$track_IDs = array();
	?>

	<header class="launch-category-hero">
		<div class="image-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/fiona.jpg);">
			<div class="filter"></div>
			<div class="container">
				<div class="intro">
					<?php if ($af == 0) { ?>
						<h2>Get paid to learn coding, web design, marketing, or data science this summer.</h2>
						<p>Become a software engineer, web designer, marketer, or data scientist and experience an immersive summer internship at a top Charlottesville startup or tech company. Best of all, we'll pay you $1000 to do it, all in 12 weeks this summer.</p>
						<p>Launch Academy runs May 21 - August 10.</p>
					<?php } elseif ($af == 1) { ?>
						<h2>Get the skills and network you need to get the job you want.</h2>
						<p>We'll train you to become a UX/web designer, marketer, or data scientist in just 6 weeks. And we'll connect you to our network of company partners that are hungry for people talented in these skills.</p>
						<p>Launch Fellowship runs May 21 - June 29.</p>
					<?php } ?>
	 				<a class="button shorter-button" href="#" onclick="launchDetails()">
						Learn more &darr;
					</a>
					<?php if ($af == 0) { ?>
						<a class="button shorter-button" href="<?php echo esc_url( home_url( '/' ) ). "launch-academy-application-process"; ?>">
							Apply Here
						</a>
					<?php } elseif ($af == 1) { ?>
						<a class="button shorter-button" href="<?php echo esc_url( home_url( '/' ) ). "launch-fellowship-application-process"; ?>">
							Apply Here
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
	<div class="launch-details" id="launch-details">
		<div class="white-bg">
			<div class="container">
				<div class="flex">
					<figure class="flex-1-of-2 image-pullquote left">
						<img src="<?php echo get_template_directory_uri(); ?>/images/DataScience2.jpg">
						<figcaption>
							<h3>95%</h3><p>of 2017 Launch participants would recommend the program to a friend</p>
						</figcaption>
					</figure>
					<div class="flex-1-of-2">
						<h3>1. Learn in-demand, critical skills.</h3>
						<?php if ($af == 0) { ?>
	                    	<p>You'll spend the first 6 weeks of the summer becoming expert in one of the following tracks. (Click through to read more about each one.)
	                    <?php } elseif ($af == 1) { ?>
	                    	<p>You'll spend 6 weeks of the summer becoming expert in one of the following tracks. (Click through to read more about each one.)</p>
	                    <?php } ?>
	                    	<ul>
	                    		<?php
								if ( have_posts() ) : 
									while ( have_posts() ) : the_post(); ?>
										<li><a href="<?php echo get_the_permalink(); ?>?type=<?php echo $af; ?>"><?php echo get_the_title(); ?> Track</a></li>
										<?php 
										array_push($track_IDs, get_the_ID());
									endwhile;
								endif;
								?>
	                    	</ul></p>
	                    <p>No previous experience is required. You'll learn these skills through fun yet intense interactive projects with guidance from our expert instructors.</p>
					</div>
					<div class="flex-1-of-2">
						<?php if ($af == 0) { // Academy ?>
							<h3>2. Put your skills into practice at a guaranteed internship.</h3>
		                   	<p>For the second half of the summer we'll match you with a local startup or tech company internship. We've partnered with top companies across Charlottesville to give you hands-on experience and real-world projects.</p>
		                    <p>You'll walk away with new skills and new experience to launch you toward whatever's next. Past Launch students have:</p>
		                    <ul>
		                    	<li>Continued to work part-time for their company at $12+/hour</li>
		                    	<li>Joined the company full-time after graduation</li>
		                    	<li>Started freelancing, charging $25-50/hour</li>
		                    	<li>Taught new HackCville programs</li>
		                    </ul>
		                <?php } elseif ($af == 1) { // Fellowship ?>
		                	<h3>2. Get help finding a job you'll love.</h3>
		                   	<p>We'll train you in networking and communication skills and work with you to tweak your pitch to employers. We'll then help connect you to our network of companies across the country that are hungry to hire people talented in marketing, data science, and web development.</p>
		                    <p>100% of Launch 2016 Fellows had full-time job offers within 6 weeks of the program's completion.</p>
	                    <?php } ?>
					</div>
					<figure class="flex-1-of-2 image-pullquote right">
						<img src="<?php echo get_template_directory_uri(); ?>/images/launch3.jpg">
						<figcaption>
							<p>"I would, no question, not be where I am today in terms of my marketable skills and experience without Launch. I loved my instructors, colleagues, and getting involved in such a creative community."</p>
							<p class="byline">Caroline Kinsella<br>Launch Summer 2017 Participant</p>
						</figcaption>
					</figure>
					<figure class="flex-2-of-3 image-pullquote left">
						<?php if ($af == 0) { // Academy ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/fun.jpg">
						<?php } elseif ($af == 1) { // Fellowship ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/peiching.jpg">
						<?php } ?>
					</figure>
					<div class="flex-1-of-3">
						<?php if ($af == 0) { // Academy ?>
							<h3>3. Enjoy a fun Charlottesville summer.</h3>
		                    <p>You'll have plenty of time to enjoy the increidble live music scene, beautiful hikes in the Blue Ridge Mountains, winery and brewery tours, excellent food scene, and much, much more.</p> 
		                <?php } elseif ($af == 1) { // Fellowship ?>
		                	<h3>3. We offer a flexible payment model.</h3>
		                	<p>We want to take away the risk of learning new skills and finding a job you'll love. That's why our program has two payment models - one where you pay up front, and one where you only pay once you get a job. Our aim is to make this program accessible to all.</p>
		                <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		// Import Single Random Testimonial
		$t_category_import = "Launch";
		$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
		include ($template_url);
	?>
	<div class="partners-launch">
		<div class="white-bg">
			<div class="container">
				<div class="intro">
					<h1>Our Hiring Partners</h1>
					<h3>Here are the companies that hired interns or full-time fellows through Launch in Summer 2017.</h3>
				</div>
				<div class="flex">
					<?php 

					$partners_2016 = array();

					foreach ($track_IDs as $t) {
						// get all partners of that track
						$partners = get_field("2016_partners", $t);
						if ($partners) {
							foreach ($partners as $partner) {
								$id = $partner->ID;
								if(!in_array($id, $partners_2016)){
									array_push($partners_2016, $id);
								}
							}
						}
					}

					foreach ($partners_2016 as $p2) { ?>
						<figure class="flex-1-of-5">
							<img src="<?php echo get_field('logo', $p2); ?>">
						</figure>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php
		// Import Launch More
		$template_url = get_template_directory() . '/template-parts/launch-more.php';
		include ($template_url);
	?>

	<?php
	get_footer();






}
else {

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
						the_archive_title( '<h1 class="page-title test">', '</h1>' );
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
}
