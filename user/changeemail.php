<?php
session_start();

if(!isset($_SESSION['email'])){
    header('location:../login/loginform.php');
}
else{
    $serveremail=$_SESSION['email'];
   if( $_SERVER['REQUEST_METHOD']=='POST'){
       include "../basic/dbconnect.php";
       $email=$_POST['email'];
       $sql="SELECT * FROM `user123` WHERE `email` = '$serveremail'";
       $result=$conn->query($sql);
       $num=$result->num_rows;
       if($num==1){
           while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
       $sql2="UPDATE `user123` SET `email` = '$email' WHERE  `id` = $id";
       $updateemail=$conn->query($sql2);
       if($updateemail===true){
           $_SESSION['email']=$email;
           echo "<script>alert('Email changed')</script>";
        //    echo "<h1><a href='user.php'>Go to user setting</a></h1>";
        header('refresh:0.1;url=user.php'); 
       }
       else{
        echo "<script>alert('failed')</script>";
        // echo "<h1><a href='user.php'>try again</a></h1>";
        header('refresh:0.1;url=user.php'); 
       }
   }}
}}
$conn->close();
?>