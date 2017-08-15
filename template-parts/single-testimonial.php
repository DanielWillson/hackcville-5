<?php if(!$used_t_ids) { $used_t_ids = array(); }?>
<div class="testimonial">
	<div class="hc-blue-bg">
		<div class="container">
  			<div class="flex">
  				<?php 
  				$t_content = "";
  				$name = "";
  				$headshot_url = "";

  				$testimonial_query = new WP_Query(array('post_type' => 'testimonial', 'orderby' => 'rand'));
				if ( $testimonial_query->have_posts() ) {
					while ( $testimonial_query->have_posts() ) { $testimonial_query->the_post();
						$id = get_the_ID(); // ID of current testimonial
		  				if (!in_array($id, $used_t_ids)) {
		  					$name = get_the_title(); // name of testimonial giver
		  					$headshot_url = get_field('headshot', $id);
							$t_categories = get_field("testimonial_category", $id);
							
							if ($t_categories && $headshot_url && get_field("testimonial", $id)) {
								foreach($t_categories as $t_category) {
									if (!strcmp($t_category, "Community")) {
										$t_content = get_field("testimonial", $id);
										$t_content = "\"" . $t_content . "\"";
										array_push($used_t_ids, $id);
									}
								}
							}
		  				}
		  			}
		  		}
  				?>
				<figure class="image-pullquote right flex-1-of-4">
	  				<img src="<?php echo $headshot_url; ?>">
	  				<figcaption class="testimonial-name">
						<p><?php echo $name; ?></p>
						<p>HackCville Member</p>
	  				</figcaption>
				</figure>
				<div class="flex-3-of-4">
					<h3><?php echo $t_content; ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>
<?php //} ?>