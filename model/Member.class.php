<?php
  class Member{
      
      public $id;
      public $name;
      public $email;
      public $password;
            
      function create($member){
        $sql = "INSERT INTO member ('name','email','password') values(?,?,?)";    
      }
      
      function get($id){
        $sql = "SELECT * FROM member where id=?";   
      }
      
      function getAll(){
        $sql = "SELECT * FROM member"; 
      }
      
      function update(){
        $sql = "UPDATE member set name=?, email=?, password=? where id=?";
      }
      
      function delete(){
          $sql = "DELETE FROM member where id=?";
          
      }
  
  }
?>
