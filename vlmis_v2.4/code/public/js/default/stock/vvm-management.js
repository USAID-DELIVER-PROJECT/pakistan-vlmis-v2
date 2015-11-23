$(function () {

    $("#batch").select2();

    $("#product").change(function () {
        Metronic.startPageLoading('Please wait...');
        $("#batch").select2("val", "");
        $('#vvm-management-div').hide();
        $('#history-div').hide();
        $.ajax({
            type: "POST",
            url: appName + "/stock-batch/ajax-running-batches",
            data: {item_id: $('#product').val(), page: 'vvm-management', transaction_date: $('#trans_date').val()},
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
        $('#vvm-management-div').show();
        $('#history-div').show();
    }

    $("#batch").change(function () {
        $('#vvm-management-div').hide();
         $('#history-div').hide();
    });

    $("#vvm-management-filter").validate({
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

    $("#updatevvm").click(function () {

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
            $("#vvm-management").submit();
        }

    });

    $('.quantity').mask("9999999999");

});