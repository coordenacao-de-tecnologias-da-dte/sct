<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 20/11/19
 * Time: 10:18
 */
require_once ('functions.php');
edit();
//declaro necessidade do JQuery
$PAGE->requires->jquery();
$PAGE->requires->jquery_plugin('bootstrap');
$PAGE->requires->jquery_plugin('bootstrap-css');
echo $OUTPUT->header();
include(HEADER_TEMPLATE);
?>
<!--SCRIPTS PARA VALIDAR USUÁRIO ANTES DE CADASTRAR-->
<script type='text/javascript' src='../js/edit_polo.js'></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<h2>Editando Polo</h2>
<br>
<form action='edit.php?id=<?php echo $polo['id']; ?>' method='post'>
    <input id="dtFim" type="hidden" name="polo[dtFim]" value="<?php echo $polo['dtFim']; ?>"/>
    <input id="lista_cursos" type="hidden" name="polo[cursos]" value='null'/>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="polo[nome]">Nome</label>
            <input type="text" class="form-control" id="nome" name="polo[nome]" placeholder="Nome"
                   value="<?php echo $polo['nome']; ?>">
        </div>
    </div>
    <h5>Cursos vinculados</h5>
    <div class="form-row">

        <div class="form-group">
           <table class="table table-hover">
                <thead>
                <tr>
                    <th width="70%">Nome do curso</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php if($cursos_polo) :?>
                    <?php foreach ($cursos_polo as $curso) : ?>
                        <tr>
                            <td><?php echo utf8_encode($curso['nome']); ?></td>
                            <td class="actions text-right">
                                <input type="checkbox" <?php if(!$curso['dtFim']){ echo  "checked"; } ?> class="switch-input switch-curso" data-size="xs" data-toggle="toggle" value="<?php echo $curso['idCategory']?>"
                                       data-on="<i class='fa fa-unlock'></i> Ativo" data-off="<i class='fa fa-lock'></i> Inativo" data-onstyle="success" data-offstyle="danger"/>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <!-- Botão que dispara o modal -->
            <button id="btn-add-curso" type="button" class="btn btn-primary" data-toggle="modal" data-href="fetch_curso_polo.php?polo=<?php echo $polo['id']; ?>" data-target="#addCursoModal"><i class='fa fa-plus'></i> Add Curso(s)</button>
            <!-- Modal -->

            <div id="addCursoModal" class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar curso(s) ao Polo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5>Situação do Polo</h5>
    <div class="form-row">
        <div class="form-group">
                <input type="checkbox" <?php if(!$polo['dtFim']){ echo  "checked"; } ?> class="switch-input switch-polo" data-size="xs" data-toggle="toggle"
                       data-on="<i class='fa fa-unlock'></i> Polo Ativo" data-off="<i class='fa fa-lock'></i> Polo Inativo" data-onstyle="success" data-offstyle="danger"/>
        </div>
    </div>
    <div class="form-row">
        <button id="salva_edicao_polo" type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-default">Voltar</a>
    </div>

</form>
<?php echo $OUTPUT->footer(); ?>
