jQuery(document).ready(function ($) {

	const CONFIG = {
		autoPlay: 3000,
		items: 7,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		pagination: false
	};

	$("#newest-carousel").owlCarousel(CONFIG);
	$("#most-viewed-carousel").owlCarousel(CONFIG);
	$("#main-carousel").owlCarousel(CONFIG);
});