<?php
session_start();

if(!isset($_SESSION['email'])){
header('location:../login/loginform.php');
}
else{
  
    $email= $_SESSION['email'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
    include "../basic/dbconnect.php";
    $oldpassword=$_POST['oldpassword'];
    $cpassword=$_POST['confirmpassword'];
    $npassword=$_POST['newpassword']; 
    $sql= "SELECT * FROM `user123` WHERE `email` = '$email'";
    $result=$conn->query($sql);
    $num=$result->num_rows;
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
    if(password_verify($oldpassword,$row['password'])){
        $id=$row['id'];
        $hash=password_hash($npassword,PASSWORD_DEFAULT);
        $sql2="UPDATE `user123` SET `password` = '$hash' WHERE `id` = $id";
        $update=$conn->query($sql2);

            echo "<script>alert('sucessfull')</script>";
           
            session_unset();
            session_destroy();
            header("refresh:0.1;url=../login/loginform.php");
        
    
           
     
        }
        else{
            echo"<script>alert('Password not matched')</script>";
            header('refresh:0.1;url=user.php'); 
        //   echo "<h1><a href='user.php'>TRY AGAIN</a></h1>";
            exit;
          
        } 
    }
        
    }
    else{
        echo"<script>alert('invalid credentials')</script>";
        // echo "<h1><a href='user.php'>TRY AGAIN</a></h1>";
        header('refresh:0.1;url=user.php'); 
    
    }
    
    }
}
// $conn->close();

?>