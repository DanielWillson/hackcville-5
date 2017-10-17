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

$teams = get_field('leadership_teams');
$pioneer_check = in_array('pioneer', $teams);
$pioneer = 1;

$h = false;
$headshot = get_field('headshot');
if ($headshot) {
	$h = $headshot;
}


$li = false;
$linkedin = get_field('linkedin');
if ($linkedin) {
	$li = $linkedin;
}

$t = false;
$twitter = get_field('twitter_profile');
if ($twitter) {
	$t = $twitter;
}
?>

<div class="author-hero">
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
				<!-- The Loop -->

			    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			    	if (has_post_thumbnail( $post->ID ) ) {
						$f_i = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$f_i = $f_i[0]; 
					} 
					$template_url = get_template_directory() . '/template-parts/content.php';
					include ($template_url);
			    	//get_template_part( 'template-parts/content', get_post_format() ); ?>

			    <?php endwhile; ?>
			    <h3 class="previous-next"><?php posts_nav_link(' | ','&larr; Previous Page','Next Page &rarr;'); ?></h3>

			    <?php else: ?>
			        <p><?php _e('No posts by this author.'); ?></p>

			    <?php endif; ?>

			<!-- End Loop -->
			</div>
		</div>
	</div>
</div>




<?php
// Get correct footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);
