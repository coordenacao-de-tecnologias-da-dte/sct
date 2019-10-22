<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 20/08/19
 * Time: 17:13
 */

require_once ('../config.php');
require_once (DBTUTOR);
require_once (DBUSER);

$tutores = null;
$tutor = null;

/*
 * LIsta de TUtores
 * */
function index($usuario){
    global $tutores;

    $tutores = lista_vinculos($usuario);
}

function add(){
    if (!empty($_POST['tutor'])) {
        $tutor = $_POST['tutor'];
        var_dump($tutor);
        exit();
        //save('customers', $customer);
        //header('location: index.php');
    }
}
function view($id = null) {	 
     global $tutor;	 
     $retorno = lista_vinculos(null, $id);
     if($retorno){
         $tutor = $retorno[0];
     }

    }

/*function cadastrar(){
        
    //HTTPS is required in this page when $CFG->loginhttps enabled
    $PAGE->https_required();
    $PAGE->requires->jquery();

    $PAGE->set_url('/sct/tutor/cadastrar.php');
    $systemcontext = context_system::instance();
    $PAGE->set_context($systemcontext);

    // setup text strings
    $sctstring = 'SCT - Sistema de Cadastro de Tutores';
    //$strlogin     = get_string('login');

    //$PAGE->navbar->add($strlogin, get_login_url());
    $PAGE->navbar->add($sctstring);
    $PAGE->set_title($sctstring);
    ?>
    <?php
    if (isloggedin() and !isguestuser()):
        echo $OUTPUT->header();
        $cursos = new Curso();
        $VIEW_SCT->begin();
        $VIEW_SCT_TUTOR->begin();
        $VIEW_SCT_TUTOR->script_select_tutor();
        $VIEW_SCT_TUTOR->script_verifica_usuario();
        echo $cursos->html_select_courses();
        ?>
                            </div>
                            <div id="donline" class="show multiple-collapse2 form-group col-md-4">
                                <label for="online">Polo</label>
                                <select id="online" name="online" class="form-control">
                                    <option selected disabled>Escolha um curso primeiro</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
    <?php
    $VIEW_SCT->end();
    echo $OUTPUT->footer();
    else:
        redirect($CFG->wwwroot.'/index.php', 'Faça o login', 5);
    ?>
    <?php endif ?>
}
*/