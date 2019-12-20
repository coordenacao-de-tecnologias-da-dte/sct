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
$cursos_polo = null;

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

function edit(){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['polo'])) {
            $cursos = json_decode($_POST['polo']['cursos'], true);
            $polo = $_POST['polo'];
            $polo_foi_desativado = $_POST['polo']['cursos'];
            if(!$polo_foi_desativado){
                update_cursos_polo($id, $cursos);
            }
            update_polo($id, $polo);
            header('location: index.php');
        } else {
            $tmp = get_all_polos($id);
            if($tmp){
                global $polo;
                $polo = $tmp[0];
                global $cursos_polo;
                $cursos_polo = cursos_polo($polo['id']);
            }
        }
    } else {
        header('location: index.php');
    }
}

function adapta_array($arr){
    if (is_array($arr)) {
        foreach ($arr as $k => $v) {
            $arr[$k] = adapta_array($v);
        }
    } else if (is_string ($arr)) {
        return utf8_encode($arr);
    }
    return $arr;
}