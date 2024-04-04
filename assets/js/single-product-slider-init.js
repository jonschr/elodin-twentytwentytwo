jQuery(document).ready(function ($) {
	$('.images-multiple').slick({
		dots: false,
		arrows: true,
		infinite: true,
		speed: 300,
		// slidesToShow: 3,
		variableWidth: true,
		centerMode: true,
		// adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	});
});
