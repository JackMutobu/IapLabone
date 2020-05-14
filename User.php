<?php
 include "Crud.php";
 class User implements Crud{
     private $user_id;
     private $first_name;
     private $last_name;
     private $city_name;

     function __construct($first_name,$last_name, $city_name)
     {
         $this->first_name = $first_name;
         $this->last_name = $last_name;
         $this->city_name = $city_name;
     }
     public function setUserId($user_id)
     {
         $this->user_id = $user_id;
     }
     public function getUserId()
     {
         return $this->user_id;
     }
     public function save($conn){
         $fn = $this->first_name;
         $ln = $this->last_name;
         $cn = $this->city_name;
         $res = mysqli_query($conn,"Insert into tUser(firstname,lastname,userCity) 
         Values('$fn','$ln','$cn')") or
         die("An error occured" . mysqli_error($conn));;
        return $res;
     }

     public function readAll($conn)
     {
         $query = mysqli_query($conn,"Select * from tUser");
         return mysqli_fetch_assoc($query);
     }
     public function readUnique($conn, $id)
     {
         return null;
     }
     public function search($conn, $query)
     {
         return null;
     }
     public function update($conn, $id)
     {
         return null;
     }
     public function removeOne($conn, $id)
     {
         return null;
     }
     public function removeAll($conn)
     {
         return null;
     }
     public function validateForm(){
         $fn = $this->first_name;
         $ln = $this->last_name;
         $city = $this->city_name;
         if($fn == "" || $ln == "" || $city = "")
         {
             return false;
         }
         return true;
     }
     public function createFromErrorsSessions(){
         session_start();
         $_SESSION['form_errors'] = "All fields are required";
     }
 }
?>