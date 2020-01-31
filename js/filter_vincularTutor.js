
$(document).ready(function(){
    $("#sc_tutor").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tutorList tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#sc_tutor_index").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tutorListIndex tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#sc_polo_index").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#poloListIndex tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});
