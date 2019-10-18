<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 08/07/19
 * Time: 17:18
 */
require_once('../db/poloDb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $SCT_DB_POLO;
    $idPolo = $SCT_DB_POLO->inserir_polo($_POST["nome"]);

    if($idPolo >= 1){
        var_dump($idPolo);
        $SCT_DB_POLO->inserir_cursos_no_polo($idPolo, $_POST["cursos_polo"]);
    } else {
        echo "Erro ao tentar salvar o polo";
    }
}