<?php

require('etc/smarty/Smarty.class.php');
require('controller/LoginController.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('view');
$smarty->setCompileDir('etc/smarty/templates_c');
$smarty->setCacheDir('etc/smarty/cache');
$smarty->setConfigDir('etc/smarty/configs');

$login = new LoginController();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])){
    $login -> login($_POST["login"]);
}else{
    $login->display();
}

?>