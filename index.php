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

if (isset($_POST["action"]) && isset($_POST["namespace"])) {
    $action = $_POST["action"];
    $ns = $_POST["namespace"];
} else {
    $ns = "login";
    $action = "showLogin";
}

if (isset($_SESSION["login"])) {

    $class = ucfirst($ns)."Controller";
    $object = new $class();

    $output = call_user_func_array(array($object, $action), $_POST);

    if (!isset($_POST["ajax"])) {
        $header = $smarty->fetch("inc/header.tpl");
        $menu = $smarty->fetch("inc/menu.tpl");
        $footer = $smarty->fetch("inc/footer.tpl");

        $output = $header . $menu . $output . $footer;
    }

} else {
    $login = new LoginController();

    if ($action == "login") {
        $output = $login->login();
        $header = $smarty->fetch("inc/header.tpl");
        $menu = $smarty->fetch("inc/menu.tpl");
        $footer = $smarty->fetch("inc/footer.tpl");

        $output = $header . $menu . $output . $footer;
    } else {
        $output = $login->showLogin();
    }

}

echo $output;

?>