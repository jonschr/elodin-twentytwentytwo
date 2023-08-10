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
wp_enqueue_script( 'popper' );
wp_enqueue_script( 'popper-init' );

get_header();
?>

<section id="section-1" class="cd-section visible">
   <div class="inner-container">
       <div class="scene-container scene-container-1">
         <div class="full" data-depth="0.3" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-bkg.jpg);"></div>
         <div class="full" data-depth="0.35" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-mirror-left.png);"></div>         
         <div class="full" data-depth="0.35" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-mirror-right.png);"></div>
         <!-- <div class="full" data-depth="0.45" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-smoke.png);"></div> -->
         <!-- <div class="full" data-depth="0.35" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-words.png);"></div> -->
         <!-- <div class="full" data-depth="0.6" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-curtains.png);"></div> -->
         
         <!-- if we're going to do it in one layer...  -->
         <div class="full" data-depth="0.5" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-1-bkg-foreground.png);"></div>
         
         <!-- mirror left button -->
         <a href="#" data-slide="3" class="dot dot-mirror-left" id="button-mirror-left" class="popper-button">
            <div class="pulse"></div>
         </a>
         <a href="#" data-slide="3" id="tooltip-mirror-left" class="popper-tooltip" role="tooltip">
            Mirror left tooltip
            <div class="popper-arrow" data-popper-arrow></div>
         </a>
        
         
         <!-- mirror right button -->
         <a href="#" data-slide="3" class="dot dot-mirror-right" id="button-mirror-right" class="popper-button">
            <div class="pulse"></div>
         </a>
         <a href="#" data-slide="3" id="tooltip-mirror-right" class="popper-tooltip" role="tooltip">
            Mirror right tooltip
            <div class="popper-arrow" data-popper-arrow></div>
         </a>
      </div>
   </div>
</section>

<section id="section-2" class="cd-section">
   <div class="inner-container" style="opacity: 0;">
       <div class="scene-container scene-container-2" >
         
         <div class="full" data-depth="0.3" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-bkg.jpg);"></div>
         <!-- <div class="full" data-depth="0.5" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-curtains.png);"></div> -->
         <!-- <div class="full" data-depth="0.35" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-smoke.png);"></div> -->
         <!-- <div class="full" data-depth="0.4" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-words.png);"></div> -->
         <div class="full" data-depth="0.36" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-box.png);"></div>
         <div class="full" data-depth="0.36" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-hat.png);"></div>
         <!-- <div class="full" data-depth="0.6" style="background-image:url(<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-chandelier.png);"></div> -->
         
         <div class="full" data-depth="0.5" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-2-foreground-bkg.png);"></div>
       
         <!-- <a href="#" data-slide="3" class="dot dot-bull" data-depth="0.5"><div class="pulse"></div></a> -->
         <!-- <a href="#" data-slide="3" class="dot dot-sword" data-depth="0.5"><div class="pulse"></div></a> -->
         
         <!-- bull button -->
         <a href="#" data-slide="3" class="dot dot-bull" id="button-bull" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-bull" class="popper-tooltip" role="tooltip">
            Bull tooltip
            <div class="popper-arrow" data-popper-arrow></div>
         </div>
         
         <!-- sword button -->
         <a href="#" data-slide="3" class="dot dot-sword" id="button-sword" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-sword" class="popper-tooltip" role="tooltip">
            Sword tooltip
            <div class="popper-arrow" data-popper-arrow></div>
         </div>
       
      </div>
   </div>
</section>

<section id="section-3" class="cd-section">
   <div class="inner-container" style="opacity: 0;">
       <div class="scene-container scene-container-3">
         
         <div class="full" data-depth="0.3" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-bkg.jpg);"></div>
         <div class="full" data-depth="0.45" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-smoke.png);"></div>
         <div class="full" data-depth="0.4" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-cards.png);"></div>
         <div class="full" data-depth="0.4" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-cups.png);"></div>
         <div class="full" data-depth="0.4" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-book.png);"></div>
         <div class="full" data-depth="0.4" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scene-3-coin.png);"></div>
         
         <!-- book button -->
         <a href="/see-inside/" class="dot dot-book" id="button-book" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-book" class="popper-tooltip" role="tooltip">
            See inside
            <div class="popper-arrow" data-popper-arrow></div>
         </div>

         <!-- cups-red button -->
         <a href="/about" class="dot dot-cups-red" id="button-cups-red" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-cups-red" class="popper-tooltip" role="tooltip">
            About the book
            <div class="popper-arrow" data-popper-arrow></div>
         </div>

         <!-- cups-blue button -->
         <a href="https://www.amazon.com/dp/1265432961" target="_blank" class="dot dot-cups-blue" id="button-cups-blue" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-cups-blue" class="popper-tooltip" role="tooltip">
            Buy the book
            <div class="popper-arrow" data-popper-arrow></div>
         </div>

         <!-- cups-green button -->
         <a href="/author" class="dot dot-cups-green" id="button-cups-green" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-cups-green" class="popper-tooltip" role="tooltip">
            Meet the author
            <div class="popper-arrow" data-popper-arrow></div>
         </div>

         <!-- coin button -->
         <a href="/endorsements" class="dot dot-coin" id="button-coin" class="popper-button">
            <div class="pulse"></div>
         </a>
         <div id="tooltip-coin" class="popper-tooltip" role="tooltip">
            Endorsements
            <div class="popper-arrow" data-popper-arrow></div>
         </div>
         
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