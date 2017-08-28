<?php

include_once "model/Trip.class.php";

class TripController{

    function displayList(){
        global $smarty;

		$trips = Trip::getByUserId();
	    $smarty->assign("trips",$trips);

        return $smarty->fetch("trip_list.tpl");
    }

    function create(){
    	global $smarty;

	    $data = $_POST["data"];

    	$trip = new Trip();
		$trip->destination = $data['destination'];
	    $trip->title = $data['title'];

        $tmp = DateTime::createFromFormat("d.m.Y",  $data['startDate']);
	    $trip->dateStart = $tmp->getTimestamp();

        $tmp = DateTime::createFromFormat("d.m.Y",$data['endDate']);
	    $trip->dateEnd = $tmp->getTimestamp();

	    $lastId =  $trip->save();

    	return $this->display($lastId);
    }

	function display($id = -1){
        global $smarty;

        if(!is_numeric($id)){
            $id= $_POST["id"];
        }

		$trip =new Trip();
		$trip->loadById($id);

		$smarty->assign("trip",$trip);

		return $smarty->fetch("trip_display.tpl");
	}

    function newTrip(){
        global $smarty;

	    return $smarty->fetch("trip_create.tpl");
    }
}

?>