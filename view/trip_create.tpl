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
                    <input placeholder="Titel" name="title" type="text" class="validate">
                    <label>Titel</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Los am" name="startDate" type="text" class="validate datepicker">
                    <label>Es geht los am</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Zurück am" name="endDate" type="text" class="validate datepicker">
                    <label for="first_name">Zurück am</label>
                </div>
                <div class="input-field col s4">
                    <input placeholder="Wo geht es hin?" name="destination" type="text" class="validate">
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
<script>

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Heute',
        format: 'dd.mm.yyyy',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });

</script>
