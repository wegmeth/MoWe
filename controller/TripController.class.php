<?php

include_once "model/Trip.class.php";

class TripController{

    function displayList(){
        global $smarty;

		$trips = Trip::getAll();

	    $smarty->assign("trips",$trips);

        return $smarty->fetch("trip_list.tpl");
    }

    function create(){
    	global $smarty;

	    $data = $_POST["data"];

    	$trip = new Trip();
		$trip->destination = $data['destination'];
	    $trip->title = $data['title'];
	    $trip->dateStart = $data['startDate'];
	    $trip->dateEnd = $data['endDate'];

	    $lastId =  $trip->save();

    	return $this->display($lastId);
    }

	function display($id){
		global $smarty;

		$trip =new Trip();
		$trip->loadById($id);

		print_r($trip);

		$smarty->assign("trip",$trip);

		return $smarty->fetch("trip_display.tpl");
	}

    function newTrip(){
        global $smarty;

	    return $smarty->fetch("trip_create.tpl");
    }
}

?>