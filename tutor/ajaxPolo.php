<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 10/07/19
 * Time: 10:21
 */
include_once '../db/poloDb.php';
include_once '../db/userDb.php';

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
        echo json_encode(array('id' => $resultado["id"], 'firstname' => utf8_encode($resultado["firstname"]), 'lastname' => utf8_encode($resultado["lastname"]), 'email' => $resultado["email"]));
    } else {
        echo json_encode(array('id' => '', 'firstname' => '', 'lastname' => '', 'email' => ''));
    }
}

if(!empty($_POST["cpf"])) {
    $resultado = $SCT_DB_USER->usuario_por_username($_POST["cpf"]);
    if($resultado){
        echo json_encode(array('id' => $resultado["id"], 'firstname' => utf8_encode($resultado["firstname"]), 'lastname' => utf8_encode($resultado["lastname"]), 'email' => $resultado["email"]));
    } else {
        echo json_encode(array('id' => '', 'firstname' => '', 'lastname' => '', 'email' => ''));
    }
}



