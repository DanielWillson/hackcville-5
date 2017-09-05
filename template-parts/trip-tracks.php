
<!-- Trip Tracks w/ Apply Button -->
<div class="trip-tracks table-list">
	<div class="blue-bg">
		<div class="container">
			<h1>Trip Tracks</h1>
			<div class="all-tracks-holder">
				<?php // For each track id, show a track tab 
					$track_num = 0;
					foreach ($trip_tracks as $track) { 
						$track_num++; ?>
					<div class="track">
						<div class="track-heading heading-<?php echo $track_num; ?> clickable" onclick="showHideTrack(<?php echo $track_num; ?>)">
							<h2><?php echo get_the_title($track); ?></h2>
							<?php 
								$sponsors = array(); $sponsor_check = -1;

								if(is_array(get_field("track_in_kind_sponsors", $track)) && is_array(get_field("track_sponsors", $track))) {
									$inkind = get_field("track_in_kind_sponsors", $track);
									$paying = get_field("track_sponsors", $track);
									$sponsors = array_merge($paying, $inkind);
									$sponsor_check = 1;
								}
								else if (is_array(get_field("track_in_kind_sponsors", $track))) {
									$sponsors = get_field("track_in_kind_sponsors", $track);
									$sponsor_check = 1;
								}
								else if (is_array(get_field("track_sponsors", $track))) {
									$sponsors = get_field("track_sponsors", $track);
									$sponsor_check = 1;
								}

								if ($sponsor_check != -1) {
							?>

							<h4>Sponsored by <?php 
								$count_check = sizeof($sponsors);
								foreach($sponsors as $s) { 
									if ($count_check == 1) {
										echo get_the_title($s);
									}
									elseif ((sizeof($sponsors) > 1)) {
										echo get_the_title($s) . ", ";
										$count_check--;
									}
									else {
										echo get_the_title($s);
									}
								} ?></h4><?php } ?>
							<p class="view-more">Show/hide the companies &darr;</p>
						</div>
						<div class="flex track-contents track-<?php echo $track_num; ?>">
							<?php 
							$companies = get_field('track_visits', $track);
							foreach($companies as $c) {
								$c_id = $c->ID; ?>
								<figure class="list-heading flex-1-of-2">
									<img src="<?php echo get_field("logo", $c_id); ?>">
								</figure>
								<div class="list-info flex-1-of-2">
									<h3><?php echo get_the_title($c_id); ?></h3>
									<p><?php echo get_field("description", $c_id); ?> <a href="<?php echo get_field("website", $c_id); ?>" target="_blank">Learn more &rarr;</a></p>
								</div>
							<?php } ?>
							<figure class="list-heading flex-1-of-2">
								<img src="<?php echo $closing_event_photo; ?>">
							</figure>
							<div class="list-info flex-1-of-2">
								<h3>Closing Event: <?php echo $closing_event_title; ?></h3>
								<p><?php echo $closing_event_description; ?></p>
							</div>
						</div>
					</div>
				<?php }  ?>
			</div>
		</div>
	</div>
</div>