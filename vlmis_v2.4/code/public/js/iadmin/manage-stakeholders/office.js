$(function() {
    $('#records').change(function() {
        var counter = $(this).val();
        document.location.href = appName + '/iadmin/manage-stakeholders/office/?counter=' + counter;
    });

    $("#add-stakeholder").validate({
        rules: {
            office: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-stakeholders/check-office",
                    type: "post",
                    data: {
                        stakeholder: function() {
                            return $("#add-stakeholder #stakeholder").val();
                        },
                        geo_level: function() {
                            return $("#add-stakeholder #geo_level").val();
                        }

                    }
                }
            },
            stakeholder: "required",
            geo_level: "required"
        }
    });


    // validate signup form on keyup and submit
    $("#update-asset-sub-types").validate({
        rules: {
            office: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-stakeholders/check-office",
                    type: "post",
                    data: {
                        stakeholder: function() {
                            return $("#update-asset-sub-types #stakeholder").val();
                        },
                        geo_level: function() {
                            return $("#update-asset-sub-types #geo_level").val();
                        }

                    }
                }
            },
            stakeholder: "required",
            geo_level: "required"
        }
    });

    $(".update-asset-sub-type").click(function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-stakeholders/ajax-office-edit",
            data: {stakeholder_id: $(this).attr('id')},
            dataType: 'html',
            success: function(data) {
                $('#modal-body-contents').html(data);
                $('#update-button').show();
            }
        });
    });



    $('[data-toggle="notyfy"]').click(function()
    {
        $.notyfy.closeAll();
        var self = $(this);

        notyfy({
            text: 'Do you want to continue?',
            type: self.data('type'),
            dismissQueue: true,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [{
                    addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
                    text: '<i></i> Ok',
                    onClick: function($notyfy) {
                        $notyfy.close();
                        $.ajax({
                            type: "POST",
                            url: appName + "/cadmin/manage-makes/delete",
                            data: {make_id: self.data('bind')},
                            dataType: 'html',
                            success: function(data) {
                                notyfy({
                                    force: true,
                                    text: 'Make has been deleted!',
                                    type: 'success',
                                    layout: self.data('layout')
                                });
                                self.closest("tr").remove();
                            }
                        });
                    }
                }, {
                    addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
                    text: '<i></i> Cancel',
                    onClick: function($notyfy) {
                        $notyfy.close();
//                        notyfy({
//                            force: true,
//                            text: '<strong>You clicked "Cancel" button<strong>',
//                            type: 'error',
//                            layout: self.data('layout')
//                        });
                    }
                }]
        });
        return false;
    });

    $('th.sorting, th.sorting_asc, th.sorting_desc').click(function(e) {
        e.preventDefault();

        var self = $(this);

        var asset_sub_type = '';
        var order = '';
        var sort = '';
        var counter = '';
        var page = '';

        order = self.data('order');
        sort = self.data('sort');

        asset_sub_type = $('#name').val();
        counter = $('#records').val();
        page = $('#current').val();

        if (asset_sub_type.length > 1) {
            document.location = appName + '/cadmin/manage-asset-sub-types/?order=' + order + '&sort=' + sort + '&name=' + asset_sub_type + '&counter=' + counter + '&page=' + page;
        }
        else {
            document.location = appName + '/cadmin/manage-asset-sub-types/?order=' + order + '&sort=' + sort + '&counter=' + counter + '&page=' + page;
        }
    });
});