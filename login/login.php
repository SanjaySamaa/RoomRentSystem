<?php
$login=false;
if($_SERVER['REQUEST_METHOD']="POST"){
    $server="localhost";
    $dbname="roomrentsystem";
    $username="root";
    $password="";
    
    $conn = new mysqli($server,$username,$password,$dbname);

$email=$_POST['email'];
$password=$_POST['password'];
$sql= "SELECT * FROM `user123` WHERE `email` = '$email'";
$result=$conn->query($sql);
$num=$result->num_rows;
if($num==1){
    while($row=mysqli_fetch_assoc($result)){
if(password_verify($password,$row['password'])){
        $login=true;
        session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION['email']=$email;
        echo "<script>alert('sucessfull')</script>";
        header("location:../basic/index.php");
    }
    else{
        header('refresh:0.1; url=../login/loginform.php');
        echo"<script>alert('Password not matched')</script>";
      
    //   echo "<h1><a href='loginform.php'>TRY AGAIN</a></h1>";
        exit;
      
    } 
}
    
}
else{
    header('refresh:0.1; url=../login/loginform.php');
    echo"<script>alert('invalid credentials')</script>";
    // echo "<h1><a href='loginform.php'>TRY AGAIN</a></h1>";
}

}
$conn->close();
?>