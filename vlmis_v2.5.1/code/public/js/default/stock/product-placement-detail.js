var batchManagement = function () {
    var oTable = $('#product_placement_detail').dataTable({
        "aoColumnDefs": [
            {"sType": 'date-uk', "aTargets": [0]},
            {"bSortable": false, "aTargets": [0]}
            /*{
             "aTargets": [-1],
             "bVisible": false
             }*/
        ],
        "aaSorting": [[0, 'asc']],
        "sDom": "<'row'<'col-md-12 right col-sm-12'T>r><'table-scrollable't>>", // horizobtal scrollable datatable
        //"sDom ": 'T<"clear ">lfrtip',
        // set the initial value
        "bDestroy": true,
        "iDisplayLength": 100,
        "oTableTools": {
            "sSwfPath": appName + "/common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
            "aButtons": [{
                    "sExtends": "xls",
                    "sButtonText": "<img src=../images/excel-32.png width=24> Export to Excel",
                    "mColumns": "sortable"
                }, {
                    "sExtends": "print",
                    "sButtonText": "<img src=../images/copy.png width=24> Print",
                    "mColumns": "sortable"
                }]
        }
    });

    jQuery('#product_placement_detail_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
    jQuery('#product_placement_detail_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
    jQuery('#product_placement_detail_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

    $('#product_placement_detail_column_toggler input[type="checkbox"]').change(function () {
        /* Get the DataTables object again - this is not a recreation, just a get of the object */
        var iCol = parseInt($(this).attr("data-column"));
        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
        oTable.fnSetColumnVis(iCol, (bVis ? false : true));
    });
}

$("#product_plac").validate({
    rules: {
        product: {
            required: true
        }
    },
    messages: {
        product: {
            required: "Please select product"
        }
    }
});

$('#submit').click(function (e) {
    if ($("#product_plac").valid()) {
        e.preventDefault();
        var formdata = $("#product_plac").serialize();
       
        Metronic.startPageLoading('Please wait...');
        $.ajax({
            type: "POST",
            url: appName + "/stock/ajax-product-placement-detail?" + formdata,
            data: {},
            dataType: 'html',
            success: function (data) {
                $('#product_placement').html(data);
                Metronic.stopPageLoading();
                batchManagement();
                
                $("#ToolTables_product_placement_detail_1").click(function () {
                    window.print();
                });
            }
        });
    }

});