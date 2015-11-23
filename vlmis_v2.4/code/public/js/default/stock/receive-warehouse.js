$(function() {
    /*$("#rec_date").datepicker({
     minDate: $("#issue_date").val(),
     maxDate: 0,
     dateFormat: 'dd/mm/yy'
     });*/

    $("input[id$='-missing']").bind("paste", function(e) {
        e.preventDefault();
    });
    $("input[id$='-missing']").keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) { // if shift, ctrl or alt keys held down
            e.preventDefault();         // Prevent character input
        } else {
            var n = e.keyCode;
            if (!((n == 8)              // backspace
                    || (n == 9)                // Tab
                    || (n == 46)                // delete
                    || (n >= 35 && n <= 40)     // arrow keys/home/end
                    || (n >= 48 && n <= 57)     // numbers on keyboard
                    || (n >= 96 && n <= 105))   // number on keypad
                    ) {
                e.preventDefault();     // Prevent character input
            }
        }
    });

    $('#rec_date').datetimepicker({
        dayOfWeekStart: 1,
        lang: 'en',
        format: 'd/m/Y h:i A',
        minDate: new Date($("#issue_year").val(), $("#issue_month").val() - 1, $("#issue_day").val()),
        maxDate: 0
    });

    $("input[id$='-stage1']").change(function() {
        var value = $(this).attr("id");
        var id = value.replace("-stage1", "");

        var stage1 = parseInt($("#" + id + "-stage1").val());
        var stage2 = parseInt($("#" + id + "-stage2").val());
        var stage3 = parseInt($("#" + id + "-stage3").val());
        var quantity = parseInt($("#" + id + "-qty").val());
        if (isNaN(stage1)) {
            stage1 = 0;
        }
        if (isNaN(stage2)) {
            stage2 = 0;
        }
        if (isNaN(stage3)) {
            stage3 = 0;
        }
        var total = stage1 + stage2 + stage3;
        $("#" + id + "-received").val(total);

        if (total > quantity) {
            alert("Quantity should not be greater than " + quantity);
        }
    });

    $("input[id$='-stage2']").change(function() {
        var value = $(this).attr("id");
        var id = value.replace("-stage2", "");

        var stage1 = parseInt($("#" + id + "-stage1").val());
        var stage2 = parseInt($("#" + id + "-stage2").val());
        var stage3 = parseInt($("#" + id + "-stage3").val());
        var quantity = parseInt($("#" + id + "-qty").val());
        if (isNaN(stage1)) {
            stage1 = 0;
        }
        if (isNaN(stage2)) {
            stage2 = 0;
        }
        if (isNaN(stage3)) {
            stage3 = 0;
        }
        var total = stage1 + stage2 + stage3;
        $("#" + id + "-received").val(total);

        if (total > quantity) {
            alert("Quantity should not be greater than " + quantity);
        }
    });

    $("input[id$='-stage3']").change(function() {
        var value = $(this).attr("id");
        var id = value.replace("-stage3", "");

        var stage1 = parseInt($("#" + id + "-stage1").val());
        var stage2 = parseInt($("#" + id + "-stage2").val());
        var stage3 = parseInt($("#" + id + "-stage3").val());
        var quantity = parseInt($("#" + id + "-qty").val());
        if (isNaN(stage1)) {
            stage1 = 0;
        }
        if (isNaN(stage2)) {
            stage2 = 0;
        }
        if (isNaN(stage3)) {
            stage3 = 0;
        }
        var total = stage1 + stage2 + stage3;
        $("#" + id + "-received").val(total);

        if (total > quantity) {
            alert("Quantity should not be greater than " + quantity);
        }
    });

    $('#checkall').attr('checked', false);

    $("select[id$='-types']").attr("disabled", true);

    $('#estimated_life').priceFormat({
        prefix: '',
        thousandsSeparator: '',
        suffix: '',
        centsLimit: 0,
        limit: 2
    });

    $('#save').click(function(e) {
        e.preventDefault();
        var flag = 'true';

        if ($('#receive_stock').find('input[type=checkbox]:checked').length == 0) {
            alert('Please select atleast one checkbox');
            flag = 'false';
        }

        $("input[id$='-received']").each(function() {
            var value = $(this).attr("id");
            var id = value.replace("-received", "");
            var qty = $('#' + id + '-qty').val();
            var received = $('#' + id + '-received').val();

            if (parseInt(received) > parseInt(qty)) {
                alert("Received quantity should not be greater than actual quantity.");
                $(this).focus();
                flag = 'false';
            }
        });




        $("input[id$='-missing']").each(function() {
            var value = $(this).attr("id");
            var id = value.replace("-missing", "");
            $('#' + id + '-types').attr("required", true);
            var adjqty = $(this).val();
            var qty = $('#' + id + '-qty').val();
            adjqty = parseInt(adjqty.replace(",", ""));
            qty = parseInt(qty.replace(",", ""));

            if (adjqty > qty) {
                alert("Adjustment quantity should not be greater than available quantity.");
                $(this).focus();
                flag = 'false';
            }

            if (qty != '' && !$.isNumeric(qty)) {
                alert("Adjustment quantity should be number");
                $(this).focus();
                flag = 'false';
            }
            if (adjqty == 'NaN' && adjqty != '' && isNaN(adjqty)) {
                alert("Adjustment quantity should be number");
                $(this).focus();
                flag = 'false';
            }
        });


        if (flag == 'true') {
            if (confirm('Are you sure you received all the items?')) {
                var checkedAtLeastOne = false;
                $('input[type="checkbox"]').each(function() {
                    if ($(this).is(":checked")) {
                        $('#receive_stock').submit();
                        return false;
                    }
                });
            }
        }

    });

    $("input[id$='-missing']").keyup(function(e) {
        var value = $(this).attr("id");
        var id = value.replace("-missing", "");
        $('#' + id + '-types').attr("required", true);
        var adjqty = $(this).val();
        var qty = $('#' + id + '-qty').val();
        adjqty = parseInt(adjqty.replace(",", ""));
        qty = parseInt(qty.replace(",", ""));

        if (adjqty > qty) {
            alert("Adjustment quantity should not be greater than available quantity.");
            $(this).focus();
            flag = 'false';
        }
        if (qty != '' && !$.isNumeric(qty)) {
            alert("Adjustment quantity should be number");
            $('#' + id + '-types').attr("disabled", true);
            $(this).focus();
        }
        if (qty <= 0) {
            $('#' + id + '-types').attr("disabled", true);
        } else {
            $('#' + id + '-types').attr("disabled", false);
        }
    });
});