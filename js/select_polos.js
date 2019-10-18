$(document).ready(function(){
    $('#presencial').on('change',function(){
        var cursoID = $(this).val();
        if(cursoID){
            $.ajax({
                type:'POST',
                url:'ajaxPolo.php',
                data:'curso_id='+cursoID,
                success:function(html){
                    $('#online').html(html);
                }
            });
        }else{
            $('#online').html('<option value="">Selecione cursos primeiro</option>');
        }
    });
});