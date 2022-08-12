<?php  
require("/software/XAMPP/htdocs/RoomRentSystem/basic/validation.php");
if($error){
    echo "<script> alert($error) </script>";
}
else{

$existsql="SELECT FROM `user123` WHERE email='$email'";
$result=$conn->query($existsql);
if($result->num_rows>0){
echo "<script> alert('email already exist') </script>";


}

   else{
        $sql="INSERT INTO `user123` (`firstname`, `lastname`, `number`, `email`, `password`, `doa`,`gender`) VALUES ('$firstname', '$lastname', '$number', '$email', '$password', current_timestamp(),'$gender')";
        // $result=$conn->query($sql);
   }
        if($conn->query($sql)===true){
            echo"<script> alert('regestration sucessfull') </script>";
        }
    
    
    else{
        echo "<script> alert('regestration failed') </script>";
        // header("/Singup/Singupform.php");
        echo $conn->connect_error;
    }
}

?>