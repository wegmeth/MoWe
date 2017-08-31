<?php

require_once("Database.class.php");
require_once("MemberTrip.class.php");

class Trip {

    public $id;
    public $title;
    public $dateStart;
    public $dateEnd;

    public $country;
	public $postalcode;
	public $city;


    private $pdo;

    function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    function getMembers() {
        $sql = "SELECT member.* from member, member_trip  WHERE member_trip.id_trip = ? AND member_trip.id_member = member.id ";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(1, $this->id, PDO::PARAM_INT);

        if ($statement->execute()) {

            while ($row = $statement->fetch()) {
                $mem = new Member();
                $mem->id = $row['id'];
                $mem->name = $row['name'];
                $mem->email = $row['email'];
                $mem->password = $row['password'];

                $arr[$row['id']] = $mem;
            }
            return $arr;

        } else {
            echo "SQL Error <br />";
            echo $statement->queryString . "<br />";
            echo $statement->errorInfo()[2];
        }
    }

    public static function getAll() {

        $userId = $_SESSION["login"];

        $sql = "SELECT * FROM trip";

        $db = new Database();
        $pdo = $db->connect();

        $statement = $pdo->prepare($sql);
        $statement->execute();

        $arr = [];

        while ($row = $statement->fetch()) {
	        $trip = new Trip();
	        $trip->id = $row['id'];
	        $trip->title = $row['title'];
	        $trip->dateEnd = $row['dateEnd'];
	        $trip->dateStart = date("d.m.Y", $row['dateStart']);

	        $trip -> postalcode= $row['postalcode'];
	        $trip->city= $row['city'];
	        $trip->country= $row['country'];

            $arr[$row['id']] = $trip;
        }

        return $arr;
    }


    public static function getByUserId() {

        $userId = $_SESSION["login"];

        $sql = "SELECT trip.* FROM trip, member_trip WHERE member_trip.id_trip=trip.id AND member_trip.id_member = ?";

        $db = new Database();
        $pdo = $db->connect();

        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $userId, PDO::PARAM_INT);
        $statement->execute();

        $arr = [];

        while ($row = $statement->fetch()) {
            $trip = new Trip();
            $trip->id = $row['id'];
            $trip->title = $row['title'];
            $trip->dateEnd = $row['dateEnd'];
            $trip->dateStart = date("d.m.Y", $row['dateStart']);

	        $trip -> postalcode= $row['postalcode'];
	        $trip->city= $row['city'];
	        $trip->country= $row['country'];

            $arr[$row['id']] = $trip;
        }

        return $arr;
    }

    function loadById($id) {

        $sql = "SELECT * FROM trip WHERE id=?";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $row = $statement->fetch();

            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->dateStart = date("d.m.Y", $row['dateStart']);
            $this->dateEnd = date($row['dateEnd']);

	        $this -> postalcode= $row['postalcode'];
	        $this->city= $row['city'];
	        $this->country= $row['country'];
        } else {
            echo "SQL Error <br />";
            echo $statement->queryString . "<br />";
            echo $statement->errorInfo()[2];
        }
    }

    function save() {

        $userId = $_SESSION["login"];

        $sql = "INSERT INTO trip (title,dateStart,dateEnd,postalcode,city,country) VALUES (?,?,?,?,?,?)";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(1, $this->title, PDO::PARAM_STR);
        $statement->bindParam(2, $this->dateStart, PDO::PARAM_STR);
        $statement->bindParam(3, $this->dateEnd, PDO::PARAM_STR);

	    $statement->bindParam(4, $this->postalcode, PDO::PARAM_STR);
	    $statement->bindParam(5, $this->city, PDO::PARAM_STR);
	    $statement->bindParam(6, $this->country, PDO::PARAM_STR);

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