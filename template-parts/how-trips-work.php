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
					<p>On a typical trip, we'll visit 5-6 companies for about an hour each. We often speak to high-level employees - founders, CTOs, marketing directors, etc - about their experiences. HackCville and/or UVA alumni employees at these companies are frequent hosts of these visits.</p>
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc4.jpg">
				</div>
				<div class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/nyc3.jpg">
				</div>
				<div class="flex-1-of-2">
					<h2>4. Alumni Mixer</h2>
					<p>We end each day of visits with an opportunity to network with dozens of local alumni in whatever city we're visiting. You'll get to talk to them about how they got to where they are today. Many are hiring, too! Most students walk away with new friends and new contacts that can help them with their personal projects, academic journey, and job prospects.</p>
				</div>


				<?php 
				// This conditional area shows the staff member in charge of the trip if it is still in the future or currently happening

				// if you're not on the trip-archive (you need to be on an individual trip-page)
				if (is_single()) {

					// get the end of the trip
					$end_date = get_field("trip_end_date", $ID);
					$date = DateTime::createFromFormat('mdY', $end_date);
					$end_date = $date->format('Y-m-d');
					$today = date('Y-m-d', time());
					$ed = strtotime($end_date);
					$td = strtotime($today);
					$currentTripID = get_the_ID();

					// if the trip is in the future or happening 
					if ($td <= $ed) {
						
						$authors = get_users(array('role__not_in' => array('Subscriber')));
						$ids = array();
						$managerID = -1;
						$manager = '';

						foreach ($authors as $author) {
							$user_id = $author->ID;							
							$trips = get_field('trip_team', 'user_'.$user_id);
							if ($trips) {
								foreach($trips as $trip) {
									$author_trip = get_the_ID($trip);
									$current_trip = $currentTripID;

									if ($author_trip == $current_trip) {
										$name = $author->first_name . " " . $author->last_name;
										$manager = $author;
										$managerID = $user_id;
										break;
									}
								}
							}
						}
					?>
					<?php if ($managerID != -1) { ?>
						<div class="flex-2-of-3">
							<h2>5. Still have questions?</h2>
							<p><strong><?php echo $name; ?></strong> is the manager for the <?php echo get_the_title(); ?> trip. If you've read this page and you still have questions, please feel free to get in touch via email at <?php echo $manager->user_email; ?>.</p>
							<a href="<?php echo get_author_posts_url($manager->ID) ?>" target="_blank" class="button">
								More about <?php echo $manager->first_name; ?> &rarr;
							</a>
						</div>
						<figure class="flex-1-of-3">
							<img src="<?php echo get_field("headshot", 'user_' . $managerID); ?>">
						</figure>
					<?php } else { ?>
						<div class="flex-1-of-1">
							<h2>5. Still have questions?</h2>
							<p>Email trips@hackcville.com and someone will get back to you soon!</p>
						</div>
					<?php } ?>
				<?php }} ?>
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