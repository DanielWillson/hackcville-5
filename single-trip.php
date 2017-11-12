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

	$presenting_partners = array();
	$p_partners_ids = array();
	foreach ($presenting_partners as $p) {
		array_push($p_partners_ids, $p->ID);
	}

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
	$open_date = $date->format('l, F d');

	$close_date = get_field("application_close_date", $ID);
	$date = DateTime::createFromFormat('mdY', $close_date);
	$close_date = $date->format('l, F d');
	$time = -1;

	if(strtotime($open_date)<=strtotime("today")){
	    //past or today
	    $next_date = "Applications close " . $close_date . " at 11:59pm";
	    $time = 1; 
	} else {
	    // future
	    $next_date = "Applications Open " . $open_date; 
	    $time = 0;
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
				<p><?php echo $next_date; ?></p>
				<?php if ($time == 1) { ?>
				<a href="<?php echo $application_link; ?>" target="_blank" class="button">
					Apply Now
				</a>
				<?php } else { ?>
				<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
					Remind Me to Apply
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
						Apply Here By <?php echo $close_date . " at 11:59pm"; ?>
					</a>
					<?php } else { ?>
					<a href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank" class="button">
						Remind Me to Apply
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
	
?>


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

<!-- 
Apply Now -->



<?php 
	// get_template_part( 'template-parts/content', get_post_format() );

	// $active = get_field("active_program");
	// $title = get_the_title();
	// $program_topic = get_post_meta(get_the_ID(), 'program_topic', true);
	// $app_open_date = get_field("application_open_date");
	// $app_close_date = get_field("application_close_date");
	// $app_status = get_field("application_status");
	// $app_link = get_field("application_link");
	// $heading1 = get_field("heading_1");
	// $heading2 = get_field("heading_2");
	// $heading3 = get_field("heading_3");
	// $description1 = get_field("description_1");
	// $description2 = get_field("description_2");
	// $description3 = get_field("description_3");
	// $image1 = get_field("image_1");
	// $image2 = get_field("image_2");
	// $image3 = get_field("image_3");
	// $syllabus_link = get_field("syllabus_link");
	// $skills = get_field("skills");
	// $skills_list = explode("\n", $skills);
	// 	foreach ($skills_list as $skill) {
	// 		//echo $skill;
	// 	}

	// $skills_photo = get_field("skills_background_photo");
	// $meeting_times = get_field("meeting_times");
	// $meeting_list = array();
	// $multiple_times = 0;
	// if (strpos($meeting_times, "\n") !== false) {
	//     $multiple_times = 1;
	//     $meeting_list = explode("\n", $meeting_times);
	// }
	// else {
	// 	array_push($meeting_list, $meeting_times);
	// }

	// $extra_fee_info = get_field("extra_fee_info");
	// $extra_eligibility_info = get_field("extra_eligibility_info");
	// /* get program partners */
	// $partners_list = "";
	// $open_date = date_create($app_open_date);
	// $open_date_short = date_format($open_date,"m/d/Y"); 
	// // $open_date_short = "January 2018";
	// $partner_count = 0;
	// $partners = array();
	// $posts = get_field("program_partners");
	// 	if( $posts ):
	// 		foreach( $posts as $p ):
	// 			array_push($partners, $p->ID);
	// 			if ($partner_count < 1) {
	// 				$partners_list = get_the_title($p->ID);
	// 			}
	// 			else if ($partner_count == 1) {
	// 				$partners_list = $partners_list . " and " . get_the_title($p->ID);
	// 			}
	// 			else {
	// 				$partners_list = get_the_title($p->ID) . ", " . $partners_list;
	// 			}
	// 			$partner_count++;
	// 		endforeach;
	// 	endif;

	// $authors = get_users(); /* get the program team */

	// /* get testimonial */
	// $testimonial_count = 0;
	// $testimonials = array();
	// $used_t_ids = array();
	// $prog_only_t = array();
	// $i = 0;
	// $student_work_check = false;
	// $student_outcomes_check = false;
	// $student_partner_check = false; 

	// $the_query = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand'));
	// if ( $the_query->have_posts() ) {
	// 	while ( $the_query->have_posts() ) { $the_query->the_post();

	// 		$name = get_the_title(); // name of testimonial giver
	// 		$id = get_the_ID(); // ID of current testimonial

	// 		$t_programs = get_field("related_program");
	// 		if ($t_programs) {
	// 			foreach($t_programs as $t_program) {
	// 				$user_t_program = get_the_title($t_program);
	// 				if (!strcmp($title, $user_t_program)) {
	// 					if ($i<4) { $prog_only_t[$i] = $id; $i++; }
						
	// 					$has_student_work = get_field('student_work_image', $id);
	// 					if ($has_student_work) { $student_work_check = true; }

	// 					$has_outcome = get_field('narrative_outcome', $id);
	// 					if ($has_outcome) { $student_outcomes_check = true; }

	// 					$has_partner = get_field("partners_student_has_worked_with", $t);
	// 					if ($has_partner) { $student_partner_check = true; }

	// 					$t_content = get_field("testimonial");
	// 					$t = "\"" . $t_content . "\"<br><span class=\"author\">- " . $name . ", " . $title . " Program Graduate</span>";
	// 					$testimonials[$testimonial_count] = $t;
	// 					array_push($used_t_ids, $id);

	// 					$testimonial_count++; $i++;
	// 				} else { /*unrelated testimonial */ }
	// 			}
	// 		}
	// 	}
	// 	wp_reset_postdata();
	// }
	// shuffle($prog_only_t);
	// if ($testimonial_count < 3) {

	// 	$the_query2 = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand'));
	// 	if ( $the_query2->have_posts() ) {
	// 		while ( $the_query2->have_posts() ) { $the_query2->the_post();
	// 			$id = get_the_ID(); // ID of current testimonial
	// 			if (!in_array($id, $used_t_ids)) {
					
	// 				$name = get_the_title(); // name of testimonial giver
	// 				$t_categories = get_field("testimonial_category");
					
	// 				if ($t_categories) {
	// 					foreach($t_categories as $t_category) {
	// 						if (!strcmp($t_category, "General")) {
	// 							$t_content = get_field("testimonial", $id);
	// 							$t = "\"" . $t_content . "\"<br><span class=\"author\">- " . $name . ", HackCville Member</span>";
	// 								$testimonials[$testimonial_count] = $t;
	// 								$testimonial_count++;
	// 							array_push($used_t_ids, $id);
	// 						}
	// 						else { /*unrelated testimonial */ }
	// 					}
	// 				}
	// 			}
				
	// 		}
	// 		wp_reset_postdata();
	// 	}
	// }
	
	?>


	<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
