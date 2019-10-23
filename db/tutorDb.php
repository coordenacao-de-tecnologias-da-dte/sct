<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 26/07/19
 * Time: 11:33
 */
require_once('connection.php');
mysqli_report(MYSQLI_REPORT_STRICT);

/* Método para verificar qual o tipo de acesso do usuário, ou se ele realmente pode acessar a aplicação*/
function vinculo_sct($idUser)
{
    $db = open_database();
    $retorno = null;

    try {
        if($idUser) {
            //inserir atributo ldap depois $this->sql = "SELECT * FROM mdl_user WHERE username = '".$username."' AND auth='ldap'";
            $sql = "SELECT * FROM mdl_vinculo_sct WHERE idUser = '".$idUser."' AND dtIni IS NOT NULL AND dtFim IS NULL 
            AND (tipoVinculo = 'admin' OR tipoVinculo = 'coord_bolsas' OR tipoVinculo = 'coord_curso')";

            $resultado = $db->query($sql);

            if($resultado->num_rows > 0){
                $retorno = $resultado->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($db);
    $_SESSION['user_sct'] = $retorno;
}

function lista_vinculos($usuario = null, $id = null)
{
    $db = open_database();
    $retorno = null;

    try {
        $sql = "SELECT v.id, v.idUser, CONCAT(u.firstname,' ', u.lastname) as nome, u.username as username, c.name as curso, p.nome as polo, v.tipoVinculo as tipo 
            FROM mdl_vinculo_sct v INNER JOIN mdl_user u ON u.id = v.idUser INNER JOIN mdl_course_categories c ON c.id = v.idCategory
            INNER JOIN mdl_polos p ON p.id = v.idPolo WHERE v.dtIni IS NOT NULL AND v.dtFim IS NULL 
            AND (v.tipoVinculo = 'online' OR v.tipoVinculo = 'presencial')";

        if($id){
            $sql = $sql." AND v.id=".$id;
        }
        if($usuario->tipoVinculo == "coord_curso"){
            $sql = $sql." AND idCategory = ". $usuario->idCategory;
        }
        $resultado = $db->query($sql);
        if($resultado->num_rows > 0){
            $retorno = $resultado->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($db);
    return $retorno;
}

function inserir_vinculo($idUser, $idCategory, $idPolo, $tipoVinculo)
{
    $db = open_database();
    $sql = "INSERT INTO mdl_vinculo_sct (idUser, idCategory, idPolo, tipoVinculo, dtIni) VALUE (".$idUser.",".$idCategory.",".$idPolo
        .",'".$tipoVinculo."',CURDATE())";
    if($db->query($sql) === true) {
        return $db->insert_id;
    }
    else {
        echo $db->error;
        return -1;
    }
    close_database($db);
}

function vinculo_atual_usuario($idUser)
{
    $db = open_database();
    //inserir atributo ldap depois $this->sql = "SELECT * FROM mdl_user WHERE username = '".$username."' AND auth='ldap'";
    $sql = "SELECT * FROM mdl_vinculo_sct WHERE idUser = '".$idUser."' AND dtIni IS NOT NULL AND dtFim IS NULL";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    close_database($db);
}

function lista_disciplina_vinculadas($usuario = null, $id = null)
{
    $db = open_database();
    $retorno = null;

    try {
        $sql = "SELECT DISTINCT c.fullname AS nomecurso
        FROM mdl_user u
        JOIN mdl_user_enrolments ue ON ue.userid = u.id
        JOIN mdl_enrol e ON e.id = ue.enrolid
        JOIN mdl_role_assignments ra ON ra.userid = u.id
        JOIN mdl_context ct ON ct.id = ra.contextid AND ct.contextlevel = 50
        JOIN mdl_course c ON c.id = ct.instanceid AND e.courseid = c.id
        JOIN mdl_role r ON r.id = ra.roleid AND r.shortname = 'teacher'
        WHERE e.status = 0 AND u.suspended = 0 AND u.deleted = 0
          AND (ue.timeend = 0 OR ue.timeend > NOW()) AND ue.status = 0 ";
        if($id){
            $sql = $sql." AND u.id=".$id." ORDER BY c.id DESC;";
        }
        $resultado = $db->query($sql);

        if($resultado->num_rows > 0){
            $retorno = $resultado->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($db);
    return $retorno;
}


