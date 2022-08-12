
<?php
session_start();

if(!isset($_SESSION['email'])){
    header('location:../login/loginform.php');
}
else{
    $serveremail=$_SESSION['email'];
   if( $_SERVER['REQUEST_METHOD']=='POST'){
    include "../basic/dbconnect.php";
       include "../basic/roomdbconnect.php";
       $email=$_POST['email'];
       $sql="SELECT * FROM `rooms` WHERE `email` = '$serveremail'";
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
           echo "<h1><a href='user.php'>Go to user setting</a></h1>";
       }
       else{
        echo "<script>alert('failed')</script>";
        echo "<h1><a href='user.php'>try again</a></h1>";
       }
   }}
}}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../user/user.css">
</head>
<body>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
?>
</body>
<footer>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/footer/footer.php")
    ?>
</footer>
</html>