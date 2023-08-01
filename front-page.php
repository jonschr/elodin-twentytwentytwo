<?php

// add a body class to the front page in WordPress
function add_body_class($classes) {
   $classes[] = 'page-scroll-animations';
   return $classes;
}
add_filter('body_class', 'add_body_class');

wp_enqueue_script( 'gsap' );
wp_enqueue_script( 'gsap-mouse-animation' );
wp_enqueue_script( 'gsap-animate-sections' );
wp_enqueue_script( 'pulse-animations' );
// wp_enqueue_script( 'image-positioning' );

get_header();
?>



<section id="section-1" class="cd-section visible">
   <div class="inner-container">
       <div class="scene-container scene-container-1">
         
         <div class="full" data-depth="0.3" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-bkg.jpg');"></div>
         
         <!-- <a href="#" data-slide="3" class="dot dot-mirror-left" data-depth="0.5"><div class="pulse"></div></a> -->
         <div class="full" data-depth="0.35" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-mirror-left.png');"></div>
         
         <!-- <a href="#" data-slide="3" class="dot dot-mirror-right" data-depth="0.5"><div class="pulse"></div></a> -->
         <div class="full" data-depth="0.35" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-mirror-right.png');"></div>
         
         <div class="full" data-depth="0.45" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-smoke.png');"></div>
         <div class="full" data-depth="0.6" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-words.png');"></div>
         <div class="full" data-depth="1" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-curtains.png');"></div>
                  
      </div>
   </div>
</section>

<section id="section-2" class="cd-section">
   <div class="inner-container">
       <div class="scene-container scene-container-2">
         
         <div class="full" data-depth="0.3" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-bkg.jpg');"></div>
         <div class="full" data-depth="0.5" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-curtains.png');"></div>
         
         <div class="full" data-depth="0.35" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-smoke.png');"></div>
         <div class="full" data-depth="0.4" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-words.png');"></div>
         <div class="full" data-depth="0.36" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-box.png');"></div>
         <div class="full" data-depth="0.36" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-hat.png');"></div>
         <div class="full" data-depth="0.6" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-chandelier.png');"></div>
       
       
         <a href="#" data-slide="3" class="dot dot-bull" data-depth="0.5"><div class="pulse"></div></a>
         <a href="#" data-slide="3" class="dot dot-sword" data-depth="0.5"><div class="pulse"></div></a>
       
      </div>
   </div>
</section>

<section id="section-3" class="cd-section">
   <div class="inner-container">
       <div class="scene-container scene-container-3">
         <div class="background" data-depth="0.3"></div>
         <div alt="" class="smoke" data-depth="0.45"></div>
         <img src="/wp-content/uploads/2023/07/cards.png" alt="" class="cards" data-depth="0.4">
         <a href="#" data-slide="3" class="dot dot-cards" data-depth="0.4"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/book.png" alt="" class="book" data-depth="0.4">
         <a href="#" data-slide="3" class="dot dot-book" data-depth="0.35"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/cups-1.png" alt="" class="cups" data-depth="0.4">
         <a href="#" data-slide="3" class="dot dot-cups" data-depth="0.45"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/chip.png" alt="" class="coin" data-depth="0.4">
         <a href="#" data-slide="3" class="dot dot-coin" data-depth="0.42"><div class="pulse"></div></a>
      </div>
   </div>
</section> -->
<nav>
   <ul class="cd-vertical-nav">
      <li><a href="#0" class="cd-prev"><span class="dashicons dashicons-arrow-up-alt"></span></a></li>
      <li><a href="#0" class="cd-next"><span class="dashicons dashicons-arrow-down-alt"></span></a></li>
   </ul>
</nav> 

<?php
get_footer();