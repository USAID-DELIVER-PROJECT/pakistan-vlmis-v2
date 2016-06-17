$(function () {
    $('#location_level_edit').change(function () {

        $('#combo1_edit').empty();
        $('#combo2_edit').empty();

        $('#div_combo1_edit').hide();
        $('#div_combo2_edit').hide();
        $('#div_combo3_edit').hide();

        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-one",
            data: {office: $(this).val()},
            dataType: 'html',
            success: function (data) {

                var val1 = $('#location_level_edit').val();
                switch (val1) {

                    case '3':
                        $('#lblcombo1_edit').text('Province');
                        $('#div_combo1_edit').show();
                        $('#combo1_edit').html(data);
                        break;
                    case '4':
                        $('#lblcombo1_edit').text('Province');
                        $('#div_combo1_edit').show();
                        $('#combo1_edit').html(data);
                        break;
                    case '5':
                        $('#lblcombo1_edit').text('Province');
                        $('#div_combo1_edit').show();
                        $('#combo1_edit').html(data);
                        break;
                    case '6':
                        $('#lblcombo1_edit').text('Province');
                        $('#div_combo1_edit').show();
                        $('#combo1_edit').html(data);
                        break;
                }
            }
        });
    });

    $('#combo1_edit').change(function () {

        $('#combo2_edit').empty();



        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-two",
            data: {combo1: $(this).val(), office: $('#location_level_edit').val()},
            dataType: 'html',
            success: function (data) {
                $('#div_combo2_edit').show();
                $('#combo2_edit').html(data);
            }
        });
    });

    $('#combo2_edit').change(function () {

        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-three",
            data: {combo2: $(this).val(), office: $('#location_level_edit').val()},
            dataType: 'html',
            success: function (data) {

                $('#div_combo3_edit').show();
                $('#combo3_edit').html(data);
            }
        });
    });

    $('#combo3_edit').change(function () {

        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-four",
            data: {combo3: $(this).val(), office: $('#location_level_edit').val()},
            dataType: 'html',
            success: function (data) {

                $('#div_combo4_edit').show();
                $('#combo4_edit').html(data);
            }
        });
        
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
            data: {
                combo3: $(this).val(), 
                office: $('#location_level_edit').val(),
                geo_level_id: function () {
                            return 5;
                        },
                province_id: function () {
                            return $("#combo1_edit").val();
                        },
                district_id: function () {
                            return $("#combo2_edit").val();
                        },
                tehsil_id: function () {
                            return $("#combo3_edit").val();
                        }                
            },
            dataType: 'html',
            success: function (data) {
                $('#default_warehouse_update').html(data);
            }
        });
    });


});