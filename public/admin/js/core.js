$(document).ready(function () {


    $(".select2").select2();
    $(".date").attr('readonly', true).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            "format": 'DD-MM-YYYY',
        },

    });
    
    
    $(".editor").summernote();





    $("#country_id").change(function () {
        $("#division_id,#district_id").html("");
        if ($(this).val() != "") {
            $("#division_id").html("<option value==''>Loading</option>");
            $.get("/division", {'country_id': $(this).val(), 'mode': 'ajax'}, function (data) {
                if (data.length) {
                    var HTML = "<option value==''>(select)</option>";
                    for (var i in data) {
                        HTML += "<option value='" + data[i].id + "'>" + data[i].division_name + "</option>";
                    }

                    $("#division_id").html(HTML);
                }
            });
        }
    });
    $("#division_id").change(function () {
        $("#district_id").html("");
        if ($(this).val() != "") {
            $("#district_id").html("<option value==''>Loading</option>");
            $.get("/district", {'division_id': $(this).val(), 'mode': 'ajax'}, function (data) {
                if (data.length) {
                    var HTML = "<option value==''>(select)</option>";
                    for (var i in data) {
                        HTML += "<option value='" + data[i].id + "'>" + data[i].district_name + "</option>";
                    }

                    $("#district_id").html(HTML);
                }
            });
        }
    });


});



