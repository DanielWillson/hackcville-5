<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); ?>
<!-- 
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> -->

<?php
while ( have_posts() ) : the_post();

	
	// get_template_part( 'template-parts/content', get_post_format() );

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
	$extra_fee_info = get_field("extra_fee_info");
	$extra_eligibility_info = get_field("extra_eligibility_info");
	/* get program partners */
	$partners_list = "";
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
						$t_content = get_field("testimonial");
						$t = "\"" . $t_content . "\"<br><span class=\"author\">- " . $name . ", " . $title . " Program Graduate</span>";
						$testimonials[$testimonial_count] = $t;
						array_push($used_t_ids, $id);

						$testimonial_count++;
					} else { /*unrelated testimonial */ }
				}
			}
		}
		wp_reset_postdata();
	}
	if ($testimonial_count < 5) {

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
		<div class="filter"></div>
		<div class="blue-bg program-hero-bg" style="background-image:url(<?php echo get_field('program_hero_image') ?>);">
			<div class="container">
				<div class="description">
					<h3>Explore <?php echo $program_topic; ?> in</h3>
				</div>
				<h1 class="program-name"><?php echo $title; ?></h1>
				<p class="subheading">An immersive, 10-week program hosted by HackCville</p>
				<h4 class="sponsor">Sponsored by <?php echo $partners_list; ?></h4>
				<a class="button short-button" target="_blank" href="<?php echo $app_link; ?>">Apply</a>
			</div>
		</div>
	</div>
		<div class="program-details">
			<div class="white-bg">
			   <div class="container">
					<?php if ($heading1) { ?>
					<div class="flex">
						<figure class="image-pullquote left flex-1-of-2">
							<img src="<?php echo $image1; ?>" />
							<figcaption>
								<?php echo $testimonials[0]; ?>
							</figcaption>
						</figure>
						<div class="flex-1-of-2 develop">
							<h3><?php echo $heading1 ?></h3>
							<p><?php echo $description1 ?></p>
						</div>
					</div>
					<?php } if ($heading2) { ?>
					<div class="flex">
						<div class="flex-1-of-2">
							<h3><?php echo $heading2 ?></h3>
							<p><?php echo $description2 ?></p>
						</div>
						<figure class="image-pullquote right flex-1-of-2">
							<img src="<?php echo $image2; ?>" />
							<figcaption>
								<?php echo $testimonials[1]; ?>
							</figcaption>
						</figure>
					</div>
					<?php } if ($heading3) { ?>
					<div class="flex">
						<figure class="image-pullquote left flex-1-of-2">
							<img src="<?php echo $image3; ?>" />
							<figcaption>
								<?php echo $testimonials[2]; ?>
							</figcaption>
						</figure>
						<div class="flex-1-of-2 develop">
							<h3><?php echo $heading3 ?></h3>
							<p><?php echo $description3 ?></p>
						</div>
					</div>
					<?php } ?>
			   </div>
		 </div>
		</div>
		<div class="feature-icons what-youll-learn">
			<div class="filter"></div>
			<div class="blue-bg what-youll-learn-bg" style="background-image: url('<?php echo $skills_photo; ?>');">
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
		<div class="program-staff">
			<div class="white-bg">
			   <div class="container section-border">
					<h1 class="header-center">Program Leads</h1>
					<div class="flex">
					<?php
					$lr_check = 1;
					$ids = array();

					foreach ($authors as $author) {
						$user_id = $author->data->ID;
						$author_name = $author->data->display_name;

						$programs = get_field('program_teams', 'user_'.$user_id);
						if ($programs) {
							foreach($programs as $program) {
								$user_program_title = get_the_title($program);
								if (!strcmp($title, $user_program_title)) {
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
					asort($ids);
					foreach($ids as $key => $value) {			
						$author_name = get_the_author_meta('first_name', $key) . " " . get_the_author_meta('last_name', $key);	
						if ($lr_check % 2 == 1) { ?>
							<div class="flex-2-of-3">
								<?php echo get_the_author_meta('description', $key); ?>
							</div>
							<figure class="image-pullquote right flex-1-of-3"> 
								<img src="<?php echo get_field("headshot", 'user_'.$key); ?>" />
								<figcaption>
									<h3><?php echo $author_name; ?></h3>
									<p class="subheading"><?php echo get_field("title", 'user_'.$key); ?></p>
								</figcaption>
							</figure>
						<?php } else { ?>
							<figure class="image-pullquote left flex-1-of-3"> 
								<img src="<?php echo get_field("headshot", 'user_'.$key); ?>" />
								<figcaption>
									<h3><?php echo $author_name; ?></h3>
									<p class="subheading"><?php echo get_field("title", 'user_'.$key); ?></p>
								</figcaption>
							</figure>
							<div class="flex-2-of-3">
								<?php echo get_the_author_meta('description', $key); ?>
							</div>
						<?php } $lr_check++; } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="program-partners">
			<div class="white-bg container meet-sponsors">
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
		<div class="apply-to">
		  <div class="table-list"> 
			<div class="blue-bg">
			  <div class="container applications">
				<h1>Applying to Exposure</h1>
				<h4><i>Applications due by Thursday, September X</i></h4>
				<div class="flex">
				  <div class="list-heading flex-1-of-2">
					<h3>Meeting Times</h3>
				  </div>
				  <div class="list-info flex-1-of-2">
					<p>Exposure meets every <span class="important"> Monday and Wednesday, 5-6:30pm, September X - November Y.</span> You must be able to attend each session. More than a few missed meeting times will result in being dropped from HackCville.</p>
				  </div>
				  <div class="list-heading flex-1-of-2">
					<h3>Fees</h3>
				  </div>
				  <div class="list-info flex-1-of-2">
					<p><span class="important">$40</span> membership dues are due at the beginning of the program. These dues remain the same for every following semester you're involved in HackCville. They can be reduced or waived for those with financial need.</p>
				  </div>
				  <div class="list-heading flex-1-of-2">
					<h3>Eligibility</h3>
				  </div>
				  <div class="list-info flex-1-of-2 eligibility-p">
					<p>Semester programs are high commitment, so if you're just looking to get a tast of HackCville or digital photography, check out our public events page to get your feet wet this semester.</p>
					<br>
					<p>In our application process we look for extremely committed, reliable students who are hungry for an intensive challenge. We want people who intend on becoming active, contributing members of the HackCville community</p>
					<br>
					<p>No former experience in photography nor ownership of a DSLR camera is required. Any UVA student (grad or undergrad) or Charlottesville resident +18 may apply.</p>
					<br>
					<p>Applications are due by September X at 11:59pm. You can read about our application process here. You may complete the written application through the link below.</p>
				  </div>
				</div>
				<div class="cta">
				  <div class="button">
					<h2>Apply</h2>
				  </div>
				  <div class="button">
					<h2>Remind me</h2>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="stud-work">
		   <div class="white-bg">
			 <div class="container">
			  <h1>Past Student Work</h1>
			  <figure class="image-pullquote right sarah">
				<img src="images/sarah1.jpg">
				<figcaption>Sarah Dodge</figcaption>
			  </figure>
			  <figure class="image-pullquote left sarah">
				<img src="images/sarah2.jpg">
				<figcaption>Sarah Dodge</figcaption>
			  </figure>
			  <figure class="image-pullquote right sarah">
				<img src="images/sarah1.jpg">
				<figcaption>Sarah Dodge</figcaption>
			  </figure>
			 </div>
		   </div>
		</div>
		<div class="what-next">
		  <div class="table-list">
			<div class="blue-bg">
			  <div class="container next">
				<h1>What's Next?</h1>
				<div class="flex">
				  <figure class="list-heading image-pullquote flex-1-of-2">
					<img src="images/sarah1.jpg">
					<figcaption>Student Name</figcaption>
				  </figure>
				  <div class="list-info flex-1-of-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				  </div>
				  <figure class="list-heading image-pullquote flex-1-of-2">
					<img src="images/sarah1.jpg">
					<figcaption>Student Name</figcaption>
				  </figure>
				  <div class="list-info flex-1-of-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				  </div>
				  <figure class="list-heading image-pullquote flex-1-of-2 stud-info">
					<img src="images/sarah1.jpg">
					<figcaption>Student Name</figcaption>
				  </figure>
				  <div class="list-info flex-1-of-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="places">
		<div class="white-bg">
		  <div class="container">
			<h1>Places You'll Go</h1>
			<div id="first">
			  <img src="images/sarah1.jpg" class="company-logo">
			  <img src="images/sarah2.jpg" class="company-logo">
			  <img src="images/sarah1.jpg" class="company-logo">
			  <img src="images/sarah2.jpg" class="company-logo" id="last">
			</div>
		  </div>
		</div>
		</div>
		<div class="bolded-list membership-section">
		<div class="blue-bg">
		<div class="container memberships">
		<h1>
		  Perks of Membership
		</h1>
		<h3>
		  After you complete your first HackCville program, you're granted HackCville membership. Here's what you get:
		</h3>
		<div class="list">
		  <div class="list-item">
			<h4>
			  24/7 access to our fun and functional clubhouses on Elliewood Ave.
			</h4>
			<p>
			  Our two clubhouses are filled with hammocks, couches, whiteboards, and WiFi. Use our space to work on your projects, hold meetings, or just hang out.
			</p>
		  </div>
		  <div class="list-item">
			<h4>
			  Exclusive events and job opportunities.
			</h4>
			<p>
			  Whether it's drinks with the co-founder of Reddit or HackCville-only internship, job, and freelancing opportunites, we give our members access to dozens of unique experiences every year.
			</p>
		  </div>
		  <div class="list-item">
			<h4>
			  A community that feels like a family.
			</h4>
			<p>
			  You'll join HackCville's 300-member community of the most talented and badass people in Charlottesville.
			</p>
		  </div>
		  <div class="list-item">
			<h4>
			  Early access to HackCville programs, no application required.
			</h4>
			<p>
			  Want to take another program? As a member, you can just sign up - no application required. We open up spots to members before the public.
			</p>
		  </div>
		  <div class="list-item">
			<h4>
			  Priority application for our summer program, Launch.
			</h4>
			<p>
			  Get paid to learn web design, software development, marketing or data science in our 12 week summer program. You'll get trained by HackCville's expert instructors and get a garanteed, paid internship at a local startup.
			</p>
		  </div>
		</div>
		</div>
		<div class="container section-border extra-opportunities">
		<h1>Extra Opportunities Available in Every Program</h1>
		<div class="flex">
		  <div class="flex-1-of-2">
			<h3>Mentorship</h3>
			<p>Looking for some guidance on how to navigate what you want to do? Every year we pair up hundreds of UVA alumni from across the country with our students to provide guidance and support. Our team also meets with you several times one-on-one to ensure you're getting the most out of your program. It's advising that actually works.</p>
			<img src="" class="extra-opp-image-left">
		  </div>
		  <div class="flex-1-of-2">
			<h3>Startup Trips</h3>
			<p>HackCville hosts immersive trips to cities across the country (New York City, San Francisco, Baltimore, and more) to tour companies, meet alumni, and give students networking opportunities with industry leaders. Trips are where you see how what you're learning is put into action in the real world.</p>
			<img src="" class="extra-opp-image-right">
		  </div>
		</div>
		</div>
		</div>
		<div class="testimonial">
		<div class="hc-blue-bg">
		<div class="container">
		  <div class="flex">
			<figure class="image-pullquote right flex-1-of-3">
			  <img src="images/katie.jpg" class="profile">
			  <figcaption class="testimonial-name">
				<p><span class="bold">Katie Mendenall</span></p>
				<p>HackCville member</p>
			  </figcaption>
			</figure>
			<p class="flex-2-of-3" id="quote">"I love that HackCville provides a support network for students. HackCville has helped me learn a lot, and it's also provided me with a lot of resume/internship guidance I know will be useful. It's a good feeling to be surrounded by people with similar goals."</p>
		  </div>
		</div>
		</div>
		</div>


	<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
