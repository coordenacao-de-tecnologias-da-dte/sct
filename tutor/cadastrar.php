<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Forgot password routine.
 *
 * Finds the user and calls the appropriate routine for their authentication type.
 *
 * There are several pathways to/through this page, summarised below:
 * 1. User clicks the 'forgotten your username or password?' link on the login page.
 *  - No token is received, render the username/email search form.
 * 2. User clicks the link in the forgot password email
 *  - Token received as GET param, store the token in session, redirect to self
 * 3. Redirected from (2)
 *  - Fetch token from session, and continue to run the reset routine defined in 'core_login_process_password_set()'.
 *
 * @package    core
 * @subpackage auth
 * @copyright  1999 onwards Martin Dougiamas  http://dougiamas.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require('../classes/curso.php');
require_once($CFG->libdir.'/authlib.php');


//HTTPS is required in this page when $CFG->loginhttps enabled
$PAGE->https_required();

$PAGE->set_url('/sct/tutor/cadastrar.php');
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);

// setup text strings
$sctstring = 'SCT - Sistema de Cadastro de Tutores';
//$strlogin     = get_string('login');

//$PAGE->navbar->add($strlogin, get_login_url());
$PAGE->navbar->add($sctstring);
$PAGE->set_title($sctstring);
?>
<?php
if (isloggedin() and !isguestuser()):
    echo $OUTPUT->header();
    $cursos = new Curso();
    ?>
    <!--<nav class="navbar navbar-dark bg-primary">
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        SCT
    </nav>-->
    <div class="container-fluid">
        <div class='row flex-xl-nowrap'>
            <div id="sct-menu" class="bd-sidebar bg-secondary col-12 col-md-3 col-xl-2">
                <br>
                <form class="bd-search d-flex align-items-center">
    <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;">
    <input class="form-control ds-input" type="search" placeholder="Localizar Tutor(a)" aria-label="Search">
  </span>
                </form>
                <nav class="bd-links">
                    <div class="bd-toc-item active">
                        <ul class="nav bd-sidenav">
                            <li><a class="bd-toc-link nav-link" href='#'>Inicio</a></li>
                            <li><a class="bd-toc-link nav-link" href='#'>Cadastrar tutor(a)</a></li>
                            <li><a class="bd-toc-link nav-link" href='#'>Víncular Tutor(a)</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <main id="sct-page" class='col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content'>
                <h2>Cadastrar tutor(a)</h2>
                <br>
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tipo do Usuário:</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoUsuario" id="inlineRadio1" value="interno" checked
                                           data-toggle="collapse" data-target=".multiple-collapse" aria-controls="dcpf dloginInst" aria-expanded="false"
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Interno</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoUsuario" id="inlineRadio2" value="externo"
                                           data-toggle="collapse" data-target=".multiple-collapse" aria-controls="dcpf dloginInst" aria-expanded="false">
                                    <label class="form-check-label" for="inlineRadio2">Externo</label>
                                </div>
                                <div id="dloginInst" class="show multiple-collapse form-group">
                                    <label for="loginInst">Login</label>
                                    <input type="text" class="form-control" id="loginInst" placeholder="login institucional sem o @uft.edu.br">
                                </div>
                                <div id="dcpf" class="collapse multiple-collapse form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" placeholder="números do cpf sem ponto e traço">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="usuario@dominio.com">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tipo de tutoria:</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoTutoria" id="inlineRadio3" value="presencial" checked
                                           data-toggle="collapse" data-target=".multiple-collapse2" aria-controls="donline" aria-expanded="false"
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Presencial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoTutoria" id="inlineRadio4" value="online"
                                           data-toggle="collapse" data-target=".multiple-collapse2" aria-controls="donline" aria-expanded="false">
                                    <label class="form-check-label" for="inlineRadio2">Online</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div id="dpresencial" class="form-group col-md-6">
                            <label for="presencial">Curso</label>
                            <?php
                            echo $cursos->html_select_courses();
                            ?>
                        </div>
                        <div id="donline" class="show multiple-collapse2 form-group col-md-4">
                            <label for="online">Polo</label>
                            <select id="online" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </main>
        </div>
    </div>
<?php
echo $OUTPUT->footer();
else:
    redirect($CFG->wwwroot.'/index.php', 'Faça o login', 5);
?>
<?php endif ?>
