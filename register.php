<?php
session_start();

require("config.php");
require("model/Member.class.php");

$err_msg;
$warn_msg;

//Überprüfen, ob die Angaben vollständig sind
$required = array('E-Mail-Adresse', 'Passwort', 'Retype-Passwort', 'Username');
$error = false;

foreach ($required as $field) {
	if (empty($_POST[$field])) {
		$error = true;
	}
}
if ($error)
	$warn_msg = "Alle Felder müssen gefüllt werden.";
else {
	$member = new Member();
	$member->name = $_POST['Username'];
	$member->email = $_POST['E-Mail-Adresse'];

	$pass = $_POST['Passwort'];
	$pass_retype = $_POST['Retype-Passwort'];
	$hash = password_hash($pass, PASSWORD_DEFAULT);

	$member->password = $hash;

	if ($pass != $pass_retype) {
		$err_msg = "Passwort stimmt nicht überein!";
	} else {
		$id = $member->save();
		echo $id;
		if($id){
			header("Location: login.php");
			exit;
		}
	}
}

include("register.html");

?>

