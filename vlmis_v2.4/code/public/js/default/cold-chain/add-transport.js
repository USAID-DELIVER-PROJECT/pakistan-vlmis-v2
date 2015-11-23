$(function() {
    $('#ccm_make_id').change(function() {
        $('#ccm_model_id').html('');
        if ($(this).val() != "") {
            $.ajax({
                type: "POST",
                url: appName + "/cold-chain/ajax-get-models",
                data: {make: $(this).val()},
                dataType: 'html',
                success: function(data) {
                    $('#ccm_model_id').html(data);
                    $('#ccm_model_id').css('backgroundColor', 'Green');
                    $.cookie('blink_div_background_color', "ccm_model_id");
                    setTimeout(changeColor, 1000);
                }
            });
        }
    });

});

$("#manufacture_year").datepicker({
    yearRange: '-44:c',
    maxDate: "+10Y",
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true
});

$("#asset_add").validate({
    rules: {
        asset_id:{
            alphanumeric: true
        },
        ccm_status_list_id: {
            required: true
        },
        placed_at: {
            required: true
        },
        ccm_make_id: {
            required: true
        },
        ccm_model_id: {
            required: true
        },
       office: {
            required: true
        },
        combo1: {
            required: true
        },
        warehouse: {
            required: true
        },
        reason: {
            required: true  
        },
        utilization: {
            required: true  
        },
        source_id: {
            required: true
        },
        ccm_asset_sub_type_id: {
             required: true
        },
        manufacture_year: {
            required: true 
        },
        fuel_type_id: {
            required: true 
        },
        registration_no: {
             required: true 
        },
        used_for_epi:{
            number: true,
            min:0,
            max: 100
        }
    },
    messages: {
        ccm_status_list_id: {
            required: "Please select working status."
        },
        placed_at: {
            required: "Please select placed at."
        },
        ccm_make_id: {
            required: "Please select make."
        },
        ccm_model_id: {
            required: "Please select model."
        }
    }
});