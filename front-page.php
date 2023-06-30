<?php

// add a body class to the front page in WordPress
function add_body_class($classes) {
   $classes[] = 'page-scroll-animations';
   return $classes;
}
add_filter('body_class', 'add_body_class');

// add attributes to the body tag
function wp_body_custom_attributes( $atts ) {
   
   // data-animation options:
   // scaleDown
   // gallery
   // catch
   // rotate
   // opacity
   // fixed
   // parallax
   
    return 
      ' 
      data-hijacking="off"
      data-animation="opacity"
      ';
}
add_filter( 'body_custom_attributes', 'wp_body_custom_attributes', 999 );

wp_enqueue_script( 'velocity' );
wp_enqueue_script( 'velocityui' );
wp_enqueue_script( 'page-scroll' );

get_header();
?>

<section class="cd-section visible">
   <div>
      <h2>Section 1</h2>
   </div>
</section>

<section class="cd-section">
   <div>
      <h2>Section 2</h2>
   </div>
</section>

<section class="cd-section">
   <div>
      <h2>Section 3</h2>
   </div>
</section>

<section class="cd-section">
   <div>
      <h2>Section 4</h2>
   </div>
</section>

<section class="cd-section">
   <div>
      <h2>Section 5</h2>
   </div>
</section>

<nav>
   <ul class="cd-vertical-nav">
      <li><a href="#0" class="cd-prev inactive">Next</a></li>
      <li><a href="#0" class="cd-next">Prev</a></li>
   </ul>
</nav> 

<?php
get_footer();