<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 02/07/19
 * Time: 13:53
 */

//require_once(__DIR__ .'../../config.php');

class Layout {



    function __construct()
    {


    }

    function begin()
    {
        $this->container_begin();
        $this->menu();
        $this->main_begin();
    }

    function end()
    {
        $this->main_end();
        $this->container_end();
    }

    function menu()
    {
        global $CFG;
        echo "
<div id=\"sct-menu\" class=\"bd-sidebar bg-secondary col-12 col-md-3 col-xl-2\">
  <br>
  <form class=\"bd-search d-flex align-items-center\">
    <span class=\"algolia-autocomplete\" style=\"position: relative; display: inline-block; direction: ltr;\">
  <input class=\"form-control ds-input\" type=\"search\" placeholder=\"Localizar Tutor(a)\" aria-label=\"Search\">
  </span>
    </form>
    <nav class=\"bd-links\">
        <div class=\"bd-toc-item active\">
            <ul class=\"nav bd-sidenav\">
                <li><a class=\"bd-toc-link nav-link\" href='".$CFG->wwwroot."/sct/index.php'>Inicio</a></li>
                <li><a class=\"bd-toc-link nav-link\" href='".$CFG->wwwroot."/sct/polo/cadastrar.php'>Cadastrar Polo</a></li>
                <li><a class=\"bd-toc-link nav-link\" href='".$CFG->wwwroot."/sct/tutor/cadastrar.php'>Cadastrar Tutor(a)</a></li>
                <li><a class=\"bd-toc-link nav-link\" href='#'>Víncular Tutor(a)</a></li>
            </ul>
        </div>
    </nav>
</div>";
    }

    function container_begin(){
        echo "<div class=\"container-fluid\"><div class='row flex-xl-nowrap'>";
    }

    function container_end(){
        echo "</div></div>";
    }

    function main_begin(){
        echo "<main id=\"sct-page\" class='col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content'>";
    }

    function main_end(){
        echo "</main>";
    }

    function setup_diretorio($dir)
    {
        $GLOBALS['DIR_RAIZ'] = $dir.'/sct/';
    }
}

$VIEW_SCT = new Layout();


