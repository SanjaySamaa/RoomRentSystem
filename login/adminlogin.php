<?php
$adminlogin=false;
if($_SERVER['REQUEST_METHOD']="POST"){
    $server="localhost";
    $dbname="roomrentsystem";
    $username="root";
    $password="";
    
    $conn = new mysqli($server,$username,$password,$dbname);

$email=$_POST['email'];
$password=$_POST['password'];
$sql= "SELECT * FROM `admin` WHERE `email` = '$email'";
$result=$conn->query($sql);
$num=$result->num_rows;
if($num==1){
    while($row=mysqli_fetch_assoc($result)){
if($password==$row['email']){
        $adminlogin=true;
        session_start();
        $_SESSION["adminloggedin"]=true;
        $_SESSION['adminemail']=$email;
        // echo "<script>alert('sucessfull')</script>";
        header("location:../welcome/welcome.php");
    }
    else{
        header('refresh:0.1; url=adminloginform.php');
        echo"<script>alert('invalid credentials')</script>";
        // echo $conn->error;
        // echo "<h1><a href='adminloginform.php'>TRY AGAIN</a></h1>";
        
        // header("location:loginform.php");
    } 
}
    
}
else{
    header('refresh:0.1; url=adminloginform.php');
    echo"<script>alert('invalid credentials')</script>";
}

}
$conn->close();
?>