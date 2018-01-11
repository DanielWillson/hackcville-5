<!-- Currently not used anywhere -->
<!-- Add this back to functions.php if you want to use this
'about-menu' => esc_html__( 'About + Partners Menu', 'hackcville-5-0' ) -->
<div class="about-nav sub-nav">
	<div class="blue-bg">
		<div class="container flex">
			<div class="sub-nav-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>about" rel="home">
					About HackCville
				</a>
			</div>
			<nav id="sub-navigation" class="launch-navigation ">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="showHide()">
					<img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" />	
				</button>
				<span id="check">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'about-menu',
						'menu_id'        => 'about-menu',
					) );
				?>
				</span>
			</nav>
		</div>
	</div>
</div>
<div class="fixed-spacer-sub"></div>