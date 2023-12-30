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
						<h3>Thing 1</h3>
						<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
						<p><a class="hoverbutton-button" href="#">Learn more</a></p>
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
						<h3>Thing 2</h3>
						<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
						<p><a class="hoverbutton-button" href="#">Learn more</a></p>
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
						<h3>Thing 3</h3>
						<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
						<p><a class="hoverbutton-button" href="#">Learn more</a></p>
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
						<h3>Thing 4</h3>
						<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
						<p><a class="hoverbutton-button" href="#">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	
	return ob_get_clean();
}
add_shortcode( 'hoverbuttons', 'hoverbuttons_func' );