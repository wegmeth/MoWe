<?php
  class LoginController{
      
       function login(){
        global $smarty;
        $_SESSION["login"] = 1;

        $ret = array("html" =>  $smarty->fetch("dashboard.tpl"));
        
        return json_encode($ret);;
      }
      
      function showLogin(){
        global $smarty;

        $ret = array("html" =>  $smarty->fetch("login.tpl"));

        return $ret;
      }

      function  logout(){
          session_destroy ();
          return $this->showLogin();
      }
  }
?>
