<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 02/07/19
 * Time: 14:24
 */

class Polo
{
    function __construct()
    {

    }

    function begin()
    {
        echo "
        <h2>Cadastrar Polo</h2>
                <br>
                <form action='../polo/acao_cadastrar.php' method='post'>
                    <div class=\"form-row\">
                        <div class=\"form-group col-md-6\">
                            <label for=\"nome\">Nome do Polo:</label>
                            <input type=\"text\" class=\"form-control\" id=\"nome\" name=\"nome\" placeholder=\"Nome\" required>
                        </div>
                    </div>
                    <div class=\"form-row\">
                        <div id=\"dpresencial\" class=\"form-group col-md-6\">
                            <label for=\"presencial\">Cursos</label>
        ";
    }
}

$VIEW_SCT_POLO = new Polo();