<?php
/* Smarty version 3.1.30, created on 2017-08-25 16:07:29
  from "C:\xampp\htdocs\view\trip_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a02f21c57c35_59727901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0f276cb5eddaabb9fb0f5f64aa3099fcf34d258' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\trip_list.tpl',
      1 => 1503670048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a02f21c57c35_59727901 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h1>Geplante Trips</h1>
    <div class="row">
        <div col s12>
            <table class="highlight centered striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Ziel</th>
                    <th>Start am</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trips']->value, 'trip');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['trip']->value) {
?>
                    <tr>
                        <td><a class="link" href="#trip/display/<?php echo $_smarty_tpl->tpl_vars['trip']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['trip']->value->title;?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['trip']->value->destination;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['trip']->value->dateStart;?>
</td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
        </div>
    </div>
</div><?php }
}
