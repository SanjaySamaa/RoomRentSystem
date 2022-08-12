<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roomclass.css">
    <title>Room Rent System</title>
    <style>
        .container{
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}
body{
    margin: 0;
    padding: 0;
}
.room-menu{
    background-color: #ececec;
    padding: 2% 0;
}
.room-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
    border: 2px solid rgb(17, 2, 2);
}

.room-menu-img{
    width: 25%;
    float: left;
}

.room-menu-desc{
    /* min-height: 70%; */
    width: 50%;
    float: right;
    margin-left: 8%;
}

.room-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.room-detail{
    font-size: 1rem;
    color: #747d8c;
}
.img-responsive{
    width: 100%;
}
.img-curve{
    border-radius: 15px;
}
.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    text-decoration: none;
}
.btn-primary{
    background-color: #b4848b;
    color: white;
    cursor: pointer;
}
.btn-primary:hover{
    color: white;
    background-color: #493537;
}
.img{
   width: 15vw;
    height: 25vh;
}
    </style>
</head>
<body>
    <?php
    include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
    include "../basic/dbconnect.php";
    $sql="SELECT * FROM `rooms` WHERE `book`='available'";
    $result=$conn->query($sql);
    ?>
    <section class="room-menu">
        <div class="container">
            <h2 class="text-center">Room Rent System</h2>

            <?php
                while($row=mysqli_fetch_assoc($result))
                {
                    ?> 
                    
                    <div class='room-menu-box'> 
                <div class='room-menu-img'>
                    <img src="<?php echo "../rooms/".$row['image']; ?>" alt='room image error' class='img-responsive img img-curve' >
                </div>
                <div class='room-menu-desc'>
                    <h4><?php echo $row['title']; ?></h4>
                    <p class='room-price'><?php echo $row['price'];?> rs</p>
                    <p class='room-detail'>
                    <?php echo $row['description'] ;?>   
                    </p>
                    <p class="book"><?php echo $row['book']?></p>
                    <br>
                    <form action="../book/book.php" method="post">
                    <input type="hidden" name="book_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="book" value="book" class="btn btn-primary">
                </form>
                    </div>
                    </div>
                <?php
            }
            ?>
          
            <!-- <div class="clearfix"></div> -->
        </div>

</body>
</html>