<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 26/07/19
 * Time: 11:33
 */

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database()
{
    global $CFG;
    try {
        $conn = new mysqli($CFG->dbhost, $CFG->dbuser, $CFG->dbpass, $CFG->dbname);
        return $conn;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn)
{
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
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
        $sql = "SELECT v.id, CONCAT(u.firstname,' ', u.lastname) as tutor, c.name as curso, p.nome as polo, v.tipoVinculo as tipo 
            FROM mdl_vinculo_sct v INNER JOIN mdl_user u ON u.id = v.idUser INNER JOIN mdl_course_categories c ON c.id = v.idCategory
            INNER JOIN mdl_polos p ON p.id = v.idPolo WHERE v.dtIni IS NOT NULL AND v.dtFim IS NULL 
            AND (v.tipoVinculo = 'online' OR v.tipoVinculo = 'presencial')";
        if($id){
            $sql = $sql." AND v.id=".$id;
        }
        if($usuario->tipoVinculo = "coord_curso"){
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


