$("#info").fadeOut(9000);

$(function () {
    $('#shipment_date').datetimepicker({
        minDate: new Date($("#p_year").val(), $("#p_month").val() - 1, $("#p_day").val()),
        dayOfWeekStart: 1,
        lang: 'en',
        format: 'd/m/Y h:i A'        
    });

});

$('#quantity').priceFormat({
    prefix: '',
    thousandsSeparator: ',',
    suffix: '',
    centsLimit: 0,
    limit: 10
});

$('#activity_id').change(function (e) {
    $.ajax({
        type: "POST",
        url: appName + "/stock/ajax-get-products-by-stakeholder-activity",
        data: {
            activity_id: $('#activity_id').val(), type: 2, tran_date: $("#shipment_date").val()
        },
        dataType: 'html',
        success: function (data) {
            $('#item_id').html(data);
            $('#item_id').css('backgroundColor', 'Green');
            $.cookie('blink_div_background_color', "item_id");
            setTimeout(changeColor, 500);
        }
    });


});



$('#quantity').change(function (e) {
    var quantity = $('#quantity').val();
    var item_id = $('#item_id').val();

    $('#product-doses').css('display', 'none');

    if (quantity != 0 && quantity != '' && item_id != '')
    {
        $.ajax({
            type: "POST",
            url: appName + "/stock/ajax-product-cat-and-doses",
            data: 'quantity=' + quantity + '&itemId=' + item_id,
            success: function (doses) {
                if (doses != '') {
                    $('#product-doses').css('display', 'table-row');
                    $('#product-doses').html(doses);
                }
            }
        });
    }


});

function hideTooltip() {
    $(".tooltips").trigger("mouseout");
}

$.validator.addMethod("custom_alphanumeric", function (value, element) {
    return this.optional(element) || value === "NA" || value.match(/^[a-zA-Z0-9-_/]+$/);
}, "Letters, numbers, hyphen and underscores only please");

$.validator.addMethod("positive_integer", function (value, element) {
    return this.optional(element) || value === "NA" || value.match(/^[1-9]\d*$/);
}, "Positive numbers only please");

// validate signup form on keyup and submit
$("#new_receive").validate({
    rules: {
        'item_id': {
            required: true
        },
        'number': {
            required: true,
            nowhitespace: true,
            custom_alphanumeric: true
        },
        'quantity': {
            required: true
        },
        'transaction_reference': {
            refnum: true
        },
        'from_warehouse_id': {
            required: true
        },
        'expiry_date': {
            required: true
        },
        'activity_id': {
            required: true
        }

    },
    messages: {
        'transaction_reference': {
            refnum: "Only these characters are allowed: Alphanumeric space * , .-_=/# |()"
        },
        'item_id': {
            required: "Please select product"
        },
        'number': {
            required: "Please enter batch number"
        },
        'quantity': {
            required: "Please enter quantity",
            min: "Quantity should be greater than 0"
        },
        'expiry_date': {
            required: "Expiry date is required"
        },
        'from_warehouse_id': {
            required: "Please select funding source"
        },
        'activity_id': {
            required: "Please select purpose"
        }
    }
});

$.validator.addMethod("alphanumdash", function (value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z0-9\-]+$/);
});
$.validator.addMethod("refnum", function (value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z0-9-\s\#\_/,/./=/|/(/)]+$/);
});