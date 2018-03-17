<?php
/**
 * The template for displaying partner archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

$founding = array();
$programming = array();
$trip = array();
$community = array();
$student = array();
$friends = array();

$the_query = new WP_Query(array('post_type' => 'partner', 'posts_per_page'=> '-1'));
while ( $the_query->have_posts() ) { 
	$the_query->the_post();
	$type = get_field("type");
	$id = get_the_ID();
	
	if (in_array("Presenting Partner", $type)) {
		array_push($founding, $id);
	}
	if (in_array("Prorgramming Partner", $type)) {
		array_push($programming, $id);
	}
	if (in_array("Trip Partner", $type)) {
		array_push($trip, $id);
	}
	if (in_array("Community Partner", $type)) {
		array_push($community, $id);
	}
	if (in_array("Student Organization Partner", $type)) {
		array_push($student, $id);
	}
	if (in_array("Friend of HackCville", $type)) {
		array_push($friends, $id);
	}
	
}
?>


<div class="partner-archive-hero">
	<div class="hc-blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-1">
					<h1>HackCville's Partners</h1>
				</div>
				<div class="flex-3-of-5">
					<p>We're very thankful to the partners and sponsors that make all of our programs and initiatives possible. We're proud to be supported by over a hundred organizations across Charlottesville, UVA, and beyond.</p>
					<p>If you'd like to work with HackCville, email us at hello@hackcville.com.</p>
				</div>
				<div class="flex-2-of-5">
					<a class="button shorter-button" href="<?php echo esc_url( home_url( '/' ) ); ?>about">
						Our Team &rarr;
					</a>
					<a class="button shorter-button" href="mailto:hello@hackcville.com">
						Contact Us &rarr;
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (!empty($founding)) { ?>
<div class="partner-grid founding">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Founding Sponsors</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($founding as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-3">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } if (!empty($programming)) { ?>
<div class="partner-grid programming">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Programming + Event Partners</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($programming as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-5">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } if (!empty($community)) { ?>
<div class="partner-grid community">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Community Partners</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($community as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-5">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } if (!empty($trip)) { ?>
<div class="partner-grid programming">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Startup Trip Partners</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($trip as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-5">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
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
<?php if (!empty($student)) { ?>
<div class="partner-grid student">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Student Organization Partners</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($student as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-5">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } if (!empty($friends)) { ?>
<div class="partner-grid friend">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h1>Friends of HackCville</h1>
			</div>
			<div class="flex">
				<?php 
				foreach ($friends as $p) { 
					// $name = get_the_title($p);
					$logo = get_field("logo", $p);
					$website = get_field("website", $p);					
					// $description = get_field("description", $p); 
					?>
					<div class="flex-1-of-5">
						<a class="website" target="_blank" href="<?php echo $website; ?>">
							<img src="<?php echo $logo; ?>" class="logo"> 
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>



	


<?php
get_footer();
