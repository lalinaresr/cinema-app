jQuery(document).ready(function($) {
	$("#carousel-movies-most-viewed").owlCarousel({
		autoPlay: 3000,	 
	    items : 7,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [979,3],
	    pagination: false	 
	});

	$("#carousel-new-movies").owlCarousel({
		autoPlay: 3000,	 
	    items : 7,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [979,3],
	    pagination: false	 
	});

	$("#carousel-all-movies").owlCarousel({
		autoPlay: 3000,	 
	    items : 7,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [979,3],
	    pagination: false	 
	});
});