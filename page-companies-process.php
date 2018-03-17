<?php
/**
 * Template Name: Company Process Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/company-nav.php';
include ($template_url);

?>
<div class="page company-process-hero" id="">
	<div class="blue-bg image-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg5.jpg'); padding: 75px 0;">
		<div class="filter"></div>
		<div class="container">
			<div class="intro">
				<h1>The Launch Process</h1>
				<p>Our proprietary vetting, training, and matching system takes the hassle and risk out of finding top talent for your company. Nearly 50 companies from across Charlottesville, DC, and Richmond worked with us last summer - here's why.</p>
			</div>
		</div>
	</div>
</div>
<div class="company-numbers">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-3-of-4">
					<h2>1. We find and select only the best.</h2>
					<p>Hundreds of top University students in engineering, computer science, business, media, and the arts apply to Launch and go through a vigorous multi-stage vetting process. Students apply to one of five tracks: digital strategy, data science, front-end development, digital media, or software engineering.</p>
				</div>
				<div class="flex flex-1-of-4">
					<div class="flex-1-of-1">
						<h1>800+</h1>
						<p>applicants</p>
					</div>
					<div class="flex-1-of-1">
						<h1>8%</h1>
						<p>acceptance rate</p>
					</div>
				</div>
				<figure class="flex-1-of-2 image-pullquote left">
					<img src="<?php echo get_template_directory_uri(); ?>/images/skills2	.jpg">
					<figcaption>
						<h3>95%</h3><p>of 2017 Launch participants would recommend the program</p>
					</figcaption>
				</figure>
				<div class="flex-1-of-2">
					<h2>2. We train them to be super-interns.</h2>
					<p>Our proprietary training system gets students work-ready fast. Students are immersed in an intensive 9-hour/day bootcamp for the first 5 weeks of the summer. A core part of our curriculum includes training in the communication and professionalism needed to succeed in the workplace.</p>
				</div>
				<div class="flex-1-of-2">
					<p>We teach students how to teach themselves new skills and have them practice with sample clients. <ul>
						<li>Web designers learn design tools, JavaScript, and custom theme development.</li>
						<li>Software engineers learn the full stack with an emphasis on Node and React.</li>
						<li>Digital strategists learn to run integrated marketing campaigns from ideation to execution.</li>
						<li>Data scientists learn R, Python, and data visualization techniques.</li>
						<li>Digital media students learn design, content, and video production using modern equipment.</li>
					</ul></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>company-process" class="button">
						Our Company Signup Process &rarr;
					</a>
				</div>
				<figure class="flex-1-of-2 image-pullquote right">
					<img src="<?php echo get_template_directory_uri(); ?>/images/peiching.jpg">
					<figcaption>
						<p>"I would, no question, not be where I am today in terms of my marketable skills and experience without Launch. I loved my instructors, colleagues, and getting involved in such a creative community."</p>
						<p class="byline">Caroline Kinsella<br>Launch Summer 2017 Participant</p>
					</figcaption>
				</figure>
				
			</div>
		</div>
	</div>
</div>
<div class="matching">
	<div class="hc-blue-bg">
		<div class="container ">
			<h1>3. We find the best match for your company.</h1>
			<div class="flex">
				<figure class="flex-1-of-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/andy.jpg">
				</figure>
				<div class="flex-1-of-2">
					<p>We work closely with each company to find the best match based on each student's skillset and personal interests. We also host barbeques where company reps can get to know students in-person and gauge culture fit and send recommended matches to companies give feedback on.</p>
					<p>Our goal is to find the best fit, and we work with companies and students until both are excited about their match. For the remaining seven weeks of the summer, students then work as full-time interns or project consultants at the company's offices or remotely from HackCville. (June 25 - August 10.)</p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch-past-students" class="button">
						Meet Last Year's Students &rarr;
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="keep-them">
	<div class="white-bg">
		<div class="container">
			<h1>4. Keep them if you want.</h1>
			<div class="flex">
				<div class="flex-1-of-2">
					<h3>Here are just a few of the companies that kept their intern on this fall.</h3>
					<p>Developing a strong base of talent and reducing brain drain is vital for the continued development of Virginia's tech, startup, and small business ecosystem. Launch is designed to increase the number of talented engineers, web designers, marketers, data scientists in Charlottesville and the region and to keep them here. Supporting Launch enables HackCville to continue working toward that mission.</p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch-past-students" class="button">
						Meet Last Year's Students &rarr;
					</a>
				</div>
				<div class="flex-1-of-2 flex">
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/busbot.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/cwj.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/foodio.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/gen180.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/locus.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/lumi.jpeg" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/mad.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/maternity.jpg" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/uphex.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/roots.jpeg" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/twinthread.png" >
					</figure>
					<figure class="flex-1-of-3">
						<img src="<?php echo get_template_directory_uri(); ?>/images/companies/worldstrides.png" >
					</figure>
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

<?php
// Get footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
