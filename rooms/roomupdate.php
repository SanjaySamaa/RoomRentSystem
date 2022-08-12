
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
      background-color: white;
}
.form{
    width: 60vw;
    height: 70vh;
    background-color: rgb(245, 245, 245);
    border: 2px solid black;
    border-radius: 20px;
    padding: 1%;

    
    text-align: center;
    margin: 5% auto;
}

form .category-3 .category{
    display: flex;
    width: 60%;
   margin: 14px auto;
    justify-content: space-between;
}
.category-3 .category label{
display: flex;
align-items: center;
}
.category-3 .category .dot{
    height: 18px;
    width:18px;
    background:#f3eded;
    border-radius: 50%;
    margin-right: 10px;
    border: 5px solid transparent;
    transition: all 0.3s ease;

}
#one:checked ~ .category label .one,
#two:checked ~ .category label .two,
#three:checked ~ .category label .three{
    border-color:blue;
    background:rgb(13, 11, 11);
}
form input[type="radio"]{
    display:none;
}
.title{
margin-left: -10%;
margin-bottom: 1%;
}
.image{
    margin-bottom: 1%;
}
.price{
    margin-left: -10%;
    margin-bottom: 1%;
}
.description{
    margin-left: -1%;
}
.category-3{
    margin-top: 1%;
    margin-left: 5%;
}
.heading{
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 1%;
}
form label{
    font-size: 15px;
    font-weight: bold;
}
.submit{
    padding: 10px;
    font-weight: bold;
}
.gendertitle{
    font-size: 15px;
    font-weight: bold;
}
    </style>
    
<?php

include "../nav/nav.php";
if(isset($_SESSION['email'])||$_SESSION['adminloggedin']== true){
    $_SESSION['editid']=$_POST['edit_id'];
    $editid=$_POST['edit_id'];
    include "../basic/dbconnect.php";
    $sql="SELECT * FROM `rooms` WHERE `id`='$editid'";
// $sql="SELECT * FROM `rooms` WHERE id='43'";
// $sql="SELECT * FROM `rooms` WHERE `id`=$editid";
$result=$conn->query($sql);
while($row=mysqli_fetch_assoc($result)){
    $title=$row['title'];
    $image=$row['image'];
    $desc=$row['description'];
    $price=$row['price'];
}
?>
</head>
<body>     
  <div class="form">
<div class="heading">Update Room</div>
    <form method="post" action="roomupdatebackend.php"  enctype="multipart/form-data" >
            <div class="title">
            <label for="title">Title:</label>
            <input type="text" class="ititle" name="title" required value="<?php if($title){ echo $title;} else{"";} ?>">
        </div>
        <div class="image">
            <label for="image">Image:</label>
            <input type="file" name="image" class="iimage" required value="<?php if($image){ echo $image;} else{"";} ?>">
        </div>
        <div class="price">
            <label for="price">Price Rs:</label>
            <input type="text" name="price"class="iprice" required value="<?php if($price){ echo $price;} else{"";} ?>">
        </div>
      
        <div class="description">
            <label for="description">Description:</label>
            <textarea name="description" class="idescription" rows="5" cols="40"><?php if($desc){ echo $desc;} else{"";} ?></textarea>
        </div>
        <div class="category-3">
            <label for="category"></label>
            <input type="radio" name="category" value="highclass" id="one" checked>
            <input type="radio" name="category" value="middleclass" id="two">
            <input type="radio" name="category" value="lowclass" id="three">
            <span class="gendertitle"> Room Class</span>
            <div class="category">

                <label for="one">
                    <span class="dot one"></span>
                    <span class="category">HighClass</span>
                </label>
                <label for="two">
                    <span class="dot two"></span>
                    <span class="category">MiddleClass</span>
                </label>
                <label for="three">
                    <span class="dot three"></span>
                    <span class="category">LowClass</span>
                </label>
            </div>
        </div>
        <input type="submit" value="submit" name="submit" class="submit">

            </form>
        </div>
<?php }
else{
    echo "<script>alert('Please login to continue')</script>";
    // echo "<b>To login go to <b>"."<a href='../login/loginform.php'>Login</a>";
    header('refresh:0.1;url=../login/loginform.php'); 


}?>
</body>
</html>