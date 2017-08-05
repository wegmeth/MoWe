{include file='inc/header.tpl'}

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

{include file='inc/footer.tpl'}