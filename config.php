<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 26/07/19
 * Time: 11:29
 */
include_once dirname(dirname(__FILE__)).'/config.php';

if(!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__).'/');

if ( !defined('DBAPI') )
    define('DBAPI', ABSPATH.'inc/database.php');

if(!defined('BASEURL')){
    define('BASEURL', $CFG->wwwroot.'/sct/');
}

define("HEADER_TEMPLATE", ABSPATH.'inc/header.php');
define("FOOTER_TEMPLATE", ABSPATH.'inc/footer.php');


