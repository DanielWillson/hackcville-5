<div class="launch-more">
	<div class="hc-blue-bg">
		<div class="container">
			<div class="flex">
				<div class="flex-1-of-2 info">
					
					<?php
						if ($af == 0) { // Academy
							echo "<h3>More Launch Info</h3>";
							wp_nav_menu( array(
								'theme_location' => 'launch-academy-menu',
								'menu_id'        => 'launch-academy-menu',
							) );
						}
						elseif ($af == 1) { // Fellowship
							echo "<h3>More Launch Info</h3>";
							wp_nav_menu( array(
								'theme_location' => 'launch-fellowship-menu',
								'menu_id'        => 'launch-fellowship-menu',
							) );
						}
						else { ?>
							<h3>I'm a 1st, 2nd, or 3rd year.</h3>
							<div class="signup">
								<a href="<?php echo get_home_url(); ?>/launch/academy" class="button" alt="">
									Get Details on <br>Launch Academy &rarr;
								</a>
							</div>
						<?php }
					?>
				</div>
				<div class="flex-1-of-2 tracks">
					
					<?php 
					$launch_tracks = array();
					$launch_track_query = new WP_Query(array('post_type' => 'launch-track'));
					
					if ( $launch_track_query->have_posts() ) {
						while ( $launch_track_query->have_posts() ) { $launch_track_query->the_post();
							
							$id = get_the_ID(); // ID of current testimonial
							if ($af == 0) { // Academy
								if (has_term( "Academy", "launch_track_type", $id )) {
									array_push($launch_tracks, $id);
								}
							}
							elseif ($af == 1) { // Fellowship
								if (has_term( "Fellowship", "launch_track_type", $id )) {
									array_push($launch_tracks, $id);
								}
							}
						}
						wp_reset_postdata();
					}

					if ( $launch_tracks ) {
						echo "<h3>Launch Tracks</h3>";
						foreach ($launch_tracks as $id) { ?>
							<a class="button" href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?> Track</a>
						<?php }
					} else {?>
						<h3>I'm a 4th year.</h3>
						<div class="signup">
							<a href="<?php echo get_home_url(); ?>/launch/fellowship" class="button" alt="">
								Get Details on <br>Launch Fellowship &rarr;
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>