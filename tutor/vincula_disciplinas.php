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
//declaro o cabeçalho da página
$PAGE->https_required();
$PAGE->set_url('/sct/tutor/vincula_disciplinas.php');
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
// setup text strings
$sctstring = 'SCT - Sistema de Cadastro de Tutores';
$PAGE->navbar->add($sctstring);
$PAGE->set_title($sctstring);

if($_SESSION['user_sct']) :
    index($_SESSION["user_sct"][0]);
echo $OUTPUT->header();
include(HEADER_TEMPLATE);
?>
    <script type="text/javascript" src="../js/filter_vincularTutor.js"></script>
    <div class="container overflow-auto" style="max-height: 40%">
        <div class="row">
            <div class="col-sm">
                <center><h3>Tutor</h3></center>
                <input class="form-control" id="sc_tutor" type="text" placeholder="Pesquisar..">
                <table id="tutorList" class="table table-striped">
                    <tbody>
                    <?php if($tutores) :?>
                    <?php foreach ($tutores as $tutor) : ?>
                    <tr>
                        <th scope="row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check<?php echo $tutor['id'];?>"  value="<?php echo $tutor['id'];?>" name="tutor[]">
                                <label class="custom-control-label" for="check<?php echo $tutor['id'];?>"></label>
                            </div>
                        </th>
                        <td><?php echo $tutor['nome']; ?></td>
                    </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Nenhum registro encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!--<<table border=3 style="margin-left: 20px;">
                    <tr>
                        <td width="165px" height="270px">

                    <tr>
                        <?php /*if($tutores) :*/?>
                        <?php /*foreach ($tutores as $tutor) : */?>
                    <tr>
                        <td><?php /*echo utf8_encode($tutor['nome']); */?></td>

                        <?php /*endforeach; */?>
                        <?php /*else : */?>
                    </tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                    <?php /*endif; */?>

                        </td>
                    </tr>
                </table>-->

            </div>

            <div class="col-sm">
                <center><h3>Polo</h3></center>
                <table border=3 style="margin-left: 20px;">
                    <tr>
                        <td width="165px" height="270px">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm">
                <center><h3>Disciplina</h3></center>
                <table border=3 style="margin-left: 20px;">
                    <tr>
                        <td width="165px" height="270px">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="col-sm-6 text-right h2" >
        <a class="btn btn-success" href=""><i class="fa fa-plus"></i> Adicionar </a>
    </div>
    <br>
    <div>
    <h3>Prévia das vinculações</h3>
        <table border=3>
            <tr>
                <td width="440px" height="180px">
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right">Vincular</button>
        </div>
    </div>


<?php
endif;
include(FOOTER_TEMPLATE);
echo $OUTPUT->footer();
?>