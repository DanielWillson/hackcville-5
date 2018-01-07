<?php
/**
 * Template Name: Pioneer About Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

get_header(); 
$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
include ($template_url);
$pioneer = 1;
?>
	<div class="page about-pioneer" id="pioneer-check">
		<div class="white-bg">
			<div class="container">
				<?php
				while ( have_posts() ) : the_post(); ?>

					<?php
					get_template_part( 'template-parts/content', 'page' );


				endwhile; // End of the loop.
				?>
				<div class="staff">
					<h2>The Pioneer Staff</h2>
					<p>All of our producers are either current students or graduates of HackCville’s media education programs. HackCville staff also occasionally contribute to The Pioneer.</p>
					<div class="flex">
					<?php
					$authors = get_users();
					foreach ($authors as $author) {
						$user_id = $author->data->ID;
						$teams = get_field('leadership_teams', 'user_'.$user_id);
						if ($teams) {
							foreach($teams as $team) {
								$team_title = get_the_title($team);
								if (!strcmp($team, "pioneer")) {
									$active = get_field('active', 'user_'.$user_id);
									if ($active) {
										$author_name = $author->data->display_name;
										?>
										<div class="flex-1-of-5 staff">
											<div class="headshot" style="background-image:  url('<?php 
													if (get_field('headshot', 'user_'.$user_id)) {
														echo get_field("headshot", 'user_'.$user_id); 
														}
													else {
														// legacy support for headshots from old Pioneer site
														$h = types_render_usermeta_field( "headshot", array( 'user_id'=>$user_id, 'output'=>'raw' ) );
														if ($h == "") {
															// if there is no headshot, use a generic one
															echo get_template_directory_uri() . "/images/headshot.jpg";
														}
														else {
															echo $h;
														}
													}
												?>');">
											</div>
											<div class="info">
												<h4 class="name"><?php echo $author_name; ?></h4>
												<p class="title"><?php echo get_field("title", 'user_'.$user_id); ?></p>
												<p class="link"><a href="<?php echo get_author_posts_url($user_id); ?>">View profile &rarr;</a></p>
											</div>
										</div>
										<?php
									}
								}
							}
						}
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
// Get Pioneer footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
