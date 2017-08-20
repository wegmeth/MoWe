<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

include_once "model/Member.class.php";

class LoginController {

	function login($login) {
		global $smarty;

		$member = new Member();
		$member->email = $login['email'];
		$member->loadMemberbyEmail();

		if(password_verify($login['password'], $member->password)) {
			$_SESSION["login"] = 1;
			header('Location: index.php');
			exit;
		}else{
			header('Location: login.php');
			exit;
		}
	}

	function display() {
		global $smarty;

		$smarty->display("login.tpl");
	}

	function logout() {
		session_destroy();
		header('Location: login.php');
		exit;
	}
}

?>
