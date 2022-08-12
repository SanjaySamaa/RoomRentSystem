<?php
$server="localhost";
$dbname="roomrentsystem";
$username="root";
$password="";

$conn = new mysqli($server,$username,$password,$dbname);
if($conn->connect_error){
    die ("somthing wrong with database connection");
}
else{
    $emailexist=false;
$error='';
if($_SERVER["REQUEST_METHOD"]=='POST'){
    function check($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $confirmpassword=(check($_POST['confirmpassword']));

    if(empty($_POST['firstname'])){
        $error="please enter your first name";
    }
    if(strlen($_POST['firstname'])<3){
        $error.="firstname too short";
    }
    if(!preg_match("/^[a-zA-z ]*$/",$_POST['firstname'])){
        $error.="invalid firstname format ";
    }
    else{
$firstname=check($_POST['firstname']);
}
if(empty($_POST['lastname'])){
    $error.='please enter your lastname';
}
if(!preg_match("/^[a-zA-z ]*$/",$_POST['lastname'])){
    $error.="invalid lastname format ";
}
if(strlen($_POST['lastname'])<3){
    $error.="lastname too short";
}
else{
$lastname=check($_POST['lastname']);
}
if(empty($_POST['number'])){
    $error.="please enter your number";
}
if(!preg_match("/^[0-9 ]*$/",$_POST['number'])){
    $error.="invalid number format ";
}
if($_POST['number']<10){
    $error.="number too short";
}
else{
$number=check($_POST['number']);
}
if(empty($_POST['email'])){
    $error.="please enter your email";
}if(!preg_match("/^[a-zA-z 1-9 @ .]*$/",$_POST['email'])){
    $error.="invalid email format";
}
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
if(strlen($_POST['password'])<8){
    $error.="password too short";
}
if($confirmpassword!=$_POST['password']){
    $error.="password not matched";
}
else{
$password=check($_POST['password']);
    $hash=password_hash($password,PASSWORD_DEFAULT);
}



if($error==true){
    echo "<script> alert('$error') </script>";
    header("refresh:0.1;url=../Singup/Signupform.php");
    // echo "<a href='../Singup/Signupform.php'>GO TO Signup PAGE</a>";
}
else{

$existsql="SELECT * FROM `user123` WHERE email='$email'";
$result=$conn->query($existsql);
echo $conn->error;
if( !empty($result)&&$result->num_rows > 0){
   $emailexist=true;
   if($emailexist==true){
    echo "<script>alert('email already exist')</script>";
    // echo "<a href='../Singup/Signupform.php'>GO TO Signup PAGE</a>";
    header("refresh:0.1; url=../Singup/Signupform.php");
// echo "email alreeady exist";
}



}

   else{
        $sql="INSERT INTO `user123` (`firstname`, `lastname`, `number`, `email`, `password`, `doa`,`gender`) VALUES ('$firstname', '$lastname', '$number', '$email', '$hash', current_timestamp(),'$gender')";
        // $result=$conn->query($sql);
   }
        if($conn->query($sql)===true){
            header('refresh:0.1; url=../login/loginform.php');
            echo"<script> alert('regestration sucessfull') </script>";
            // echo "<a href='../login/loginform.php'>GO TO LOGIN PAGE</a>";
        }
    
    
    else{
        header('refresh:0.1; url=../Singup/Signupform.php');
        echo "<script> alert('regestration failed') </script>";
        // echo "<a href='../Singup/Signupform.php'>GO TO Signup PAGE</a>";
      
    }
}

}}


?>