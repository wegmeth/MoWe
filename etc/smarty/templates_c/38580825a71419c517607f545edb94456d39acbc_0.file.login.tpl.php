<?php
/* Smarty version 3.1.30, created on 2017-08-20 15:11:09
  from "C:\xampp\htdocs\view\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59998a6d439984_94489697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38580825a71419c517607f545edb94456d39acbc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\login.tpl',
      1 => 1503234666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59998a6d439984_94489697 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Holliday</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<div class="center">

    <h1 class="center">Willkommen</h1>
    
    <form action="login.php" method="POST" >
        
        <div class="block">
            <label>Login-Name</label>
            <input type="text" name="login[email]">
        </div>
  
        <div class="block">
            <label>Passwort</label>
            <input type="password" name="login[password]">
        </div>
        
        <input class="btn-default" type="submit" value="Login" name="send" />
    
    </form>
    <p>oder klick <a href="register.php">hier</a> um die zu registrieren.</p>
</div>

<?php echo '<script'; ?>
 src="js/jquery3.2.1.min.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
