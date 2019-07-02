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
                            <label>Tipo do Usuário:</label>
                            <div class=\"form-group\">
                                <div class=\"form-check form-check-inline\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"tipoUsuario\" id=\"inlineRadio1\" value=\"interno\" checked
                                           data-toggle=\"collapse\" data-target=\".multiple-collapse\" aria-controls=\"dcpf dloginInst\" aria-expanded=\"false\"
                                    >
                                    <label class=\"form-check-label\" for=\"inlineRadio1\">Interno</label>
                                </div>
                                <div class=\"form-check form-check-inline\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"tipoUsuario\" id=\"inlineRadio2\" value=\"externo\"
                                           data-toggle=\"collapse\" data-target=\".multiple-collapse\" aria-controls=\"dcpf dloginInst\" aria-expanded=\"false\">
                                    <label class=\"form-check-label\" for=\"inlineRadio2\">Externo</label>
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
                            <label>Tipo de tutoria:</label>
                            <div class=\"form-group\">
                                <div class=\"form-check form-check-inline\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"tipoTutoria\" id=\"inlineRadio3\" value=\"presencial\" checked
                                           data-toggle=\"collapse\" data-target=\".multiple-collapse2\" aria-controls=\"donline\" aria-expanded=\"false\"
                                    >
                                    <label class=\"form-check-label\" for=\"inlineRadio1\">Presencial</label>
                                </div>
                                <div class=\"form-check form-check-inline\">
                                    <input class=\"form-check-input\" type=\"radio\" name=\"tipoTutoria\" id=\"inlineRadio4\" value=\"online\"
                                           data-toggle=\"collapse\" data-target=\".multiple-collapse2\" aria-controls=\"donline\" aria-expanded=\"false\">
                                    <label class=\"form-check-label\" for=\"inlineRadio2\">Online</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-row\">
                        <div id=\"dpresencial\" class=\"form-group col-md-6\">
                            <label for=\"presencial\">Curso</label>
        ";
    }
}

$VIEW_SCT_TUTOR = new Tutor();