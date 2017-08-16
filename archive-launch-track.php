<?php
/**
 * The template for displaying Launch Track archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 

// Import Launch Switcher Menu
$template_url = get_template_directory() . '/template-parts/launch-nav.php';
include ($template_url);
?>
<div class="launch-picker">
	<div class="blue-bg image-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/peiching.jpg');">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1>Level up your skills and launch yourself into a job you'll love.</h1>
				<p>HackCville hosts two different summer programs, depending on your interests and goals:</p> 
			</div>
			<div class="flex">
				<div class="flex-1-of-2 academy">
					<h3>I'm a 1st, 2nd, or 3rd year.</h3>
					<div class="signup">
						<a href="academy" class="button" alt="Apply to Launch">
							Get Details on <br>Launch Academy &rarr;
						</a>
					</div>
				</div>
				<div class="flex-1-of-2 fellowship">
					<h3>I'm a 4th year.</h3>
					<div class="signup">
						<a href="fellowship" class="button" alt="Apply to Launch">
							Get Details on <br>Launch Fellowship &rarr;
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
