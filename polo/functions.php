<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 22/10/19
 * Time: 17:21
 */
require_once ('../config.php');
require_once (DBPOLO);


$polos = null;

function index(){
    global $polos;

    $polos = get_all_polos();
}