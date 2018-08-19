<div class="company-nav sub-nav hustle-nav">
	<div class="blue-bg">
		<div class="container flex">
			<div class="sub-nav-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>hustle" rel="home">
					Hustle Program
				</a>
			</div>
			<nav id="sub-navigation" class="launch-navigation ">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="showHide()">
					<img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" />	
				</button>
				<span id="check">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'hustle-menu',
						'menu_id'        => 'hustle-menu',
					) );
				?>
				</span>
			</nav>
		</div>
	</div>
</div>
<div class="fixed-spacer-sub"></div>