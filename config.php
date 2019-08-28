<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 26/07/19
 * Time: 11:29
 */
include_once '../config.php';

if ( !defined('DBAPI') )
    define('DBAPI', 'inc/database.php');

if(!defined('BASEURL')){
    define('BASEURL', $CFG->wwwroot.'/sct/');
}

define("HEADER_TEMPLATE", 'inc/header.php');
define("FOOTER_TEMPLATE", 'inc/footer.php');


