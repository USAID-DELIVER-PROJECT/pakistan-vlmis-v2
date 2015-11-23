$(function () {
   
    $("#batch").select2();

    $("#product").change(function () {
        Metronic.startPageLoading('Please wait...');
        $("#batch").select2("val", "");
        $('#transfer-management-div').hide();
        $('#history-div').hide();
        $.ajax({
            type: "POST",
            url: appName + "/stock-batch/ajax-running-batches",
            data: {item_id: $('#product').val(), page: 'vvm-management', transaction_date: $('#today').val()},
            dataType: 'html',
            success: function (data) {
                $('#batch').html(data);
                $("#batch").select2("val", $("#sel_batch").val());
                Metronic.stopPageLoading();
            }
        });
    });

    if ($("#product").val() != '') {
        $("#product").trigger("change");
        $('#transfer-management-div').show();
        $('#history-div').show();
    }

    $("#batch").change(function () {
        $('#transfer-management-div').hide();
        $('#history-div').hide();
    });

    $("#transfer-management").validate({
        rules: {
            product: {
                required: true
            },
            batch: {
                required: true
            }
        },
        messages: {
            product: {
                required: "Please select product."
            },
            batch: {
                required: "Please select batch number."
            }
        }
    });

    $("#updatetransfer").click(function () {

        var form = true;
        var valid = 0;

        $(document).find('input[type=text]').each(function () {
            if ($(this).val() != "" && $(this).val() != 0) {
                valid += 1;
            }
        });

        if (valid == 0) {
            alert('You must input at least one quantity to proceed!');
            form = false;
        }

        $("select[id$='_purpose']").each(function () {
            var value = $(this).attr("id");
            var id = value.replace("_purpose", "");
            var qty = parseInt($("#" + id + "_quantity").val());

            var purpose = $(this).val();
            if (purpose == '' && qty > 0) {
                alert("Purpose should be selected");
                $("#" + id + "_purpose").focus();
                form = false;
            }
        });

        $("select[id$='_toproduct']").each(function () {
            var value = $(this).attr("id");
            var id = value.replace("_toproduct", "");
            var qty = parseInt($("#" + id + "_quantity").val());

            var product = $(this).val();
            if (product == '' && qty > 0) {
                alert("Product should be selected");
                $("#" + id + "_toproduct").focus();
                form = false;
            }
        });

        $("input[id$='_quantity']").each(function () {
            var value = $(this).attr("id");
            var id = value.replace("_quantity", "");
            var quantity = parseInt($(this).val());
            var placed_qty = $("#" + id + "_placed_quantity").html();
            var placed_qty1 = parseInt(placed_qty.replace(",", ""));

            if (quantity > placed_qty1) {
                alert("Quantity should be less than or equal to " + placed_qty);
                $("#" + id + "_quantity").focus();
                form = false;
            }
        });

        if (form == true) {
            $("#transfer-management").submit();
        }

    });

    $("select[id$='_purpose']").change(function () {
        var value = $(this).attr("id");
        var id = value.replace("_purpose", "");
        $.ajax({
            type: "POST",
            url: appName + "/stock/ajax-get-products-by-purpose",
            data: {
                params: value, purpose: $(this).val()
            },
            dataType: 'html',
            success: function (data) {
                $('#' + id + '_toproduct').html(data);
            }
        });
    });

    $('.quantity').mask("9999999999");

});