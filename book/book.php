<?php
session_start();
if(isset($_SESSION['email'])){
    if(isset($_POST['book'])){
        $bookemail=$_SESSION['email'];
        $_SESSION['bookemail']=$bookemail;

include "../basic/dbconnect.php";
$bookid=$_POST['book_id'];
$sql="UPDATE `rooms` SET `book` = 'booked', `booked_email`='$bookemail' WHERE `rooms`.`id` = '$bookid'";
$result=$conn->query($sql);
if($result===true){
    header('refresh:0.1;url=../catagory/catagory.php');
    echo "<script>alert('booking sucessfull')</script>";
    // header(location:/catagory/catagory.php);
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";
}
else{
    header('refresh:0.1;url=../catagory/catagory.php');
    echo "<script>alert('booking unsucessfull')</script>";
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";
}}
else{
    header('refresh:0.1;url=../catagory/catagory.php');
    echo "<script>alert('unsucessfull')</script>";
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";
}
}
else{
    header('refresh:0.1;url=../catagory/catagory.php');
    echo "<script>alert(' please login first')</script>";
    // echo "<h1><a href='../login/loginform.php'>GO TO login</a></h1>";
}


?>