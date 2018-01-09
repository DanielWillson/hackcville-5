<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	$active = get_field("active_program");
	$title = get_the_title();
	$program_topic = get_post_meta(get_the_ID(), 'program_topic', true);
	$app_open_date = get_field("application_open_date");
	$app_close_date = get_field("application_close_date");
	$app_status = get_field("application_status");
	$app_link = get_field("application_link");
	$heading1 = get_field("heading_1");
	$heading2 = get_field("heading_2");
	$heading3 = get_field("heading_3");
	$description1 = get_field("description_1");
	$description2 = get_field("description_2");
	$description3 = get_field("description_3");
	$image1 = get_field("image_1");
	$image2 = get_field("image_2");
	$image3 = get_field("image_3");
	$syllabus_link = get_field("syllabus_link");
	$skills = get_field("skills");
	$skills_list = explode("\n", $skills);
		foreach ($skills_list as $skill) {
			//echo $skill;
		}

	$skills_photo = get_field("skills_background_photo");
	$meeting_times = get_field("meeting_times");
	$meeting_list = array();
	$multiple_times = 0;
	if (strpos($meeting_times, "\n") !== false) {
	    $multiple_times = 1;
	    $meeting_list = explode("\n", $meeting_times);
	}
	else {
		array_push($meeting_list, $meeting_times);
	}

	$extra_fee_info = get_field("extra_fee_info");
	$extra_eligibility_info = get_field("extra_eligibility_info");
	/* get program partners */
	$partners_list = "";
	$open_date = date_create($app_open_date);
	$open_date_short = date_format($open_date,"m/d/Y"); 
	// $open_date_short = "January 2018";
	$partner_count = 0;
	$partners = array();
	$posts = get_field("program_partners");
		if( $posts ):
			foreach( $posts as $p ):
				array_push($partners, $p->ID);
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
			endforeach;
		endif;

	$authors = get_users(); /* get the program team */

	/* get testimonial */
	$testimonial_count = 0;
	$testimonials = array();
	$used_t_ids = array();
	$prog_only_t = array();
	$i = 0;
	$student_work_check = false;
	$student_outcomes_check = false;
	$student_partner_check = false; 

	$the_query = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand'));
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { $the_query->the_post();

			$name = get_the_title(); // name of testimonial giver
			$id = get_the_ID(); // ID of current testimonial

			$t_programs = get_field("related_program");
			if ($t_programs) {
				foreach($t_programs as $t_program) {
					$user_t_program = get_the_title($t_program);
					if (!strcmp($title, $user_t_program)) {
						if ($i<4) { $prog_only_t[$i] = $id; $i++; }
						
						$has_student_work = get_field('student_work_image', $id);
						if ($has_student_work) { $student_work_check = true; }

						$has_outcome = get_field('narrative_outcome', $id);
						if ($has_outcome) { $student_outcomes_check = true; }

						$has_partner = get_field("partners_student_has_worked_with", $t);
						if ($has_partner) { $student_partner_check = true; }

						$t_content = get_field("testimonial");
						$t = "\"" . $t_content . "\"<br><span class=\"author\">- " . $name . ", " . $title . " Program Graduate</span>";
						$testimonials[$testimonial_count] = $t;
						array_push($used_t_ids, $id);

						$testimonial_count++; $i++;
					} else { /*unrelated testimonial */ }
				}
			}
		}
		wp_reset_postdata();
	}
	shuffle($prog_only_t);
	if ($testimonial_count < 3) {

		$the_query2 = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand'));
		if ( $the_query2->have_posts() ) {
			while ( $the_query2->have_posts() ) { $the_query2->the_post();
				$id = get_the_ID(); // ID of current testimonial
				if (!in_array($id, $used_t_ids)) {
					
					$name = get_the_title(); // name of testimonial giver
					$t_categories = get_field("testimonial_category");
					
					if ($t_categories) {
						foreach($t_categories as $t_category) {
							if (!strcmp($t_category, "General")) {
								$t_content = get_field("testimonial", $id);
								$t = "\"" . $t_content . "\"<br><span class=\"author\">- " . $name . ", HackCville Member</span>";
									$testimonials[$testimonial_count] = $t;
									$testimonial_count++;
								array_push($used_t_ids, $id);
							}
							else { /*unrelated testimonial */ }
						}
					}
				}
				
			}
			wp_reset_postdata();
		}
	}
	
	?>

	<div class="program-hero">
		<div class="blue-bg image-bg" style="background-image:url(<?php echo get_field('program_hero_image') ?>);">
			<div class="filter"></div>
			<div class="container">
				<div class="description">
					<h3><?php if(strcmp(get_the_title(), "Alpha")) { echo "Explore "; } else { echo "Get "; } echo $program_topic; ?> in</h3>
				</div>
				<h1 class="program-name"><?php echo $title; ?></h1>
				<p class="subheading">An immersive, 10-week program hosted by HackCville</p>
				<?php if($partner_count > 0) { ?><h4 class="sponsor">Sponsored by <?php echo $partners_list; ?></h4><?php } ?>
				<?php 
				if ($app_status) { ?>
					<a class="button short-button" target="_blank" href="<?php echo $app_link; ?>">Apply</a>
					<?php	
				} else { ?>
					<a class="button short-button not-active" target="_blank" href="">Applications Open <?php echo $open_date_short; ?></a>
					<?php } ?>
			</div>
		</div>
	</div>
	<div class="program-details">
		<div class="white-bg">
		   <div class="container">
				<?php if ($heading1) { ?>
				<div class="flex first">
					<figure class="image-pullquote left flex-1-of-2">
						<img src="<?php echo $image1; ?>" />
						<figcaption>
							<?php echo $testimonials[0]; ?>
						</figcaption>
					</figure>
					<div class="flex-1-of-2">
						<h3><?php echo $heading1; ?></h3>
						<p><?php echo $description1; ?></p>
					</div>
				</div>
				<?php } if ($heading2) { ?>
				<div class="flex second">
					<div class="flex-1-of-2">
						<h3><?php echo $heading2; ?></h3>
						<p><?php echo $description2; ?></p>
					</div>
					<figure class="image-pullquote right flex-1-of-2">
						<img src="<?php echo $image2; ?>" />
						<figcaption>
							<?php echo $testimonials[1]; ?>
						</figcaption>
					</figure>
				</div>
				<?php }  ?>
				<div class="flex third">
					<figure class="image-pullquote left flex-1-of-2">
						<img src="<?php echo $image3; ?>" />
						<figcaption>
							<?php echo $testimonials[2]; ?>
						</figcaption>
					</figure>
					<div class="flex-1-of-2 develop">
						<h3>Join our community</h3>
						<p>Through collaborative projects, group dinners, hikes, pregames, and more you’ll become part of HackCville’s tight-knit community. We serve all UVA students (grad/undergrad) and Charlottesville community members 18+.</p>
					</div>
				</div>
		   </div>
	 </div>
	</div>
	<div class="what-youll-learn feature-icons ">
		<div class="image-bg" style="background-image: url('<?php echo $skills_photo; ?>');">
		   	<div class="filter"></div>
		   	<div class="container">
				<h1 class="header-center">What You'll Learn</h1>
				<div class="flex">
					<?php foreach ($skills_list as $skill) { ?>
					<div class="feature-icon flex-1-of-3 ">
						<h3><?php echo $skill; ?></h3>
					</div>
					<?php } ?>
			   </div>
	 		</div>
	 	</div>
	</div>
	<?php
	// BEGIN PROGRAM STAFF CHECK
	$lr_check = 1;
	$ids = array();
	$staff_size = 0;

	foreach ($authors as $author) {
		
		$user_id = $author->data->ID;
		$author_name = $author->data->display_name;
		$active = get_field('active', 'user_'.$user_id);
		if ($active && !in_array( 'subscriber', (array) $author->roles ) ) {
			$programs = get_field('program_teams', 'user_'.$user_id);
			if ($programs) {
				foreach($programs as $program) {
					$user_program_title = get_the_title($program);
					if (!strcmp($title, $user_program_title)) {
						$staff_size++;
						if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "program_lead")) {
							$ids[$user_id] = 1;
						}
						if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "coordinator")) {
							$ids[$user_id] = 2;
						}
					}
				}
			}
		}
	}
	asort($ids);
	if ($staff_size > 0) {
	?>
	<div class="program-staff">
		<div class="white-bg">
		   <div class="container section-border">
				<h1 class="header-center">Program Staff</h1>
				<?php
				foreach($ids as $key => $value) {			
					$author_name = get_the_author_meta('first_name', $key) . " " . get_the_author_meta('last_name', $key);	
					echo "<div class='flex'>";
					if ($lr_check % 2 == 1) { ?>
						<div class="flex">
							<div class="flex-3-of-5 bottom">
								<?php echo get_the_author_meta('description', $key); ?>
								<a href="<?php echo get_author_posts_url($key) ?>" target="_blank" class="button">
									More about <?php echo get_the_author_meta('first_name', $key); ?> &rarr;
								</a>
							</div>
							<figure class="image-pullquote right flex-2-of-5 top"> 
								<img src="<?php echo get_field("headshot", 'user_'.$key); ?>" />
								<figcaption>
									<h3><?php echo $author_name; ?></h3>
									<p class="subheading"><?php echo get_field("title", 'user_'.$key); ?></p>
								</figcaption>
							</figure>
						</div>
					<?php } else { ?>
						<div class="flex">
							<figure class="image-pullquote left flex-2-of-5 top"> 
								<img src="<?php echo get_field("headshot", 'user_'.$key); ?>" />
								<figcaption>
									<h3><?php echo $author_name; ?></h3>
									<p class="subheading"><?php echo get_field("title", 'user_'.$key); ?></p>
								</figcaption>
							</figure>
							<div class="flex-3-of-5 bottom">
								<?php echo get_the_author_meta('description', $key); ?>
							</div>
						</div>
					<?php 
					} $lr_check++; } ?>
					</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
	<?php } if($partner_count > 0) { ?>
	<div class="program-partners">
		<div class="white-bg meet-sponsors">
			<div class="container">
			  	<h1 class="header-center">Meet <?php echo $title; ?>'s Sponsor<?php 
			  		if ($partner_count > 1) { echo "s"; }
			  	?></h1>
			  	<div class="flex">
			  		<?php 
			  		foreach ($partners as $partner) {
			  			?>
			  			<div class="flex-1-of-3">
						 	<img src="<?php echo get_field('logo', $partner); ?>" class="sponsor-image">
						</div>
						<div class="flex-2-of-3">
						 	<p class="sponsor-info"><?php echo get_field('description', $partner); ?></p>
						 	<a class="button" href="<?php echo get_field('website', $partner); ?>" target="_blank">Learn More &rarr;</a>
						</div>
			  		<?php } ?>
			  	</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="apply-to table-list">
		<div class="blue-bg">
		  	<div class="container applications">
				<h1>Applying to <?php echo $title; ?></h1>
				<?php if ($app_status) { ?>
					<h3 class="apps-due-by">Applications due by <?php 
						$date = date_create($app_close_date);
						$date = date_format($date,"l, F d, Y") . " at 11:59pm"; 
						echo $date; ?>
					</h3>
				<?php } else { ?>
					<h3 class="apps-due-by">Applications will open <?php 
						$open_date = date_format($open_date,"l, F d, Y"); 
						echo $open_date; ?>
					</h3>
				<?php } ?>
				<div class="flex">
					<div class="list-heading flex-1-of-2">
						<h3>Meeting Times</h3>
					</div>
					<div class="list-info flex-1-of-2">
						<?php 
						if ($multiple_times) { ?>
							<p><?php echo $title; ?> has multiple sections:
								<ul>
									<?php foreach ($meeting_list as $mt) { ?>
										<li><?php echo $mt; ?></li>
									<?php } ?>
								</ul>
							All sections start February 4 and run through late April. You can indicate on your application with section(s) you are available for. There is no difference in curriculum between sections.</p>
						<?php } else { ?>

							<p><?php echo $title; ?> meets <span class="important"><?php echo $meeting_times; ?>, February 4 through late April.</span></p>

						<?php } ?>
						<p><span class="important">All sections of all programs (including <?php echo $title; ?>) start with a 11am-5:30pm kickoff on Sunday, February 4.</span></p>
						<p>You must be able to attend each session. More than a few missed meeting times will result in being dropped from HackCville.</p>
					</div>
					<div class="list-heading flex-1-of-2">
						<h3>Fees</h3>
					</div>
					<div class="list-info flex-1-of-2">
						<p><span class="important">$50</span> membership dues are due at the beginning of the program. These dues remain the same for every following semester you're involved in HackCville.</p>
						<?php 
						if ($extra_fee_info) {
							echo "<p>" . $extra_fee_info . "</p>";
						}
						?>
						<p>These fees can be reduced or waived for those with financial need, no questions asked.</p>
					</div>
					<div class="list-heading flex-1-of-2">
						<h3>Eligibility</h3>
					</div>
					<div class="list-info flex-1-of-2">
						<p>Semester programs are high commitment, so if you're just looking to get a taste of HackCville or <?php echo $program_topic; ?>, check out our <a href="<?php echo get_home_url(); ?>/events">public events</a> to get your feet wet this semester.</p>
						<p>In our application process we look for extremely committed, reliable students who are hungry for an intensive challenge. We want people who intend on becoming active, contributing members of the HackCville community.</p>
						<p><span class="important"><?php echo $extra_eligibility_info; ?></span> Any UVA student (grad or undergrad) or Charlottesville resident +18 may apply.</p>
					</div>
				</div>
				<div class="cta">
				<?php if ($app_status) {
					?>
					<a class="button" href="<?php echo $app_link; ?>" target="_blank">
						<h2>Apply Now &rarr;</h2>
					</a>
					<a class="button" href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank">
						<h2>Remind me &rarr;</h2>
				  	</a>
					<?php
				} else { ?>
					<a class="button" href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank">
						<h2>Remind me when apps open &rarr;</h2>
				  	</a>
				  	<h3>Applications Open <?php echo $open_date_short; ?></h3>

				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php
		// Import Newsletter Subscribe
		$template_url = get_template_directory() . '/template-parts/newsletter-subscribe.php';
		include ($template_url);
	?>
	<?php if ($student_work_check) { ?>
	<div class="student-work">
	   	<div class="white-bg">
			<div class="container">
		  		<h1>Past Student Work</h1>
		  		<?php 
		  		foreach($prog_only_t as $t) {
		  			$has_student_work = get_field('student_work_image', $t);
		  			if ($has_student_work) {?>
		  				<figure class="image-pullquote left">
							<img src="<?php echo $has_student_work; ?>">
							<figcaption>
								<h4><?php echo get_the_title($t); ?></h4>
								<p class="subheading"><?php echo $title . " Program Graduate"; ?></p>
								<?php 
								$sw = get_field('student_work_link', $t);
								if (strcmp($sw, "")) {	?>
									<a href="<?php echo $sw; ?>" target="_blank">View more &rarr;</a>
								<?php }?>
							</figcaption>
				  		</figure><?php
		  			}
		  		} ?>
		 	</div>
	   	</div>
	</div>
	<?php } ?>
	<?php if ($student_outcomes_check) { ?>
	<div class="what-next table-list">
	  	<div class="blue-bg">
		  	<div class="container">
				<h1>What's Next?</h1>
				<div class="flex">
					<?php
					foreach($prog_only_t as $t) {
						if (strcmp(get_field('narrative_outcome', $t), "")) {
					?>
						<figure class="list-heading image-pullquote flex-1-of-2">
							<?php if (get_field('headshot', $t)) { ?>
								<img src="<?php echo get_field('headshot', $t); ?>">
							<?php } ?> 
							<figcaption><?php echo get_the_title($t); ?></figcaption>
					  	</figure>
					 	<div class="list-info flex-1-of-2">
							<p><?php echo get_field('narrative_outcome', $t); ?></p>
					  	</div>
					  	<?php }} ?>
				</div>
			</div>
  		</div>
	</div>
	<?php } ?>
	<?php if ($student_partner_check) { ?>
	<div class="places-youll-go">
		<div class="white-bg">
	  		<div class="container">
				<div class="intro">
					<h1>Places You'll Go</h1>
					<h3>Here are just a few places <?php echo $title; ?> graduates have ended up.</h3>
				</div>
				<div class="flex">
					<?php
					$j = 1;

					foreach($prog_only_t as $t) {
						$partners_worked_with = get_field("partners_student_has_worked_with", $t);
						if ($partners_worked_with && $j<5) {
							foreach ($partners_worked_with as $p) {
								$j++;
								?>
								<div class="flex-1-of-4">
									<img src="<?php echo get_field('logo', $p); ?>">
								</div>
							<?php }
						} 
					} ?>
				</div>
	  		</div>
		</div>
	</div>
	<?php } ?>
	<?php
		// Import Membership Perks
		$template_url = get_template_directory() . '/template-parts/membership-perks.php';
		include ($template_url);
	?>
	<?php
		// Import Single Random Testimonial
		$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
		include ($template_url);
	?>
	<div class="last-apply">
		<div class="blue-bg">
			<div class="container">
				<div class="flex">
					<div class="flex-1-of-2">
						<h1>Apply to <?php echo $title; ?></h1>
						<?php if ($app_status) { ?>
							<h3 class="apps-due-by">Applications due by <?php 
								echo $date; ?>
							</h3>
							<a class="button" href="<?php echo $app_link; ?>" target="_blank">
								Apply Now
							</a>
							<a class="button" href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank">
								Remind me
						  	</a>
						<?php } else { ?>
							<h3>Applications Open <?php echo $open_date_short; ?></h3>
							<a class="button" href="http://hackcville.us5.list-manage.com/subscribe/post?u=dae9a7242f836507908a2f2d6&id=97161904f1" target="_blank">
								Remind me when apps open
						  	</a>
						<?php } ?>
					</div>
					<div class="flex-1-of-2">
						<h1>See other HC programs</h1>
						<h3>Learn everything from entrepreneurship to videography</h3>
						<a class="button" href="<?php echo get_home_url(); ?>/programs" target="_blank">
							See all programs
					  	</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
