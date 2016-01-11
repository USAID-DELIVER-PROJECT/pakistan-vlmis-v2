var TableAdvanced = function() {
    var initTable1 = function() {

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr)
        {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table>';
            sOut += '<tr><td>Platform(s):</td><td>' + aData[2] + '</td></tr>';
            sOut += '<tr><td>Engine version:</td><td>' + aData[3] + '</td></tr>';
            sOut += '<tr><td>CSS grade:</td><td>' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Others:</td><td>Could provide a link here</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        $('#sample_1 thead tr').each(function() {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#sample_1 tbody tr').each(function() {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#sample_1').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[0, 'asc']],
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
        });

        jQuery('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
        jQuery('#sample_1_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#sample_1').on('click', ' tbody td .row-details', function() {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr))
            {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            }
            else
            {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    }

    var initTable2 = function() {
        var oTable = $('#sample_2').dataTable({
            "aoColumnDefs": [
                {"sType": 'date-uk', "aTargets": [0]},
                {"bSortable": false, "aTargets": [-1]}
                /*{
                 "aTargets": [-1],
                 "bVisible": false
                 }*/
            ],
            "aaSorting": [[0, 'asc']],
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "sDom": "<'row'<'col-md-4 col-sm-12'l><'col-md-4 col-sm-12'T><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            //"sDom ": 'T<"clear ">lfrtip',
            // set the initial value
            "bDestroy": true,
            "iDisplayLength": 10,
            "oTableTools": {
                "sSwfPath": appName + "/common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                        "sExtends": "xls",
                        "sButtonText": "<img src=" + appName + "/images/excel-32.png width=24> Export to Excel",
                        "mColumns": "sortable"
                    }, {
                        "sExtends": "copy",
                        "sButtonText": "<img src=" + appName + "/images/copy.png width=24> Copy Data",
                        "mColumns": "sortable"
                    }]
            }
        });

        jQuery('#sample_2_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
        jQuery('#sample_2_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#sample_2_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

        $('#sample_2_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    }

    var initTable3 = function() {
        var oTable = $('#sample_3').dataTable({
            "aoColumnDefs": [
                {"sType": 'date-uk', "aTargets": [0]}
                /*{
                 "aTargets": [-1],
                 "bVisible": false
                 }*/
            ],
            "aaSorting": [[0, 'asc']],
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "sDom": "<'row'<'col-md-4 col-sm-12'l><'col-md-4 col-sm-12'T><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            //"sDom ": 'T<"clear ">lfrtip',
            // set the initial value
            "bDestroy": true,
            "iDisplayLength": 10,
            "oTableTools": {
                "sSwfPath": appName + "/common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                        "sExtends": "xls",
                        "sButtonText": "<img src=" + appName + "/images/excel-32.png width=24> Export to Excel",
                        "mColumns": "sortable"
                    }, {
                        "sExtends": "copy",
                        "sButtonText": "<img src=" + appName + "/images/copy.png width=24> Copy Data",
                        "mColumns": "sortable"
                    }]
            }
        });

        jQuery('#sample_3_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
        jQuery('#sample_3_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#sample_3_wrapper .dataTables_length select').select2(); // initialize select2 dropdown

        $('#sample_3_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
            initTable2();
            initTable3();
        }

    };

}();