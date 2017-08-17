<?php
/**
 * Template Name: Launch Academy Payment
 *The template for displaying Launch Track archives
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

// Import Launch Academy Nav
get_header(); 

$template_url = get_template_directory() . '/template-parts/launch-academy-nav.php';
include ($template_url);

$track_IDs = array();
$check = get_template_directory_uri() . "/images/checkmark.png";
$x = get_template_directory_uri() . "/images/x.png";
$hc_logo = get_template_directory_uri() . "/images/hackcville-logo.png";
$ix = get_template_directory_uri() . "/images/ix.png";
$ga = get_template_directory_uri() . "/images/ga.png";
$af = 0;
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
									<td class='text bold' data-title='Full Cost'><strong>You're paid $1000</strong></td>
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
	// Import Single Random Testimonial
	$t_category_import = "Launch";
	$template_url = get_template_directory() . '/template-parts/single-testimonial.php';
	include ($template_url);
?>
<div class="included">
	<div class="white-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2">
					<h2>What's Included</h2>
					<ul>
						<li>Full access to the 12-week program curriculum, mentorship, and resources</li>
						<li>24/7 access to HackCville's two workspaces on Elliewood Avenue for the duration of the program</li>
						<li>Upon completion of the program, you'll be granted HackCville membership, giving you advance access to other HackCville programs and exclusive job opportunities</li>
						<li>There are no additional textbooks to buy or fees to pay after the cost of tuition. You won't have to pay for summer housing either if you already have an apartment in Charlottesville.</li>
					</ul>
				</div>
				<div class="flex-1-of-2">
					<h2>How can we do this?</h2>
					<p>Our company partners make a payment to HackCville to fund our students' education. We pay students their $1000 stipend out of this payment. If you have further questions, send us an email at launch@hackcville.com.</p>
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
