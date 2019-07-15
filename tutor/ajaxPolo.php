<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 10/07/19
 * Time: 10:21
 */
include '../db/poloDb.php';
include '../db/userDb.php';

if(!empty($_POST["curso_id"])) {
    $resultado = $SCT_DB_POLO->get_polos_cursos($_POST["curso_id"]);
    if($resultado) {
        while($view = $resultado->fetch_assoc()){
            echo "<option value='".$view["id"]."'>".$view["nome"]."</option>";
        }
    } else {
        echo "<select><<option>não há polos</option></option></select>";
    }
}

if(!empty($_POST["loginInst"])) {
    $resultado = $SCT_DB_USER->usuario_por_username($_POST["loginInst"]);
    if($resultado){
        echo json_encode(array('id' => $resultado["id"], 'auth' => $resultado["auth"], 'firstname' => $resultado["firstname"], 'lastname' => $resultado["lastname"], 'email' => $resultado["email"]));
    } else {
        echo json_encode(array('id' => '', 'firstname' => '', 'lastname' => '', 'email' => ''));
    }
}

if(!empty($_POST["cpf"])) {
    $resultado = $SCT_DB_USER->usuario_por_username($_POST["cpf"]);
    if($resultado){
        echo json_encode(array('id' => $resultado["id"], 'auth' => $resultado["auth"], 'firstname' => $resultado["firstname"], 'lastname' => $resultado["lastname"], 'email' => $resultado["email"]));
    } else {
        echo json_encode(array('id' => '', 'firstname' => '', 'lastname' => '', 'email' => ''));
    }
}

if (empty($_POST["idUser"]) && !empty($_POST["curso_id"])) {
    /*$idVinculo = $SCT_DB_USER->inserir_vinculo($_POST["idUser"], $_POST["presencial"], $_POST["online"], $_POST["tipoTutoria"]);

    if($idPolo >= 1){
        var_dump($idPolo);
        //$SCT_DB_POLO->inserir_cursos_no_polo($idPolo, $_POST["cursos_polo"]);
    } else {
        echo "Erro ao tentar salvar o polo";
    }*/
    echo "vazio";
}



