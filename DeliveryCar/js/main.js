$(document).ready(function() {

	//Chrome Smooth Scroll
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

	$('.fotorama_car').fotorama({
		width: '100%',
		maxwidth: '100%',
		fit: 'cover',
		transition: 'dissolve',
		thumbwidth: 110,
		thumbheight: 75,
		height: 360,
		allowfullscreen: true,
		nav: 'thumbs'
	});

	jQuery('.scrollbar-inner ').scrollbar();
	
});