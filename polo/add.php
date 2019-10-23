<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 23/10/19
 * Time: 14:51
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

<h2>Novo Polo</h2>
<br>
<form action='add.php' method='post'>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="polo[nome]">Nome</label>
            <input type="text" class="form-control" id="nome" name="polo[nome]" placeholder="Nome">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <!--o atributo cursos_polos é do tipo array por isso a declaração de name está diferente-->
            <select id="cursos" name="polo[cursos][]" class="form-control mdb-select" multiple required>
                <?php echo $cursos->html_select_courses(); ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="index.php" class="btn btn-default">Voltar</a>
</form>
<?php
include(FOOTER_TEMPLATE);
echo $OUTPUT->footer();
?>