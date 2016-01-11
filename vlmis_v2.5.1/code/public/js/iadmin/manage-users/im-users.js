$(function() {
    $('#records').change(function() {
        var counter = $(this).val();

        document.location.href = appName + '/iadmin/manage-users/?counter=' + counter;
    });


    $('#office_type_add').change(function() {
        if ($('#office_type_add').val() == 1) {
            $.ajax({
                type: "POST",
                url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                data: {geo_level_id: $('#office_type_add').val()},
                dataType: 'html',
                success: function(data) {
                    $('#default_warehouse').html(data);
                }
            });
        }
        if ($('#office_type_add').val() == 2) {
            $('#combo1_add').change(function() {
                $.ajax({
                    type: "POST",
                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                    data: {geo_level_id: $('#office_type_add').val(), province_id: $('#combo1_add').val()},
                    dataType: 'html',
                    success: function(data) {
                        $('#default_warehouse').html(data);
                    }
                });
            });
        }
        if ($('#office_type_add').val() == 3) {

            $('#combo1_add').change(function() {
                $.ajax({
                    type: "POST",
                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                    data: {geo_level_id: $('#office_type_add').val(), province_id: $('#combo1_add').val()},
                    dataType: 'html',
                    success: function(data) {
                        $('#default_warehouse').html(data);
                    }
                });
            });
        }
        if ($('#office_type_add').val() == 4) {
            $('#combo2_add').change(function() {
                $.ajax({
                    type: "POST",
                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                    data: {geo_level_id: $('#office_type_add').val(), province_id: $('#combo1_add').val(), district_id: $('#combo2_add').val()},
                    dataType: 'html',
                    success: function(data) {
                        $('#default_warehouse').html(data);
                    }
                });
            });
        }
        if ($('#office_type_add').val() == 5) {
            $('#combo3_add').change(function() {
                $.ajax({
                    type: "POST",
                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                    data: {geo_level_id: $('#office_type_add').val(), province_id: $('#combo1_add').val(), district_id: $('#combo2_add').val(), tehsil_id: $('#combo3_add').val()},
                    dataType: 'html',
                    success: function(data) {
                        $('#default_warehouse').html(data);
                    }
                });
            });
        }
    });


    // validate signup form on keyup and submit
    $("#update-stores").validate({
        rules: {
            user_name_update: {
                required: true,
                alphanumeric: true,
                remote: {
                    url: appName + "/iadmin/manage-users/check-users-update",
                    type: "post",
                    data: {
                        province: function() {
                            return $("#combo1_edit").val();
                        },
                        office_type_edit: function() {

                            return $("#office_type_edit").val();
                        }

                    }
                }
            },
            combo1_edit: {
                required: true
            },
            combo2_edit: {
                required: true
            },
            combo3_edit: {
                required: true
            },
            combo4_edit: {
                required: true
            },
            default_warehouse_update: {
                required: true
            }


        },
        messages: {
            user_name_update: {
                remote: "Please enter Valid UserName",
                required: "Please enter  UserName"
            }

        }

    });

    $("#add-stores").validate({
        rules: {
            user_name_add: {
                required: true,
                alphanumeric: true,
                remote: {
                    url: appName + "/iadmin/manage-users/check-users",
                    type: "post",
                    data: {
                        province: function() {
                            return $("#combo1_edit").val();
                        },
                        office_type_add: function() {

                            return $("#office_type_add").val();
                        }

                    }
                }
            },
            combo1_add: {
                required: true
            },
            combo2_add: {
                required: true
            },
            combo3_add: {
                required: true
            },
            combo4_add: {
                required: true
            },
            default_warehouse: {
                required: true
            },
            password: {
                required: true
            },
            confirm_password: {
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true
            }

        },
        messages: {
            user_name_add: {
                remote: "Please enter Valid UserName",
                required: "Please enter  UserName"
            },
            password: " Enter Password",
            confirmpassword: " Enter Confirm Password Same as Password"
        }

    });



    $(".update-stores").click(function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-users/ajax-edit-im",
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

                    if ($('#office_type_edit').val() != "") {
                        if ($('#office_type_edit').val() == 1) {
                            $.ajax({
                                type: "POST",
                                url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                                data: {geo_level_id: $('#office_type_edit').val()},
                                dataType: 'html',
                                success: function(data) {
                                    $('#default_warehouse_update').html(data);
                                    $('#default_warehouse_update').val($('#default_warehouse_update_hidden').val());
                                }
                            });
                        }
                        if ($('#office_type_edit').val() == 2) {
                            if ($('#combo1_edit').val() != "") {
                                $.ajax({
                                    type: "POST",
                                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                                    data: {geo_level_id: $('#office_type_edit').val(), province_id: $('#province_id_edit').val()},
                                    dataType: 'html',
                                    success: function(data) {
                                        $('#default_warehouse_update').html(data);
                                        $('#default_warehouse_update').val($('#default_warehouse_update_hidden').val());
                                    }
                                });
                            }
                        }
                        if ($('#office_type_edit').val() == 3) {

                            if ($('#combo1_edit').val() != "") {
                                $.ajax({
                                    type: "POST",
                                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                                    data: {geo_level_id: $('#office_type_edit').val(), province_id: $('#province_id_edit').val()},
                                    dataType: 'html',
                                    success: function(data) {
                                        $('#default_warehouse_update').html(data);
                                        $('#default_warehouse_update').val($('#default_warehouse_update_hidden').val());
                                    }
                                });
                            }
                        }
                        if ($('#office_type_edit').val() == 4) {
                            if ($('#combo2_edit').val() != "") {
                                $.ajax({
                                    type: "POST",
                                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                                    data: {geo_level_id: $('#office_type_edit').val(), province_id: $('#province_id_edit').val(), district_id: $('#district_id_edit').val()},
                                    dataType: 'html',
                                    success: function(data) {
                                        $('#default_warehouse_update').html(data);
                                        $('#default_warehouse_update').val($('#default_warehouse_update_hidden').val());
                                    }
                                });
                            }
                        }
                        if ($('#office_type_edit').val() == 5) {
                            if ($('#combo3_edit').val() != "") {
                                $.ajax({
                                    type: "POST",
                                    url: appName + "/iadmin/manage-users/get-default-warehouse-by-level",
                                    data: {geo_level_id: $('#office_type_edit').val(), province_id: $('#province_id_edit').val(), district_id: $('#district_id_edit').val(), tehsil_id: $('#tehsil_id_edit').val()},
                                    dataType: 'html',
                                    success: function(data) {
                                        $('#default_warehouse_update').html(data);
                                        $('#default_warehouse_update').val($('#default_warehouse_update_hidden').val());
                                    }
                                });
                            }
                        }
                    }


                }, 300);
            }

        });


    });




    $(".update-role").click(function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-users/ajax-edit-im-role",
            data: {wh_id: $(this).attr('itemid')},
            dataType: 'html',
            success: function(data) {

                $('#modal-body-contents1').html(data);
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
                            url: appName + "/iadmin/manage-users/delete",
                            data: {user_id: self.data('bind')},
                            dataType: 'html',
                            success: function(data) {
                                notyfy({
                                    force: true,
                                    text: 'User has been deleted!',
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