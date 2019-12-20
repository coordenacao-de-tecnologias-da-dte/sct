<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 11/07/19
 * Time: 10:43
 */

require_once('connection.php');
mysqli_report(MYSQLI_REPORT_STRICT);

function usuario_por_username($username)
{
    $db = open_database();
    //inserir atributo ldap depois $this->sql = "SELECT * FROM mdl_user WHERE username = '".$username."' AND auth='ldap'";
    $sql = "SELECT id, firstname, lastname, email FROM mdl_user WHERE username = '$username'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
    close_database($db);
}

function inserir_novo_usuario($tipoAuth, $login, $senha, $nome, $sobrenome, $email)
{
    $db = open_database();
    $sql = "INSERT INTO mdl_user (auth, confirmed, mnethostid, username, password, firstname, lastname, email) VALUE ('$tipoAuth', 1, 1,  
                '$login', '$senha', '$nome', '$sobrenome', '$email')";

    if($db->query($sql) === true) {
        return $db->insert_id;
    }
    else {
        echo $db->error;
        return -1;
    }
    close_database($db);
}

function update($id = null, $usuario = null)
{
    $db = open_database();

    try {
        $sql = "UPDATE mdl_user SET firstname = '". utf8_decode($usuario[nome])."', lastname = '". utf8_decode($usuario[sobrenome])."' ,
email = '". utf8_decode($usuario[email])."' WHERE id = ".$id ;

        echo $sql;
        $db->query($sql);
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($db);
}