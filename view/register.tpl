<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Urlaubsplaner - Registrierung</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="center">
    <div class="page-header">
        <h1>Registrierung</h1>
    </div>
</div>

<div class="center">
    <h2 class ="center">Persönliche Daten</h2>
    <form action="register.php" method="post">
        <div class="block">
            <label for="set-email">E-Mail-Adresse</label>
            <input type="text" class="form-control" id="set-email" placeholder="E-Mail" name="E-Mail-Adresse">
        </div>
        <div class="block">
            <label for="set-username">Gewünschter Username</label>
            <input type="text" class="form-control" id="set-username" placeholder="Username" name="Username">
        </div>
        <div class="block">
            <label for="set-password">Passwort</label>
            <input type="password" class="form-control" id="set-password" placeholder="Passwort" name="Passwort">
        </div>
        <div class="block">
            <label for="retype-passwort">Passwort wiederholen</label>
            <input type="password" class="form-control" id="retype-passwort" placeholder="Passwort wiederholen" name="Retype-Passwort">
        </div>
        <button type="submit" class="btn-default">Registrieren</button>
    </form>
</div>
</body>
</html>