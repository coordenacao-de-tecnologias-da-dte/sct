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
require_once (DBPOLO);

$tutores = null;
$tutor = null;
$polos = null;
$disciplinas = null;

/*
 * LIsta de TUtores
 * */
function index($usuario){
    global $tutores;

    $tutores = lista_vinculos($usuario);

}

function vincula_tutor_disciplinas($usuario){
    global $tutores;
    global $polos;
    global $disciplinas;

    $user = $usuario;

    $tutores = lista_vinculos($usuario);
    if ( $user['idCategory'] == NULL){
        $polos = get_all_polos();
    } else {
        $polos = get_polos_cursos($usuario);
    }

}

function add(){
    //global $tutor;
    if (!empty($_POST['tutor'])) {
        $tutor = $_POST['tutor'];
        //verifico se o usuário já possui login e agora só recebe um vínculo
        if($tutor["verificouDB"]=='false'){
            $pass = hash_internal_user_password($tutor["passUser"]);
            $u_name = "";
            if($tutor["tipoAuth"] == 'manual') {
                $u_name = $tutor["cpf"];
            } else {
                $u_name = $tutor["loginInst"];
            }
            $idUser = inserir_novo_usuario($tutor["tipoAuth"], $u_name, $pass, utf8_decode($tutor["nome"]), utf8_decode($tutor["sobrenome"]), $tutor["email"]);
            if($idUser >= 1){
                $idVinculo = inserir_vinculo($idUser, $tutor["presencial"], $tutor["online"], $tutor["tipoTutoria"]);

                if($idVinculo < 1){
                    echo "Erro ao tentar salvar o Vinculo";
                } else {
                    header("Location: ../index.php");
                    exit;
                }
            } else {
                echo "Erro ao tentar cadastrar usuário";
            }
        }else{
            $idVinculo = inserir_vinculo($tutor["idUser"], $tutor["presencial"], $tutor["online"], $tutor["tipoTutoria"]);

            if($idVinculo < 1){
                echo "Erro ao tentar salvar o Vinculo";
            } else {
                header("Location: ../index.php");
                exit;
            }
        }
    }
}

function view($id = null) {
    global $tutor;
    global $disciplinas;
    $retorno = lista_vinculos(null, $id);
    $tutor = $retorno[0];
    if ($tutor){
        $disciplinas = lista_disciplina_vinculadas(null, $tutor["idUser"]);
    }
}


function edit() {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['tutor'])) {
            $tutor = $_POST['tutor'];

            update($id, $tutor);
            header('location: ../index.php');

        } else {

            global $tutor;
            $retorno = perfil_usuario(null, $id);
            $tutor = $retorno[0];
        } 
    } else {
        header('location: ../index.php');
    }
}