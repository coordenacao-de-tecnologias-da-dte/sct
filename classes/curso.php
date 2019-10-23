<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 13/06/19
 * Time: 11:27
 */

require_once($CFG->dirroot.'/course/externallib.php');

class Curso
{
    function __construct()
    {

    }

    function moodle_courses_children_graduacao()
    {
        //PEGAR ID DE CATEGORIA DE GRADUAÇÃO
        $niveis = array("criteria" => array("key" => "id", "value" => 2));
        return core_course_external::get_categories($niveis);
    }

    function moodle_courses_children_pos_graduacao()
    {
        //PEGAR ID DE CATEGORIA DE PÓS-GRADUAÇÃO
        $niveis = array("criteria" => array("key" => "id", "value" => 3));
        return core_course_external::get_categories($niveis);
    }

    function html_select_courses()
    {
        $grupos="<optgroup label='Graduação'>";
            foreach ($this->moodle_courses_children_graduacao() as $item){
                if($item["name"] != "Graduação"){
                    $grupos.="<option value='".$item["id"]."'>".$item["name"]."</option>";
                }
            }
        $grupos.="</optgroup> <optgroup label='Pós-Graduação'>";
        foreach ($this->moodle_courses_children_pos_graduacao() as $item){
            if($item["name"] != "Pós-Graduação"){
                $grupos.="<option value='".$item["id"]."'>".$item["name"]."</option>";
            }
        }
        $grupos.="</optgroup>";

        return $grupos;
    }

    function html_select_polos($array_polos)
    {
        $select_polos="<select id=\"polos\" class=\"form-control\"><option disabled selected>Selecione...</option>";
        foreach ($array_polos as $item){
                $select_polos.="<option value='".$item["id"]."'>".$item["nome"]."</option>";
        }
        $select_polos.="</select>";

        return $select_polos;
    }
}