<?php

include_once "model/Trip.class.php";
include_once "model/MemberTrip.class.php";

class TripController {

	function displayList() {
		global $smarty;

		$trips = Trip::getByUserId();
		$smarty->assign("trips", $trips);

		return $smarty->fetch("trip_list.tpl");
	}

	function create() {
		global $smarty;

		$data = $_POST["data"];

		$trip = new Trip();

		$trip->postalcode = $data['postalcode'];
		$trip->city = $data['city'];
		$trip->country = $data['country'];
		$trip->title = $data['title'];

		if (!empty($data['startDate'])) {
			$tmp = DateTime::createFromFormat("d.m.Y", $data['startDate']);
			$trip->dateStart = $tmp->getTimestamp();
		}

		if (!empty($data['endDate'])) {
			$tmp = DateTime::createFromFormat("d.m.Y", $data['endDate']);
			$trip->dateEnd = $tmp->getTimestamp();
		}
		$lastId = $trip->save();

		return $this->display($lastId);
	}

	function display($id = -1) {
		global $smarty;

		if (!is_numeric($id)) {
			$id = $_POST["id"];
		}

		$trip = new Trip();
		$trip->loadById($id);
		$smarty->assign("trip", $trip);

		$members = $trip->getMembers();
		$smarty->assign("members", $members);

		return $smarty->fetch("trip_display.tpl");
	}

	function newTrip() {
		global $smarty;

		return $smarty->fetch("trip_create.tpl");
	}
}

?>