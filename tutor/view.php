<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 29/08/19
 * Time: 09:38
 */
require_once('../config.php');
require_once($CFG->libdir.'/authlib.php');
require_once('functions.php');
//HTTPS is required in this page when $CFG->loginhttps enabled
$PAGE->https_required();
$PAGE->set_url('/sct/tutor/view.php');
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);
// setup text strings
$sctstring = 'SCT - Sistema de Cadastro de Tutores';
$PAGE->navbar->add($sctstring);
$PAGE->set_title($sctstring);
echo $OUTPUT->header();
//verifico se está logado com usuário sem ser visitante
if (isloggedin() and !isguestuser()):
    //verifico se uma sessão já foi iniciada
    if(!isset($_SESSION['user_sct'])){
        vinculo_sct($_SESSION['USER']->id);
    }
    //se já existe a sessão então exibo a página
    if($_SESSION['user_sct']) :
        index($_SESSION["user_sct"][0]);

        include (HEADER_TEMPLATE);

        view($_GET['id']);
        ?>



        <h2>Tutor(a) : <?php echo utf8_encode($tutor['nome']); ?></h2>
        <hr>
        <?php if (!empty($_SESSION['message'])) :
        ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?>">
            <?php echo $_SESSION['message']; ?></div>	<?php endif;
        ?>
        <dl class="dl-horizontal">
            <dt>Usuário no Sistema:</dt>
            <dd><?php echo utf8_encode($tutor['username']); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Curso:</dt>
            <dd><?php echo utf8_encode($tutor['curso']); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Polo:</dt>
            <dd><?php echo utf8_encode($tutor['polo']); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Disciplinas:</dt><?php foreach ($disciplinas as $disc) : ?>
                <dd><?php echo utf8_encode($disc["nomecurso"]); ?></dd>	<?php endforeach; ?>
        </dl>
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="edit.php?id=<?php echo $tutor['id']; ?>" class="btn btn-primary">Editar</a>
                <a href="../index.php" class="btn btn-default">Voltar</a>
            </div>
        </div>

        <?php include(FOOTER_TEMPLATE);

    //se o usuário não tem permissão ele é redirecionado
    else :
        redirect($CFG->wwwroot.'./index.php', 'Você não possui permissão', 5);
    endif;
//usuário não está logado
else :
    redirect($CFG->wwwroot.'./index.php', 'Faça o login', 5);
endif;
echo $OUTPUT->footer();
?>