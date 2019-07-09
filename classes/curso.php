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
        $select_courses="<select id=\"presencial\" class=\"form-control\"><option disabled selected>Selecione...</option>";
        $grupo_graduacao="<optgroup label='Graduação'>";
            foreach ($this->moodle_courses_children_graduacao() as $item){
                if($item["name"] != "Graduação"){
                    $grupo_graduacao.="<option value='".$item["id"]."'>".$item["name"]."</option>";
                }
            }
        $grupo_graduacao.="</optgroup>";
        $select_courses.=$grupo_graduacao;
        $grupo__pos_graduacao="<optgroup label='Pós-Graduação'>";
        foreach ($this->moodle_courses_children_pos_graduacao() as $item){
            if($item["name"] != "Pós-Graduação"){
                $grupo__pos_graduacao.="<option value='".$item["id"]."'>".$item["name"]."</option>";
            }
        }
        $grupo__pos_graduacao.="</optgroup>";
        $select_courses.=$grupo__pos_graduacao;
        $select_courses.="</select>";

        return $select_courses;
    }

    function html_select_multiple_courses()
    {
        $select_courses="<select id=\"cursos_polo\" name='cursos_polo[]' class=\"form-control mdb-select\" multiple required>";
        $grupo_graduacao="<optgroup label='Graduação'>";
        foreach ($this->moodle_courses_children_graduacao() as $item){
            if($item["name"] != "Graduação"){
                $grupo_graduacao.="<option value='".$item["id"]."'>".$item["name"]."</option>";
            }
        }
        $grupo_graduacao.="</optgroup>";
        $select_courses.=$grupo_graduacao;
        $grupo__pos_graduacao="<optgroup label='Pós-Graduação'>";
        foreach ($this->moodle_courses_children_pos_graduacao() as $item){
            if($item["name"] != "Pós-Graduação"){
                $grupo__pos_graduacao.="<option value='".$item["id"]."'>".$item["name"]."</option>";
            }
        }
        $grupo__pos_graduacao.="</optgroup>";
        $select_courses.=$grupo__pos_graduacao;
        $select_courses.="</select>";

        return $select_courses;
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