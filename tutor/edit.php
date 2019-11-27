<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 16/10/19
 * Time: 18:03
 */

require_once('functions.php');
require_once('../classes/curso.php');
//declaro necessidade do JQuery
$PAGE->requires->jquery();
//chamo a função add pra verificar se o formulário foi submetido
edit();
//declaro instancia de Cursos para poder mostrar o select html de cursos
$cursos = new Curso();
//declaro o cabeçalho da página
echo $OUTPUT->header();
include(HEADER_TEMPLATE);

?>
    <!--SCRIPTS PARA VALIDAR USUÁRIO ANTES DE CADASTRAR-->
    <script type='text/javascript' src='../js/select_polos.js'></script>
    <script type='text/javascript' src='../js/validar_login.js'></script>
    <script type='text/javascript' src='../js/jquery.mask.js'></script>

<h2>Editar Perfil</h2>
<br>
<form action='add.php' method='post'>
    <input type='hidden' id='idUser' name="tutor[idUser]" value='<?php echo $tutor["idUser"]; ?>'>
    <input type='hidden' id='tipoAuth' name="tutor[tipoAuth]" value='<?php echo $tutor["auth"]; ?>'>
    <input type='hidden' id='verificouDB' name="tutor[verificouDB]" value='false'>
    <input type='hidden' id='passUser' name="tutor[passUser]" value='changeme'>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tutor[nome]">Nome</label>
            <input type="text" class="form-control" id="nome" name="tutor[nome]" placeholder="Nome" value="<?php echo utf8_encode($tutor["firstname"]); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="tutor[sobrenome]">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="tutor[sobrenome]" placeholder="Sobrenome" value="<?php echo utf8_encode($tutor["lastname"]); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="tutor[email]">E-mail</label>
        <input type="email" class="form-control" id="email" name="tutor[email]" placeholder="usuario@dominio.com" value="<?php echo $tutor["email"]; ?>">
    </div>
    <div class="form-row">
        
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="../index.php" class="btn btn-default">Cancelar</a>
</form>
<?php
include(FOOTER_TEMPLATE);
echo $OUTPUT->footer();
?>