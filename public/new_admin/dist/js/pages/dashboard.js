/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    timeout: 20000,
    beforeSend: function () {
        //$("#loading-Modal").modal();
    },
    cache: false,
    complete: function () {
        //$("#loading-Modal").modal('hide');
    },

});



function sendFile(file, editor) {

    data = new FormData();
    data.append("file", file);
    $("#loading-Modal").modal();
    $.ajax({
        data: data,
        type: "POST",
        url: "/dashboard_photo_upload",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#loading-Modal").modal('hide');
            if (data.status) {

                var img = $('<img>').attr('src', data.url);
                $(editor).summernote("insertNode", img[0]);
            } else {
                alert(data.message);
            }
        },
        error: function (error, b) {
            $("#loading-Modal").modal('hide');
            var message = JSON.parse(error.responseText);

            var Error = message.message;

            if (typeof message.errors != 'undefined') {
                var ErrorMessages = message.errors;
                for (var i in ErrorMessages) {
                    Error += "<br/>" + ErrorMessages[i][0];
                }
            }


            toastr.error(Error, "Error");
        }
    });
}


$(function () {




    'use strict';
    $(".editor").summernote({
        height: 400,
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageTitle']],
            ],
        },
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Bangla'],
        fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Bangla'],
        callbacks: {
            onImageUpload: function (files) {
                sendFile(files[0], $(this));
            },
        }
    });
    
    $(".editor").summernote('fontName', 'Bangla');





    $(".number").ForceNumericOnly();
    $(".select2").select2({theme: 'bootstrap'});
    $("#category_id").change(function () {
        $("#sub_category_id").html("").select2({theme: 'bootstrap'});
        if ($(this).val() != "") {
            $("#sub_category_id").html("<option value==''>Loading</option>").select2({theme: 'bootstrap'});
            var id = $(this).val();
            if (id != "") {
                $.ajax({
                    url: "/SubCategory",
                    data: {'category_id': id, 'mode': 'ajax'},
                    success: function (data) {

                        if (data.length) {
                            var HTML = "<option value=''>(select)</option>";
                            for (var i in data) {
                                HTML += "<option value='" + data[i].id + "'>" + data[i].sub_category_name + "</option>";
                            }

                            $("#sub_category_id").html(HTML).select2({theme: 'bootstrap'});
                        } else {
                            $("#sub_category_id").html("<option value==''>No data found.</option>").select2({theme: 'bootstrap'});
                        }
                    },
                    error: function (error) {
                        alert(error.responseText);
                    },

                });
            }
        }
    });
    $("#state_id").change(function () {
        $("#city_id").html("");
        var state_id = $(this).val();
        if (state_id != "") {
            $("#city_id").html("<option value==''>Loading</option>");

            $.ajax({
                url: "/city",
                data: {'state_id': state_id, 'mode': 'ajax'},
                success: function (data) {
                    if (data.length) {
                        var HTML = "<option value==''>(select)</option>";
                        for (var i in data) {
                            HTML += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                        }

                        $("#city_id").html(HTML);
                    } else {
                        $("#city_id").html("<option value==''>No City found</option>");
                    }
                },
                error: function (error) {
                    alert(error.responseText);
                }
            });

        }
    });
    $("#chapter_id").change(function () {
        $("#round_id").html("");
        var chapter_id = $(this).val();
        if (chapter_id != "") {
            $("#round_id").html("<option value==''>Loading</option>");

            $.ajax({
                url: "/round",
                data: {'chapter_id': chapter_id, 'mode': 'ajax'},
                success: function (data) {
                    if (data.length) {
                        var HTML = "<option value=''>(select)</option>";
                        for (var i in data) {
                            HTML += "<option value='" + data[i].id + "'>" + data[i].round_name + "</option>";
                        }

                        $("#round_id").html(HTML);
                    }
                },
                error: function (error) {
                    alert(error.responseText);
                }
            });

        }
    });
    $('.date').attr('readonly', true).daterangepicker({
        singleDatePicker: true,
        autoApply: true,
        autoUpdateInput: false,
        showDropdowns: true,
        drops: "up",
        locale: {"format": "YYYY-MM-DD"}
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    }).attr('placeholder', 'YYYY-MM-DD');


    $('.datetime').attr('readonly', true).daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        autoApply: true,
        autoUpdateInput: false,
        showDropdowns: true,
        drops: "up",
        locale: {"format": "YYYY-MM-DD hh:mm A"}
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD hh:mm A'));
    }).attr('placeholder', 'YYYY-MM-DD hh:mm A');




});


toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "0",
    "extendedTimeOut": "0",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
