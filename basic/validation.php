<?php
require("/software/XAMPP/htdocs/RoomRentSystem/basic/dbconnect.php");
if($conn->connect_error){
    die ("somthing wrong with database connection");
}
$error="";
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $confirmpassword=(check($_POST['confirmpassword']));
    if(empty($_POST['firstname'])){
        $error="please enter your first name";
    }
    if(!preg_match("/^[a-zA-z ]*$/",$_POST['firstname'])){
        $error.="invalid firstname format ";
    }
    else{
$firstname=check($_POST['firstname']);}
if(empty($_POST['lastname'])){
    $error.='please enter your lastname';
}
if(!preg_match("/^[a-zA-z ]*$/",$_POST['lastname'])){
    $error.="invalid format ";
}
else{
$lastname=check($_POST['lastname']);}
if(empty($_POST['number'])){
    $error.="please enter your number";
}
if(!preg_match("/^[0-9 ]*$/",$_POST['number'])){
    $error.="invalid number format ";
}
else{
$number=check($_POST['number']);
}
if(empty($_POST['email'])){
    $error.="please enter your email";
}if(!preg_match("/^[a-zA-z 1-9 @ ]*$/",$_POST['email'])){
    $error.="invalid email format";}
else{
$email=check($_POST['email']);
}
if(empty($_POST['gender'])){
    $error.="empty gender not valid";
}
else{
$gender=check($_POST['gender']);
}
if(empty($_POST['password'])){
    $error.="please enter your password";
}
if($confirmpassword!=$_POST['password']){
    $error.="password not matched";
}
else{
$password=check($_POST['password']);
    $hash=password_hash($password,PASSWORD_DEFAULT);
}
}

function check($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>