<?php

session_start();
if(!isset($_SESSION['email'])){
    header('location:../login/loginform.php');
}

else{
    $email=$_SESSION['email'];
   if( $_SERVER['REQUEST_METHOD']=='POST'){
       include "../basic/dbconnect.php";
       $firstname=$_POST['firstname'];
       $lastname=$_POST['lastname'];
       $sql="SELECT * FROM `user123` WHERE `email` = '$email'";
       $result=$conn->query($sql);
       $num=$result->num_rows;
       if($num==1){
           while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
       $sql2="UPDATE `user123` SET `firstname` = '$firstname' , `lastname` = '$lastname'  WHERE  `id` = $id";
       $updatename=$conn->query($sql2);
       if($updatename===true){
        echo "<script>alert('Name changed')</script>"; 
        // echo "<h1><a href='user.php'>Go to user setting</a></h1>";
        header('refresh:0.1;url=user.php'); 
       }
       else{
        echo"<script>alert('invalid credentials')</script>";
        // echo "<h1><a href='user.php'>TRY AGAIN</a></h1>";
        header('refresh:0.1;url=user.php'); 
       }
   }}
}}
$conn->close();
?>