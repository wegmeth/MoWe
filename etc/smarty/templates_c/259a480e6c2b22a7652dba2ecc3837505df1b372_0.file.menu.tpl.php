<?php
/* Smarty version 3.1.30, created on 2017-08-25 15:29:51
  from "C:\xampp\htdocs\view\inc\menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a0264f33d619_71719113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '259a480e6c2b22a7652dba2ecc3837505df1b372' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\inc\\menu.tpl',
      1 => 1503667784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a0264f33d619_71719113 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div>
    <div class="nav-wrapper">
        <ul class="side-nav fixed" id="slide-out">
            <li><a href="index.php#trip/displayList" class="link">Trips</a></li>
            <li><a href="index.php#trip/newTrip" class="link">Neuen Trip planen</a></li>
            <li><a href="index.php#profile/display" class="link">Profil</a></li>
            <li><a href="index.php#impress/display" class="link">Impressum</a></li>
            <li><a href="logout.php" class="link">Abmelden</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</div><?php }
}
