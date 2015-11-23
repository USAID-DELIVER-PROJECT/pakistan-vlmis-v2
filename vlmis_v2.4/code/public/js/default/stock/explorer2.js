$(function() {
    $('#uc').change(function() {
        $.ajax({
            type: "POST",
            url: appName + "/stock/ajaxuccenters.php",
            data: {uc: $('#uc').val()},
            dataType: 'html',
            success: function(data) {
                $('#uc_center_div').show();
                $('#uc_center').html(data);
            }
        });
    });

    // load month - year reports
    $('#warehouse').change(function() {
        showCombos();
    });
    $('#office').change(function() {
        $('#monthly_report').html("<option value=''>Month - Year</option>");
        $('#showReport').html("");
    });

    $("#monthly_report").change(function(e) {
        e.preventDefault();
        var action = $(this).val();
        var level = $("#office").val();

        if (action != '') {
            if (level == 6) {
                $.ajax({
                    type: "POST",
                    url: appName + "/stock/ajax-consumption2",
                    data: {do: action},
                    success: function(data) {
                        $('#showReport').html(data);
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: appName + "/stock/ajax-explorer",
                    data: {do: action},
                    success: function(data) {
                        $('#showReport').html(data);
                    }
                });
            }

        } else {
            $('#showReport').html("");
        }
    });

//
//    $("#monthly_report").change(function(e) {
//        e.preventDefault();
//        var action = $(this).val();
//        if (action != '') {
//            $.ajax({
//                type: "POST",
//                url: appName + "/stock/print-explorer",
//                data: {do: action},
//                success: function(data) {
//                    //   $('#showReport').html(data);
//                }
//            });
//        } else {
//            // $('#showReport').html("");
//        }
//    });

});

function showCombos() {
    var wh_id = $('#warehouse').val();
    var level = $("#office").val();

    if (wh_id != '') {

        if (level == 6) {
            $.ajax({
                type: "POST",
                url: appName + "/stock/ajax-report-combo2",
                data: {warehouse_id: wh_id, level: level},
                success: function(data) {
                    $('#monthly_report').html(data);
                    $('#monthly_report').css('backgroundColor', 'Green');
                    $.cookie('blink_div_background_color', "monthly_report");
                    setTimeout(changeColor, 1000);
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: appName + "/stock/ajax-report-combo",
                data: {warehouse_id: wh_id, level: level},
                success: function(data) {
                    $('#monthly_report').html(data);
                    $('#monthly_report').css('backgroundColor', 'Green');
                    $.cookie('blink_div_background_color', "monthly_report");
                    setTimeout(changeColor, 1000);
                }
            });
        }
    } else {
        $('#showReport').html("");
        $('#monthly_report').html('<option value="">Month - Year</option>');
    }
}
// $('#print_explorer').click(
$(document).on("click", "#print_explorer", function() {
    //function() {
    var monthly_report = $('#monthly_report').val();
    window.open('print-explorer?do=' + monthly_report, '_blank', 'scrollbars=1,width=860,height=595');
    //}
});























$(document).on("click", "#print-monthly-consumption", function() {

    var monthly_report = $('#monthly_report').val();
    window.open('print-monthly-consumption2?do=' + monthly_report, '_blank', 'scrollbars=1,width=860,height=595');

});