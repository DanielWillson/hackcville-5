<?php
/**
 * The template for displaying trip archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

// $program_ids = array();
// $skills_ids = array();
// $eship_ids = array();
// $wireframeID = -1;
$trip_ids = array();
$next_trip_id = -1;
$next_trip_date = 10000000000;

if (has_post_thumbnail( $post->ID ) ): 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$image = $image[0];
endif; 


if ( have_posts() ) {
	while ( have_posts() ) : the_post(); 
		if (get_field("trip_status")) {
			array_push($trip_ids, get_the_ID());

			$trip_start_date = get_field("trip_start_date");
			if ($trip_start_date < $next_trip_date) {
				$next_trip_date = $trip_start_date;
				$next_trip_id = get_the_ID();
			}
		}
	endwhile;	
}?>

<!-- HERO SECTION --> 
<header class="trip-hero">
	<div class="blue-bg image-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/nyc2.jpg);">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1>HackCville's Startup Trips</h1>
				<p>HackCville hosts immersive trips to cities across the country to connect our talented students with high-growth and innovative companies. Students meet industry leaders and get connected with internship and job opportunities.</p>
				<p>Over the past 5 years, we have take hundreds of our top students to New York City, Boston, San Francisco, Richmond, Washington DC, and right here in Charlottesville. Read on for details on our trips and how you can go on the next one.</p>
			</div>
		</div>
	</div>
</header>
<!-- OUR NEXT TRIP -->
<?php 
$open_date = get_field("application_open_date", $next_trip_id);
$date = DateTime::createFromFormat('mdY', $open_date);
$open_date = $date->format('l, F d');

$close_date = get_field("application_close_date", $next_trip_id);
$date = DateTime::createFromFormat('mdY', $close_date);
$close_date = $date->format('l, F d');

if(strtotime($open_date)<=strtotime("today")){
    //past or today
    // $next_date = "Applications close " . date_format($close_date,"l, F d, Y") . " at 11:59pm"; 
    $next_date = "Applications close " . $close_date . " at 11:59pm"; 
} else {
    // future
    $next_date = "Applications Open " . $open_date; 
}
?>
<div class="next-trip">
	<div class="hc-blue-bg">
		<div class="container section-border">
			<h1>Our Next Trip:</h1>
			<div class="flex">
				<div class="flex-1-of-2">
					<img src="<?php echo $image; ?>">
				</div>
				<div class="flex-1-of-2">
					<h2>Charlottesville, VA</h2>
					<h3>Friday, September 22, 2017</h3>

					<h4><?php echo $next_date; ?></h4>
					<a class="button" href="<?php echo get_the_permalink($next_trip_id); ?>">
						<h4>Get the Details &rarr; </h4>
					</a>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="trip-testimonial">
	<div class="blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2">
					<h3>"Please extend my sincerest thanks to everyone who helped organize the trip. I literally completely owe you guys for getting me my dream job."</h3>
					<p>- Peter Simonsen, HackCville Alumnus, Data Analyst at Dataminr in NYC</p>
				</div>
				<figure class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc4.jpg">
				</figure>
			</div>
		</div>
	</div>
</div>
<div class="how-trips-work">
	<div class="white-bg">
		<div class="container">
			<h1>How Startup Trips Work</h1>
			<div class="flex">
				<div class="flex-1-of-2">
					<h2>1. Apply</h2>
					<p>Anyone 18+ can apply to our trips through our quick online application. (We give extra consideration to existing HackCville members, but not guaranteed admission.) You can see our upcoming trips below - applications typically open about 30-45 days before the trip. <br><br>You don't need to be looking for an internship or job to apply - these trips are a great opportunity to just get inspired and learn about the opportunities available to you.</p>
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc5.jpg">
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc6.jpg">
				</div>
				<div class="flex-1-of-2">
					<h2>2. Career Prep</h2>
					<p>Accepted students will get access to exclusive workshops where we'll help you tweak your resume, LinkedIn, and share tips and tricks for effective networking. Students will submit their final resumes in advance of the trip to be sent to our hiring company partners.</p>
				</div>
				<div class="flex-1-of-2">
					<h2>3. Company Visits</h2>
					<p>On a typical trip, we'll visit 5-6 for about an hour each. We usually speak to fairly high-level employees - founders, CTOs, marketing directors, ect - about their experiences. HackCville and/or UVA alumni employees at these companies are frequent hosts of these visits.</p>
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc5.jpg">
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc6.jpg">
				</div>
				<div class="flex-1-of-2">
					<h2>4. Alumni Mixer</h2>
					<p>We end each day of visits with an opportunity to network with dozens of local alumni in whatever city we're visiting. You'll get to talk to them about how they got to where they are today. Many are hiring, too! Most students walk away with new friends and new contacts that can help them with their personal projects, academic journey, and job prospects.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="how-trips-work">
	<div class="hc-blue-bg">
		<div class="container">
			<div class="flex video">
				<div class="flex-1-of-4">
					<h2>Watch an overview of our annual trip to New York City:</h2>
				</div>
				<div class="flex-3-of-4">
					<iframe width="725" height="420" src="https://www.youtube.com/embed/jb4MyIYreiQ?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="trip-sponsors">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class='flex flex-1-of-2'>
					<div class="flex-1-of-1">
						<h1>Our Partners</h1>
					</div>
					<?php 
					$presenting = array();
					$the_query2 = new WP_Query(array('post_type' => 'partner', 'orderby' => 'rand', 'posts_per_page'=> '100'));
					if ( $the_query2->have_posts() ) {
						while ( $the_query2->have_posts() ) { 
							$the_query2->the_post();
							
							$id = get_the_ID(); 
							$types = get_field("type");

							if ($types) {
								foreach ($types as $type) {
									if (!strcmp("Presenting Partner", $type)) {
										array_push($presenting, $id);
										?>
										<div class='flex-1-of-2 partner-logo'>
											<img src="<?php echo get_field("logo", $partner); ?>">
										</div>
										<?php
									}
								}
							}
						}
						wp_reset_postdata();
					} ?>
				</div>
				<div class="flex-1-of-2">
					<h1>Trip Fees</h1>
					<p>Our startup trips have been proven to be transformative experiences that dramatically expand the opportunities and networks of attendees. Because of this, our goal is to make these trips as accessible as possible.</p>
					<p>Our supportive sponsors enable us to subsidize the cost of all our trips, sometimes by as much as 50%. Partial and full scholarships are available to students with financial need. Applications are reviewed need-blind.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- FOR COMPANIES AND ALUMNI -->
<div class="companies-and-alumni">
	<div class="hc-blue-bg">
		<div class="container">
			<h1>How Companies and Alumni Can Get Involved</h1>
			<p>We're always looking for exciting companies to introduce to our talented students.</p>
			<p>
				<a class="button" href="mailto:holland@hackcville.com">
					Host a Visit &rarr;
				</a>
				<a class="button" href="mailto:holland@hackcville.com">
					Sponsor a Trip &rarr;
				</a>
			</p>
		</div>
	</div>
</div>
<div class="all-trips">
	<div class="white-bg">
		<div class="container">
			<h1>All Upcoming Trips</h1>
			<div class="flex">
				<?php 

				foreach ($trip_ids as $trip) { ?>
					<?php 

					$start_date = get_field("trip_start_date", $trip);
					$date = DateTime::createFromFormat('mdY', $start_date);
					$start_date = $date->format('l, F d');

					$end_date = get_field("trip_end_date", $trip);
					$date = DateTime::createFromFormat('mdY', $end_date);
					$end_date = $date->format('l, F d');

					$print_date = $start_date . " - " . $end_date;

					$length_check = -1;
					if (!strcmp($start_date, $end_date)) {
						$length_check = 1;
						$print_date = $start_date;
					}

					if (has_post_thumbnail( $trip->ID ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0];
					endif; 

					?>
					<div class="flex-1-of-2" style="background-image: url('<?php echo $image; ?>')">
						<div class="filter"></div>
						<div class="info">
							<h3><?php echo get_the_title($trip); ?></h3>
							<p><?php echo $print_date; ?></p>
							<a class="button" href="<?php echo get_the_permalink($trip); ?>">Get the Details &rarr;</a>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>





<?php
	// Import Newsletter Subscribe
	$template_url = get_template_directory() . '/template-parts/newsletter-subscribe.php';
	include ($template_url);
?>
<?php
// Import single random testimonial
$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
include ($template_url);
?>

	


<?php
get_footer();
