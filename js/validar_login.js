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
                    $('#idUser').val(rst.id);
                    $('#nome').val(rst.firstname);
                    $('#sobrenome').val(rst.lastname);
                    $('#email').val(rst.email);
                    $('#tipoAuth').val(rst.auth);
                    if(rst.firstname == ''){
                        $('#nome').focus();
                    } else {
                        $('#tipoTutoria').focus();
                        $('#passUser').val('');
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
                    rst = $.parseJSON(result);
                    $('#idUser').val(rst.id);
                    $('#nome').val(rst.firstname);
                    $('#sobrenome').val(rst.lastname);
                    $('#email').val(rst.email);
                    $('#tipoAuth').val(rst.auth);
                    if(rst.firstname == ''){
                        $('#nome').focus();
                    } else {
                        $('#tipoTutoria').focus();
                        $('#passUser').val('');
                    }
                }
            });
        }
    });
    //quando alteramos o tipo do usuário
    $('#tipoUsuario').on('change', function () {
        $('#idUser').val('');
        $('#nome').val('');
        $('#sobrenome').val('');
        $('#email').val('');
        $('#loginInst').val('');
        $('#cpf').val('');
    })

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