<?php
session_start();
if(!isset($_SESSION['email'])||$_SESSION['adminloggedin']==true){
    echo "<script>alert('Please login to continue')</script>";
    // echo "<b>To login go to <b>"."<a href='inform.ph../login/logp'>Login</a>";
    header('refresh:0.1;url=../login/loginform.php');
}
else{
    $id = $_SESSION['editid'];
    $email=$_SESSION['email'];
    if(isset($_POST['submit'])){
        include "../basic/dbconnect.php";
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category=$_POST['category'];
         
            $image=$_FILES['image'];
           
          
            $filename=$_FILES['image']['name'];
            $filetmpname=$_FILES['image']['tmp_name'];
            $filesize=$_FILES['image']['size'];
            $fileerror=$_FILES['image']['error'];
            $filetype=$_FILES['image']['type'];
            $fileext=explode('.',$filename);
            $fileactualext=strtolower(end($fileext));
            $allowed=array('jpg','jpeg','png');
            if(in_array($fileactualext,$allowed)){
                if($fileerror===0){
                    if($filesize<=2000000){
                        // $filenamenew=uniqid('',true).".".$fileactualext;
                        $filestore='uploads/'.$filename;
                      
                       
                            $sql="UPDATE `rooms` SET `title` = '$title', `image` = '$filestore', `price` = '$price', `description` = '$description', `email` = '$email', `category` = '$category',`book`='available' WHERE `rooms`.`id` = '$id'";
                            
                            if($conn->query($sql)===true){
                                
                                move_uploaded_file($filetmpname,$filestore);
                                header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file upload sucessfull')</script>";
                        // echo "<h1><a href='roomadd.php'>GO TO ROOM ADD SETTING</a></h1>";
                       }
                       else{
                        header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file upload unsucessfull')</script>";
                        // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                        exit;
                       }

                    }
                    else{
                        header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file size too large')</script>";
                        // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                    }

                }
                else{
                    header('refresh:0.1;url=roomadd.php');
                    echo "<script>alert('file has error uploading')</script>";
                    // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                }

            }
            else{
                header('refresh:0.1;url=roomadd.php');
                echo "<script>alert('file type error')</script>";
                // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";

            }
      



    }
    else{
        header('refresh:0.1;url=roomadd.php');
        echo "<script>alert('error')</script>";
    }
}
?>