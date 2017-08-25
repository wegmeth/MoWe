<?php

require_once("Database.class.php");

class Trip {

	public $title;
	public $dateStart;
	public $dateEnd;
	public $destination;
	private $pdo;

	function __construct() {
		$db = new Database();
		$this->pdo = $db->connect();
	}

	public static function getAll() {
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
			$mem->dateStart = $row['dateStart'];
			$mem->destination = $row['destination'];

			$arr[$row['id']] = $mem;
		}

		return $arr;
	}

	function loadById($id){

		$sql = "SELECT * FROM trip WHERE id=?";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $id, PDO::PARAM_STR);
		$statement->execute();

		$row = $statement->fetch();

		$this->id = $row['id'];
		$this->title = $row['title'];
		$this->dateStart = $row['dateStart'];
		$this->dateEnd = $row['dateEnd'];
		$this->destination = $row['destination'];
	}

	function save() {
		$sql = "INSERT INTO trip (title,dateStart,dateEnd,destination) VALUES (?,?,?,?)";

		$statement = $this->pdo->prepare($sql);

		$statement->bindParam(1, $this->title, PDO::PARAM_STR);
		$statement->bindParam(2, strtotime($this->dateStart), PDO::PARAM_STR);
		$statement->bindParam(3, strtotime($this->dateEnd), PDO::PARAM_STR);
		$statement->bindParam(4, $this->destination, PDO::PARAM_STR);

		if ($statement->execute()) {
			return $this->pdo->lastInsertId();
		} else {
			echo "SQL Error <br />";
			echo $statement->queryString . "<br />";
			echo $statement->errorInfo()[2];
		}
	}

}