<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 12/07/19
 * Time: 11:51
 */
include '../db/userDb.php';
require_once($CFG->libdir.'/moodlelib.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["verificouDB"]=='false') {
        $pass = hash_internal_user_password($_POST["passUser"]);
        $u_name = "";
        if($_POST["tipoAuth"] == 'manual') {
            $u_name = $_POST["cpf"];
        } else {
            $u_name = $_POST["loginInst"];
        }
        $idUser = $SCT_DB_USER->inserir_novo_usuario($_POST["tipoAuth"], $u_name, $pass, utf8_decode($_POST["nome"]), utf8_decode($_POST["sobrenome"]), $_POST["email"]);
        if($idUser >= 1){
            $idVinculo = $SCT_DB_USER->inserir_vinculo($idUser, $_POST["presencial"], $_POST["online"], $_POST["tipoTutoria"]);

            if($idVinculo < 1){
                echo "Erro ao tentar salvar o Vinculo";
            }

        } else {
            echo "Erro ao tentar cadastrar usuário";
        }

    } else {
        $idVinculo = $SCT_DB_USER->inserir_vinculo($_POST["idUser"], $_POST["presencial"], $_POST["online"], $_POST["tipoTutoria"]);

        if($idVinculo < 1){
            echo "Erro ao tentar salvar o Vinculo";
        }
    }

}