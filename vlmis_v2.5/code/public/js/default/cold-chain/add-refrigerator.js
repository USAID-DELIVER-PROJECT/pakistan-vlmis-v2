$(function() {
    $('#ccm_make_id').change(function() {
        $('#ccm_model_id').html('');
        $('#div_model').hide();
        if ($(this).val() != "") {
            $('#loader_make').show();
            $.ajax({
                type: "POST",
                url: appName + "/cold-chain/ajax-get-models",
                data: {make: $(this).val()},
                dataType: 'html',
                success: function(data) {
                    $('#loader_make').hide();
                    $('#div_model').show('slow');
                    $('#ccm_model_id').html(data);
                    $('#ccm_model_id').css('backgroundColor', 'Green');
                    setTimeout(changeColor, 1000);
                }
            });
        }
    });
    
    $('#ccm_status_list_id').change(function() {
        $('#reason').html("");
        //$('#loader').show();
        if ($(this).val() == "3") {
            $.ajax({
                type: "POST",
                url: appName + "/cold-chain/ajax-get-reasons",
                data: {working_status: $(this).val()},
                dataType: 'html',
                success: function(data) {
                    //$('#loader').hide();
                    $('#reason').html(data);
                }
            });
        }
        else {
            $('#loader').hide();
        }
    });

    /*$('#ccm_status_list_id').change(function() {
     $('#utilization').html("");
     if ($(this).val() == "3") {
     $.ajax({
     type: "POST",
     url: appName + "/cold-chain/ajax-get-utilizations",
     data: {working_status: $(this).val()},
     dataType: 'html',
     success: function(data) {
     $('#utilization').html(data);
     }
     });
     }
     });*/

    //Hiding those elements which loads after Catalogue ID selection
    $('#div_make').hide();
    $('#div_model').hide();
    $('#div_asset_type_ccf_free').hide();
    $('#div_dimension_capacity').hide();

    $('#catalogue_id').change(function() {
        if ($(this).val() != "") {
            $('#loader_catalogue_id').show();
            $.ajax({
                url: appName + "/cold-chain/ajax-get-data-by-catalogue-id",
                data: {catalogue_id: $(this).val()},
                dataType: 'json',
                success: function(data) {
                    if (data['cfcFree'] == 1) {
                        $('#cfc_free-1').attr("checked", "checked");
                    } else {
                        $('#cfc_free-0').attr("checked", "checked");
                    }
                    $('#cfc_free-0').attr("disabled", true);
                    $('#cfc_free-1').attr("disabled", true);
                    var ccm_make_id = data['ccm_make'];
                    var ccm_model_id = data['ccm_model'];

                    $('#ccm_model_id').html('');
                    if (ccm_make_id != "") {
                        $('#loader_make').show();
                        $.ajax({
                            type: "POST",
                            url: appName + "/cold-chain/ajax-get-models",
                            data: {make: ccm_make_id},
                            dataType: 'html',
                            success: function(data) {
                                $('#ccm_model_id').html(data);
                                $('#ccm_model_id').val(ccm_model_id);
                                $('#ccm_model_id_hidden').val(ccm_model_id);
                                $('#ccm_model_id').attr("disabled", true);
                            }
                        });
                    }
                    //Set values of html elements and make them readonly
                    $('#ccm_asset_type_id').val(data['ccm_asset_type']);
                    $('#ccm_asset_type_id').attr("disabled", true);

                    $('#net_capacity_4').val(data['netCapacity4']);
                    $('#net_capacity_4').attr("disabled", true);

                    $('#net_capacity_20').val(data['netCapacity20']);
                    $('#net_capacity_20').attr("disabled", true);

                    $('#gross_capacity_4').val(data['grossCapacity4']);
                    $('#gross_capacity_4').attr("disabled", true);

                    $('#gross_capacity_20').val(data['grossCapacity20']);
                    $('#gross_capacity_20').attr("disabled", true);

                    $('#asset_dimension_height').val(data['assetDimensionHeight']);
                    $('#asset_dimension_height').attr("disabled", true);

                    $('#asset_dimension_width').val(data['assetDimensionWidth']);
                    $('#asset_dimension_width').attr("disabled", true);

                    $('#asset_dimension_length').val(data['assetDimensionLength']);
                    $('#asset_dimension_length').attr("disabled", true);

                    $('#ccm_make_id').val(ccm_make_id);
                    $('#ccm_make_id_hidden').val(ccm_make_id);
                    $('#ccm_make_id').attr("disabled", true);
                      $.ajax({
                            type: "POST",
                            url: appName + "/cold-chain/ajax-get-make",
                            data: {make: ccm_make_id},
                            dataType: 'html',
                            success: function(data) {
                                $('#ccm_make_id').html(data);
                               $('#ccm_make_id').attr("disabled", true);
                            }
                        });

                    //Show the required Divs
                    $('#div_make').show('slow');
                    $('#div_model').show('slow');
                    $('#div_asset_type_ccf_free').show('slow');
                    $('#div_dimension_capacity').show('slow');
                    //Hide Loaders
                    $('#loader_catalogue_id').hide();
                    $('#loader_make').hide();
                }
            });
        } else {
            $('#div_make').hide('slow');
            $('#div_model').hide('slow');
            $('#div_asset_type_ccf_free').hide('slow');
            $('#div_dimension_capacity').hide('slow');
        }
    });

});
//$("#working_since").datepicker({
//    yearRange: '-44:c',
//    maxDate: "+10Y",
//    dateFormat: 'dd/mm/yy',
//    changeMonth: true,
//    changeYear: true
//});

 $("#working_since").datepicker({
        minDate: "-10Y",
        maxDate: 0,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true
    });

$("#asset_add").validate({
    rules: {
        asset_id:{
         alphanumeric: true   
        },
        serial_number:{
          alphanumeric: true     
        },
        ccm_status_list_id: {
            required: true
        },
         source_id: {
            required: true 
        },
        temperature_monitor: {
            required: true 
        },
        catalogue_id: {
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
        placed_at: {
            required: true
        },
        'gross_capacity_4': {
            required: true
        },
        'gross_capacity_20': {
            required: true
        },
        'net_capacity_4': {
            required: true
        },
        'net_capacity_20': {
            required: true
        },
        ccm_make_id: {
            required: true
        },
        ccm_model_id: {
            required: true
        },
        ccm_asset_type_id: {
            required: true
        }
    },
    messages: {
        ccm_status_list_id: {
            required: "Please select working status."
        },
        placed_at: {
            required: "Please select placed at."
        },
        'gross_capacity_4': {
            required: "Please enter gross capacity 4."
        },
        'gross_capacity_20': {
            required: "Please enter gross capacity 20."
        },
        'net_capacity_4': {
            required: "Please enter net capacity 4."
        },
        'net_capacity_20': {
            required: "Please enter net capacity 20."
        },
        ccm_make_id: {
            required: "Please select make."
        },
        ccm_model_id: {
            required: "Please select model."
        },
        ccm_asset_type_id: {
            required: "Please select asset sub type."
        }
    }
});

$('#asset_add_popup-save').click(function() {
    $('#asset_add_popup').submit();
    //form_validate();
//    var form_data = $("#asset_add_popup").serialize();
//    $.ajax({
//        type: "POST",
//        url: appName + "/cold-chain/add-new-make-model",
//        data: {form_data: form_data},
//        dataType: 'html',
//        success: function(data) {
//            //$('#alert-message').show('slow');
//        }
//    });
});

//function form_validate(){
$("#asset_add_popup").validate({
    rules: {
        catalogue_id_popup: {
            required: true
        },
       
        ccm_make_popup: {
            required: true
        },
        ccm_model_popup: {
            required: true
        },
        ccm_asset_type_id_popup: {
            required: true,
            number: true
        },
        'gross_capacity_4_popup': {
            required: true,
            number: true,
            min: 0
        },
        'gross_capacity_20_popup': {
            required: true,
            number: true,
            min: 0
        },
        'net_capacity_4_popup': {
            required: true,
            number: true,
            min: 0
        },
        'net_capacity_20_popup': {
            required: true,
            number: true,
            min: 0
        },
        'asset_dimension_length_popup': {
            required: true,
            number: true,
            min: 0
        },
        'asset_dimension_width_popup': {
            required: true,
            number: true,
            min: 0
        },
        'asset_dimension_height_popup': {
            required: true,
            number: true,
            min: 0
        }
    },
    messages: {
        'catalogue_id_popup': {
            required: "Please enter catalogue ID"
        },
        ccm_make_popup: {
            required: "Please enter make"
        },
        ccm_model_popup: {
            required: "Please enter model"
        },
        ccm_asset_type_id_popup: {
            required: "Please select asset sub type"
        },
        'gross_capacity_4_popup': {
            required: "Please enter gross capacity 4"
        },
        'gross_capacity_20_popup': {
            required: "Please enter gross capacity 20"
        },
        'net_capacity_4_popup': {
            required: "Please enter net capacity 4"
        },
        'net_capacity_20_popup': {
            required: "Please enter net capacity 20"
        },
        'asset_dimension_length_popup': {
            required: "Please enter length"
        },
        'asset_dimension_width_popup': {
            required: "Please enter width"
        },
        'asset_dimension_height_popup': {
            required: "Please enter height"
        }
    },
    submitHandler: function() {
        var form_data = $("#asset_add_popup").serialize();
        $.ajax({
            type: "POST",
            url: appName + "/cold-chain/add-new-make-model?" + form_data,
            data: {},
            dataType: 'html',
            success: function(data) {
                $("#asset_add_popup")[0].reset();
                $(".close").trigger("click");
                $("#catalogue_id").html(data);
            }
        });
    }
});
//}