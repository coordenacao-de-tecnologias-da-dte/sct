
$(document).ready(function(){
    $("#sc_tutor").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tutorList tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
