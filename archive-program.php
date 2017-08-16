<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

$program_ids = array();
$skills_ids = array();
$eship_ids = array();
$wireframeID = -1;

if ( have_posts() ) {
	while ( have_posts() ) : the_post(); 
		if (get_field("active_program")) {
			array_push($program_ids, get_the_ID());
			
			if (has_term( "Skills", "program_type")) {
				array_push($skills_ids, get_the_ID());
			}
			if (has_term( "Entrepreneurship", "program_type")) {
				array_push($eship_ids, get_the_ID());
			}
			if (!strcmp("Wireframe", get_the_title())){
				$wireframeID = get_the_ID();
			}
		}
endwhile;	}?>

<header class="program-archive-hero">
	<div class="image-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/mike.jpg);">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1>HackCville Programs</h1>
				<p>HackCville offers 10-week programs in everything from entrepreneurship to photography to data science. We’ll help you learn the ins and outs of modern skills through fun, hands-on projects in a fast-paced, community-driven environment.</p>
				<p>Our programs are open to any UVA student (undergrad/grad) or Charlottesville resident 18+. Once you complete your first HackCville program, you’re granted HackCville membership which comes with many perks detailed below.</p>
			</div>
		</div>
	</div>
</header>
<div class="programs-list">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<?php 
				$date = "";
				$close_date = date_create(get_field("application_close_date", $wireframeID));
				$open_date = date_create(get_field("application_open_date", $wireframeID));
				$closing_date = date_format($close_date,"l, F d, Y") . " at 11:59pm"; 
				

				if(strtotime(date_format($open_date,"l, F d, Y"))<=strtotime("today")){
				    //past or today
				    $date = "close " . date_format($close_date,"l, F d, Y") . " at 11:59pm"; 
				} else {
				    // future
				    $date = "will open " . date_format($open_date,"l, F d, Y"); 
				}
				?>
				<h2>Our Fall Programs</h2>
				<p>Program applications <?php echo $date; ?>, and are accessible via the links below. You may apply to up to two programs, but will only be accepted into one. We encourage you to read more about our process below.</p>
				<p>If you're accepted, $40 dues are expected within the first week of the program. This can be reduced or waived for those with financial need.</p>
			</div>
			<div class="flex">
				<div class="flex-1-of-2">
					<div class="bolded-list">
						<div class="white-bg program-list">
							<a class="button not-active"><h3>Learn a Skill</h3></a>
							<div class="list">
								<?php foreach ($skills_ids as $sp) { ?>
								<div class="list-item">
									<img src="<?php the_field("program_icon", $sp); ?>" class="icon">
									<span class="title"><?php echo get_the_title($sp); ?>:</span>
									<span class="topic"><?php the_field("program_topic", $sp); ?></span>
									<br>
									<a href="<?php the_permalink($sp); ?>">more info &#8594;</a>
								</div>
								<?php }	?>
							</div>
						</div>
					</div>
				</div>
				<div class="flex-1-of-2">
					<div class="bolded-list">
						<div class="white-bg program-list">
							<a class="button not-active"><h3>Start Something</h3></a>
							<div class="list">
								<?php foreach ($eship_ids as $ep) { ?>
								<div class="list-item">
									<img src="<?php the_field("program_icon", $ep); ?>" class="icon">
									<span class="title"><?php echo get_the_title($ep); ?>:</span>
									<span class="topic"><?php the_field("program_topic", $ep); ?></span>
									<br>
									<a href="<?php the_permalink($ep); ?>">more info &#8594;</a>
								</div>
								<?php }	?>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>
<?php
// Import single random testimonial
$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
include ($template_url);
?>
<div class="application-process">
	<div class="table-list">
		<div class="blue-bg">
			<div class="container applications">
				<div class="intro">
					<h1>Application Process</h1>
					<h3>Applications <?php echo $date; ?></h3>
				</div>
				<div class="flex">
					<div class="flex-1-of-2 list-heading">
						<h3>1</h3>
					</div>
					<div class="flex-1-of-2 list-info">
						<h3><span class="important">Fill out an application, accessible via the links above<span></h3>
						<p>Each program has its own application which you can access via the individual program pages above. The application will ask basic questions (i.e. year, major, etc.), as well as longer questions to understand why you would like to join the HackCville community. You may apply to no more than two programs. Should you be accepted to both, you must choose one.</p>
						<p>All applications for fall programs are due by <?php echo $closing_date; ?>.
					</div>
					<div class="flex-1-of-2 list-heading">
						<h3>2</h3>
					</div>
					<div class="flex-1-of-2 list-info">
						<h3><span class="important">The HackCville team will review your application<span></h3>
						<p>After you submit your application, it will be reviewed by the HackCville team. We blind themselves to all names, emails, and demographic information to minimize any bias. Three staff members will review each application.</p>
						<p>Our data science and analytics team reviews this process each semester to ensure an unbiased process. In Spring 2017, no statistically significant biases in our process were found with regards to ethnicity, gender, financial need, or age.</p>
					</div>
					<div class="flex-1-of-2 list-heading">
						<h3>3</h3>
					</div>
					<div class="flex-1-of-2 list-info">
						<h3><span class="important">Called back for an interview<span></h3>
						<p>After our team scores applications, top applicants are invited back to interview with two HackCville team members. You will be notified by Wednesday, August 30 either way.</p> 
						<p>These interviews are brief and informal, and typically last no longer than 10 minutes. These two members will score the interview and compare them to the application scores in order to make a final decision.</p>
					</div>
					<div class="flex-1-of-2 list-heading">
						<h3>4</h3>
					</div>
					<div class="flex-1-of-2 list-info">
						<h3><span class="important">Final decisions<span></h3>
						<p>If you are accepted, congratulations! HackCville will notify you by the end of the day on Saturday, September 2. All accepted students will be expected to participate in our Program Kickoff, 11am-5pm, Sunday, September 3. $40 dues are also expected by Sunday, September 10 - these can be waived for any student with financial need.</p>
						<p>If you're not accepted, don't worry! Many of current members applied multiple times before they were accepted. Programs are just one way to be involved - many also particiapte in our trips, public events, and summer program, Launch.</p>
					</div>
				</div>
				<div class="cta">
					<a class="not-active button">Email us questions at hello@hackcville.com</a>
				</div>
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
	// Import Membership Perks
	$template_url = get_template_directory() . '/template-parts/membership-perks.php';
	include ($template_url);
?>
<?php
// Import single random testimonial
$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
include ($template_url);
?>

	


<?php
get_footer();
