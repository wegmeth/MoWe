<?php
/* Smarty version 3.1.30, created on 2017-08-05 20:44:42
  from "C:\xampp\htdocs\view\dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5986121aaf2928_39303566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91c0209414609aa08249c24566e2efdd124fa1c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\dashboard.tpl',
      1 => 1501958590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/menu.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_5986121aaf2928_39303566 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:inc/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main class="content">
    Hallo Dashboard
</main>

<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
