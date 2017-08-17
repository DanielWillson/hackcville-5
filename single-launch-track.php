<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); 

while ( have_posts() ) : the_post();

$id = get_the_ID();
$af = -1;

$academy = false;
$fellowship = false;
if (has_term( "Academy", "launch_track_type", $id )) {
	$academy = true;
} 
if (has_term( "Fellowship", "launch_track_type", $id )) {
	$fellowship = true;
}

if ($academy && !$fellowship) {
	$af = 0;
	$template_url = get_template_directory() . '/template-parts/launch-academy-nav.php';
	include ($template_url);
}
elseif ($fellowship && !$academy) {
	$af = 1;
	$template_url = get_template_directory() . '/template-parts/launch-fellowship-nav.php';
	include ($template_url);
}
else {
	if ( isset($_GET['type']) && $_GET['type'] == 1 ) {
		$template_url = get_template_directory() . '/template-parts/launch-fellowship-nav.php';
		include ($template_url);
		$af = 1;	
	}
	elseif ( isset($_GET['type']) && $_GET['type'] == 0 ) {
		$template_url = get_template_directory() . '/template-parts/launch-academy-nav.php';
		include ($template_url);
		$af = 0;
	}
	else {
		$template_url = get_template_directory() . '/template-parts/launch-nav.php';
		include ($template_url);
	}
}

$id = get_the_ID();
$title = get_the_title();
$description = get_field('track_description');
$what_you_learn = get_field('what_you_learn');
$walk_away = get_field('what_you_walk_away_with');
$partners_2016 = get_field("2016_partners");
$p16 = array();
if ($partners_2016) { foreach ($partners_2016 as $p) {
	array_push($p16, $p->ID);
}}
$partners_2017 = get_field("2017_partners");
$p17 = array();
if ($partners_2017) {foreach ($partners_2017 as $p) {
	array_push($p17, $p->ID);
}}

?>

<header class="launch-track-hero">
	<div class="image-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/mike.jpg);">
		<div class="filter"></div>
		<div class="container">
			<div class="intro" style="padding: 75px 0;
	text-align: left;
	max-width: 600px;">
			
				<h2><?php echo $title; ?> Track</h2>
				<p><?php echo $description; ?></p>
			
			</div>
		</div>
	</div>
</header>
<div class="learning">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<figure class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/skills1.jpg">
				</figure>
				<div class="flex-1-of-2">
					<h3>What You'll Learn</h3>
					<p><?php echo $what_you_learn; ?></p>
				</div>
				<div class="flex-1-of-2">
					<h3>What You Walk Away With</h3>
					<p><?php echo $walk_away; ?></p>
				</div>
				<figure class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/skills2.jpg">
				</figure>
			</div>
		</div>
	</div>
</div>
<?php if ($partners_2016) { ?>
<div class="partners-2016 launch-partners">
	<div class='white-bg'>
		<div class='container'>
			<div class="intro" style="margin-bottom: 1em;">
				<h1>Our Hiring Partners</h1>
				<h3>Here are the companies that offered internships to our Launch Academy <?php echo strtolower($title); ?> students in Summer 2017.</h3>
			</div>
			<div class="flex align" style="align-items: center;"><?php
				foreach ($p16 as $p) { ?>
					<figure class="flex-1-of-4"  style="flex-basis: 21%; padding: 15px; text-align: center;">
						<img src="<?php echo get_field('logo', $p); ?>">
					</figure>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<?php
endwhile; // End of the loop.
?>
<?php
	// Import Launch More
	$template_url = get_template_directory() . '/template-parts/launch-more.php';
	include ($template_url);
?>
<?php

get_footer();
