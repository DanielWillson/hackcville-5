<div class="cat-hero clearfix flex">
	<div class="cat-hero-header flex-1-of-1">
		<!-- Variable set in the PHP document that includes this file -->
		<h2><?php echo $current_category_headline; ?></h2>
		<?php 
		$catID = get_cat_ID( $current_category );
		$catSlug = strtolower($current_category);
		$catLink = get_home_url() . "/pioneer/category/" . $catSlug;
		if (!$currentID) {
			$currentID = -1;
		}
		?>
		<h3><a href="<?php echo $catLink; ?>">More Like This &rarr;</a></h3>
	</div>
	<!-- 
	This block is separated into left and right sections. On desktop, this is self-explanatory when you look at the page. Behind the scenes, the left section requests the first 2 articles in the category. The right section requests the first 5 and the CSS hides the first 2 since they're already shown on the left.

	Once you shrink to the 1053 breakpoint, all of left is set to display:none and all of right (including the original 2 hidden articles) is set to display:block. From this point and smaller, all styling is done on the right section. Left isn't shown again at smaller sizes.
	-->
	<div class="cat-hero-left-container flex">
		<div class="cat-hero-left">
			<ul class="cat-hero-articles">
				<!-- Variable for $current_category set in the PHP document that includes this file -->
				<?php 
				$i = 1;
				$args = array( 
					'post_type' => 'post',
					'posts_per_page' => 12,
					'category_name' => $current_category );
				$loop = new WP_Query( $args );
				/* Requests the posts via The Loop */
				while ( $loop->have_posts() ) : $loop->the_post(); 
					if (!in_array($post->ID, $displayed_articles)) {
						if ($i<5) {
							
							?>

							<!-- Gets the URL of the featured image -->

							<?php if (has_post_thumbnail( $post->ID ) ): 
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
								$image = $image[0]; ?>
							<?php endif; ?>
							<li class="cat-hero-item">
								<div class="cat-hero-item-content">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
										<!-- sets featured image as background image of this div, allowing it resize easily -->
										<div class="cat-hero-item-image" style="background-color: #000000; 
								background: url('<?php echo $image ?>');
								-webkit-background-size: cover;
								-moz-background-size: cover;
								-o-background-size: cover;
								background-size: cover;
								}">
										</div>
									</a>
									<div class="cat-hero-article-title">
										<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</div>
									<div class="cat-hero-article-excerpt">
										<!-- Gets the post exercpt -->
										<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
									</div>
									<div class="cat-hero-article-divider">
									</div>
									<div class="cat-hero-article-date-author">
										<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - by <span class="author"><?php 
											coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
											?>
										</span>
									</div>
								</div>
							</li>
				<?php 		$i++;
						}
					}
				
				wp_reset_postdata();
				endwhile; ?>
			</ul>
		</div>
	</div>
	<div class="cat-hero-right-container">
		<div class="cat-hero-right">
			<ul class="cat-hero-articles">
				<?php 
				$i = 1;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 12,
					'category_name' => $current_category );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
					if ($currentID != $post->ID) {
						if (!in_array($post->ID, $displayed_articles)) {
							if ($i<5) {
								array_push($displayed_articles, $post->ID);
							?>
							<?php if (has_post_thumbnail( $post->ID ) ): 
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
								$image = $image[0]; ?>
							<?php endif; ?>
							<li class="cat-hero-item">
								<!-- We still load the images so they can be used at smaller screen sizes -->
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><div class="cat-hero-item-image" style="background-color: #000000; 
								background: url('<?php echo $image ?>');
								-webkit-background-size: cover;
								-moz-background-size: cover;
								-o-background-size: cover;
								background-size: cover;
								}"></div></a>
								<div class="cat-hero-item-content">
									<div class="cat-hero-article-title">
										<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</div>
									<div class="cat-hero-article-excerpt">
										<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
									</div>
									<div class="cat-hero-article-divider">
									</div>
									<div class="cat-hero-article-date-author">
										<span class="date"><?php echo get_the_time('m-d-Y', $post_id->ID); ?></span> - <span class="author"><?php 
											coauthors_posts_links( $between = ", ", $betweenLast = " and ", $before = "", $after = null, $echo = true )
											?>
										</span>
									</div>
								</div>
							</li>
				<?php $i++; }}} wp_reset_postdata();
				endwhile; ?>
			</ul>
		</div>
	</div>
</div>
