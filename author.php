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
else {
	// legacy support for headshots from old Pioneer site
	$h = types_render_usermeta_field( "headshot", array( 'user_id'=>$user_id, 'output'=>'raw' ) );
	if ($h == "") {
		// if there is no headshot, use a generic one
		$h = get_template_directory_uri() . "/images/headshot.jpg";
	}
}

$ti = false;
$title = get_field('title', 'user_'.$user_id); 
if ($ti) {
	$ti = $title;
}
else {
	// legacy support for titles from old Pioneer site
	$ti = types_render_usermeta_field( "title", array( 'user_id'=>$user_id ) );
}

$active = get_field('active', 'user_'.$user_id);
if (!$active && ($ti != "")) {
	$ti = 'Former ' . $ti;
}


$li = false;
$linkedin = get_field('linkedin', 'user_'.$user_id);
if ($linkedin) {
	$li = $linkedin;
}
else {
	$li = types_render_usermeta_field( "linkedin-url", array( 'output'=>'raw', 'user_id'=>$user_id ) );
}
if ($linkedin) {
	if (strpos($li, 'http') !== true) {
	    $li = "http://" . $li;
	}
}

$t = false;
$twitter = get_field('twitter_profile', 'user_'.$user_id);
if ($twitter) {
	$t = $twitter;
}
else {
	$t = types_render_usermeta_field( "twitter-handle", array( 'user_id'=>$user_id ) );
	if ($t) { $t = "http://twitter.com/" . $t; }
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
					<h3 class='title'><?php echo $ti; ?></h3>
					<p><?php echo $curauth->user_description; ?></p>
					<?php if ($li) { ?>
						<a href="<?php echo $li; ?>" target="_blank" class="button">
							LinkedIn &rarr;
						</a>
					<?php } ?>
					<?php if ($t) { ?>
						<a href="<?php echo $t; ?>" target="_blank" class="button">
							Twitter &rarr;
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ( have_posts() ): the_post(); ?>
<div class="past-articles">
	<div class="white-bg">
		<div class="container">
			<div class="intro">
				<h2><?php echo $fname; ?>'s Published Stories</h2>
			</div>
			<div class="flex">
				<?php 
				$page = 1;
				if ($paged == 0) {
					$page = 1;
				}
				else {
					$page = $paged;
				}
			
				rewind_posts();
				while ( have_posts() ) : the_post(); 
					
				
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

				<?php endwhile; ?>
			</div>
			<div class="next-previous">
				<h3><?php posts_nav_link(' | ','&larr; Previous Page','Next Page &rarr;'); ?></h3>
			</div>	
		</div>
	</div>
</div>
<?php else: ?>		  
<?php endif; ?>

<?php
// Get correct footer
$template_url = get_template_directory() . '/footer.php';
include ($template_url);