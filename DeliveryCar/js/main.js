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

    $(function  () {
        $.summDate = function(){
            var start_date = new Date($('input.lease_start').val());
            var ending_date = new Date($('input.lease_ending').val());
            var dates = $('input.lease_ending').val();
            var datesStart = $('input.lease_start').val();

            var full_date = Math.ceil(Math.abs(start_date.getTime() - ending_date.getTime()) / (1000 * 3600 * 24));

            if (!isNaN(ending_date) && !isNaN(start_date) ) {
                $('.js-total_cost').each(function () {
                    var total_cost_old = $(this).children('.js-total_cost-old').html();
                    var total_cost_new = $(this).children('.js-total_cost-new');
                    $(total_cost_new).text(total_cost_old * full_date);
                });


                $('input[name="ending_date"]').val($('input.lease_ending').val());
                $('input[name="start_date"]').val($('input.lease_start').val());
            }

            $.ajax({
                url: "/addarenda",
                type: "POST",
                data: {ending_date: dates, lease_start: datesStart},
                dataType: 'json',

                success: function (result) {

                    $('.name_model').each(function () {
                        $names = $(this).html();
                        $("#auto_" + $(this).html().replace(/ /g, "_")).text(result[$names]);

                        if(result[$names] == "арендована") {
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).attr('disabled', true);
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).addClass('disabled');
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).val('Арендована');
                            //$("#auto_" + $(this).html().replace(/ /g, "_")).addClass('red');
                        }
                        if(result[$names] == "свободна") {
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).attr('disabled', false);
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).removeClass('disabled');
                            $("input.submit_" + $(this).html().replace(/ /g, "_")).val('Забронировать');
                            //$("#auto_" + $(this).html().replace(/ /g, "_")).removeClass('red');
                        }
                    });
                }

            });
        }
    });

    $(function  () {
        $.summDateOrder =  function () {
            var start_date = new Date($('input.lease_start_order').val());
            var ending_date = new Date($('input.lease_ending_order').val());
            var auto_price = $('.basic-line span strong').text();

            var full_date = Math.ceil(Math.abs(start_date.getTime() - ending_date.getTime()) / (1000 * 3600 * 24));

            var itog_auto_price = auto_price * full_date;

            var options_price = 0;

            $('.options_checkbox').each(function(){

                if($(this).prop("checked")) {
                    options_price = $(this).data('price');
                }
            });
            $('.ordering__durability p span').html(Math.ceil(Math.abs(start_date.getTime() - ending_date.getTime()) / (1000 * 3600 * 24)));
            $('.ordering-itog_st').html(parseInt(itog_auto_price) + options_price);
            $('input[name="summ"]').val(parseInt(itog_auto_price) + options_price);
            // $('input[name="start_date"]').val($('input.lease_start_order').val());
            // $('input[name="ending_date"]').val($('input.lease_ending_order').val());


        };
    });



    const dateObj = {
        date1: null,
        date2: null
    };

    const endDate = flatpickr('input.lease_ending', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: new Date(),
        "locale": "ru",

        onChange([date]) {
            $(function () {
                $.summDate();
            });

            dateObj.date1 = date;

            startDate.set('maxDate', dateObj.date1.fp_incr(-1));
        }

    });
    const startDate = flatpickr('input.lease_start', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: "today",
        "locale": "ru",


        onChange([date]) {
            $(function () {
                $.summDate();
            });

            dateObj.date1 = date;

            endDate.set('minDate', dateObj.date1.fp_incr(1));
        }
    });

    // Order page
    const startOrdDate = flatpickr('input.lease_start_order', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: "today",
        "locale": "ru",

        onChange([date]) {
            $(function () {
                $.summDateOrder();
            });

            dateObj.date1 = date;

            endOrdDate.set('minDate', dateObj.date1.fp_incr(1));
        }


    });



    const endOrdDate = flatpickr('input.lease_ending_order', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "m-d-Y",
        minDate: new Date(),
        "locale": "ru",


            onChange([date]) {
                $(function () {
                    $.summDateOrder();
                });

                dateObj.date1 = date;
                startOrdDate.set('maxDate', dateObj.date1.fp_incr(-1));
            }

    });

    $('.options_checkbox').on('click', function(){
		var price = $(this).data('price');
        var itog = $('.ordering-itog_st').text();

        if($(this).prop("checked")) {
            $('.ordering-itog_st').html(parseInt(itog) + price);
        }else {
            $('.ordering-itog_st').html(parseInt(itog) - price);
		}
        $('input[name="summ"]').val($('.ordering-itog_st').text());
    });

	$('.head-stock__slider').owlCarousel({
        loop: false,
        margin: 50,
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

    $(".popup-link").fancybox({
        'speedIn': 500,
        'speedOut': 400,
        'padding': 0,
        'helpers': {
            'overlay': { 'locked': false }
        }
    });

    $('input[type="file"]').on('click', function(){
        this.addEventListener('change', function () {
            var splittedFakePath = this.value.split('\\');
            document.querySelector('.file-label span').textContent =
                splittedFakePath[splittedFakePath.length - 1];
        });
    });

    $(".profile-order__old-btn span").on("click", function (e){
        e.preventDefault();
        var currentBlock = $('.profile-order__old');

        currentBlock.slideToggle("slow")
    });

    $("#ajax_form").submit(function() {
        var form_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "sendmail.php",
            data: form_data,
            success: function(result){
                jQuery('#ajax_form')[0].reset();
                $('#ajax_form .thank').fadeIn();

                setInterval(function(){
                    $('#ajax_form .thank').fadeOut();
                }, 3000);
            }
        });
    });
	
});