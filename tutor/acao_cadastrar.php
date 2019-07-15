<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 12/07/19
 * Time: 11:51
 */
include '../db/userDb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idVinculo = $SCT_DB_USER->inserir_vinculo($_POST["idUser"], $_POST["presencial"], $_POST["online"], $_POST["tipoTutoria"]);

    if($idVinculo >= 1){
        var_dump($idVinculo);
        //$SCT_DB_POLO->inserir_cursos_no_polo($idPolo, $_POST["cursos_polo"]);
    } else {
        echo "Erro ao tentar salvar o Vinculo";
    }
}