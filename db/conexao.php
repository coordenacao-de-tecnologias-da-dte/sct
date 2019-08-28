<?php
/**
 * Created by PhpStorm.
 * User: wellyngton
 * Date: 04/07/19
 * Time: 10:28
 */
require_once('../../config.php');

class ConexaoDb {

    public $conn;

    function __construct()
    {
        global $CFG;
        // Create connection
        $this->conn = new mysqli($CFG->dbhost, $CFG->dbuser, $CFG->dbpass, $CFG->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * @param mysqli $conn
     */
    public function setConn()
    {
        global $CFG;
        $this->conn = new mysqli($CFG->dbhost, $CFG->dbuser, $CFG->dbpass, $CFG->dbname);
    }

    function create_table_polos()
    {
        $sql_create_polos = "CREATE TABLE IF NOT EXISTS mdl_polos (
                                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                                  nome VARCHAR(50) NOT NULL UNIQUE 
                                  )";
        if ($this->conn->query($sql_create_polos) === TRUE) {
            echo "Table POlos created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    function create_table_polos_cursos()
    {
        $sql_create_polos_cursos = "CREATE TABLE IF NOT EXISTS mdl_polos_cursos (
                                  idPolo INT(6) UNSIGNED NOT NULL, 
                                  idCategory BIGINT(10) NOT NULL,
                                  CONSTRAINT PK_PolosCursos PRIMARY KEY (idPolo, idCategory),
                                  CONSTRAINT FK_Polo FOREIGN KEY (idPolo) REFERENCES mdl_polos (id),
                                  CONSTRAINT FK_Category FOREIGN KEY (idCategory) REFERENCES mdl_course_categories (id)
                                  )";
        if ($this->conn->query($sql_create_polos_cursos) === TRUE) {
            echo "Table POlos_CURSOS created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    function create_table_vinculo_sct()
    {
        $sql_create_polos_cursos = "CREATE TABLE IF NOT EXISTS mdl_vinculo_sct (
                                  id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
                                  tipoVinculo varchar(20) NOT NULL,
                                  dtIni BIGINT(10) NOT NULL,
                                  dtFim BIGINT(10) NOT NULL,
                                  idUser BIGINT(10) NOT NULL, 
                                  idCategory BIGINT(10),
                                  idPolo INT(6) UNSIGNED,
                                  CONSTRAINT FK_PoloVinculo FOREIGN KEY (idPolo) REFERENCES mdl_polos (id),
                                  CONSTRAINT FK_UserVinculo FOREIGN KEY (idUser) REFERENCES mdl_user (id),
                                  CONSTRAINT FK_CategoryVinculo FOREIGN KEY (idCategory) REFERENCES mdl_course_categories (id)
                                  )";
        if ($this->conn->query($sql_create_polos_cursos) === TRUE) {
            echo "Table Vinculo_SCT created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    function fechar_conexao(){
        $this->conn->close();
    }

}

$DB_SCT = new ConexaoDb();



