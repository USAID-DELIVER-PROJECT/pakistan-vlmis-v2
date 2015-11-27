$(function() {
    $('#records').change(function() {
        var counter = $(this).val();

        document.location.href = appName + '/iadmin/manage-users/policy-users/?counter=' + counter;
    });

    // validate signup form on keyup and submit
    $("#update-stores").validate({
        rules: {
            user_name_update: {
                required: true,
                alphanumeric: true,
                remote: {
                    url: appName + "/iadmin/manage-users/check-users-update-policy",
                    type: "post",
                    data: {
                        user_name_update: function() {
                            return $("#user_name_update").val();
                        }


                    }

                }
            },
            old_password: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-users/check-old-password",
                    type: "post",
                    data: {
                        user_id: function() {
                            return $("#user_id").val();
                        }


                    }

                }
            }


        },
        user_name_update: {
            user_name_update: "Please enter Valid UserName"

        }

    });

    $("#add-stores").validate({
        rules: {
            user_name_add: {
                required: true,
                alphanumeric: true,
                remote: {
                    url: appName + "/iadmin/manage-users/check-users-policy",
                    type: "post",
                    data: {
                        user_name_add: function() {
                            return $("#user_name_add").val();
                        }


                    }

                }
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            office_type_add: {
                required: true
            },
            combo1_add: {
                required: true
            },
            combo2_add: {
                required: true
            }

        },
        messages: {
            user_name_add: {
                required: "Enter a username",
                alphanumeric: jQuery.format("Enter Correct Format"),
                remote: jQuery.format("{0} is already in use")
            },
            email: {
                required: "Enter email"
            },
            phone: {
                required: "Enter phone number",
                number: jQuery.format("Enter Correct Format")

            },
            password: {
                required: "Enter password"
            },
            confirm_password: {
                required: "Enter confirm password",
                equalTo: jQuery.format("Please enter the same password")
            }
        }

    });




    $(".update-stores").click(function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-users/ajax-edit-policy",
            data: {wh_id: $(this).attr('itemid')},
            dataType: 'html',
            success: function(data) {
                $('#modal-body-contents').html(data);

                $('#update-button').show();
                //   alert($('#location_type').val());
                //  $('#location_level_edit').val($('#location_type').val());
                setTimeout(function() {

                    $('#office_type_edit').val($('#office_id_edit').val());

                    if ($('#office_type_edit').val() != "") {

                        $('#loader').show();
                        $('#combo1_edit').empty();
                        $('#combo2_edit').empty();
                        $('#combo3_edit').empty();
                        $('#combo4_edit').empty();

                        $('#div_combo1_edit').hide();
                        $('#div_combo2_edit').hide();
                        $('#div_combo3_edit').hide();
                        $('#div_combo4_edit').hide();

                        $.ajax({
                            type: "POST",
                            url: appName + "/index/locations-combos-one",
                            data: {office: $('#office_type_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();
                                var val1 = $('#office_type_edit').val();
                                switch (val1) {
                                    case '2':
                                        $('#lblcombo1_edit').text('Province');
                                        $('#div_combo1_edit').show();
                                        $('#combo1_edit').html(data);
                                        $('#combo1_edit').val($('#province_id_edit').val());
                                        break;
                                    case '3':
                                        $('#lblcombo1_edit').text('Province');
                                        $('#div_combo1_edit').show();
                                        $('#combo1_edit').html(data);
                                        $('#combo1_edit').val($('#province_id_edit').val());
                                        break;
                                    case '4':
                                        $('#lblcombo1_edit').text('Province');
                                        $('#div_combo1_edit').show();
                                        $('#combo1_edit').html(data);
                                        $('#combo1_edit').val($('#province_id_edit').val());
                                        break;
                                    case '5':
                                        $('#lblcombo1_edit').text('Province');
                                        $('#div_combo1_edit').show();
                                        $('#combo1_edit').html(data);
                                        $('#combo1_edit').val($('#province_id_edit').val());
                                        break;
                                    case '6':
                                        $('#lblcombo1_edit').text('Province');
                                        $('#div_combo1_edit').show();
                                        $('#combo1_edit').html(data);
                                        $('#combo1_edit').val($('#province_id_edit').val());
                                        break;
                                }
                            }
                        });
                    }

                    if ($('#combo1_edit').val() != "") {
                        $('#loader').show();
                        $('#combo2_edit').empty();

                        $('#div_combo2_edit').hide();

                        $.ajax({
                            type: "POST",
                            url: appName + "/index/locations-combos-two",
                            data: {combo1: $('#province_id_edit').val(), office: $('#office_type_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();

                                var val = $('#office_type_edit').val();

                                switch (val)
                                {
                                    case '4':
                                        $('#div_combo2_edit').show();
                                        $('#combo2_edit').html(data);
                                        $('#combo2_edit').val($('#district_id_edit').val());
                                        break;
                                    case '5':
                                        $('#div_combo2_edit').show();
                                        $('#combo2_edit').html(data);
                                        $('#combo2_edit').val($('#district_id_edit').val());
                                        break;
                                    case '6':
                                        $('#div_combo2_edit').show();
                                        $('#combo2_edit').html(data);
                                        $('#combo2_edit').val($('#district_id_edit').val());
                                        break;
                                }
                            }
                        });
                    }

                    if ($('#combo2_edit').val() != "") {
                        $('#loader').show();
                        $.ajax({
                            type: "POST",
                            url: appName + "/index/locations-combos-three",
                            data: {combo2: $('#district_id_edit').val(), office: $('#office_type_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();
                                var val = $('#office_type_edit').val();
                                switch (val)
                                {
                                    case '5':
                                        $('#div_combo3_edit').show();
                                        $('#combo3_edit').html(data);
                                        $('#combo3_edit').val($('#tehsil_id_edit').val());
                                        break;

                                    case '6':
                                        $('#div_combo3_edit').show();
                                        $('#combo3_edit').html(data);
                                        $('#combo3_edit').val($('#tehsil_id_edit').val());
                                        break;

                                }
                            }
                        });
                    }

                    if ($('#combo3_edit').val() != "") {
                        $('#loader').show();
                        $.ajax({
                            type: "POST",
                            url: appName + "/index/locations-combos-four",
                            data: {combo3: $('#tehsil_id_edit').val(), office: $('#office_type_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();
                                var val = $('#office_type_edit').val();
                                switch (val)
                                {
                                    case '6':
                                        $('#div_combo4_edit').show();
                                        $('#combo4_edit').html(data);
                                        $('#combo4_edit').val($('#parent_id_edit').val());
                                        break;

                                }
                            }
                        });
                    }


                }, 1000);
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

        var make_name = '';
        var order = '';
        var sort = '';
        var counter = '';
        var page = '';

        order = self.data('order');
        sort = self.data('sort');

        make_name = $('#name').val();
        counter = $('#records').val();
        page = $('#current').val();

        if (make_name.length > 1) {
            document.location = appName + '/cadmin/manage-makes/?order=' + order + '&sort=' + sort + '&name=' + make_name + '&counter=' + counter + '&page=' + page;
        }
        else {
            document.location = appName + '/cadmin/manage-makes/?order=' + order + '&sort=' + sort + '&counter=' + counter + '&page=' + page;
        }
    });
});