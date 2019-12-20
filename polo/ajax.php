<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 27/11/19
 * Time: 11:43
 */
require_once ('functions.php');
if(!empty($_POST['id_curso'])){
    $lista_cursos = $_POST['lista_cursos'];
    echo "<h1>".$lista_cursos."</h1>";;
    exit();
    /*$key = array_search($_POST['curso'], $cursos_polo);
    echo "<h1>".$key."</h1>";*/

}