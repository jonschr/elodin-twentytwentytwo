<?php

// [hoverbuttons foo="foo-value"]
function hoverbuttons_func( $atts ) {
	
	ob_start();
	
	?>
	<div class="hoverbuttons">
		<div class="hoverbutton-wrap">            
			<div class="hoverbutton">
				<div class="front">
					<div class="logo-wrap">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/lightbulb.svg'; ?>" alt="">
					</div>
				</div>
				<div class="back">
					<div class="text-wrap">
						<h3>Patents</h3>
						<p>To protect your idea for a device or method</p>
						<p><a class="hoverbutton-button" href="/practices/u-s-international-patents/">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="hoverbutton-wrap">            
			<div class="hoverbutton">
				<div class="front">
					<div class="logo-wrap">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/lightbulb.svg'; ?>" alt="">
					</div>
				</div>
				<div class="back">
					<div class="text-wrap">
						<h3>Trademarks</h3>
						<p>To protect your brand name and logo</p>
						<p><a class="hoverbutton-button" href="/practices/u-s-international-trademarks/">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="hoverbutton-wrap">            
			<div class="hoverbutton">
				<div class="front">
					<div class="logo-wrap">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/lightbulb.svg'; ?>" alt="">
					</div>
				</div>
				<div class="back">
					<div class="text-wrap">
						<h3>Copyright</h3>
						<p>To protect your written work, visual art, or music</p>
						<p><a class="hoverbutton-button" href="/practices/copyright-protection-licensing/">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="hoverbutton-wrap">            
			<div class="hoverbutton">
				<div class="front">
					<div class="logo-wrap">
						<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/lightbulb.svg'; ?>" alt="">
					</div>
				</div>
				<div class="back">
					<div class="text-wrap">
						<h3>Legal Advice</h3>
						<p>To determine the best way to protect and defend your idea</p>
						<p><a class="hoverbutton-button" href="/practices/ip-rights-opinions-counseling/">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	
	return ob_get_clean();
}
add_shortcode( 'hoverbuttons', 'hoverbuttons_func' );