
$(document).ready(function(){
    $(".search_sct").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tr.list_sct").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
    });

});
