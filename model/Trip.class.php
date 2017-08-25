<?php

require_once("Database.class.php");

class Trip {

	public $title;
	public $startDate;
	public $endDate;
	public $destination;
	private $pdo;

	function __construct() {
		$db = new Database();
		$this->pdo = $db->connect();
	}

	function save() {
		$sql = "INSERT INTO trip (title,dateStart,dateEnd,destination) VALUES (?,?,?,?)";

		$statement = $this->pdo->prepare($sql);

		$statement->bindParam(1, $this->title, PDO::PARAM_STR);
		$statement->bindParam(2, $this->startDate, PDO::PARAM_STR);
		$statement->bindParam(3, $this->endDate, PDO::PARAM_STR);
		$statement->bindParam(3, $this->destination, PDO::PARAM_STR);

		if ($statement->execute()) {
			return $this->pdo->lastInsertId();
		} else {
			echo "SQL Error <br />";
			echo $statement->queryString . "<br />";
			echo $statement->errorInfo()[2];
		}
	}

}