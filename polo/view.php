<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 30/12/19
 * Time: 11:05
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



        <h2>Polo de <?php echo utf8_encode($polo['nome']); ?></h2>

        <hr>
        <?php if (!empty($_SESSION['message'])) :
        ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?>">
            <?php echo $_SESSION['message']; ?></div>	<?php endif;
        ?>
        <dl class="dl-horizontal">
            <dt>Situação do polo:</dt>
            <?php if($polo["dtFim"]):?>
            <dd>Inativo</dd>
            <?php else: ?>
            <dd>Ativo</dd>
            <?php endif; ?>
        </dl>
        <dl class="dl-horizontal">
            <dt>Cursos ativos neste polo:</dt><dd></dd><?php foreach ($cursos_polo as $curso) : ?>
                <dd><?php if(!$curso["dtFim"]) echo utf8_encode($curso["nome"]); ?></dd>	<?php endforeach; ?>
        </dl>
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="edit.php?id=<?php echo $polo['id']; ?>" class="btn btn-primary">Editar</a>
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