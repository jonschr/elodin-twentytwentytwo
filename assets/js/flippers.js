jQuery(document).ready(function ($) {
	// Select all of the .flipper elements on the page.
	var flippers = $('.flipper');

	// Toggle the .active class on a randomly selected flipper once every second.
	setInterval(function () {
		var randomIndex = Math.floor(Math.random() * flippers.length);
		var flipper = flippers.eq(randomIndex);
		flipper.toggleClass('active');
	}, 2000);
});
