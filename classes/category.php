<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 13/06/19
 * Time: 11:27
 */

require_once($CFG->dirroot.'/course/externallib.php');

class Category
{
    function __construct()
    {

    }

    function all_categories_moodle()
    {
        return core_course_external::get_categories();
    }

    function categories()
    {
        if($this->all_categories_moodle()){
            foreach ($this->all_categories_moodle() as $item){
                if($item['name']=="Graduação" || $item['name']=="Pós-graduação"){
                    var_dump($item);
                }

            }
        }
    }
}