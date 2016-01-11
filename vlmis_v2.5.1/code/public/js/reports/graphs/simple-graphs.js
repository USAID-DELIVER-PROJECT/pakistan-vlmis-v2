$(function() {
    $("#optvals").change(function() {
        $("#prov_combo").hide();
        $("#dist_combo").hide();
        $("#all_provinces").empty();
        $("#all_districts").empty();
        var optvals = $(this).val();
        if (optvals == 10 || optvals == 11) {
            $.ajax({
                type: "POST",
                url: appName + "/index/all-level-combos-one",
                data: {office: 2},
                dataType: 'html',
                success: function(data) {
                    $("#prov_combo").show();
                    $("#all_provinces").html(data);
                }
            });
        }
    });

    $("#all_provinces").change(function() {
        $("#dist_combo").hide();
        $("#all_districts").empty();
        var prov_id = $(this).val();
        var optvals = $("#optvals").val();
        if (optvals == 11) {
            $.ajax({
                type: "POST",
                url: appName + "/index/all-level-combos-two",
                data: {combo1: prov_id, office: 5},
                dataType: 'html',
                success: function(data) {                   
                    $("#dist_combo").show();
                    $("#all_districts").html(data);
                }
            });
        }
    });
});