jQuery(document).ready(function ($) {
	$("a[href^='#']").on('click', function (event) {
		event.preventDefault();
		var href = event.target.getAttribute('href');
		if (href === '#') {
			return;
		}
		var target = document.querySelector(href);

		if (target) {
			var offset = target.offsetTop - 130; // Adjust for 100px header
			$('html, body').animate({ scrollTop: offset }, 'slow', function () {
				$("a[href='" + href + "']").addClass('active');
			});
		}
	});

	function updateActiveLink() {
		var scrollPosition = $(window).scrollTop();
		var closestTarget = null;
		var closestDistance = Infinity;

		$("a[href^='#']").each(function () {
			var href = $(this).attr('href');
			if (href === '#') {
				return;
			}
			var target = document.querySelector(href);

			if (target) {
				var targetOffset = target.offsetTop - 130; // Adjust for 100px header
				var distance = Math.abs(scrollPosition - targetOffset);

				if (distance < closestDistance) {
					closestDistance = distance;
					closestTarget = $(this);
				}
			}
		});

		if (closestTarget) {
			$("a[href^='#']").removeClass('active');
			closestTarget.addClass('active');
		}
	}

	var lastExecution = 0;

	$(window).on('scroll', function () {
		var now = Date.now();
		if (now - lastExecution < 100) {
			return;
		}
		lastExecution = now;
		updateActiveLink();
	});

	// Run on pageload
	updateActiveLink();

	// Run every 2 seconds
	setInterval(updateActiveLink, 2000);
});
