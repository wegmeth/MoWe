<?php
session_start();

require("config.php");
require("model/Member.class.php");

  $err_msg;
  $warn_msg;

  //Überprüfen, ob die Angaben vollständig sind
  $required = array('E-Mail-Adresse', 'Passwort', 'Retype-Passwort', 'Username');
  $error = false;

  foreach($required as $field)
  {
      if(empty($_POST[$field]))
      {
          $error = true;
      }
  }
  if($error)
    $warn_msg = "Alle Felder müssen gefüllt werden.";
  else
  {
  //Benutzer
      $email = $_POST['E-Mail-Adresse'];
      $username = $_POST['Username'];
      $pass = $_POST['Passwort'];
      $pass_retype = $_POST['Retype-Passwort'];
      $hash = password_hash($pass, PASSWORD_DEFAULT);

      if($pass != $pass_retype)
      {
          $err_msg = "Passwort stimmt nicht überein!";
      }
      else
      {
          try {
              $pdo = new PDO( $db_dsn, $db_username, $db_passwrd);

              $statement = $pdo->prepare("INSERT INTO member ('name','email','password') values(?,?,?)");
              $statement->bindParam($username, $email, $hash);
              $statement->execute();

              $conn->close();
              $success_msg = "Submitted data.";


          } catch (PDOException $e){
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
          }


      }
  }

include("register.html");

?>

