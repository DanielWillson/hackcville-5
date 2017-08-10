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
	$posts = get_field("program_partners");
		if( $posts ):
			foreach( $posts as $p ):
			    //echo get_the_title( $p->ID );
			endforeach;
		endif;

	/* get the program team */
	$authors = get_users();
		foreach ($authors as $author) {
			$user_id = $author->data->ID;
			$programs = get_field('program_teams', 'user_'.$user_id);

			if ($programs) {
				foreach($programs as $program) {
					$user_program_title = get_the_title($program);
					if (!strcmp($title, $user_program_title)) {
						//echo "<h3>" . $author->data->display_name . "</h3>";
					}
					else {
						// This user isn't involved in planning this program
					}
				}
			}
		}

	/* get testimonial */
	$the_query = new WP_Query(array('post_type' => 'testimonial'));
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$name = get_the_title();

			$t_programs = get_field("related_program");
			if ($t_programs) {
				foreach($t_programs as $t_program) {
					$user_t_program = get_the_title($t_program);
					if (!strcmp($title, $user_t_program)) {
						// echo "<h3>" . $name . "</h3>";
					}
					else {
						// This user's testimonial isn't related
					}
				}
			}

			
		}
		wp_reset_postdata();
	}
	
	


	?>

	<div class="program-hero">
		<div class="blue-bg prog-img-bg" style="background-image:url(<?php echo get_field('program_hero_image') ?>);">
			<div class="container">
				<div class="description">
					<h3>Explore Digital Photography in</h3>
				</div>
				<h1 class="program-name">Exposure</h1>
				<p class="subheading">An immersive, 10-week program hosted by HackCville</p>
				<h4 class="sponsor">Sponsored by Willow Tree</h4>
				<a class="button short-button" href="#">Apply</a>
			</div>
		 </div>
		</div>
		<div class="what-u-get">
		 <div class="white-bg">
		       <div class="container">
		          <div class="flex what-u-get-secs">
		             <figure class="image-pullquote left flex-1-of-2">
		                <img src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2016/08/IMG_3215-e1471814168201.jpg" />
		                <figcaption>"I loved all of the inspiration our Program Lead gave to us. She made me fall in love with photography in a whole new way. I gained skills in editing software, creativity, and DSLRs. I just really enjoyed everything about the program and the opportunity it provided."
		                <br>
		                <i>-Danielle Levin, Program Graduate</i>
		                 </figcaption>
		             </figure>
		             <div class="flex-1-of-2 develop">
		                <h3>Develop skills and apply them through hands on experience</h3>
		                <p>Exposure is a 10-week program  for students interested in learning storytelling through digital photography. Students will learn photography using Nikon and Canon DSLRs and photo editing using Adobe Lightroom and Photoshop. Prohects in portraiture, landscape, journalistic photography and more will provide students with hands-on experience.</p>
		             </div>
		          </div>
		          <div class="flex what-u-get-secs">
		                <div class="flex-1-of-2">
		                   <h3>Publish real projects on your own portfolio website</h3>
		                   <p>Graduates of Exposure will have extensive knowledge and skill in digital photography and will have completed three short-term projects and one semester-long project that will be published to each student's personal photography portfolio website.</p>
		                </div>
		                <div class="flex-1-of-2">
		                   <img  class="simple-border" src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2017/01/pexels-photo2.jpg" />
		                </div>
		          </div>
		           <div class="flex what-u-get-secs what-u-get-secs-pt2">
		             <figure class="image-pullquote left flex-1-of-2">
		                <img src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2014/09/12194999_1231703353512795_5437443080829008042_o.jpg" />
		                <figcaption>"I love the endless amount of resources and guidance HackCville offers. From having members/staff take 5 minutes to sit down and talk to me, to endless workshops throughout the semester, to the random email/text messages - everyone genuinely cares about one another."
		                <br>
		                <i>-Nina Satasiya, Program Graduate</i>
		                 </figcaption>
		             </figure>
		             <div class="flex-1-of-2">
		                <h3>Develop skills and apply them through hands on experience</h3>
		                <p>Exposure is a 10-week program  for students interested in learning storytelling through digital photography. Students will learn photography using Nikon and Canon DSLRs and photo editing using Adobe Lightroom and Photoshop. Prohects in portraiture, landscape, journalistic photography and more will provide students with hands-on experience.</p>
		             </div>
		          </div>
		       </div>
		 </div>
		</div>
		<div class="feature-icons what-u-learn">
		 <div class="blue-bg what-u-learn-img-bg">
		       <div class="container">
		          <h1 class="header-center">What You'll Learn</h1>
		        <div class="flex">
		             <div class="feature-icon flex-1-of-3 ">
		                <h3>Operation of a DSLR Camera</h3>
		             </div>
		             <div class="feature-icon flex-1-of-3 ">
		                <h3>Adobe Photoshop and Lightroom</h3>
		             </div>
		             <div class="feature-icon flex-1-of-3 ">
		                <h3>Applying creativity to photography</h3>
		             </div>
		        </div>
		        <div class="flex">
		           <div class="feature-icon flex-1-of-3 ">
		                <h3>Best practices acrss various types of photographs</h3>
		           </div>
		           <div class="feature-icon flex-1-of-3 ">
		                <h3>Execution of a cohesive photography project</h3>
		           </div>
		        </div>
		       </div>
		 </div>
		</div>
		<div class="program-leads">
		 <div class="white-bg">
		       <div class="container section-border">
		          <h1 class="header-center">Program Leads</h1>
		          <div class="flex">
		            <figure class="flex-2-of-3">
		               <p>Sarah Dodge is the program lead for Exposure and a Senior Producer for The Pioneer. She's a 3rd Year studying Media Studies at UVA. Sarah ahs extensive photography experience, having booked nearly $10,000 in freelance photography contracts in the last year alone. She also shoots for UVA Athletics Media Relations. Sarah graduated HackCville's Storyborad program in Fall 2015. You can see samples of her work here, and you can reach her at sarah@hackcville.com.</p>
		            </figure>
		            <div class=" image-pullquote left flex-1-of-3">
		               <img src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2014/09/12194999_1231703353512795_5437443080829008042_o.jpg" />
		               <figcaption>
		                  <h3>Sarah Dodge</h3>
		                  <p><i>Program Lead</i></p>
		               </figcaption>
		            </div>
		         </div>
		         <div class="flex">
		            <div class=" image-pullquote left flex-1-of-3">
		               <img src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2014/09/12194999_1231703353512795_5437443080829008042_o.jpg" />
		               <figcaption>
		                 <h3>Kaleigh Watson</h3>
		                 <p><i>Assistant Instructor</i></p>
		               </figcaption>
		            </div>
		           <figure class="flex-2-of-3">
		              <p>Kaleigh Watson is one of the Assistant Instructors for Exposure and a contributor for The Pioneer. She's a 4th Year studying Media Studies at UVA. She participated in Exposure in Spring 2017 and since graduating </p>
		           </figure>
		        </div>
		        <div class="flex">
		          <figure class="flex-2-of-3">
		             <p>Maya Korb is one of the Assistant Instructors for Exposure. She's a 3rd year studying Chemistry and has ben keen on photography since she was 10 years old. In Spring 2017 she joined Hackcville and graduated from the Exposure program.</p>
		          </figure>
		          <div class=" image-pullquote left flex-1-of-3">
		             <img src="http://1qjqp144udvjh172yr0eqox1.wpengine.netdna-cdn.com/wp-content/uploads/2014/09/12194999_1231703353512795_5437443080829008042_o.jpg" />
		             <figcaption>
		               <h3>Sarah Dodge</h3>
		               <p><i>Program Lead</i></p>
		             </figcaption>
		          </div>
		       </div>
		       </div>
		    <div class="container meet-sponsors">
		      <h1 class="header-center">Meet Our Sponsor</h1>
		      <div class="flex">
		        <div class="flex-1-of-3">
		          <img src="" class="sponsor-image">
		        </div>
		        <div class="flex-2-of-3">
		          <p class="sponsor-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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

		<!-- </main><!-- #main -->
	</div><!-- #primary --> 

<?php
get_sidebar();
get_footer();
