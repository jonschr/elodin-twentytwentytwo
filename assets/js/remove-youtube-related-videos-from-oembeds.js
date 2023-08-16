// Get all the iframes present on the page
const iframes = document.querySelectorAll('iframe');

// Loop through each iframe to check if it contains "youtube.com" in its src
for (const iframe of iframes) {
    const src = iframe.getAttribute('src');
    if (src.includes('youtube.com')) {
        // Append ?rel=0 to the existing src
        const modifiedSrc = src + '&rel=0';
        iframe.setAttribute('src', modifiedSrc);
    }
}
