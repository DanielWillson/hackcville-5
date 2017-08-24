<div class="pioneer-nav sub-nav pioneer-home" id="pioneer-fixed">
	<div class="white-bg">
		<div class="container" id="pioneer-home-container">
			<div class="pioneer-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>pioneer" rel="home">
					<img src="<?php  echo get_template_directory_uri(); ?>/images/pioneer-logo.png" class="logo" />
				</a>

			</div>
			<div class="line-date flex">
				<div class="date">
					<?php echo date("l, F d, Y"); ?>
				</div>
				<div class="social">
					<a href="http://facebook.com/thepioneercville" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/images/smi/fb.png" class="icon" />
					</a>
					<a href="http://twitter.com/pioneercville" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/images/smi/twitter.png" class="icon" />
					</a>
				</div>
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
<div class="fixed-spacer-sub pioneer-home-spacer"></div>