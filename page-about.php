<?php
/**
 * Template Name: About Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

?>
<div class="about-hero flex">
	<div class="blue-bg flex-1-of-3 split-text">
		<div class="split-overlay right">
			<?php
			while ( have_posts() ) : the_post(); 
				the_content(); ?>
				<a class="button shorter-button" href="#" onclick="meetTheTeam()">
					Our Team &darr;
				</a>
				<a class="button shorter-button" href="<?php echo esc_url( home_url( '/' ) ); ?>partners">
					Our Partners &rarr;
				</a>
			<?php endwhile; // End of the loop. ?>
		</div>
	</div>
	<div class="flex-2-of-3 image-bg split-pic" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg2.png');">
	</div>
</div>
<?php
	// Import HC Initiatives
	$template_url = get_template_directory() . '/template-parts/hc-initiatives.php';
	include ($template_url);
?>
<?php
// Show the team

$authors = get_users(); 

$board = array();
$directors = array();
$staff = array();
$pioneers = array();
$founders = array();

foreach ($authors as $author) {
	$user_id = $author->data->ID;
	$active = get_field('active', 'user_'.$user_id);
	if ($active && !in_array( 'subscriber', (array) $author->roles ) ) {
		if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "board_member")) { 
			array_push($board, $user_id);
		}
		else if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "director")) { 
			array_push($directors, $user_id);
		}
		else if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "producer")) { 
			array_push($pioneers, $user_id);
		}
		else if (!strcmp(get_field('leadership_type', 'user_'.$user_id), "advisor")) { // do nothing 
		}
		else {
			array_push($staff, $user_id);
		}


		$full_name = $author->data->display_name;
		if ((!strcmp($full_name, "Brendan Richardson")) ||
			(!strcmp($full_name, "Spencer Ingram")) ||
			(!strcmp($full_name, "Daniel Willson")) ||
			(!strcmp($full_name, "Alyssa Dizon"))) { 
			array_push($founders, $user_id);
		}
	}
} 

//$combined_staff = 

?>

<div class="hackcville-staff" id="staff-grid">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2>HackCville's Staff</h2>
			</div>
			<div class="flex">
				<?php 
				// foreach ($combined_staff as $person) {
				foreach ($directors as $person) {
					$full_name = get_the_author_meta('first_name', $person) . " " . get_the_author_meta('last_name', $person);
					$first_name = get_the_author_meta('first_name', $person);
					$permalink = get_author_posts_url($person);
					$title = get_field("title", 'user_'.$person);

					$h = false;
					$headshot = get_field('headshot', 'user_'.$person);
					if ($headshot) {
						$h = $headshot;
					}
					else {
						// legacy support for headshots from old Pioneer site
						$h = types_render_usermeta_field( "headshot", array( 'user_id'=>$person, 'output'=>'raw' ) );
						if ($h == "") {
							// if there is no headshot, use a generic one
							$h = get_template_directory_uri() . "/images/headshot.jpg";
						}
					}

				?>
					<div class="flex-1-of-5 person">
						<div class="headshot" style="background-image:  url('<?php echo $h; ?>');">
						</div>
						<div class="info">
							<h4 class="name"><?php echo $full_name; ?></h4>
							<p class="title"><?php echo $title; ?></p>
							<p class="link">
								<a href="<?php echo $permalink; ?>">
									More about <?php echo $first_name; ?> &rarr;
								</a>
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Board of Directors Grid -->
<div class="hackcville-staff" id="board-grid">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2>HackCville's Non-Profit Board of Directors</h2>
			</div>
			<div class="flex">
				<?php 
				foreach ($board as $person) {
					$full_name = get_the_author_meta('first_name', $person) . " " . get_the_author_meta('last_name', $person);
					$first_name = get_the_author_meta('first_name', $person);
					$permalink = get_author_posts_url($person);
					$title = get_field("title", 'user_'.$person);

					$h = false;
					$headshot = get_field('headshot', 'user_'.$person);
					if ($headshot) {
						$h = $headshot;
					}
					else {
						$h = get_template_directory_uri() . "/images/headshot.jpg";
					}

				?>
					<div class="flex-1-of-4 person">
						<div class="headshot" style="background-image:  url('<?php echo $h; ?>');">
						</div>
						<div class="info">
							<h4 class="name"><?php echo $full_name; ?></h4>
							<p class="title"><?php echo $title; ?></p>
							<p class="link">
								<a href="<?php echo $permalink; ?>">
									More about <?php echo $first_name; ?> &rarr;
								</a>
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Founders Grid -->
<div class="hackcville-staff" id="founders-grid">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2>HackCville's Founding Team</h2>
			</div>
			<div class="flex">
				<?php 
				foreach ($founders as $person) {
					$full_name = get_the_author_meta('first_name', $person) . " " . get_the_author_meta('last_name', $person);
					$first_name = get_the_author_meta('first_name', $person);
					$permalink = get_author_posts_url($person);
					$title = get_field("title", 'user_'.$person);
					$h = get_field('headshot', 'user_'.$person);

				?>
					<div class="flex-1-of-4 person">
						<div class="headshot" style="background-image:  url('<?php echo $h; ?>');">
						</div>
						<div class="info">
							<h4 class="name"><?php echo $full_name; ?></h4>
							<p class="title"><?php echo $title; ?></p>
							<p class="link">
								<a href="<?php echo $permalink; ?>">
									More about <?php echo $first_name; ?> &rarr;
								</a>
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>


<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
