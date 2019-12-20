$(document).ready(function(){

    var ai = [];
    var am = [];
    var fi = [];
    var fm = [];
    var arr_atualiza = [];

    var el1 = $(".switch-curso:checked");
    var el2 = $(".switch-curso:not(:checked)");

    for(var i=0;i<el1.length;i++){
        ai.push(el1[i].value)
    }
    for(var i=0;i<el2.length;i++){
        fi.push(el2[i].value)
    }

    console.log("cursos abertos no inicio: "+ai);
    console.log("cursos fechados no inicio: "+fi);

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
        console.log(json);
    });
});