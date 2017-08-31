<div class="row">
    <div class="col s12">
        <h1>Profile</h1>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <form action="index.php#profile/update" method="post">
            <div class="block">
                <label for="set-email">E-Mail-Adresse</label>
                <input type="text" class="form-control" id="set-email" placeholder="E-Mail" name="E-Mail-Adresse" value="{$member->email}">
            </div>
            <div class="block">
                <label for="set-username">Gewünschter Username</label>
                <input type="text" class="form-control" id="set-username" placeholder="Username" name="Username" value="{$member->name}">
            </div>
            <div class="block">
                <label for="set-password">Passwort</label>
                <input type="password" class="form-control" id="set-password" placeholder="Passwort" name="Passwort">
            </div>
            <div class="block">
                <label for="retype-passwort">Passwort wiederholen</label>
                <input type="password" class="form-control" id="retype-passwort" placeholder="Passwort wiederholen" name="Retype-Passwort" >
            </div>
            <button type="submit" class="btn-default">Speichern</button>
        </form>
    </div>
</div>