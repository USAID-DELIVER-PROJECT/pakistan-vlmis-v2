$(function() {
   $('#location_level_edit').change(function() {

      //  $('#loader').show();
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
            success: function(data) {
               
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

    $('#combo1_edit').change(function() {
      
        $('#combo2_edit').empty();


        $('#div_combo2_edit').hide();


        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-two",
            data: {combo1: $(this).val(), office: $('#location_level_edit').val()},
            dataType: 'html',
            success: function(data) {
               

                var val = $('#location_level_edit').val();
                switch (val)
                {
                    case '5':
                        $('#div_combo2_edit').show();
                        $('#combo2_edit').html(data);
                        break;
                    case '6':
                        $('#div_combo2_edit').show();
                        $('#combo2_edit').html(data);
                        break;
                }
            }
        });
    });

    $('#combo2_edit').change(function() {
    
        $.ajax({
            type: "POST",
            url: appName + "/index/locations-combos-three",
            data: {combo2: $(this).val(), office: $('#location_level_edit').val()},
            dataType: 'html',
            success: function(data) {
               
                var val = $('#location_level_edit').val();
                
                switch (val)
                {case '6':
                        $('#div_combo3_edit').show();
                        $('#combo3_edit').html(data);
                        break;
                }
            }
        });
    });
    
    
    
   
});