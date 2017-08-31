<?php

include_once "model/Trip.class.php";

class ProfileController{
    function display(){
        global $smarty;

        $userId = $_SESSION["login"];
        $member = new Member();
        $member->load($userId);

        $smarty->assign("member", $member);

        return $smarty->fetch("profile.tpl");
    }

    function update(){
        $data = $_POST["data"];

        $userId = $_SESSION["login"];
        $member = new Member();
        $member->load($userId);

        $member->name = $data['Username'];
        $member->email = $data['E-Mail-Adresse'];

        if(!empty($data['Passwort'])){
            if($data['Passwort'] == $data['Retype-Passwort']){
                $pass = $data['Passwort'];
                $pass_retype = $data['Retype-Passwort'];

                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $member->password = $hash;
            }
        }

        $member->update();
    }
}