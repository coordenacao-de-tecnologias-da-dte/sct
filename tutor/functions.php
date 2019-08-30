<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 20/08/19
 * Time: 17:13
 */

require_once ('../config.php');
require_once (DBAPI);

$tutores = null;
$tutor = null;

/*
 * LIsta de TUtores
 * */
function index($usuario){
    global $tutores;

    $tutores = lista_vinculos($usuario);
}