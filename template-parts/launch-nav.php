<div class="launch-nav sub-nav">
	<div class="blue-bg">
		<div class="container flex">
			<div class="launch-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					Launch
				</a>
			</div>
			<nav id="sub-navigation" class="launch-navigation ">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="showHide()">
					<img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" />	
				</button>
				<span id="check">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'launch-menu',
						'menu_id'        => 'launch-menu',
					) );
				?>
				</span>
			</nav>
		</div>
	</div>
</div>
<div class="fixed-spacer-sub"></div>
<br>
<br>
<br>
<br>
<br>


