<?php
/* Smarty version 3.1.30, created on 2017-08-25 11:43:05
  from "C:\xampp\htdocs\view\inc\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599ff1293b5ed7_92010696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df686448f27536ed77073ec5fffd9fb6ee31386f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\inc\\footer.tpl',
      1 => 1503654183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599ff1293b5ed7_92010696 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="content" class="container"></div>
<?php echo '<script'; ?>
 src="js/jquery3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/navigation.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('.button-collapse').sideNav({
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
