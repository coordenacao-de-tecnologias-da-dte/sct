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

require_once('../../config.php');
require('../classes/curso.php');
require('../view/principal.php');
require('../view/polo.php');
require_once($CFG->libdir.'/authlib.php');


//HTTPS is required in this page when $CFG->loginhttps enabled
$PAGE->https_required();

$PAGE->set_url('/sct/poloDb/cadastrar.php');
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
    $VIEW_SCT->begin();
    $VIEW_SCT_POLO->begin();
    echo $cursos->html_select_multiple_courses();
    ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
<?php
$VIEW_SCT->end();
echo $OUTPUT->footer();
else:
    redirect($CFG->wwwroot.'/index.php', 'Faça o login', 5);
?>
<?php endif ?>
