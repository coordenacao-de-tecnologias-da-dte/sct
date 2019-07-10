<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 02/07/19
 * Time: 14:24
 */

class Tutor
{
    function __construct()
    {

    }

    function begin()
    {
        echo "
        <h2>Cadastrar tutor(a)</h2>
                <br>
                <form>
                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            <label>Tipo do Usuário</label>
                            <div class=\"form-group\">
                                <div class=\"form-check form-check-inline\">
                                <div class=\"switch\">
                                <label for=\"tipoUsuario\" class=\"switch-label switch-label-off\">Interno</label>
      <input type=\"checkbox\" class=\"switch-input\" name=\"tipoUsuario\" value=\"interno\" id=\"tipoUsuario\" 
      data-toggle=\"collapse\" data-target=\".multiple-collapse\" aria-controls=\"dcpf dloginInst\" aria-expanded=\"false\">
      
      <label for=\"tipoUsuario\" class=\"switch-label switch-label-on\">Externo</label>
      <span class=\"switch-selection\"></span>
    </div>

                                </div>
                                <div id=\"dloginInst\" class=\"show multiple-collapse form-group\">
                                    <label for=\"loginInst\">Login</label>
                                    <input type=\"text\" class=\"form-control\" id=\"loginInst\" placeholder=\"login institucional sem o @uft.edu.br\">
                                </div>
                                <div id=\"dcpf\" class=\"collapse multiple-collapse form-group\">
                                    <label for=\"cpf\">CPF</label>
                                    <input type=\"text\" class=\"form-control\" id=\"cpf\" placeholder=\"números do cpf sem ponto e traço\">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-row\">
                        <div class=\"form-group col-md-6\">
                            <label for=\"nome\">Nome</label>
                            <input type=\"text\" class=\"form-control\" id=\"nome\" placeholder=\"Nome\">
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label for=\"sobrenome\">Sobrenome</label>
                            <input type=\"text\" class=\"form-control\" id=\"sobrenome\" placeholder=\"Sobrenome\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"email\">E-mail</label>
                        <input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"usuario@dominio.com\">
                    </div>
                    <div class=\"form-row\">
                        <div class=\"form-group\">
                            <label>Tipo de Tutoria</label>
                            <div class=\"form-group\">
                                <div class=\"form-check form-check-inline\">
                                    <div class=\"switch\">
                                        <label class=\"form-check-label\" for=\"tipoTutoria\">Presencial</label>
                                        <input class=\"form-check-input\" type=\"checkbox\" name=\"tipoTutoria\" id=\"tipoTutoria\" value=\"presencial\"
                                           data-toggle=\"collapse\" data-target=\".multiple-collapse2\" aria-controls=\"donline\" aria-expanded=\"false\">
                                        <label class=\"form-check-label\" for=\"tipoTutoria\">Online</label>
                                        <span class=\"switch-selection\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-row\">
                        <div id=\"dpresencial\" class=\"form-group col-md-6\">
                            <label for=\"presencial\">Curso</label>
        ";
    }

    function script_select_tutor()
    {
        echo "<script type='text/javascript' src='../js/select_polos.js'></script>";
    }
}

$VIEW_SCT_TUTOR = new Tutor();