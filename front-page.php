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
      data-hijacking="false"
      data-animation="opacity"
      ';
}
add_filter( 'body_custom_attributes', 'wp_body_custom_attributes', 999 );


// enqueue the basic page container stuff
wp_enqueue_script( 'velocity' );
wp_enqueue_script( 'velocityui' );
wp_enqueue_script( 'page-scroll' );

wp_enqueue_script( 'gsap' );
wp_enqueue_script( 'gsap-init' );

wp_enqueue_script( 'scroll-hijacking' );

get_header();
?>

<script>
 function getRandomInterval(min, max) {
  return Math.random() * (max - min) + min;
}

function triggerPulseAnimation(element) {
  const pulse = element.querySelector('.pulse');
  pulse.style.animation = 'pulseAnimation 0.8s ease-in-out 1';

  // Remove the animation after it finishes
  setTimeout(() => {
    pulse.style.animation = '';
  }, 800);
}

function startRandomPulseAnimations() {
  setInterval(() => {
    const dots = document.querySelectorAll('.dot');
    const randomDotIndex = Math.floor(Math.random() * dots.length);
    const randomDot = dots[randomDotIndex];
    triggerPulseAnimation(randomDot);
  }, getRandomInterval(2000, 5000));
}

function addEventListenersToDots() {
  const dots = document.querySelectorAll('.dot');
  dots.forEach(dot => {
    dot.addEventListener('mouseover', () => {
      triggerPulseAnimation(dot);
    });
    dot.addEventListener('click', () => {
      triggerPulseAnimation(dot);
    });
  });
}

startRandomPulseAnimations();
addEventListenersToDots();


</script>
   
<section id="section-1" class="cd-section visible">
   <div>
       <div class="scene-container scene-container-1">
         <div class="background" data-depth="0.3"></div>
         <div class="smoke" data-depth="0.45"></div>
         <div class="curtains" data-depth="1"></div>
         
         <img src="/wp-content/uploads/2023/07/mirror.png" alt="" class="mirror-left" data-depth="0.5">
         <a href="/about" class="dot dot-mirror-left" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/mirror.png" alt="" class="mirror-right" data-depth="0.5">
         <a href="/about" class="dot dot-mirror-right" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/outsmart-money-magicians.png" alt="" class="text" data-depth="0.5">
         
      </div>
   </div>
</section>

<section id="section-2" class="cd-section">
   <div>
       <div class="scene-container scene-container-2">
         <div class="background" data-depth="0.3"></div>
         <img class="curtains-left" src="/wp-content/uploads/2023/07/curtain-left.png" data-depth="0.5" />
         <img class="curtains-right" src="/wp-content/uploads/2023/07/curtain-right.png" data-depth="0.5" />
         
         <img src="/wp-content/uploads/2023/07/bull.png" alt="" class="bull" data-depth="0.35">
         <a href="/about" class="dot dot-bull" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/Swords-box.png" alt="" class="sword" data-depth="0.35">
         <a href="/about" class="dot dot-sword" data-depth="0.5"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/outsmart-money-magicians.png" alt="" class="text" data-depth="0.5">
         <img src="/wp-content/uploads/2023/07/chandelier.png" alt="" class="chand" data-depth="0.6">
      </div>
   </div>
</section>

<section id="section-3" class="cd-section">
   <div>
       <div class="scene-container scene-container-3">
         <div class="background" data-depth="0.3"></div>
         <div alt="" class="smoke" data-depth="1"></div>
         <img src="/wp-content/uploads/2023/07/cards.png" alt="" class="cards" data-depth="0.4">
         <a href="/about" class="dot dot-cards" data-depth="0.4"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/book.png" alt="" class="book" data-depth="0.4">
         <a href="/about" class="dot dot-book" data-depth="0.35"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/cups-1.png" alt="" class="cups" data-depth="0.4">
         <a href="/about" class="dot dot-cups" data-depth="0.45"><div class="pulse"></div></a>
         
         <img src="/wp-content/uploads/2023/07/chip.png" alt="" class="coin" data-depth="0.4">
         <a href="/about" class="dot dot-coin" data-depth="0.42"><div class="pulse"></div></a>
      </div>
   </div>
</section>

<!-- <section id="section-3" class="cd-section">
   <div>
      <div class="scene-container">
         <h2>Section 3</h2>
      </div>
   </div>
</section>

<section id="section-4" class="cd-section">
   <div>
      <div class="scene-container">
         <h2>Section 4</h2>
      </div>
   </div>
</section> -->

<nav>
   <ul class="cd-vertical-nav">
      <li><a href="#0" class="cd-prev inactive"><span class="dashicons dashicons-arrow-up-alt"></span></a></li>
      <li><a href="#0" class="cd-next"><span class="dashicons dashicons-arrow-down-alt"></span></a></li>
   </ul>
</nav> 

<?php
get_footer();