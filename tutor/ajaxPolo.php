<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 10/07/19
 * Time: 10:21
 */
include '../db/poloDb.php';

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



