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

<script src="js/jquery3.2.1.min.js"></script>

</body>
</html>