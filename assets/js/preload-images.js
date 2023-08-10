// Array of image URLs to preload
var imageUrls = [
    '/wp-content/themes/money-magicians-theme/assets/images/scene-1-mirror-left-active.png',
    '/wp-content/themes/money-magicians-theme/assets/images/scene-1-mirror-right-active.png',
];

// Preload function
function preloadImages(urls) {
    urls.forEach(function (url) {
        var img = new Image();
        img.src = url;
    });
}

// Call the preload function with the array of image URLs
preloadImages(imageUrls);
