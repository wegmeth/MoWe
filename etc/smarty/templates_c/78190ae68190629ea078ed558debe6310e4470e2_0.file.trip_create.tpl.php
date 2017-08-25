<?php
/* Smarty version 3.1.30, created on 2017-08-25 13:11:55
  from "C:\xampp\htdocs\view\trip_create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a005fbd2e810_82660492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78190ae68190629ea078ed558debe6310e4470e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\view\\trip_create.tpl',
      1 => 1503659392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a005fbd2e810_82660492 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>Neuer Trip</h1>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <form action="index.php#trip/create" method="POST">
                <div class="input-field col s12">
                    <input placeholder="Titel" name="trip[title]" type="text" class="validate">
                    <label>Titel</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Los am" name="trip[startDate]" type="text" class="validate datepicker">
                    <label>Es geht los am</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Zurück am" name="trip[endDate]" type="text" class="validate datepicker">
                    <label for="first_name">Zurück am</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Wo geht es hin?" name="trip[destination]" type="text" class="validate">
                    <label for="dest">Wo geht es hin?</label>
                </div>
                <div id="mapdiv" class="col s8"></div>
                <div class="input-field col s12">
                    <input value="Erstellen" id="endDate" type="submit"  class="waves-effect waves-light btn">
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Heute',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });

<?php echo '</script'; ?>
>
<?php }
}
