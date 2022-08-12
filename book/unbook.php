<?php
session_start();
if(isset($_SESSION['email'])||$_SESSION['adminloggedin']==true){
include "../basic/dbconnect.php";
$unbookid=$_POST['unbook_id'];
$sql1="SELECT * FROM rooms WHERE id=$unbookid";
$result=$conn->query($sql1);
// $num=$result->num_rows;
// if($num>1){
    while($row=mysqli_fetch_assoc($result)){
        $book=$row['book'];
        
    }

// }
// else{
//     echo "<script>alert('no data found')</script>";
    
// }
if($book=="available"){
    echo "<script>alert('not booked yet')</script>";
}
else{

$sql="UPDATE `rooms` SET `book` = 'available' WHERE `rooms`.`id` = '$unbookid'";
$result=$conn->query($sql);}
if($result===true){
    header('refresh:0.1; url=../basic/index.php');
    echo "<script>alert('unbook successfull')</script>";
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";
}
else{
    header('refresh:0.1; url=../basic/index.php');
    echo "<script>alert('unbook unsuccessfull')</script>";
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";
}
}
else{
    header('refresh:0.1; url=../catagory/catagory.php');
    echo "<script>alert('Please Login')</script>";
    // echo "<h1><a href='../catagory/catagory.php'>GO TO Category</a></h1>";

}
?>