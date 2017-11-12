<?php
/**
 * The template for displaying author profiles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HackCville_5.0
 */

get_header(); 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$user_id = get_the_author_meta('ID');
$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$full_name = '';

if( empty($fname)){
    $full_name = $lname;
} elseif( empty( $lname )){
    $full_name = $fname;
} else {
    //both first name and last name are present
    $full_name = "{$fname} {$lname}";
}

$teams = get_field('leadership_teams', 'user_'.$user_id);
$pioneer = -1;
foreach ($teams as $t) {
	if (!strcmp($t, 'pioneer')) { $pioneer = 1; }
}

if ($pioneer != -1) {
	$template_url = get_template_directory() . '/template-parts/pioneer-nav.php';
	include ($template_url);
}

$h = false;
$headshot = get_field('headshot', 'user_'.$user_id);
if ($headshot) {
	$h = $headshot;
}

$li = false;
$linkedin = get_field('linkedin', 'user_'.$user_id);
if ($linkedin) {
	$li = $linkedin;
}

$t = false;
$twitter = get_field('twitter_profile', 'user_'.$user_id);
if ($twitter) {
	$t = $twitter;
}
?>

<div class="author-hero" <?php if ($pioneer == 1) { echo "id='pioneer-check'"; }?>>
	<div class="hc-blue-bg">
		<div class="container">
			<div class="flex">
				<figure class="headshot flex-1-of-4">
					<img src="<?php echo $h; ?>">
				</figure>
				<div class="flex-3-of-4">
					<h1 class="name"><?php echo $full_name; ?></h1>
					<h3 class='title'><?php echo get_field('title', 'user_'.$user_id); ?></h3>
					<p><?php echo $curauth->user_description; ?></p>
					<?php if ($li) { ?>
						<a href="<?php echo $li; ?>" target="_blank" class="button">
							LinkedIn
						</a>
					<?php } ?>
					<?php if ($t) { ?>
						<a href="<?php echo $t; ?>" target="_blank" class="button">
							Twitter
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="past-articles">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2><?php echo $fname; ?>'s Published Stories</h2>
			</div>
			<div class="flex">
				
				<?php 
				$loop = new WP_Query( array( 'author' => $user_id, 'posts_per_page' => -1 ));
				if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 
					
				
					if (has_post_thumbnail( $post->ID ) ) {
						$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$f_i = $f_i[0]; 
					} 

					?>

					
					<div class="f-i flex-1-of-2" style="background-image: url('<?php echo $f_i; ?>');">
					</div>
						
					<div class="flex-1-of-2">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title() ?></h3>
						</a>
						<div class="excerpt">
							<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
						</div>
					</div>

				<?php endwhile; 
				?>
				
				<?php

				else: ?>		     

				     <p><?php _e('No posts by this author.'); ?></p><br />
				
			    <?php endif; ?>
			    
			</div>
		</div>
	</div>
</div>




<?php
// Get correct footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
