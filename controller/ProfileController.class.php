<?php
/**
 * Created by PhpStorm.
 * User: Jan Wegmeth
 * Date: 07.08.2017
 * Time: 23:08
 */

class ProfileController{
    function show(){

        return "profil";
    }

    function create($data){

        $email = $data['E-Mail-Adresse'];
        $username = $data['Username'];
        $pass = $data['Passwort'];
        $pass_retype = $data['Retype-Passwort'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);

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