<?php
  class LoginController{
      
       function login(){
        global $smarty;
        $_SESSION["login"] = 1;
        
        return $smarty->fetch("dashboard.tpl");
      }
      
      function show(){
        global $smarty;
        
        return $smarty->fetch("login.tpl");
      }
      
  }
?>
