<?php

class Database{

    public $db_dsn = 'mysql:host=localhost;dbname=triptool';
    public $db_username = 'root';
    public $db_passwrd = '';

    public function connect(){
        $pdo = new PDO( $this->db_dsn, $this->db_username, $this->db_passwrd);

        return $pdo;
    }

}