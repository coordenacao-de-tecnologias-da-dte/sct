<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 08/07/19
 * Time: 16:52
 */

require_once('connection.php');

function inserir_polo($nome){
    $db = open_database();
    $sql = "INSERT INTO mdl_polos (nome) VALUE ('".$nome."')";
    if($db->query($sql) === true) {
        return $db->insert_id;
    }
    else {
        return -1;
    }
    close_database($db);
}

function inserir_cursos_no_polo($polo, $array_cursos) {
    $db = open_database();
    $sql = "";
    foreach ($array_cursos as $curso){
        $sql .= "INSERT INTO mdl_polos_cursos (idPolo, idCategory) VALUES (".$polo.",".$curso.");";
    }
    //echo $this->sql;
    if($db->multi_query($sql) === TRUE) {
        echo "inseriu polos e seus respectivos cursos";
        header('Location: '. $_SERVER['HTTP_REFERER']);
    } else {
        echo "erro ao tentar inserir polos e cursos: ".$sql."<br>".$db->error;
    }
    close_database($db);
}

function get_all_polos()
{
    $db = open_database();
    $sql = "SELECT * FROM mdl_polos";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        echo "não há polos cadastrados";
    }
    close_database($db);
}

function get_polos_cursos($curso)
{
    $db = open_database();
    $sql = "SELECT p.* FROM mdl_polos as p LEFT JOIN mdl_polos_cursos as pc ON p.id = pc.idPolo WHERE pc.idCategory = "
        .$curso;
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result;
    } else {
        return null;
    }
    close_database($db);
}


