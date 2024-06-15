var lightbox;
var slides;
var count;

// console.log('initializeTheLightbox');

// function initializeTheLightbox() {}

function openLightboxOnMatch() {
	console.log('openLightboxOnMatch');

	if (lightbox) {
		lightbox = lightbox.reload();
	}

	// console.log(lightbox);

	lightbox = GLightbox({
		selector: '.inductee-lightbox-link',
		height: 'auto',
		width: '960px',
		draggable: false,
		// touchNavigation: false,
	});

	console.log(lightbox);

	let slides = lightbox.elements;
	let count = 0;

	// Loop through each slide and check whether the current page URL matches any of the slide.href value
	slides.forEach((slide, index) => {
		// console.log('slide href: ' + slide.href);
		// console.log('window href: ' + window.location.href);
		// console.log('count: ' + count);

		if (slide.href === window.location.href) {
			// Open the lightbox at the index of the slide
			// console.log('automated open at: ' + count);
			lightbox.openAt(count);

			// Bail out of the loop
			return;
		}

		// Add 1 to the count
		count++;
	});

	// console.log('count: ' + count);
}

// Do something after the page is fully loaded
// document.addEventListener('DOMContentLoaded', openLightboxOnMatch);
// document.addEventListener('DOMContentLoaded', initializeTheLightbox);

// Add event listener for facetwp-refresh
document.addEventListener('facetwp-loaded', openLightboxOnMatch);
// document.addEventListener('facetwp-refresh', initializeTheLightbox);
