<?php
/**
 * Template Name: Launch Fellowship Payment
 *The template for displaying Launch Track archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

// Import Launch Academy Nav
get_header(); 

$template_url = get_template_directory() . '/template-parts/launch-fellowship-nav.php';
include ($template_url);

$track_IDs = array();
$check = get_template_directory_uri() . "/images/checkmark.png";
$x = get_template_directory_uri() . "/images/x.png";
$hc_logo = get_template_directory_uri() . "/images/hackcville-logo.png";
$ix = get_template_directory_uri() . "/images/ix.png";
$ga = get_template_directory_uri() . "/images/ga.png";
$af = 1;
?>
<div class="page">
	<div class="hc-blue-bg">
		<div class="container">
			<?php
				while ( have_posts() ) : the_post(); ?>

				<?php
				get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>
<div class="launch-fellowship-payment-options">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2>Launch offers two different payment options.</h2>
				<p>Our goal is to make Launch accessible and available to all.</p>
			</div>
			<div class="flex">
				<div class="flex-1-of-2 hc-blue-bg">
					<div class="title">
						<h3>Up-Front Tuition</h3>
						<h3 class="subheading">$5000</h3>
						<h4>Half the cost of comparable programs</h4>
					</div>
					<div class="learn">
						<ul>
							<li>You pay $5,000 up-front to cover the cost of the program. Comparable programs (see below) cost upwards of $10,000.</li>
							<li>The cost is similar to that of taking a 9 credits of UVA classes over the summer. (In-state costs around $4,000 and out-of-state costs around $12,000.)</li>
						</ul>
					</div>
					<div class="signup-wrapper">
						<h4>Low-cost, high-impact way to level up your skills and network</h4>
					</div>
				</div>
				<div class="flex-1-of-2 hc-blue-bg">
					<div class="title">
						<h3>Salary-Based Financing</h3>
						<h3 class="subheading">No Payments Until You Get a Job</h3>
						<h4>No-risk way to level up your skills & network</h4>
					</div>
					<div class="learn">
						<ul>
							<li>When you find a job after the program, you pay us 1/10th of your gross salary over 9 months.</li>
							<li>If your new job pays $55,000, you'll pay us $611/month for 9 months.</li>
							<li>If you can't find a job after 6 months, you won't owe us anything. We don't succeed unless you do.</li>
						</ul>
					</div>
					<div class="signup-wrapper">
						<h4>Accessible, no-risk way to get support in finding a job and leveling up your skills</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	// Import Single Random Testimonial
	$t_category_import = "Launch";
	$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
	include ($template_url);
?>
<div class="fellowship-whats-included">
	<div class="blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2">
					<h2>What's Included</h2>
					<ul>
						<li>Full access to the 6-week program curriculum, mentorship, and resources</li>
						<li>24/7 access to HackCville's two workspaces on Elliewood Avenue for the duration of the program</li>
						<li>Upon completion of the program, you'll be granted HackCville membership, giving you advance access to other HackCville programs and exclusive job opportunities, should you decide to stay in Charlottesville</li></li>
					</ul>
					<br>
					<h3>If you have more questions about how our payment options work, please email us at <a href="mailto:launch@hackcville.com">launch@hackcville.com</a>.</h3>
				</div>
				<div class="flex-1-of-2">
					<h2>What You Provide</h2>
					<p>You must be able to commit to the full 6 weeks of the program.</p>
					<p>You must have your own housing in Charlottesville. We can connect you to potential subleasing opportunities but we do not provide housing as part of the program.</p>
					<p>You must be able to use your own laptop for the duration of the program.</p>
					<p>If you participate in the marketing track, you must have Adobe Creative Cloud. If you don't already have it, we can provide you one of our licenses for the duration of the program at a one-time cost of $100.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="program-comparison">
	<div class="white-bg">
		<div class="container">
			<div class="program-comparison-content">
				<h2>Here's how Launch stacks up compared to other summer options.</h2>

				<style>
				.rg-container {
					margin: 0;
					padding: 1em 0em;
					overflow: scroll;
				}
				.rg-header {
					margin-bottom: 1em;
				}
				.rg-hed {
					font-weight: bold;
					font-size: 1.4em;
				}
				.rg-dek {
					font-size: 1em;
				}
				.rg-source {
					margin: 0;
					float: left;
					font-weight: bold;
					font-size: 0.75em;
				}
				.rg-source .pre-colon {
					text-transform: uppercase;
				}

				/* table */
				table.rg-table {
					width: 100%;
					margin-bottom: 0.5em;
					font-size: 1em;
					border-collapse: collapse;
					border-spacing: 0;
					border: 1px solid #ddd;

				}
				table.rg-table * {
					-moz-box-sizing: border-box;
					box-sizing: border-box;
					margin: 0;
					padding: 0;
					border: 0;
					font-size: 100%;
					font: inherit;
					vertical-align: baseline;
					text-align: center;
					color: #333;
					vertical-align: middle;
				}
				table.rg-table thead {
					border-bottom: 1px solid #ddd;
					background: #d4d4d4;
				}
				table.rg-table tr {
					border-bottom: 1px solid #ddd;
					color: #222;
				}
				table.rg-table tr:nth-child(2n) {
					background: #f9f9f9;
				}
				table.rg-table tr.highlight {
					background: #efefef;
				}
				table.rg-table.zebra tr:nth-child(even) {
					background: #efefef;
				}
				table.rg-table th {
					font-weight: bold;
					padding: 1em;
					font-size: 1.1em;
					vertical-align: middle;
				}
				table.rg-table td {
					padding: .75em;
				}
				table.rg-table tr td:first-child {
					width: 200px;
					font-weight: bold;
					padding-right: 1.25em;
				}
				table.rg-table tr td:last-child {
					width: 300px;
				}
				table.rg-table .highlight td {
					font-weight: bold;
				}
				table.rg-table th.number, td.number {
					text-align: right;
				}
				table.rg-table tr td.bold{
					font-weight: bold;
				}

				/* media queries */
				@media screen and (max-width: 600px) {
				.rg-container {
					max-width: 600px;
					margin: 0 auto;
				}
				table.rg-table {
					display: block;
					width: 100%;
				}
				table.rg-table tr.hide-mobile, table.rg-table th.hide-mobile, table.rg-table td.hide-mobile {
					display: none;
				}
				table.rg-table thead {
					display: none;
				}
				table.rg-table tbody {
					display: block;
					width: 100%;
				}
				table.rg-table tr, table.rg-table th, table.rg-table td {
					display: block;
					padding: 0;
				}
				table.rg-table tr {
					border-bottom: none;
					margin: 0 0 1em 0;
					padding: 0.5em 0;
				}
				table.rg-table tr.highlight {
					background: none;
				}
				table.rg-table.zebra tr:nth-child(even) {
					background: none;
				}
				table.rg-table.zebra td:nth-child(even) {
					background: #efefef;
				}
				table.rg-table tr:nth-child(even) {
					background: none;
				}
				table.rg-table td {
					/*padding: 0.5em 0 0.25em 0;*/
					padding: 0.5em;
					border-bottom: 1px dotted #ccc;
					text-align: right;
				}
				table.rg-table tr td:first-child {
					width: initial;
					border-bottom: none;
					padding-bottom: 0;
					padding-right: 0.5em;
				}
				table.rg-table td:first-child,
				table.rg-table td:nth-child(2) {
					text-align: center;
					font-weight: bold;
					text-transform: uppercase;
				}
				table.rg-table tr td:last-child {
					width: initial;
					padding-right: 0.5em;
				}
				table.rg-table td[data-title]:before {
					content: attr(data-title);
					font-weight: bold;
					display: inline-block;
					content: attr(data-title);
					float: left;
					margin-right: 0.5em;
					font-size: 0.95em;
				}
				table.rg-table td:last-child {
					padding-right: 0;
					border-bottom: 2px solid #ccc;
				}
				table.rg-table td:empty {
					display: none;
				}
				table.rg-table .highlight td {
					background: none;
				}
				table .bold strong { 
					font-weight: bold !important;}
				}

				strong {
					font-weight: bold;
				}
				</style>
				<div class='rg-container'>
					<div class='rg-content'>
						<table class='rg-table'>
							<thead>
								<th class='text '></th>
								<th class='text '>Program Name</th>
								<th class='text '>Skills Training</th>
								<th class='text '>Industry Immersion</th>
								<th class='text '>Career Support</th>
								<th class='text '>Immersive Internship</th>
								<th class='text '>Full<br>Cost</th>
							</thead>
							<tbody>
								
								<tr class=''>
									<td class='text ' data-title=''><img src="<?php echo $hc_logo; ?>" class="logo" /></td>
									<td class='text ' data-title=''>Launch</td>
									<td class='text ' data-title='Intensive Skills Training'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Industry Immersion'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Career Support'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Immersive Internship'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text bold' data-title='Full Cost'><strong>$5000 or $0 + financing (more info above)</strong></td>
								</tr>


								<tr class=''>
									<td class='text ' data-title=''><img src="<?php echo $ga; ?>" class="logo" /></td>
									<td class='text ' data-title=''>Web Development Immersive</td>
									<td class='text ' data-title='Intensive Skills Training'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Industry Immersion'><img src="<?php echo $x; ?>" class="x" /></td>
									<td class='text ' data-title='Career Support'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Immersive Internship'><img src="<?php echo $x; ?>" class="x" /></td>
									<td class='text ' data-title='Full Cost'>You pay $13,500</td>
								</tr>
								<tr class=''>
									<td class='text ' data-title=''><img src="<?php echo $ix; ?>" class="logo" /></td>
									<td class='text ' data-title=''>Sage Summer Program</td>
									<td class='text ' data-title='Intensive Skills Training'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Industry Immersion'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Career Support'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Immersive Internship'><img src="<?php echo $check; ?>" class="check" /></td>
									<td class='text ' data-title='Full Cost'>You pay $11,900</td>
								</tr>
							
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php
	// Import Launch More
	$template_url = get_template_directory() . '/template-parts/launch-more.php';
	include ($template_url);
?>

<?php
get_footer();
