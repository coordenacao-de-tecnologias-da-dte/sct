<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 08/07/19
 * Time: 16:52
 */

require('../db/conexao.php');

class poloDb
{
    public $sql;

    public function __construct()
    {

    }

    function inserir_polo($nome)
    {
        global $DB_SCT;
        $sql = "INSERT INTO mdl_polos (nome) VALUE ('".$nome."')";
        if($DB_SCT->conn->query($sql) === true) {
            return $DB_SCT->conn->insert_id;
        }
        else {
            return -1;
        }
    }

    function inserir_cursos_no_polo($polo, $array_cursos) {
        global $DB_SCT;
        $this->sql = "";
        foreach ($array_cursos as $curso){
            $this->sql .= "INSERT INTO mdl_polos_cursos (idPolo, idCategory) VALUES (".$polo.",".$curso.");";
        }
        //echo $this->sql;
        if($DB_SCT->conn->multi_query($this->sql) === TRUE) {
            echo "inseriu polos e seus respectivos cursos";
            header('Location: '. $_SERVER['HTTP_REFERER']);
        } else {
            echo "erro ao tentar inserir polos e cursos: ".$this->sql."<br>".$DB_SCT->conn->error;
        }
    }

    function get_all_polos()
    {
        global $DB_SCT;
        $this->sql = "SELECT * FROM mdl_polos";
        $result = $DB_SCT->conn->query($this->sql);
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            echo "não há polos cadastrados";
        }
    }

    function get_polos_cursos($curso)
    {
        global $DB_SCT;
        $this->sql = "SELECT p.* FROM mdl_polos as p LEFT JOIN mdl_polos_cursos as pc ON p.id = pc.idPolo WHERE pc.idCategory = "
                        .$curso;
        $result = $DB_SCT->conn->query($this->sql);
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            echo "não há polos cadastrados";
        }
    }

}

$SCT_DB_POLO = new poloDb();

