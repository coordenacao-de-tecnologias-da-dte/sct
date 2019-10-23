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
$polo = null;

function index(){
    global $polos;

    $polos = get_all_polos();
}

function add(){
    if(!empty($_POST['polo'])){
        $polo = $_POST['polo'];
        inserir_polo($polo);
        header("Location: index.php");
    }
}