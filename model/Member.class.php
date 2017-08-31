<?php

require_once("config.php");
require_once("Database.class.php");

class Member {

    public $id;
	public $name;
	public $email;
	public $password;
	private $pdo;

	function __construct() {
		$db = new Database();
		$this->pdo = $db->connect();
	}

	function loadMemberbyEmail(){
		$sql = "SELECT * FROM member where email=?";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $this->email, PDO::PARAM_STR);
		$statement->execute();

		$row = $statement->fetch();

		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->password = $row['password'];
	}

	function save() {
		$sql = "INSERT INTO member (name,email,password) VALUES (?,?,?)";

		$statement = $this->pdo->prepare($sql);

		$statement->bindParam(1, $this->name, PDO::PARAM_STR);
		$statement->bindParam(2, $this->email, PDO::PARAM_STR);
		$statement->bindParam(3, $this->password, PDO::PARAM_STR);

		if ($statement->execute()) {
			return $this->pdo->lastInsertId();
		} else {
			echo "SQL Error <br />";
			echo $statement->queryString . "<br />";
			echo $statement->errorInfo()[2];
		}
	}

	function load($id) {
		$sql = "SELECT * FROM member where id=?";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $id, PDO::PARAM_STR);
		$statement->execute();

		$row = $statement->fetch();
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->password = $row['password'];
	}

	function getAll() {
		$sql = "SELECT * FROM member";

		$statement = $this->pdo->prepare($sql);
		$statement->execute();

		$arr = [];

		while ($row = $statement->fetch()) {
			$mem = new Member();
			$mem->id = $row['id'];
			$mem->email = $row['email'];
			$mem->password = $row['password'];
			$mem->name = $row['name'];

			$arr[$row['id']] = $mem;
		}

		return $arr;
	}

	function update() {
		$sql = "UPDATE member set name=?, email=?, password=? where id=?";

		$statement = $this->pdo->prepare($sql);

		$statement->bindParam(1, $this->name, PDO::PARAM_STR);
		$statement->bindParam(2, $this->email, PDO::PARAM_STR);
		$statement->bindParam(3, $this->password, PDO::PARAM_STR);
		$statement->bindParam(4, $this->id, PDO::PARAM_STR);

		$statement->execute();
	}

	function delete() {
		$sql = "DELETE FROM member where id=?";

		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $this->id, PDO::PARAM_STR);
		$statement->execute();
	}
}

?>
