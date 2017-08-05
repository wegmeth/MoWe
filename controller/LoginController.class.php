<?php
  class LoginController{
      
       function login(){
        global $smarty;
        
        return $smarty->fetch("dashboard.tpl");
      }
      
      function show(){
        global $smarty;
        
        return $smarty->fetch("login.tpl");
      }
      
  }
?>
