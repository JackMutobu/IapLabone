<?php
 include "Crud.php";
 include "Authenticate.php";
 class User implements Crud{
     private $user_id;
     private $first_name;
     private $last_name;
     private $city_name;

     private $username;
     private $password;

 
     function __construct($first_name,$last_name, $city_name,$username,$password)
     {
         $this->first_name = $first_name;
         $this->last_name = $last_name;
         $this->city_name = $city_name;
         $this->username = $username;
         $this->password = $password;
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
         $uname = $this->username;
         $this->hashPassword();
         $pass = $this->password;
         $res = mysqli_query($conn,"Insert into tUser(firstname,lastname,userCity,username,password) 
         Values('$fn','$ln','$cn','$uname','$pass')") or
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

     public static function create(){
         $instance = new self("","","","","");
         return $instance;
     }

     public function setUsername($username){
         $this->username = $username;
     }
     public function getUsername()
     {
        return $this->username;
     }
     public function setPassword($password)
     {
        $this->password = $password;
     }
     public function getPassword()
     {
        return $this->password ;
     }
     public function hashPassword(){
         $this->password = password_hash($this->password,PASSWORD_DEFAULT);
     }
     public function isPasswordCorrect(){
         $con = new DBConnector;
         $found = false;
         $res = mysqli_query("Select * from user",$con) or die ("Error".mysqli_errno($con));
         while($row = mysqli_fetch_array($res)){
             if(password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username'])
             {
                 $found = true;
             }
         }
         $con->closeDatabase();
         return $found;
     }
     public function login(){
         if($this->isPasswordCorrect())
         {
             header("Location:private_page.php");
         }
     }
     public function logout(){
         session_start();
         unset($_SESSION['username']);
         session_destroy();
         header("Location:lab1.php");
     }
     public function createUserSession(){
         session_start();
         $_SESSION['username'] = $this->getUsername();
     }
   
 }
?>