$(function() {
    
     if ($("#activity_id").val() != '') {
        getProductsByStakeholder($("#activity_id").val());
    }

    $("#requisition_number").change(function() {
        if (this.value != "") {
            window.location = appName + '/stock-demand/requisition?id=' + this.value;
        } else {
            window.location = appName + '/stock-demand/requisition';
        }

    });

    $('#suggested_date').datepicker({
        minDate: 0,
        maxDate: "+5Y",
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true
    });

    $('#activity_id').change(function(e) {
        getProductsByStakeholder($("#activity_id").val());
    });

    $('#item_id').change(function(e) {
        getProductPairByProduct($("#item_id").val());
    });

    // validate signup form on keyup and submit
    $("#new_issue_form").validate({
        rules: {
            period: {
                required: true
            },
            activity_id: {
                required: true
            },
            quantity: {
                required: true
            },
            suggested_date: {
                required: true
            },
            item_id: {
                required: true
            }
        },
        messages: {
            period: {
                required: "Please select period"
            },
            activity_id: {
                required: "Please select purpose"
            },
            quantity: {
                required: "Please enter quantity"
            },
            suggested_date: {
                required: "Suggested date is required"
            },
            item_id: {
                required: "Please select product"
            }
        }
    });
});

$('#quantity').priceFormat({
        prefix: '',
        thousandsSeparator: ',',
        suffix: '',
        centsLimit: 0,
        limit: 10
    });

function getProductsByStakeholder(activity_id) {
    $.ajax({
        type: "POST",
        url: appName + "/stock/ajax-get-products-by-stakeholder-activity",
        data: {
            activity_id: activity_id, type: 2, tran_date: $("#transaction_date").val()
        },
        dataType: 'html',
        success: function(data) {
            $('#item_id').html(data);
            $('#item_id').css('backgroundColor', 'Green');
            $.cookie('blink_div_background_color', "item_id");
            setTimeout(changeColor, 500);
        }
    });
}

function getProductPairByProduct(item_id) {
    $.ajax({
        type: "POST",
        url: appName + "/stock-demand/ajax-get-product-pair-by-product",
        data: {
            item_id: item_id
        },
        dataType: 'html',
        success: function(data) {
            $('#usage').html(data);
            $('#usage').css('backgroundColor', 'Green');
            $.cookie('blink_div_background_color', "usage");
            setTimeout(changeColor, 500);
        }
    });
}


