<?php
//we write the login codes here
include_once  'DBConnector.php';
include_once  'user.php';
$con  = new  DBConnector;/*Connect  to database*/
if(isset($_POST['btn-login'])){
    $username  = $_POST['username'];
    $password  = $_POSI['password'];
    $instance  =  User::create();
    $instance->setPassword($password);
    $instance->setUsername($username);
    if($instance->isPasswordCorrect()){
        $instance  ->login();
        //clode  database connection
        $con->closeDatabase();
        //next  create a user sesssion
        $instance->createUserSession();
}else{
    $con->closeDatabase();
    header("Location:login.php");
}
}
?>
<html>
<head>
    <title>Login</title>
    <script  type="text/javascript" src="validate.js"></script>
    <link  rel="stylesheet" type="text/css" href="validate.css"›
</head>
<body>
<!---'=$_SERVER('PHP_SELVP means that we are submitting this form to itself for processing-->
    <form  method="post" name="login"  id="login"  action="<?=$_SERVER['PHP_SELF']?>">
<table align="center"›
<tr>
    <td><input type="text"  name="username"  placeholder="Username"  reguired/></td>
</tr>
<tr>
    <td><input  type="password" name="password"  placeholder="Password"  reguired/></td>
</tr>
<tr>
    <td><button  type="submit"  name="btn-login"><strong>LOGIN</strong></button></td>
</tr>
</table>
</form>
</body>