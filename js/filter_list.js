
$(document).ready(function(){
    $(".search_sct").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tr.list_sct").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
    });
    $(".search_tbl_Polo").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tr.list_tbl_Polo").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".search_tbl_Disciplina").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tr.list_tbl_Disciplina").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});
