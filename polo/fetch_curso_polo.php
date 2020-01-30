<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 10/01/20
 * Time: 17:32
 */
require_once ('../config.php');
require_once (DBPOLO);

if(!empty($_GET["polo"])) {
    $lista = cursos_nao_vinculados_no_polo($_GET["polo"]);
    if($lista){
        var_dump($lista);
    }else {
        echo "Todos os cursos já estão vinculados ao polo";
    }
}