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
add();
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

<h2>Novo(a) tutor(a)</h2>
<br>
<form action='add.php' method='post'>
    <input type='hidden' id='idUser' name="tutor[idUser]">
    <input type='hidden' id='tipoAuth' name="tutor[tipoAuth]" value='ldap'>
    <input type='hidden' id='verificouDB' name="tutor[verificouDB]" value='false'>
    <input type='hidden' id='passUser' name="tutor[passUser]" value='changeme'>
    <div class="form-row">
        <div class="form-group">
            <label>Usuário possui vínculo com a UFT? (Professor ou Técnico)</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <div class="switch">
                        <label for="tipoUsuario" class="switch-label switch-label-off">Não</label>
                        <input type="checkbox" class="switch-input" name="tutor[tipoUsuario]" value="interno" id="tipoUsuario" checked
                               data-toggle="collapse" data-target=".multiple-collapse" aria-controls="dcpf dloginInst" aria-expanded="false">

                        <label for="tipoUsuario" class="switch-label switch-label-on">Sim</label>
                        <span class="switch-selection"></span>
                    </div>

                </div>
                <div id="dloginInst" class="show multiple-collapse form-group">
                    <label for="tutor[loginInst]">Login</label>
                    <input type="text" class="form-control" id="loginInst" name="tutor[loginInst]" placeholder="login institucional sem o @uft.edu.br">
                </div>
                <div id="dcpf" class="collapse multiple-collapse form-group">
                    <label for="tutor[cpf]">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="tutor[cpf]" placeholder="números do cpf sem ponto e traço" maxlength="11">
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tutor[nome]">Nome</label>
            <input type="text" class="form-control" id="nome" name="tutor[nome]" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
            <label for="tutor[sobrenome]">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="tutor[sobrenome]" placeholder="Sobrenome">
        </div>
    </div>
    <div class="form-group">
        <label for="tutor[email]">E-mail</label>
        <input type="email" class="form-control" id="email" name="tutor[email]" placeholder="usuario@dominio.com">
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>Tipo de Tutoria</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input type='hidden' id='tipoTutoria' name="tutor[tipoTutoria]" value='presencial'>
                    <div class="switch">
                        <label class="form-check-label" for="tutor[checktipoTutoria]">Presencial</label>
                        <input class="form-check-input" type="checkbox" name="tutor[checktipoTutoria]" id="checktipoTutoria"
                               data-toggle="collapse" data-target=".multiple-collapse2" aria-controls="donline" aria-expanded="false">
                        <label class="form-check-label" for="checktipoTutoria">Online</label>
                        <span class="switch-selection"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div id="dpresencial" class="form-group col-md-6">
            <label for="tutor[presencial]">Curso</label>
            <select id="presencial" name="tutor[presencial]" class="form-control">
                <option disabled selected>Selecione...</option>
                <?php echo $cursos->html_select_courses(); ?>
            </select>
        </div>
        <div id="donline" class="show multiple-collapse2 form-group col-md-4">
            <label for="tutor[online]">Polo</label>
            <select id="online" name="tutor[online]" class="form-control">
                <option selected disabled>Escolha um curso primeiro</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="../index.php" class="btn btn-default">Voltar</a>
</form>
<?php
include(FOOTER_TEMPLATE);
echo $OUTPUT->footer();
?>