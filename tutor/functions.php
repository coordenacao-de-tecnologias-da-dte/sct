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
     $retorno = lista_vinculos(null, $id);
     if($retorno){
         $tutor = $retorno[0];
     }

    }
