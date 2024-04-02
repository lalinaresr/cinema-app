jQuery(document).ready(function ($) {

	let config = {
		autoPlay: 3000,
		items: 7,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		pagination: false
	};

	$("#carousel-new-movies").owlCarousel(config);
	$("#carousel-movies-most-viewed").owlCarousel(config);
	$("#carousel-all-movies").owlCarousel(config);
});