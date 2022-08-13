<?php

//* Output property_slider before
add_action( 'before_loop_layout_property_slider', 'elodin_property_slider_before' );
function elodin_property_slider_before( $args ) {
	
	wp_enqueue_script( 'slick-main-script' );
    wp_enqueue_style( 'slick-main-styles' );
    wp_enqueue_style( 'slick-main-theme' );
	
	?>
	<script type="text/javascript">
		jQuery(document).ready(function( $ ) {
	
			$('.loop-layout-property_slider').slick({
				dots: false,
				arrows: true,
				infinite: false,
				speed: 300,
				slidesToShow: 4,
				slidesToScroll: 4,
				responsive: [
					{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
					},
					{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
					},
					{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				]
				});
			
		});
	</script>
	<?php
}

//* Output each property_slider
add_action( 'add_loop_layout_property_slider', 'elodin_property_slider_each' );
function elodin_property_slider_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$logo_color = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'logo_color', true ) );	
	// $thing = get_post_meta( $id, 'thing', true );
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $logo_color )
		printf( '<div class="logo" style="background-image:url(%s);"></div>', $logo_color[0] );

}