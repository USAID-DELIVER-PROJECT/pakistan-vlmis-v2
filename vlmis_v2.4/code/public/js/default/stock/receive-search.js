$(function() {
    /*$("#date_from,#date_to").datepicker({
     dateFormat: 'dd/mm/yy',
     changeMonth: true,
     changeYear: true
     });*/

    var startDateTextBox = $('#date_from');
    var endDateTextBox = $('#date_to');

    startDateTextBox.datepicker({
        minDate: "-10Y",
        maxDate: 0,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        onClose: function(dateText, inst) {
            if (endDateTextBox.val() != '') {
                var testStartDate = startDateTextBox.datepicker('getDate');
                var testEndDate = endDateTextBox.datepicker('getDate');
                if (testStartDate > testEndDate)
                    endDateTextBox.datepicker('setDate', testStartDate);
            }
            else {
                endDateTextBox.val(dateText);
            }
        },
        onSelect: function(selectedDateTime) {
            endDateTextBox.datepicker('option', 'minDate', startDateTextBox.datepicker('getDate'));
        }
    });
    endDateTextBox.datepicker({
        maxDate: 0,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        onClose: function(dateText, inst) {
            if (startDateTextBox.val() != '') {
                var testStartDate = startDateTextBox.datepicker('getDate');
                var testEndDate = endDateTextBox.datepicker('getDate');
                if (testStartDate > testEndDate)
                    startDateTextBox.datepicker('setDate', testEndDate);
            }
            else {
                startDateTextBox.val(dateText);
            }
        },
        onSelect: function(selectedDateTime) {
            startDateTextBox.datepicker('option', 'maxDate', endDateTextBox.datepicker('getDate'));
        }
    });



    $('#print_vaccine_receive').click(
            function() {
                var searchby, number, warehouses, product, date_from, date_to, all_arguments;
                searchby = $('#searchby').val();
                number = $('#number').val();
                warehouses = $('#warehouses').val();
                product = $('#product').val();
                date_from = $('#date_from').val();
                date_to = $('#date_to').val();
                all_arguments = "searchby=" + searchby + "&number=" + number + "&warehouses=" + warehouses + "&product=" + product + "&date_from=" + date_from + "&date_to=" + date_to;

                var val = $('input[name="groupBy"]:checked').val();
                window.open('vaccine-placement-receive?grpBy=' + val + '&' + all_arguments, '_blank', 'scrollbars=1,width=860,height=595');
            }
    );
    $('#print_vaccine_summary').click(
            function() {

                var searchby, number, warehouses, product, date_from, date_to, all_arguments;
                searchby = $('#searchby').val();
                number = $('#number').val();
                warehouses = $('#warehouses').val();
                product = $('#product').val();
                date_from = $('#date_from').val();
                date_to = $('#date_to').val();
                all_arguments = "searchby=" + searchby + "&number=" + number + "&warehouses=" + warehouses + "&product=" + product + "&date_from=" + date_from + "&date_to=" + date_to;


                var val = $('input[name="summary"]:checked').val();
                window.open('vaccine-placement-receive-summary?type=' + val + '&' + all_arguments, '_blank', 'scrollbars=1,width=860,height=595');
            }
    );



    /* DataTables */
//    if ($('.receiveSearch').size() > 0)
//    {
//        var datatable = $('.receiveSearch').dataTable({
//            "sPaginationType": "bootstrap",
//            //"sDom": 'W<"clear">lfrtip',
//            //"sDom": 'T<"clear">lfrtip',
//             "sDom": '<"clear">lfrtipT',
//            "oLanguage": {
//                "sLengthMenu": "_MENU_ records per page"
//            },
//            "oColumnFilterWidgets": {
//                "aiExclude": [0, 5, 6, 7, 8, 9]
//            },
//            "oTableTools": {
//                "aButtons": [
//                    {
//                        "sExtends": "copy",
//                        "sButtonText": "Copy",
//                        "mColumns": [0, 1, 2, 3, 4, 5, 6, 7, 8]
//                    }
//
//                ],
//                "sSwfPath": appName + "/common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
//            }
//
//        });
//
//    }
});
$('#print_stock').click(
        function() {
            var searchby, number, warehouses, product, date_from, date_to, all_arguments;
            searchby = $('#searchby').val();
            number = $('#number').val();
            warehouses = $('#warehouses').val();
            product = $('#product').val();
            date_from = $('#date_from').val();
            date_to = $('#date_to').val();
            all_arguments = "?searchby=" + searchby + "&number=" + number + "&warehouses=" + warehouses + "&product=" + product + "&date_from=" + date_from + "&date_to=" + date_to;
            window.open('stock-receive-list' + all_arguments, '_blank', 'scrollbars=1,width=860,height=595');
        }
);
$('[data-toggle="notyfy"]').click(function() {
    $.notyfy.closeAll();
    var self = $(this);

    notyfy({
        text: notification[self.data('type')],
        type: self.data('type'),
        dismissQueue: true,
        layout: self.data('layout'),
        buttons: (self.data('type') != 'confirm') ? false : [
            {
                addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
                text: '<i></i> Ok',
                onClick: function($notyfy) {
                    var id = self.attr("id");
                    $notyfy.close();

                    window.location.href = appName + '/stock/delete?p=stock&id=' + id;
                }
            },
            {
                addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
                text: '<i></i> Cancel',
                killer: true,
                onClick: function($notyfy) {
                    $notyfy.close();
                    /*    notyfy({
                     force: true,
                     text: '<strong>You clicked "Cancel" button<strong>',
                     type: 'error',
                     closeWith: ['hover'],
                     layout: self.data('layout')
                     });*/
                }
            }
        ]
    });
    return false;
});

var notification = [];
notification['confirm'] = 'Do you want to continue?';

$('#reset').click(function() {
    window.location.href = appName + '/stock/receive-search';
});

$('#searchby').change(function() {
    if ($('#searchby').val() == 0) {
        $('#number').val('');
    }
});

$(".stock-placement").click(function() {
    $.ajax({
        type: "POST",
        url: appName + "/stock/ajax-stock-placement",
        data: {id: $(this).attr('itemid')},
        dataType: 'html',
        success: function(data) {
            $('#modal-body-contents').html(data);
            $('#update-button').show();
        }
    });
});

// validate signup form on keyup and submit
$("#form-stock-placement").validate({
    rules: {
        'quantity': {
            required: true,
            numeric: true
        },
        'cold_chain': {
            required: true
        }
    },
    messages: {
        'quantity': {
            required: "Please enter quantity",
            numeric: "Please enter quantity in numeric value"
        },
        'cold_chain': {
            required: "Please select a cold chain"
        }
    }
});

$("a[id$='-stockedit']").click(function() {
    var value = $(this).attr("id");
    var id = value.replace("-stockedit", "");
    document.location = appName + "/stock/receive-supplier/id/" + id + "/t/s";
});