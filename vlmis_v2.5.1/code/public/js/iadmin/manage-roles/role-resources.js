$(function() {

    $("input[id$='-role_resource']").live("click", function() {
        var id = $(this).val();
        Metronic.startPageLoading('Please wait...');
        if ($(this).is(":checked")) {

            $.ajax({
                type: "POST",
                url: appName + "/iadmin/manage-roles/ajax-add-role-resource",
                data: {role_resource_id: $(this).val()},
                dataType: 'html',
                success: function(data) {

                    $('#' + id + '-role_resource').prop('checked', true);
                    Metronic.stopPageLoading();
                }
            });
            // checkbox is checked -> do something
        } else {
            $.ajax({
                type: "POST",
                url: appName + "/iadmin/manage-roles/ajax-delete-role-resource",
                data: {role_resource_id: $(this).val()},
                dataType: 'html',
                success: function(data) {
                    $('#' + id + '-role_resource').prop('checked', false);
                    Metronic.stopPageLoading();
                }
            });
            // checkbox is not checked -> do something different
        }
    });



});