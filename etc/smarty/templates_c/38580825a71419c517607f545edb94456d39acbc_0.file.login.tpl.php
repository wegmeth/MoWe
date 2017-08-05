<?php
/* Smarty version 3.1.30, created on 2017-08-05 20:50:34
  from "C:\xampp\htdocs\view\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5986137a427214_31210670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38580825a71419c517607f545edb94456d39acbc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\login.tpl',
      1 => 1501958972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_5986137a427214_31210670 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="center">

    <h1 class="center">Willkommen</h1>
    
    <form action="index.php" method="POST" >
        
        <div class="block">
            <label>Login-Name</label>
            <input type="text" name="login_name" />
        </div>
  
        <div class="block">
            <label>Passwort</label>
            <input type="password" name="password" />
        </div>
        
        <input class="btn-default" type="submit" value="Login" name="send" />
        
        <input type="hidden" value="login" name="action" />
    
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
