$("#info").fadeOut(9000);

$(function() {
    $('#shipment_date').datetimepicker({
        dayOfWeekStart: 1,
        lang: 'en',
        format: 'd/m/Y h:i A',
        maxDate: 0
    });

});

$('#quantity').priceFormat({
    prefix: '',
    thousandsSeparator: ',',
    suffix: '',
    centsLimit: 0,
    limit: 10
});


$('#quantity').change(function(e) {
    var quantity = $('#quantity').val();
    var item_id = $('#item_id').val();

    $('#product-doses').css('display', 'none');

    if (quantity != 0 && quantity != '' && item_id != '')
    {
        $.ajax({
            type: "POST",
            url: appName + "/stock/ajax-product-cat-and-doses",
            data: 'quantity=' + quantity + '&itemId=' + item_id,
            success: function(doses) {
                if (doses != '') {
                    $('#product-doses').css('display', 'table-row');
                    $('#product-doses').html(doses);
                }
            }
        });
    }


});


$("#transaction_reference").change(function() {
    $.ajax({
        type: "POST",
        url: appName + "/stock/ajax-check-reference",
        data: {
            ref: $(this).val()
        },
        dataType: 'html',
        success: function(data) {
            if (data == 1) {
                $("#reference_tooltip").show();
                $(".tooltips").trigger("mouseover");
                setTimeout(hideTooltip, 5000);
            } else {
                $("#reference_tooltip").hide();
            }
        }
    });
});

function hideTooltip() {
    $(".tooltips").trigger("mouseout");
}

$.validator.addMethod("custom_alphanumeric", function(value, element) {
    return this.optional(element) || value === "NA" || value.match(/^[a-zA-Z0-9-_/]+$/);
}, "Letters, numbers, hyphen and underscores only please");

$.validator.addMethod("positive_integer", function(value, element) {
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
            required: true,
            alphanumdash: true
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
            required: "Please enter reference number",
            alphanumdash: "Please alphanumeric and dash only"
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
