$(document).ready(function(){
    // Captura o retorno do retornaCliente.php
    $.getJSON('tutor/search.php', function(data){
        var search = [];

        // Armazena na array capturando somente o nome do cliente
        $(data).each(function(key, value) {
            search.push(value.search);
        });
        console.log(search + "teste4");
        // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
        $('#search').autocomplete({ source: search, minLength: 3});
    });
});