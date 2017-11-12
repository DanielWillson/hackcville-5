<?php
/**
 * The template for displaying trip archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

$trip_ids = array();
$ti = array();
$trip_tentative_ids = array();
$tti = array();
$next_trip_id = -1;
$next_trip_date = 10000000000;



if ( have_posts() ) {
	while ( have_posts() ) : the_post(); 
		$start_date = get_field("trip_start_date", $ID);
		$date = DateTime::createFromFormat('mdY', $start_date);
		$start_date = $date->format('l, F d Y');
		if (strtotime($start_date)>=strtotime("today")) {

			if (get_field("trip_status")) {
				array_push($trip_ids, get_the_ID());
				$ti[get_the_ID()] = strtotime($start_date);

				$trip_start_date = get_field("trip_start_date");
				if ($trip_start_date < $next_trip_date) {
					$next_trip_date = $trip_start_date;
					$next_trip_id = get_the_ID();
				}
			}
			else {
				array_push($trip_tentative_ids, get_the_ID());
				$tti[get_the_ID()] = strtotime($start_date);
			}
		}
		
	endwhile;	
}

if (has_post_thumbnail( $next_trip_id ) ): 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_trip_id ), 'single-post-thumbnail' );
	$image = $image[0];
endif; 


asort($tti);
asort($ti);


?>

<!-- HERO SECTION --> 
<header class="trip-hero">
	<div class="blue-bg image-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/nyc2.jpg);">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1>HackCville's Startup Trips</h1>
				<p>HackCville hosts immersive trips to cities across the country to connect our talented students with high-growth and innovative companies. Students meet industry leaders and get connected with internship and job opportunities.</p>
				<p>Over the past 5 years, we have taken hundreds of our top students to New York City, Boston, San Francisco, Richmond, Washington DC, and right here in Charlottesville. Read on for details on our trips and how you can go on the next one.</p>
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
    $next_date = "Applications close " . $close_date . " at 11:59pm"; 
} else {
    // future
    $next_date = "Applications Open " . $open_date; 
}

// if ($next_trip_id >= 0) {
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
					<h2><?php echo get_the_title($next_trip_id); ?></h2>
					<h3><?php get_field("trip_start_date", $next_trip_id); ?></h3>

					<h4><?php echo $next_date; ?></h4>
					<a class="button" href="<?php echo get_the_permalink($next_trip_id); ?>">
						<h4>Get Details &rarr;</h4>
					</a>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<?php //} ?>
<div class="trip-testimonial">
	<div class="blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2">
					<h3>"HackCville's startup trip showed me career paths I hadn't even considered at UVa, and it's where I found a job I absolutely love."</h3>
					<p>- Peter Simonsen, UVa 2015</p>
				</div>
				<figure class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc4.jpg">
				</figure>
			</div>
		</div>
	</div>
</div>
<?php
	// Import How Trips Work
	$template_url = get_template_directory() . '/template-parts/how-trips-work.php';
	include ($template_url);
?>
<div class="trip-sponsors">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class='flex flex-1-of-2 trip-partners'>
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
<?php
	// Import Section
	$template_url = get_template_directory() . '/template-parts/trips-companies-alumni.php';
	include ($template_url);
?>
<?php if ($next_trip_id >= 0) { ?>
<div class="all-trips">
	<div class="white-bg">
		<div class="container">
			<h1>All Upcoming Trips</h1>
			<div class="flex">
				<?php 

				foreach($ti as $trip => $item) { ?>
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

					if (has_post_thumbnail( $trip ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $trip ), 'single-post-thumbnail' );
						$image = $image[0];
					endif; 

					?>
					<div class="flex-1-of-2" style="background-image: url('<?php echo $image; ?>')">
						<div class="filter"></div>
						<div class="info">
							<h3><?php echo get_the_title($trip); ?></h3>
							<p><?php echo $print_date; ?></p>
							<a class="button" href="<?php echo get_the_permalink($trip); ?>">Get Details &rarr;</a>
						</div>
					</div>
				<?php }
				foreach($tti as $trip2 => $item) { ?>
					<?php 

					$start_date = get_field("trip_start_date", $trip2);
					$date = DateTime::createFromFormat('mdY', $start_date);
					$print_date = $date->format('F Y');

					if (has_post_thumbnail( $trip2 ) ): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $trip2 ), 'single-post-thumbnail' );
						$image2 = $image[0];
					endif; 

					?>
					<div class="flex-1-of-2" style="background-image: url('<?php echo $image2; ?>')">
						<div class="filter"></div>
						<div class="info">
							<h3><?php echo get_the_title($trip2); ?></h3>
							<p><?php echo $print_date; ?></p>
							<a class="button not-active">Details Announced Soon</a>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<?php } ?>




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
