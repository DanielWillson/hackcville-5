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

	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<meta name="google-site-verification" content="BjzgNFml5yTce9k05ryJQjYJC2X65G6MgI2Gbu2M1uM" />
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-55802362-1', 'auto');
  	  ga('send', 'pageview');

	</script>
	<script src="https://cdn.jsdelivr.net/mediaelement/latest/mediaelement-and-player.min.js"></script>
	<script src="https://www.youtube.com/iframe_api"></script>


	<?php

 		echo is_tax('category');
  		if(is_singular( 'post' ) || is_post_type_archive('post') || is_category() || is_home()) {?>
  			<script>
  			ga('create', 'UA-44987650-1', 'auto', 'Pioneer');
			ga('Pioneer.send', 'pageview');
			</script><?php
		}
	// <!-- Parsely JSON -->
		if (is_single()) { 
			$id = get_the_ID(); 
			$co = coauthors("\", \"", "\", \"", "\"", "\"", false);

			$categories = get_the_category();
			$disallowed_categories = array("Photo Essays", "Videos", "Articles");
			$catNames = array();

			foreach ($categories as $cat) {
			    $catNames[] = $cat->name;
			}

			$goodCategories = array_diff($catNames, $disallowed_categories);

			$outputString = "\"";

			foreach ($goodCategories as $category) {
				$outputString = $outputString . $category . "\", \"";
			}
			$outputString = substr($outputString, 0, -3);

			?>
			<script type="application/ld+json"> 
			{
			"@context": "http://www.thepioneer.co",
			"@type": "NewsArticle",
			"headline": "<?php echo get_the_title($id); ?>",
			"url": "<?php the_permalink($id); ?>",
			"dateCreated": "<?php echo get_post_time('c', null, null, null); ?>",
			"articleSection": [<?php echo $outputString; ?>],
			"creator": [<?php echo $co; ?>]
			}
			</script>
		<?php } 



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

			if (is_front_page() || is_home()) {
				$title = "HackCville";
				$permalink = "http://www.hackcville.com";
				$excerpt = "HackCville trains students in high-demand skills, accelerates their ideas, and connects them to jobs, opportunities, and a tight-knit community.";
				$thumbnail_img = get_template_directory_uri(); 
				$thumbnail_img .= '/images/peiching.jpg';
				$thumbnail_img_width = 2449;
				$thumbnail_img_height = 1633;	
			}

			if (is_author()) {
				
				$authorID = get_the_author_meta( 'ID' );
				//$headshot = types_render_usermeta_field( "headshot", array( "width" => 600, 'user_id'=>$authorID, 'url'=>'true' ) );
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
				$excerpt = "HackCville trains students in high-demand skills, accelerates their ideas, and connects them to jobs, opportunities, and a tight-knit community.";

				$thumbnail_img = get_bloginfo( 'template_url' ); 
				$thumbnail_img .= '/images/standard-thumbnail.jpg';
				$thumbnail_img_width = 1829;
				$thumbnail_img_height = 1097;
			}

			if (!strcmp("", $excerpt)) {
				$excerpt = "HackCville trains students in high-demand skills, accelerates their ideas, and connects them to jobs, opportunities, and a tight-knit community.";
			}

			if (!strcmp($thumbnail_img, "")) {
				$thumbnail_img = get_template_directory_uri(); 
				$thumbnail_img .= '/images/peiching.jpg';
				$thumbnail_img_width = 2449;
				$thumbnail_img_height = 1633;	
			}

			if (!strcmp("", $type)) {
				$type = "website";
			}

		?>



	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri()?>/js/share-this-page.js"></script>
	<script type="text/javascript">


		$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("a").on('click', function(event) {

		    // Make sure this.hash has a value before overriding default behavior
		    if (this.hash !== "") {
		      // Prevent default anchor click behavior
		      event.preventDefault();

		      // Store hash
		      var hash = this.hash;

		      // Using jQuery's animate() method to add smooth page scroll
		      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top
		      }, 800, function(){
		   
		        // Add hash (#) to URL when done scrolling (default click behavior)
		        window.location.hash = hash;
		      });
		    } // End if
		  });
		});

		function getToKnowUs() {
		    var topOfDiv = $('#get-to-know-us').offset().top - 78;
		    console.log(topOfDiv);
		    $('html, body').animate({scrollTop: topOfDiv}, 1500);
		    return false;
		}

		function meetTheTeam() {
		    var topOfDiv = $('#staff-grid').offset().top - 78;
		    console.log(topOfDiv);
		    $('html, body').animate({scrollTop: topOfDiv}, 1500);
		    return false;
		}

		function launchDetails() {
		    var topOfDiv = $('#launch-details').offset().top - 150;
		    $('body').animate({scrollTop: topOfDiv}, 1000);
		    return false;
		}

		
		function showHide() {
			var disp = document.getElementById('check').style.display;
			if (disp == "block") {
				document.getElementById('check').style.display='';
			}
			else {
				document.getElementById('check').style.display='block';
			}
		}

		function showHideTrack(track_number) {
			var c = ".track-contents.track-";
			var c_full = c.concat(track_number);
			console.log(c_full);
			console.log($(c_full).is(':visible'));
			if ($(c_full).is(':visible')) {
				$(c_full).fadeOut();
				console.log("fade out");
			}
			else {
				$(c_full).css("display", "flex");
			    $(c_full).hide();
			    $(c_full).fadeIn();
				console.log("fade in");
				var d = '.heading-';
				d = d.concat(track_number);
				d = d.concat(".view-more");
				console.log(d);
				//d.value = ('Hide the companies &uarr;');
			}
		}


		$(window).load(function() {
		    var viewportWidth = $(window).width();
		    if (viewportWidth < 920) {
		        $("#pioneer-home-container").addClass("flex");
		    }
		    else if (viewportWidth >= 920) {
		    	$("#pioneer-home-container").removeClass("flex");
		    }
		});

		$(document).ready(function(){

		    /* Makes iframes responsive */
		    $("iframe").wrap("<div class='iframe'/>");


		    if (document.getElementById("pioneer-check")) {

				$(window).load(function () {
					// Adds Parsely tracking to YouTube videos
					var vidSource = $("iframe").attr('src');
					vidSource = vidSource.concat("?enablejsapi=1");
					$("iframe").attr('src', vidSource);
					

					var fixmeTop = $('.pioneer-nav').offset().top;
					
					$(window).scroll(function() {
					    var currentScroll = $(window).scrollTop();
					    if (currentScroll >= fixmeTop) {

					        $('#pioneer-fixed').css({
					            position: 'fixed',
					            top: '0',
					            zIndex: '20000'
					        });
					        $('.fixed-spacer-sub.pioneer-spacer').css({
					        	height: '100px'
					        });	

					    } else {
					        $('#pioneer-fixed').css({
					            position: 'relative',
					            zIndex: '9000'
					        });
					        $('.fixed-spacer-sub.pioneer-spacer').css({
					        	height: '0'
					        });

					    }
					});

					$(window).scroll(function() {
					    var currentScroll = $(window).scrollTop();
					    if (currentScroll > 0) {
					    	$('#pioneer-fixed').css({
					            zIndex: '20000'
					        });
					    }
					});

					$(window).scroll(function() {
					    var currentScroll = $(window).scrollTop();
					    if (currentScroll > 0) {
					    	$('#site-navigation').removeClass("toggled");
					    }
					});
				});

			}

		});
	</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '267664083731985',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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
