<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 18/07/19
 * Time: 09:23
 */

class tutores
{
    function __construct()
    {
    }

    function begin()
    {
        echo "
        <h2>Lista de Tutores</h2>
        <br>
        <table class='table table-responsive table-striped table-hover'>
              <thead>
                <tr>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Curso</th>
                    <th scope='col'>Polo</th>
                    <th scope='col'>Tipo</th>
                    <th scope='col'>Opções</th>
                </tr>
              </thead>
              <tbody>";
    }

    function end()
    {
        echo "</tbody>  
        </table>";
    }
}

$VIEW_SCT_LISTA_TUTORES = new tutores();