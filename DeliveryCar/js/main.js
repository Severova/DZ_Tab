$(document).ready(function() {

	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};

	$(function() {
		$('select').selectric();
	});

	$('input[type="date"]').dateDropper();

	$('.head-stock__slider').owlCarousel({
    loop: false,
    margin: 0,
		nav: false,
		items: 1
	});
	
});