<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 29/08/19
 * Time: 09:38
 */
require_once('config.php');
require_once($CFG->libdir.'/authlib.php');
require_once('./tutor/functions.php');
//HTTPS is required in this page when $CFG->loginhttps enabled
$PAGE->https_required();
//$PAGE->requires->jquery();
$PAGE->set_url('/sct/index.php');
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
// setup text strings
$sctstring = 'SCT - Sistema de Cadastro de Tutores';
$PAGE->navbar->add($sctstring);
$PAGE->set_title($sctstring);
//verifico se está logado com usuário sem ser visitante
if (isloggedin() and !isguestuser()):
    //verifico se uma sessão já foi iniciada
    if(!isset($_SESSION['user_sct'])){
        vinculo_sct($_SESSION['USER']->id);
    }
    //se já existe a sessão então exibo a página
    if($_SESSION['user_sct']) :

    index($_SESSION["user_sct"][0]);
    echo $OUTPUT->header();
    include (HEADER_TEMPLATE);
?>
<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Lista de Tutores</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="./tutor/add.php"><i class="fa fa-plus"></i> Novo Tutor(a)</a>
            <a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>
<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>
    alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php endif; ?>
<table class="table table-hover">
    <thead>
    <tr>
        <th width="30%">Nome</th>
        <th>Curso</th>
        <th>Polo</th>
        <th>Tipo Vínculo</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    <?php if($tutores) :?>
    <?php foreach ($tutores as $tutor) : ?>
    <tr>
        <td><?php echo utf8_encode($tutor['nome']); ?></td>
        <td><?php echo utf8_encode($tutor['curso']); ?></td>
        <td><?php echo utf8_encode($tutor['polo']); ?></td>
        <td><?php echo utf8_encode($tutor['tipo']); ?></td>
        <td class="actions text-right">
            <a href="./tutor/view.php?id=<?php echo $tutor['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            <a href="./tutor/edit.php?id=<?php echo $tutor['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
            <!--<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php //echo $tutor['id']; ?>">
                <i class="fa fa-trash"></i>
            </a>-->
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
<?php include(FOOTER_TEMPLATE);
    echo $OUTPUT->footer();
    //se o usuário não tem permissão ele é redirecionado
    else :
        redirect($CFG->wwwroot.'/index.php', 'Você não possui permissão', 5);
    endif;
    //usuário não está logado
    else :
        redirect($CFG->wwwroot.'/index.php', 'Faça o login', 5);
    endif;
?>