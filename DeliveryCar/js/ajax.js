$(document).ready(function() {

    $("#select").change(function(){
        var idBrand = $(this).val();

        $.ajax({
            url:"/fastreservation",
            type: "POST",
            data: {idBrand:idBrand},
            dataType: 'html',

            success: function (result) {
                if (result) {
                    $('.home-car-list').html(result);

                    var start_date = new Date($('input.lease_start').val());
                    var ending_date = new Date($('input.lease_ending').val());

                    $('input[name="ending_date"]').val($('input.lease_ending').val());
                    $('input[name="start_date"]').val($('input.lease_start').val());

                    var full_date = Math.ceil(Math.abs(start_date.getTime() - ending_date.getTime()) / (1000 * 3600 * 24));

                    $('.js-total_cost').each(function(){
                        var total_cost_old = $(this).children('.js-total_cost-old').html();
                        var total_cost_new = $(this).children('.js-total_cost-new');

                        if ($.isNumeric(full_date)){
                            $(total_cost_new).text(total_cost_old * full_date);
                        }
                    });
                }
            }
        });


    });

});