<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HackCville_5.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-55802362-1', 'auto');
	  ga('send', 'pageview');

	</script>
	<?php
	$post_id = get_the_ID();
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
			$thumbnail_img = $thumbnail[0];
			$thumbnail_img_width = $thumbnail[1];
			$thumbnail_img_height = $thumbnail[2];


			$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id));
			$notAllowed = array("<p>", "<p> ", "</p>", " </p>", "<br>");
			$excerpt = str_replace($notAllowed, "", $excerpt);
			// $type = "article";
			$title = get_the_title();
			$permalink = get_the_permalink();


			if (is_archive()) {
				$title = get_the_archive_title();
				$title = "HackCville " . substr($title, 10);
			}

			if (is_page()) {
				$thumbnail_img = get_bloginfo( 'template_url' ); 
				$thumbnail_img .= '/images/peiching.jpg';
				$thumbnail_img_width = 2449;
				$thumbnail_img_height = 1633;	
			}

			if (is_front_page()) {
				$title = "HackCville";
				$permalink = "http://www.hackcville.com";
			}

			if (is_author()) {
				
				$authorID = get_the_author_meta( 'ID' );
				$headshot = types_render_usermeta_field( "headshot", array( "width" => 600, 'user_id'=>$authorID, 'url'=>'true' ) );
				if ($headshot == "") {
					$avatar = get_bloginfo( 'template_url');
					$avatar .= '/images/no-avatar.jpg';
					$headshot = "<img src=\"" . $avatar . "\" />";
				}
				$thumbnail_img = $headshot;
				$thumbnail_img_width = 600;
				$thumbnail_img_height = 600;

				$type = "article.author";
				$title = get_the_author();
				$permalink = get_author_posts_url( $authorID );
				$excerpt = get_the_author_meta( 'description' );
			}

			if (is_category()) {
				
				$category_id = $wp_query->get_queried_object_id();
				$title = get_cat_name($category_id);
				$permalink = get_category_link( $category_id );
				$type = "article";
				$excerpt = "HackCville is a platform for experiential education and career development.";

				$thumbnail_img = get_bloginfo( 'template_url' ); 
				$thumbnail_img .= '/images/standard-thumbnail.jpg';
				$thumbnail_img_width = 1829;
				$thumbnail_img_height = 1097;
			}

			if (!strcmp("", $excerpt)) {
				$excerpt = "HackCville is a platform for experiential education and career development.";
			}

			if (!strcmp($thumbnail_img, "")) {
				$thumbnail_img = get_template_directory_uri(); 
				$thumbnail_img .= '/images/peiching.jpg';
				$thumbnail_img_width = 2449;
				$thumbnail_img_height = 1633;	
			}


		?>

		<!-- <meta property="fb:pages" content="743689375647531" /> -->
		<meta property="og:title" content="<?php echo $title; ?>" />
		<meta property="og:url" content="<?php echo $permalink; ?>" />
		<meta property="og:type" content="<?php echo $type; ?>" />
		<meta property="og:description" content="<?php echo $excerpt; ?>"/>
		<meta property="og:image" content="<?php echo $thumbnail_img; ?>" />
		<meta property="og:image:width" content = "<?php echo $thumbnail_img_width; ?>" />
		<meta property="og:image:height" content = "<?php echo $thumbnail_img_height; ?>" />
<!-- 		<meta property="fb:app_id" content="1657839534433449" />
		<meta property="fb:admins" content="1432338858" /> -->


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		function getToKnowUs() {
			
		    var topOfDiv = $('#get-to-know-us').offset().top - 90;
		    $('body').animate({scrollTop: topOfDiv}, 1000);
		    return false;
		}
	</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hackcville-5-0' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container flex">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php  echo get_template_directory_uri(); ?>/images/hackcville-logo.png" class="logo" />
				</a>
			</div>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<img src="<?php echo get_template_directory_uri(); ?>/images/navicon.png" />	
				</button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav>
		</div>
	</header>
	<div class="fixed-spacer"></div>

	<div id="content" class="site-content">
