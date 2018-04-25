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

    flatpickr('input.lease_start', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: "today",
        "locale": "ru",

        onChange: function() {

            $(function () {
            	var start_date = $('input.lease_start').val();
            	$('input[name="start_date"]').val(start_date);
            });
		}
	});
    flatpickr('input.lease_ending', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: new Date().fp_incr(1),
        "locale": "ru",


        onChange: function() {

            $(function () {
				var start_date = new Date($('input.lease_start').val());
                var ending_date = new Date($('input.lease_ending').val());
                var ending_date_hidden = $('input.lease_ending').val();

                var full_date = Math.ceil(Math.abs(start_date.getTime() - ending_date.getTime()) / (1000 * 3600 * 24));

                $('.js-total_cost').each(function(){
                    var total_cost_old = $(this).children('.js-total_cost-old').html();
                    var total_cost_new = $(this).children('.js-total_cost-new');
                    $(total_cost_new).text(total_cost_old * full_date);
            	});

                $('input[name="ending_date"]').val(ending_date_hidden);
			});

        }
    });

    $('.options_checkbox').on('click', function(){
        var $this = $(this);
		var price = $this.data('price');
        var itog = $('.ordering-itog_st').text();

        if($this.prop("checked")) {
            console.log(price);
            $('.ordering-itog_st').html(parseInt(itog) + price);
        }else {
            $('.ordering-itog_st').html(parseInt(itog) - price);
		}
    });

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