<div class="pioneer-nav sub-nav standard" id="pioneer-fixed">
	<span id="pioneer-nav-check"></span>
	<div class="white-bg">
		<div class="container flex">
			<div class="pioneer-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>pioneer" rel="home">
					<img src="<?php  echo get_template_directory_uri(); ?>/images/pioneer-logo.png" class="logo" />
				</a>

			</div>
			<nav id="sub-navigation" class="pioneer-navigation ">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="showHide()">
					<img src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" />	
				</button>
				<span id="check">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'pioneer-menu',
						'menu_id'        => 'pioneer-menu',
					) );
				?>
				</span>
			</nav>
		</div>
	</div>
</div>
<div class="fixed-spacer-sub pioneer-spacer"></div>