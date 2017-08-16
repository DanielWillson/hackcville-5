<?php if(!$used_t_ids) { $used_t_ids = array(); }?>
<div class="testimonial">
	<div class="hc-blue-bg">
		<div class="container">
  			<div class="flex">
  				<?php 
  				$t_content = "";
  				$name = "";
  				$headshot_url = "";
				

				$args = array(
					'numberposts'	=> 1,
					'posts_per_page'=> '1',
					'orderby' => 'rand',
					'post_type'		=> 'testimonial',
					'meta_query'	=> array(
						'relation'		=> 'OR',
						array(
							'key'		=> 'testimonial_category',
							'value'		=> 'Community',
							'compare'	=> 'LIKE'
						),
						array(
							'key'		=> 'testimonial_category',
							'value'		=> 'General',
							'compare'	=> 'LIKE'
						)
					)
				);

				$the_query = new WP_Query( $args );

				?>
				<?php if( $the_query->have_posts() ): ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$id = get_the_ID(); // ID of current testimonial
	  					$name = get_the_title(); // name of testimonial giver
	  					$headshot_url = get_field('headshot', $id);
						$t_content = get_field("testimonial", $id);
						$t_content = "\"" . $t_content . "\"";
						?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();	 ?>
				<figure class="image-pullquote right flex-1-of-4">
	  				<img src="<?php echo $headshot_url; ?>">
	  				<figcaption class="testimonial-name">
						<h4><?php echo $name; ?></h4>
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