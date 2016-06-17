$(function() {

    // validate form on keyup and submit
    $("#form-add-warehouse-type-category").validate({
        rules: {
            wh_category_name: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-warehouse-type-categories/check-warehouse-type-category",
                    type: "post",
                    data: {
                        wh_category_name_hidden: function() {
                            return '';
                        }
                    }

                }
            }
        },
        messages: {
            wh_category_name: {
                required: "Please enter warehouse category name.",
                remote: "Warehouse category name already exists."
            }
        }
    });

    // validate form on keyup and submit
    $("#form-update-warehouse-type-category").validate({
        rules: {
            wh_category_name: {
                required: true,
                remote: {
                    url: appName + "/iadmin/manage-warehouse-type-categories/check-warehouse-type-category",
                    type: "post",
                    data: {
                        wh_category_name_hidden: function() {
                            return $("#wh_category_name_hidden").val();
                        }
                    }

                }
            }
        },
        messages: {
            wh_category_name: {
                required: "Please enter warehouse category name.",
                remote: "Warehouse category name already exists."
            }
        }
    });
    $('#sample_2').on('click', '.btn-update-warehouse-type-category', function() {
        $.ajax({
            type: "POST",
            url: appName + "/iadmin/manage-warehouse-type-categories/ajax-warehouse-type-category-edit",
            data: {warehouse_type_category_id: $(this).attr('whtypeid')},
            dataType: 'html',
            success: function(data) {
                $('#modal-body-contents').html(data);
                $('#update-button').show();
            }
        });
    });

//$( document ).on( "click", "a.active", function() {
//        var id = $(this).attr('id');
//        $.ajax({
//            type: "POST",
//            url: appName + "/iadmin/manage-geo-levels/ajax-change-status",
//            data: {id: id, ajaxaction: 'active'},
//            dataType: 'html',
//            success: function(data) {
//                $('#' + id).html(data);
//                $('#' + id).removeClass("active");
//                $('#' + id).addClass("deactive");
//            }
//        });
//    });
//
//     $( document ).on( "click", "a.deactive", function() {
//        var id = $(this).attr('id');
//        $.ajax({
//            type: "POST",
//            url: appName + "/iadmin/manage-geo-levels/ajax-change-status",
//            data: {id: id, ajaxaction: 'deactive'},
//            dataType: 'html',
//            success: function(data) {
//                $('#' + id).html(data);
//                $('#' + id).removeClass("deactive");
//                $('#' + id).addClass("active");
//            }
//        });
//    });

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
                            url: appName + "/iadmin/manage-warehouse-type-categories/delete-warehouse-type-category",
                            data: {country_id: self.data('bind')},
                            dataType: 'html',
                            success: function(data) {
                                notyfy({
                                    force: true,
                                    text: 'Indicator has been deleted!',
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
                        /*   notyfy({
                         force: true,
                         text: '<strong>You clicked "Cancel" button<strong>',
                         type: 'error',
                         layout: self.data('layout')
                         });*/
                    }
                }]
        });
        return false;
    });
    
    $("#btn-add-warehouse-type-category").click(function() {
        var add_form = $("#form-add-warehouse-type-category");
        add_form.validate();
    });
    
    $("#btn-update-warehouse-type-category").click(function() {
        var update_form = $("#form-update-warehouse-type-category");
        update_form.validate();
    });

});