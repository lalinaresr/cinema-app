jQuery(document).ready(function ($) {

	const OWL_CONFIG = {
		autoPlay: 3000,
		items: 7,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		pagination: false
	};

	$("#newest-carousel").owlCarousel(OWL_CONFIG);
	$("#viewed-carousel").owlCarousel(OWL_CONFIG);
	$("#main-carousel").owlCarousel(OWL_CONFIG);
});