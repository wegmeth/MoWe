<?php

require_once("Database.class.php");
require_once("MemberTrip.class.php");

class Trip
{

    public $title;
    public $dateStart;
    public $dateEnd;
    public $destination;
    private $pdo;

    function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public static function getAll()
    {

        $userId = $_SESSION["login"];

        $sql = "SELECT * FROM trip";

        $db = new Database();
        $pdo = $db->connect();

        $statement = $pdo->prepare($sql);
        $statement->execute();

        $arr = [];

        while ($row = $statement->fetch()) {
            $mem = new Trip();
            $mem->id = $row['id'];
            $mem->title = $row['title'];
            $mem->dateEnd = $row['dateEnd'];
            $mem->dateStart = date("d.m.Y", $row['dateStart']);
            $mem->destination = $row['destination'];

            $arr[$row['id']] = $mem;
        }

        return $arr;
    }


    public static function getByUserId()
    {

        $userId = $_SESSION["login"];

        $sql = "SELECT trip.* FROM trip, member_trip WHERE member_trip.id_trip=trip.id AND member_trip.id_member = ?";

        $db = new Database();
        $pdo = $db->connect();

        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $userId, PDO::PARAM_INT);
        $statement->execute();

        $arr = [];

        while ($row = $statement->fetch()) {
            $mem = new Trip();
            $mem->id = $row['id'];
            $mem->title = $row['title'];
            $mem->dateEnd = $row['dateEnd'];
            $mem->dateStart = date("d.m.Y", $row['dateStart']);
            $mem->destination = $row['destination'];

            $arr[$row['id']] = $mem;
        }

        return $arr;
    }

    function loadById($id){

        $sql = "SELECT * FROM trip WHERE id=?";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $row = $statement->fetch();

            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->dateStart = date("d.m.Y", $row['dateStart']);
            $this->dateEnd = date($row['dateEnd']);
            $this->destination = $row['destination'];
        } else {
            echo "SQL Error <br />";
            echo $statement->queryString . "<br />";
            echo $statement->errorInfo()[2];
        }
    }

    function save()
    {

        $userId = $_SESSION["login"];

        $sql = "INSERT INTO trip (title,dateStart,dateEnd,destination) VALUES (?,?,?,?)";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(1, $this->title, PDO::PARAM_STR);
        $statement->bindParam(2, $this->dateStart, PDO::PARAM_STR);
        $statement->bindParam(3, $this->dateEnd, PDO::PARAM_STR);
        $statement->bindParam(4, $this->destination, PDO::PARAM_STR);

        $statement->execute() or die(print_r($statement->errorInfo(), true));
        $lastId = $this->pdo->lastInsertId();

        $memberTrip = new  MemberTrip();
        $memberTrip->idMember = $userId;
        $memberTrip->idTrip = $lastId;
        $memberTrip->rightLevel = 1;
        $memberTrip->save();

        return $lastId;


    }

}