<?php
session_start();
if(!isset($_SESSION['email'])&&!isset($_SESSION['adminemail'])){
    echo "<script>alert('Please login to continue')</script>";
    // echo "<b>To login go to <b>"."<a href='../login/loginform.php'>Login</a>";
    header('refresh:0.1;url=../login/loginform.php');
}
else{
    if(isset($_POST['submit'])||isset($_SESSION['adminemail'])){
        $email=$_SESSION['email'];
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
                      
                        // if(file_exists($filestore)){
                        //    echo "<script>alert('file name already exist')</script>";
                        //    echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";

                        // } else{
                            $sql= "INSERT INTO `rooms` ( `title`, `image`, `price`, `description`, `email`,  `category`,`book`) VALUES ( '$title', '$filestore', '$price', '$description', '$email','$category','available')";
                            
                            
                            if($conn->query($sql)===true){
                                
                                move_uploaded_file($filetmpname,$filestore);
                        // echo "<script>alert('file upload sucessfull')</script>";
                        // echo "<h1><a href='roomadd.php'>GO TO ROOM ADD SETTING</a></h1>";
                        header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file upload sucessfull')</script>";
                       }
                       else{
                        // echo "<script>alert('file upload unsucessfull')</script>";
                        // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                        header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file upload unsucessfull size limit crossed')</script>";
                        exit;
                    //    }
                    }

                    }
                    else{
                        // echo "<script>alert('file size too large')</script>";
                        // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                        header('refresh:0.1;url=roomadd.php');
                        echo "<script>alert('file size too large')</script>";
                    }

                }
                else{
                    // echo "<script>alert('file has error uploading')</script>";
                    // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                    header('refresh:0.1;url=roomadd.php');
                    echo "<script>alert('file has error uploading')</script>";
                    
                }

            }
            else{
                // echo "<script>alert('file type error')</script>";
                // echo "<h1><a href='roomadd.php'>TRY AGAIN</a></h1>";
                header('refresh:0.1;url=roomadd.php');
                echo "<script>alert('file type error ')</script>";


            }
      



    }
    else{
        header('refresh:0.1;url=roomadd.php');
        echo "<script>alert('error')</script>";
    }
}
?>