<?php

require_once("config.php");
require_once("Database.class.php");

class MemberTrip{

    public $memberTripId;
    public $idMember;
    public $idTrip;
    public $rightLevel;

    private $pdo;

    function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function save(){
        $sql = "INSERT INTO member_trip (id_member, id_trip, right_level) VALUES (?,?,?)";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $this->idMember, PDO::PARAM_INT);
        $statement->bindParam(2, $this->idTrip, PDO::PARAM_INT);
        $statement->bindParam(3, $this->rightLevel, PDO::PARAM_INT);

        if ($statement->execute()) {

            return $this->pdo->lastInsertId();

        } else {
            echo "SQL Error <br />";
            echo $statement->queryString . "<br />";
            echo $statement->errorInfo()[2];
        }
    }

}