<?php
session_start();
if(isset($_SESSION['email'])||$_SESSION['adminloggedin']==true){
   session_unset();
   session_destroy();
   header("location:../login/loginform.php");
}
else{
    header('referesh:5; url=../login/loginform.php');
    echo "<script>alert('Please login to continue')</script>";
    // echo "<b>To login go to <b>"."<a href='../login/loginform.php'>Login</a>";
}
?>