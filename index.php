<?php 

require('etc/smarty/Smarty.class.php');
require('controller/LoginController.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('view');
$smarty->setCompileDir('etc/smarty/templates_c');
$smarty->setCacheDir('etc/smarty/cache');
$smarty->setConfigDir('etc/smarty/configs');

session_start();

if(isset($_POST["action"])){
    $action =  $_POST["action"];
}else{
    $action =  "showLogin";
}

if(isset($_SESSION["login"]) AND  $action !=  "showLogin"){
    
    
}else{

    $login = new LoginController();
    
    if($action == "login"){
        $output = $login->login();   
    }else{
        $output = $login->show();
    }
}

echo $output;

 ?>