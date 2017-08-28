<?php session_start();

require('etc/smarty/Smarty.class.php');

require('controller/LoginController.class.php');
require('controller/TripController.class.php');
require('controller/ProfileController.class.php');
require('controller/ImpressController.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('view');
$smarty->setCompileDir('etc/smarty/templates_c');
$smarty->setCacheDir('etc/smarty/cache');
$smarty->setConfigDir('etc/smarty/configs');

$header = $smarty->fetch("inc/header.tpl");
$footer = $smarty->fetch("inc/footer.tpl");

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST["action"]) && isset($_POST["namespace"])) {

    $action = $_POST["action"];
    $ns = $_POST["namespace"];

    $class = ucfirst($ns)."Controller";
    $object = new $class();

    $output = call_user_func_array(array($object, $action), $_POST);

    if (!isset($_POST["ajax"])) {
        $output = $header . $output . $footer;
    }

} else {
    $output = $smarty->fetch("dashboard.tpl");
    $output = $header .  $output . $footer;
}

echo $output;

?>