$(document).ready(function(){
    $('#loginInst').on('blur',function(){
        var login = $(this).val();
        if(login){
            $.ajax({
                type:'POST',
                url:'ajaxPolo.php',
                data:'loginInst='+login,
                success:function(result){
                    rst = $.parseJSON(result);
                    if(rst){
                    $('#idUser').val(rst.id);
                    $('#nome').val(rst.firstname);
                    $('#sobrenome').val(rst.lastname);
                    $('#email').val(rst.email);
                    if(rst.firstname == ''){
                        $('#nome').focus();
                        $('#verificouDB').val('false');
                    } else {
                        $('#tipoTutoria').focus();
                        $('#passUser').val(null);
                        $('#verificouDB').val('true');
                    }
                    }else {
                        alert("USUÁRIO JÁ CADASTRADO.");
                    }
                }
            });
        }
    });
    $('#cpf').on('blur',function(){
        var login = $(this).val();
        if(login){
            $.ajax({
                type:'POST',
                url:'ajaxPolo.php',
                data:'cpf='+login,
                success:function(result){
                    console.log(result + login);
                    rst = $.parseJSON(result);
                    if(rst){
                    $('#idUser').val(rst.id);
                    $('#nome').val(rst.firstname);
                    $('#sobrenome').val(rst.lastname);
                    $('#email').val(rst.email);
                    if(rst.firstname == ''){
                        $('#nome').focus();
                        $('#verificouDB').val('false');
                    } else {
                        $('#tipoTutoria').focus();
                        $('#passUser').val(null);
                        $('#verificouDB').val('true');
                    }
                    }else {
                        alert("USUÁRIO JÁ CADASTRADO.");
                    }
                }
            });
        }
    });
    //quando alteramos o tipo do usuário
    $('#tipoUsuario').click(function () {
        $('#idUser').val('');
        $('#nome').val('');
        $('#sobrenome').val('');
        $('#email').val('');
        $('#loginInst').val('');
        $('#cpf').val('');
        if($(this).is(":checked")){
            $('#tipoAuth').val('ldap');
        }
        else if($(this).is(":not(:checked)")){
            $('#tipoAuth').val('manual');
        }
    });

    $('#cpf').mask('00000000000', {reverse: true});

    $('#checktipoTutoria').click(function(){
        if($(this).is(":checked")){
            $('#tipoTutoria').val('online');
        }
        else if($(this).is(":not(:checked)")){
            $('#tipoTutoria').val('presencial');
        }
    });


});