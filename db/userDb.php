<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 11/07/19
 * Time: 10:43
 */

require_once('../db/conexao.php');

class userDb
{
    public $sql;

    function __construct()
    {

    }

    function usuario_por_username($username)
    {
        global $DB_SCT;
        //inserir atributo ldap depois $this->sql = "SELECT * FROM mdl_user WHERE username = '".$username."' AND auth='ldap'";
        $this->sql = "SELECT id, auth, firstname, lastname, email FROM mdl_user WHERE username = '".$username."'";
        $result = $DB_SCT->conn->query($this->sql);
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function vinculo_atual_usuario($idUser)
    {
        global $DB_SCT;
        //inserir atributo ldap depois $this->sql = "SELECT * FROM mdl_user WHERE username = '".$username."' AND auth='ldap'";
        $this->sql = "SELECT * FROM mdl_vinculo_sct WHERE idUser = '".$idUser."' AND dtIni IS NOT NULL AND dtFim IS NULL";
        $result = $DB_SCT->conn->query($this->sql);
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function inserir_vinculo($idUser, $idCategory, $idPolo, $tipoVinculo)
    {
        global $DB_SCT;
        $sql = "INSERT INTO mdl_vinculo_sct (idUser, idCategory, idPolo, tipoVinculo, dtIni) VALUE (".$idUser.",".$idCategory.",".$idPolo
            .",'".$tipoVinculo."',CURDATE())";
        if($DB_SCT->conn->query($sql) === true) {
            return $DB_SCT->conn->insert_id;
        }
        else {
            echo $DB_SCT->conn->error;
            return -1;
        }
    }
}

$SCT_DB_USER = new userDb();