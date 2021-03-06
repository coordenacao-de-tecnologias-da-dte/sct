$(document).ready(function(){

    var ai = [];
    var fi = [];
    var arr_atualiza = [];
    var novos_cursos = [];

    var el1 = $(".switch-curso:checked");
    var el2 = $(".switch-curso:not(:checked)");

    for(var i=0;i<el1.length;i++){
        ai.push(el1[i].value)
    }
    for(var i=0;i<el2.length;i++){
        fi.push(el2[i].value)
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
//ativando e desativando o curso dentro de um polo
    $(".switch-curso").on('change', function () {

        if($(this).is(":checked")){
            //se o curso não estiver ativo inicialmente então ele vai ser atualizado como ativo
            if(ai.indexOf($(this).val()) == -1 || ai.length==0){
                arr_atualiza.push({"idCategory": $(this).val(), "dtFim": null})
            }
            for(var i=0; i<arr_atualiza.length; i++) {
                if(arr_atualiza[i]["idCategory"]==$(this).val() && arr_atualiza[i]["dtFim"]!=null) {
                    arr_atualiza.splice(i,1);
                }
            }
            console.log("checado");
        }else {
            var date = formatDate(new Date());
            if(fi.indexOf($(this).val()) == -1 || fi.length==0){

                arr_atualiza.push({"idCategory": $(this).val(), "dtFim": date})

            }
            for(var i=0; i<arr_atualiza.length; i++) {
                if(arr_atualiza[i]["idCategory"]==$(this).val() && arr_atualiza[i]["dtFim"]==null) {
                    arr_atualiza.splice(i,1);
                }
            }
            console.log("não checado");
        }
        var json = JSON.stringify(arr_atualiza);
        document.getElementById("lista_cursos").value = json;
    });
//ativando ou desativando polo por completo
    $(".switch-polo").on('change', function () {
        if($(this).is(":checked")){
            document.getElementById("dtFim").value = null;
        }else {
            var date = formatDate(new Date());
            document.getElementById("dtFim").value = date;
        }
    });
    // modal para selecionar novos cursos para um polo
    /*$("#btn-add-curso").click(function () {
        $("#addCursoModal").show(function () {
            var id = $('#btn-add-curso').data('id');
            $.ajax({
                type : 'post',
                url : 'fetch_curso_polo.php', //Here you will fetch records
                data :  { polo: id, cursos: novos_cursos }, //Pass $id
                dataType: 'json',
                success : function(data){
                    $('.modal-body').html(data);//Show fetched data from database
                }
            });
        });
    });*/
    $("#btn-add-curso").click(function () {
        var dataURL = $(this).attr('data-href');
        $(".modal-body").load(dataURL, function () {
           $('#addCursoModal').modal({show: true});
        });
    });
});