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
    <input type="hidden" name="polo[dtFim]" value="<?php echo $polo['dtFim']; ?>"/>
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
                            <?php if($curso['dtFim']): ?>
                            <td class="actions text-right">
                                <!--<button id="ativa_polo" type="button" class="btn btn-sm btn-success" value="<?php //echo $curso['idCategory']?>"><i class="fa fa-unlock"></i></button>-->
                                <input type="checkbox" class="switch-input switch-curso" data-size="xs" data-toggle="toggle" value="<?php echo $curso['idCategory']?>"
                                       data-on="<i class='fa fa-unlock'></i> Ativo" data-off="<i class='fa fa-lock'></i> Inativo" data-onstyle="success" data-offstyle="danger"/>
                            </td>
                            <?php else: ?>
                            <td class="actions text-right">
                                <!--<button id="desativa_polo" type="button" class="btn btn-sm btn-danger" value="<?php //echo $curso['idCategory']?>"><i class="fa fa-lock"></i></button>-->
                                <input type="checkbox" checked class="switch-input switch-curso" data-size="xs" data-toggle="toggle" value="<?php echo $curso['idCategory']?>"
                                       data-on="<i class='fa fa-unlock'></i> Ativo" data-off="<i class='fa fa-lock'></i> Inativo" data-onstyle="success" data-offstyle="danger"/>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <?php if($polo['dtFim']): ?>
                <input type="checkbox" class="switch-input switch-polo" data-size="xs" data-toggle="toggle"
                       data-on="<i class='fa fa-unlock'></i> Polo Ativo" data-off="<i class='fa fa-lock'></i> Polo Inativo" data-onstyle="success" data-offstyle="danger"/>
            <?php else: ?>
                <input type="checkbox" checked class="switch-input switch-polo" data-size="xs" data-toggle="toggle"
                       data-on="<i class='fa fa-unlock'></i> Polo Ativo" data-off="<i class='fa fa-lock'></i> Polo Inativo" data-onstyle="success" data-offstyle="danger"/>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-row">
        <button id="salva_edicao_polo" type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-default">Voltar</a>
    </div>

</form>
