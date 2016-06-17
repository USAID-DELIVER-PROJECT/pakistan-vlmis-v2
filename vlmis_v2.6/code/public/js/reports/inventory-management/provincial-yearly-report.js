
   
        
$(function() {
    $('#wh_type').change(function() {
        //alert("test");
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: "provWH.php",
            data: {SkOfcLvl: $(this).val(), combo: '2'},
            dataType: 'html',
            success: function(data)
            {
                $('#loader').hide();
                $('#warehouse_id').html(data);
            }
        });
    });

    $('#prov_sel').change(function() {
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: appName + "/reports/inventory-management/prov-2dist",
            data: {prov_sel: $(this).val(), combo: '2', report_id: 'PW'},
            dataType: 'html',
            success: function(data)
            {
                $('#loader').hide();
                $('#division').html(data);
                $('#teh_id').empty();
                $('#uc_id').empty();
            }
        });
    });
    
     $('#division').change(function() {
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: appName + "/reports/inventory-management/prov-2dist",
            data: {div_sel: $(this).val(), combo: '3', report_id: 'PW'},
            dataType: 'html',
            success: function(data)
            {
                $('#loader').hide();
                $('#dist_id').html(data);
                $('#teh_id').empty();
                $('#uc_id').empty();
            }
        });
    });

    $('#dist_id').change(function() {
        var dist_id = $(this).val();
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: appName + "/reports/prov-2dist",
            data: {dist_sel: dist_id, combo: '4'},
            dataType: 'html',
            success: function(data)
            {
                /*$('#hidden_dist').val(dist_id);
                 $('#hidden_teh').val($('#teh_id').val());*/
                $('#loader').hide();
                $('#teh_id').html(data);
            }
        });
        $.ajax({
            type: "POST",
            url: appName + "/reports/prov-2dist",
            data: {dist_sel: dist_id, combo: '5'},
            dataType: 'html',
            success: function(data)
            {
                $('#loader').hide();
                $('#uc_id').html(data);
            }
        });
    });

    $('#teh_id').change(function() {
        var teh_id = $(this).val();
        $('#loader').show();
        $.ajax({
            type: "POST",
            url: appName + "/reports/prov-2dist",
            data: {teh_sel: teh_id, combo: '5'},
            dataType: 'html',
            success: function(data)
            {
                /*$('#hidden_dist').val(dist_id);
                 $('#hidden_teh').val($('#teh_id').val());*/
                $('#loader').hide();
                $('#uc_id').html(data);
            }
        });
    });

});
