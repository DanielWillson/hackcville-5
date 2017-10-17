<?php
/**
 * Template Name: Company Overview Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/company-nav.php';
include ($template_url);

?>
<div class="page company-hero" id="">
	<div class="blue-bg image-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg2.png');">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h2>Partner with HackCville for vetted & trained top talent.</h2>
				<p>The Launch Summer Internship Program isn't your typical internship program. Our interns get advanced training in critical skills: code, design, marketing, data, and more. Then we match these super-interns with your company to tackle big projects this summer.</p>
				<p>We provide technical and marketing talent to 50+ of the top startup and tech firms across Charlottesville at very affordable prices. Students get a once in a lifetime opportunity to learn invaluable skills and build experience. Read on for how your company can get involved.</p> 
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch-process" class="button">
					Our Process &rarr;
				</a>
				<a href="https://hackcville.typeform.com/to/c45Hu0" class="button" target="_blank">
					Request more info &rarr;
				</a>
			</div>
			<?php
			// while ( have_posts() ) : the_post(); 
			// 	get_template_part( 'template-parts/content', 'page' );
			// endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>
<div class="co-how-it-works" id="">
	<div class="hc-blue-bg">
		<div class="container section-border">
			<h1>Here's how it works:</h1>
			<div class="flex">
				<figure class="flex-2-of-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/bg-oh.jpg">
				</figure>
				<div class="flex-3-of-5">
					<h2>1) We find and vet 500+ top students so you don't have to.</h2>
					<p>Top engineering, computer science, business, media, and arts students apply to Launch in the fall and go through a vigorous multi-stage vetting process. Our acceptance rate is about 15%, and 50% of our accepted students are female.</p>
				</div>
				<figure class="flex-2-of-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/keaton.jpg">
				</figure>
				<div class="flex-3-of-5">
					<h2>2) We train them to become super-interns in just 5 weeks.</h2>
					<p>Our proprietary training system gets students work-ready fast. We teach modern tools and techniques to 5 different tracks: software dev, web design, digital media, digital strategy, and data science. We round out them out by teaching the communication skills and professionalism needed to succeed in the workplace.</p>
				</div>
				<figure class="flex-2-of-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/mike.jpg">
				</figure>
				<div class="flex-3-of-5">
					<h2>3) We match students with companies to tackle big projects for the rest of the summer.</h2>
					<p>Throughout the training process, we work closely with each company to find the best match based on each student's skillset, personal interests, and culture fit. For the remaining seven weeks of the summer, students then work as full-time interns or project consultants at the company's offices. (June 25 - August 10.)</p>
				</div>
				<figure class="flex-2-of-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/bg6.jpg">
				</figure>
				<div class="flex-3-of-5">
					<h2>4) Keep them if you want.</h2>
					<p>After Launch, dozens of companies continued to work with HackCville and their interns for ongoing part-time work. Some students in our inaugural program were even hired full-time with their matched companies.</p>
				</div>
				<div class="flex-1-of-1 cta">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch-process" class="button">
						<h3>Our Process &rarr;</h3>
					</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch-past-students" class="button">
						<h3>Meet the Students &rarr;</h3>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
$track_IDs = array();
$launch_track_query = new WP_Query(array('post_type' => 'launch-track'));
if ( $launch_track_query->have_posts() ) {
	while ( $launch_track_query->have_posts() ) { $launch_track_query->the_post();
		array_push($track_IDs, get_the_ID());
	}
}
$partners_2017 = array();

foreach ($track_IDs as $t) {
	// get all partners of that track
	$partners = get_field("2016_partners", $t);
	if ($partners) {
		foreach ($partners as $partner) {
			$id = $partner->ID;
			if(!in_array($id, $partners_2017)){
				array_push($partners_2017, $id);
			}
		}
	}
}
?>
<div class="past-partners">
	<div class="white-bg">
		<div class="container">
			<h1>Company Partners from Summer 2017</h1>
			<div class="flex">
				<div class="flex-3-of-5 flex">
					<?php foreach ($partners_2017 as $p2) { ?>
						<figure class="flex-1-of-3">
							<img src="<?php echo get_field('logo', $p2); ?>">
						</figure>
					<?php }?>
				</div>
				<div class="flex-2-of-5">
					<h3>"[Our intern] is frickin KILLER. He is as good as you said he would be. This kid is whip smart and picking concepts up really, really quickly. There’s world-changing product just around the corner."</h3>
					<p>- Oliver Beavers, Trivium Financial</p>
					<br>
					<br>
					<h3>"I’ve found both of our interns to be both incredibly motivated and motivating. The pace of work is impressive."</h4>
					<p>- Tara Faust, Maternity Neighborhood</p>
					<br>
					<br>
					<h3>"Our three interns are AWESOME. The output for the short amount of time they’ve had is incredible. I love them."</h3>
					<p>- Derek Mansfield, Local Food Entrepreneur</p>
					<br>
					<br>
					<h3>"As we seek to build our creative economy, HackCville will play a crucial role in training and keeping talent here in Charlottesville."</h3>
					<p>- Charlottesville Mayor Mike Signer</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// Get Company CTA
$template_url = get_template_directory() . '/template-parts/company-cta.php';
include ($template_url);
?>


<!--
Capabilities section / example past projects
-->

<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
