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

get_header();
?>

<section id="section-1" class="cd-section visible">
   <div class="inner-container">
       <div class="scene-container scene-container-1">
         <div class="background" data-depth="0.3"></div>
         <div class="smoke" data-depth="0.45"></div>
         <div class="curtains" data-depth="1"></div>
         
         <img src="/wp-content/uploads/2023/07/mirror.png" alt="" class="mirror-left" data-depth="0.5">
         <a href="#" data-slide="3" class="dot dot-mirror-left" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/mirror.png" alt="" class="mirror-right" data-depth="0.5">
         <a href="#" data-slide="3" class="dot dot-mirror-right" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/outsmart-money-magicians.png" alt="" class="text" data-depth="0.5">
         
      </div>
   </div>
</section>

<section id="section-2" class="cd-section">
   <div class="inner-container">
       <div class="scene-container scene-container-2">
         <div class="background" data-depth="0.3"></div>
         <img class="curtains-left" src="/wp-content/uploads/2023/07/curtain-left.png" data-depth="0.5" />
         <img class="curtains-right" src="/wp-content/uploads/2023/07/curtain-right.png" data-depth="0.5" />
         
         <img src="/wp-content/uploads/2023/07/bull.png" alt="" class="bull" data-depth="0.35">
         <a href="#" data-slide="3" class="dot dot-bull" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/Swords-box.png" alt="" class="sword" data-depth="0.35">
         <a href="#" data-slide="3" class="dot dot-sword" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/outsmart-money-magicians.png" alt="" class="text" data-depth="0.5">
         <img src="/wp-content/uploads/2023/07/chandelier.png" alt="" class="chand" data-depth="0.6">
      </div>
   </div>
</section>

<section id="section-3" class="cd-section">
   <div class="inner-container">
       <div class="scene-container scene-container-3">
         <div class="background" data-depth="0.3"></div>
         <div alt="" class="smoke" data-depth="1"></div>
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
</section>
<nav>
   <ul class="cd-vertical-nav">
      <li><a href="#0" class="cd-prev"><span class="dashicons dashicons-arrow-up-alt"></span></a></li>
      <li><a href="#0" class="cd-next"><span class="dashicons dashicons-arrow-down-alt"></span></a></li>
   </ul>
</nav> 

<?php
get_footer();