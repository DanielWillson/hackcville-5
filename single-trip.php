<?php
/**
 * The template for displaying all trip posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	$ID = get_the_ID();
	// echo $ID . "<br>";
	$name = get_the_title();
	$trip_status = get_field("trip_status");

	$trip_picture_1 = get_field('trip_picture_1');
	$trip_heading_1 = get_field('trip_heading_1');
	$trip_paragraph_1 = get_field('trip_paragraph_1');
	$trip_picture_2 = get_field('trip_picture_2');
	$trip_heading_2 = get_field('trip_heading_2');
	$trip_paragraph_2 = get_field('trip_paragraph_2');

	$application_status = get_field("application_status");
	$application_link = get_field("application_link");
	$fee_info = get_field("fee_info");

	$closing_event_title = get_field("closing_event_title");
	$closing_event_description = get_field("closing_event_description");
	$closing_event_photo = get_field("closing_event_photo");

	$trip_city_list = get_the_terms($ID, "trip_city"); 
	$city = $trip_city_list[0]->name;

	$times = get_field("start_to_end_times");

	$trip_tracks = array();
	$the_query = new WP_Query(array('post_type' => 'trip-track', 'numberposts'	=> -1));
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { $the_query->the_post();
			$related_trip = get_field("associated_trip");
			$trackID = get_the_ID();
			for($i = 0; $i < sizeof($related_trip); $i++) {
				if (!strcmp(get_the_title($related_trip[$i]), $name)) {
					array_push($trip_tracks, $trackID);
				}
			}
		}
		wp_reset_postdata();
	}

	$open_date = get_field("application_open_date", $ID);
	$date = DateTime::createFromFormat('mdY', $open_date);
	$open_date = $date->format('Y-m-d');
	$nice_open_date = $date->format('l, F d');

	$close_date = get_field("application_close_date", $ID);
	$date = DateTime::createFromFormat('mdY', $close_date);
	$close_date = $date->format('Y-m-d');
	$nice_close_date = $date->format('l, F d');
	$time = -1;

	date_default_timezone_set('America/New_York');
	$today = date('Y-m-d', time());

	$od = strtotime($open_date);
	$cd = strtotime($close_date);
	$td = strtotime($today);

	// Apps are open in the future
	if($td<$od && $td<$cd) {
	    $next_date = "Applications Open " . $nice_open_date; 
	    $time = 0;		
	}
	// Apps should be closed
	else if ($td>$od && $td>$cd) {
		$next_date = "<br>Applications closed " . $nice_close_date . ".";
		$time = 2;
	}
	// Apps are open
	else {
	    $next_date = "Applications close " . $nice_close_date . " at 11:59pm";
	    $time = 1; 
	} 

	$start_date = get_field("trip_start_date", $ID);
	$date = DateTime::createFromFormat('mdY', $start_date);
	$start_date = $date->format('l, F d');

	$end_date = get_field("trip_end_date", $ID);
	$date = DateTime::createFromFormat('mdY', $end_date);
	$end_date = $date->format('l, F d');

	$print_date = $start_date . " - " . $end_date;

	$length_check = -1;
	if (!strcmp($start_date, $end_date)) {
		$length_check = 1;
		$print_date = $start_date;
	}

	if (has_post_thumbnail( $ID ) ): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $ID ), 'single-post-thumbnail' );
		$image = $image[0];
	endif; 

?>


<div class="single-trip-hero">
	<div class="image-bg" style="background-image: url('<?php echo $image; ?>');">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1><?php echo $city . " Startup Trip"; ?></h1>
				<h3><?php echo $print_date . " " . $times; ?></h3>
				
					<?php 

					$presenting_partners = get_field("presenting_partners");
					$partner_count = 0;
					$partners_list = "";
					$p_partners_ids = array();
					if ($presenting_partners) {
						foreach ($presenting_partners as $p) {
							array_push($p_partners_ids, $p->ID);
							if ($partner_count < 1) {
								$partners_list = get_the_title($p->ID);
							}
							else if ($partner_count == 1) {
								$partners_list = $partners_list . " and " . get_the_title($p->ID);
							}
							else {
								$partners_list = get_the_title($p->ID) . ", " . $partners_list;
							}
							$partner_count++;
						}
						$partners_list = "<h3 class='presenting-partner'>presented by " . $partners_list . "</h3>";
					}
					echo $partners_list; ?>
				<p><?php echo $next_date; ?></p>
				<?php echo $notice; ?>
				<?php if ($time == 1) { ?>
					<a href="<?php echo $application_link; ?>" target="_blank" class="button">
						Apply Now
					</a>
				<?php } else if ($time == 0) { ?>
					<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
						Remind Me to Apply
					</a>
				<?php } else { ?>
					<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
						Notify Me About the Next Trip
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="single-trip-overview">
	<div class="hc-blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2">
					<img src="<?php echo $trip_picture_1; ?>">
				</div>
				<div class="flex-1-of-2">
					<h3><?php echo $trip_heading_1; ?></h3>
					<p><?php echo $trip_paragraph_1; ?></p>
				</div>
				<div class="flex-1-of-2">
					<h3><?php echo $trip_heading_2; ?></h3>
					<p><?php echo $trip_paragraph_2; ?></p>
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo $trip_picture_2; ?>">
				</div>
			</div>
			<div class="apply-section">
				<?php if ($time == 1) { ?>
					<a href="<?php echo $application_link; ?>" target="_blank" class="button">
						Apply Here By <?php echo $nice_close_date . " at 11:59pm"; ?>
					</a>
				<?php } else if ($time == 0) { ?>
					<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
						Remind Me to Apply
					</a>
				<?php } else { ?>
					<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
						Notify Me About the Next Trip
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="trip-sponsors">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class='flex flex-1-of-2 trip-partners'>
					<div class="flex-1-of-1">
						<h1>Our Presenting Partners</h1>
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
					<h4><?php echo $fee_info; ?></h4>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	if (sizeof($trip_tracks) > 0) {
		// Import Section
		$template_url = get_template_directory() . '/template-parts/trip-tracks.php';
		include ($template_url);
	}
	else { ?>
		<div class="trip-tracks not-announced">
			<div class="blue-bg">
				<div class="container">
					<h3>Company visits will be announced here soon!</h3>
				</div>
			</div>
		</div>
	<?php } ?>

<!-- FOR COMPANIES AND ALUMNI -->
<?php
	// Import Section
	$template_url = get_template_directory() . '/template-parts/trips-companies-alumni.php';
	include ($template_url);
?>
<?php
	// Import How Trips Work
	$template_url = get_template_directory() . '/template-parts/how-trips-work.php';
	include ($template_url);
?>

<?php
endwhile; // End of the loop.
?>


<?php
get_footer();
