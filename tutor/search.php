<?php
require_once ('../config.php');
require_once(DBTUTOR);

$db = open_database();
$username = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$sql = "SELECT * from mdl_user WHERE username LIKE '%".$username."%' ORDER BY username ASC LIMIT 7";

$resultado = $db->query($sql);

if($resultado->num_rows > 0){
    $retorno = $resultado->fetch_assoc();
    echo json_encode($retorno);
}else{
    echo "nenhum resultado encontrado";
}




