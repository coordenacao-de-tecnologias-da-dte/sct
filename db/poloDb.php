<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 08/07/19
 * Time: 16:52
 */

require_once('connection.php');

function inserir_polo($polo){
    $db = open_database();
    $sql = "INSERT INTO mdl_polos (nome, dtIni) VALUE ('".$polo['nome']."', CURDATE())";
    if($db->query($sql) === true) {
        inserir_cursos_no_polo($db->insert_id, $polo['cursos']);
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
        $sql .= "INSERT INTO mdl_polos_cursos (idPolo, idCategory, dtIni) VALUES (".$polo.",".$curso.", CURDATE());";
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

function get_all_polos($id=null)
{
    $db = open_database();
    $sql = "SELECT * FROM mdl_polos";
    if($id){
        $sql = $sql." WHERE id=".$id;
    }
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
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

function cursos_polo($polo){
    $db = open_database();
    $sql = "SELECT pc.idCategory, ct.name as nome, pc.dtFim FROM mdl_polos_cursos as pc LEFT JOIN mdl_course_categories as ct ON pc.idCategory = ct.id WHERE pc.idPolo = "
        .$polo;
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return null;
    }
    close_database($db);
}

function update_cursos_polo($polo, $array_cursos){
    $db = open_database();
    $sql = "";
    var_dump($array_cursos);
    foreach ($array_cursos as $curso){
        if($curso["dtFim"]){
            $sql .= "UPDATE mdl_polos_cursos SET dtFim = '".$curso["dtFim"]."' WHERE idPolo = ".$polo." AND idCategory = ".$curso["idCategory"].";";
        }else{
            $sql .= "UPDATE mdl_polos_cursos SET dtFim = null WHERE idPolo = ".$polo." AND idCategory = ".$curso["idCategory"].";";
        }

    }
    //echo $this->sql;
    if($db->multi_query($sql) === TRUE) {
        echo "update cursos nos polos";
        header('Location: '. $_SERVER['HTTP_REFERER']);
    } else {
        echo "erro ao tentar update cursos nos polos: ".$sql."<br>".$db->error;
    }
    close_database($db);
}

function update_polo($id, $polo){
    $db = open_database();
    if($polo["dtFim"]){
        $sql = "UPDATE mdl_polos SET nome = '".$polo["nome"]."', dtFim = '".$polo["dtFim"]."' WHERE id=".$id;
    }else{
        $sql = "UPDATE mdl_polos SET nome = '".$polo["nome"]."', dtFim=null WHERE id=".$id;
    }
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    } else {
        return null;
        echo "erro ao atualizar POlo";
    }
    close_database($db);
}

function get_polo($id){
    $db = open_database();
    $sql = "SELECT * FROM mdl_polos WHERE id=".$id;
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return null;
        echo "erro ao atualizar POlo";
    }
    close_database($db);
}


