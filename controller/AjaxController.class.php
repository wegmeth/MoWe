<?php

include_once "model/Member.class.php";
include_once "model/Trip.class.php";
include_once "model/Request.class.php";
include_once "model/MemberTrip.class.php";
include_once "TripController.class.php";

class AjaxController{

	function requestMember(){
		global $smarty;

		$mem = new Member();
		$mem->email = $_POST['email'];

		$mem->loadMemberbyEmail();

		$ret = new Request();

		if(!empty($mem->id)){

			$trip = new Trip();
			$trip->id = $_POST["id"];
			$members = $trip->getMembers();

			foreach ($members as $value){
				if($value->id == $mem ->id){
					$ret -> error ="Benutzer bereits Mitglied";
					return json_encode($ret);
				}
			}

			$ret->object= $mem;

			$mt = new MemberTrip();

			$mt->idMember = $mem->id;
			$mt-> idTrip = $_POST["id"];
			$mt->rightLevel = 1;
			$mt->save();

			$ret -> error ="";

		}else{
			$ret->object= "";
			$ret->error = "Benutzer nicht gefunden!";
		}

		$tc = new TripController();
		$html = $tc->display($_POST["id"]);

		$ret ->html =
			"<div class='card_margin col s2 card-panel green darken-1'>".
                "<div class='member-card''>".
			$mem->name.
                "</div>".
            "</div>";

		return json_encode($ret);
	}

}