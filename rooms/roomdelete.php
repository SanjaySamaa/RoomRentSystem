<?php
session_start();

if(isset($_SESSION['email'])||$_SESSION['adminloggedin']==true){

    if(isset($_POST['delete'])){
        $delete_id=$_POST['delete_id'];
        include "../basic/dbconnect.php";
        $sql="DELETE FROM `rooms` WHERE `rooms`.`id` = '$delete_id'";
        $result=$conn->query($sql);
        if($result===true){   
            header('refresh:0.1;url=manageroom.php');   
        echo "<script>alert('Deletion sucessfull')</script>";
        // echo "<h1><a href='manageroom.php'>GO TO Manage Rooms</a></h1>";
       
        }
        else{

            header('refresh:0.1;url=manageroom.php'); 
            echo "<script>alert('Deletion Failed')</script>";
            // echo "<h1><a href='manageroom.php'>GO TO Manage Rooms</a></h1>";
        }

    }

else{
    header('refresh:0.1;url=manageroom.php'); 
    echo "<script>alert('error')</script>";
}
}
else{
    header('refresh:0.1;url=../login/loginform.php'); 
    echo "<script>alert('you are not logged in')</script>";
                        // echo "<h1><a href='../login/loginform.php'>Login to continue</a></h1>";
}
?>