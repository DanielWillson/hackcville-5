<div class="launch-fellowship-nav sub-nav">
	<div class="blue-bg">
		<div class="container flex">
			<div class="sub-nav-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>launch" rel="home">
					Launch:
				</a><span class="subheading">Fellowship</span>
			</div>
			<nav id="sub-navigation" class="launch-navigation ">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="showHide()">
					<img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" />	
				</button>
				<span id="check">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'launch-fellowship-menu',
						'menu_id'        => 'launch-fellowship-menu-menu',
					) );
				?>
				</span>
			</nav>
		</div>
	</div>
</div>
<div class="fixed-spacer-sub"></div>