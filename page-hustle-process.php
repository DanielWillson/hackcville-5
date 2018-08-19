<?php
/**
 * Template Name: Hustle How It Works
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/hustle-nav.php';
include ($template_url);
$hustle = 1;
?>

<?php
// while ( have_posts() ) : the_post(); ?>

<?php
// 	get_template_part( 'template-parts/content', 'page' );


// endwhile; // End of the loop.
?>
<div class="page hustle-learnings-heading">
	<div class="image-bg" style="background-image: url('https://static1.squarespace.com/static/5a36a18264b05fcc670bbda1/t/5b1beee6352f539420dd6371/1528977366266/Radify-StockPhoto-3.jpg?format=1500w'); background-position: center center;">
		<div class="filter"></div>
		<div class="container">
			<div class="flex">
				<div class="flex-3-of-4">
					<h1>How Hustle Works</h1>
					<h3>Throughout the Hustle program you'll work on 4 mini-startup projects in small teams. You can expect to commit 5-7 hours/week for 10 weeks, starting September 9.</h3>
					<h3>Here's what you'll learn and how the projects will work.</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hustle-learnings bolded-list">
	<div class="white-bg">
		<div class="container">
			<h2>What You'll Learn in Hustle</h2>
			<div class="flex">
				<div class='flex-1-of-3'>
					<h4>Rapid Prototyping</h4>
					<p>We’ll teach you how to make a lot from a little. It’s a skill entrepreneurs need and employers crave. You’ll learn the digital tools needed to quickly prototype your ideas for little or no cost -- whether you want to build an app, new product, service, or anything else you can think of. These tools include Splash, Typeform, Squarespace, MailChimp, LinkedIn, FB advertising, and more. </p>
				</div>
				<div class='flex-1-of-3'>
					<h4>Hello there</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


					Throughout the 10-week program, we’ll teach you the digital tools, technologies, and methods that the experts use to get ideas off the ground.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
