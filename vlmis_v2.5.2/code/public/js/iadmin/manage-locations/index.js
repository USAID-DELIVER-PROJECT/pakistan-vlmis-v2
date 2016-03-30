$(function() {
    $('#records').change(function() {
        var counter = $(this).val();

        document.location.href = appName + '/iadmin/manage-locations/?counter=' + counter;
    });


    $('#location_level_add').change(function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-locations/get-location-types",
            data: {geo_level_id: $(this).val()},
            dataType: 'html',
            success: function(data) {
                $('#location_type_id').html(data);
            }
        });
    });


    $("#update-locations").validate({
        rules: {
            location_name_update: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-locations/check-location-update",
                    type: "post",
                    data: {
                        district: function() {
                            return $("#combo2_edit").val();
                        },
                        province: function() {
                            return $("#combo1_edit").val();
                        },
                        locLvl: function() {
                            return $("#location_level_edit").val();
                        },
                        locid: function() {
                            return $("#location_level_edit").val();
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
            ccm_location_id_update: {
                required: true,
                number: true,
                remote: {
                    url: appName + "/iadmin/manage-locations/check-ccm-location-update",
                    type: "post",
                    data: {
                        district: function() {
                            return $("#combo2_edit").val();
                        },
                        province: function() {
                            return $("#combo1_edit").val();
                        },
                        locLvl: function() {
                            return $("#location_level_edit").val();
                        },
                        locid: function() {
                            return $("#combo3_edit").val();
                        },
                        location_name_update: function() {
                            return $("#location_name_update").val();
                        }

                    }
                }

            }


        },
        messages: {
            location_name_update: {
                remote: "Location is Already Available.",
                required: "Please enter Location"
            },
            ccm_location_id_update: {
                remote: "Ccm Location Id is Already Available.",
                required: "Please enter Ccm Location Id"

            }
        }

    });

    $("#locations-add").validate({
        rules: {
            location_name_add: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-locations/check-location",
                    type: "post",
                    data: {
                        district: function() {
                            return $("#combo2_add").val();
                        },
                        province: function() {
                            return $("#combo1_add").val();
                        },
                        locLvl: function() {
                            return $("#location_level_add").val();
                        },
                        locid: function() {
                            return $("#combo3_add").val();
                        }

                    }
                }
            },
            combo1_add: {
                required: true
            },
            location_level_add: {
                required: true
            },
            combo2_add: {
                required: true
            },
            combo3_add: {
                required: true
            },
            location_type_id: {
                required: true

            },
            ccm_location_id: {
                required: true,
                number: true,
                remote: {
                    url: appName + "/iadmin/manage-locations/check-ccm-location",
                    type: "post",
                    data: {
                        district: function() {
                            return $("#combo2_add").val();
                        },
                        province: function() {
                            return $("#combo1_add").val();
                        },
                        locLvl: function() {
                            return $("#location_level_add").val();
                        },
                        locid: function() {
                            return $("#combo3_add").val();
                        }

                    }
                }

            }


        },
        messages: {
            location_name_add: {
                remote: "Location is Already Available.",
                required: "Please enter Location"
            },
            ccm_location_id: {
                remote: "Ccm Location Id is Already Available.",
                required: "Please enter Ccm Location Id"

            }
        }


    });

 $('#sample_2').on('click','.update-locations',function () {
    
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-locations/ajax-edit",
            data: {location_id: $(this).attr('itemid')},
            dataType: 'html',
            success: function(data) {
                $('#modal-body-contents').html(data);

                $('#update-button').show();
                //   alert($('#location_type').val());
                //  $('#location_level_edit').val($('#location_type').val());
                setTimeout(function() {
                    $('#location_level_edit').val($('#location_type').val());


                    if ($('#location_level_edit').val() != "") {

                        $('#loader').show();
                        $('#combo1_edit').empty();
                        $('#combo2_edit').empty();

                        $('#div_combo1_edit').hide();
                        $('#div_combo2_edit').hide();
                        $('#div_combo3_edit').hide();

                        $.ajax({
                            type: "POST",
                            url: appName + "/index/locations-combos-one",
                            data: {office: $('#location_level_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();
                                var val1 = $('#location_level_edit').val();
                                switch (val1) {

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
                            data: {combo1: $('#province_id_edit').val(), office: $('#location_level_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();

                                var val = $('#location_level_edit').val();
                                switch (val)
                                {
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
                            data: {combo2: $('#district_id_edit').val(), office: $('#location_level_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#loader').hide();
                                var val = $('#location_level_edit').val();
                                switch (val)
                                {
                                    case '6':
                                        $('#div_combo3_edit').show();
                                        $('#combo3_edit').html(data);
                                        $('#combo3_edit').val($('#parent_id_edit').val());
                                        break;

                                }
                            }
                        });
                    }

// validate signup form on keyup and submit
                    if ($('#location_level_edit').val() != "") {
                        $.ajax({
                            type: "POST",
                            url: appName + "/iadmin/manage-locations/get-location-types",
                            data: {geo_level_id: $('#location_level_edit').val()},
                            dataType: 'html',
                            success: function(data) {
                                $('#location_type_id_update').html(data);
                                $('#location_type_id_update').val($('#location_type_id_update_hidden').val());
                            }
                        });
                    }

                }, 500);
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
                            url: appName + "/iadmin/manage-locations/delete",
                            data: {location_id: self.data('bind')},
                            dataType: 'html',
                            success: function(data) {
                                notyfy({
                                    force: true,
                                    text: 'Location has been deleted!',
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
                        /*  notyfy({
                         force: true,
                         text: '<strong>You clicked "Cancel" button<strong>',
                         type: 'error',
                         layout: self.data('layout')
                         }); */
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