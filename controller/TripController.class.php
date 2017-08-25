<?php

include_once "model/Trip.class.php";

class TripController{

    function display(){
        global $smarty;

        return $smarty->fetch("trip_create.tpl");
    }

    function create(){
    	$trip = new Trip();

    	print_r($_POST["data"]);
    	return "sdfsdfsdfsdf";
    }

    function newTrip(){
        global $smarty;

	    return $smarty->fetch("trip_create.tpl");
    }
}

?>