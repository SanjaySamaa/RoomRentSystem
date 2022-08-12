<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="roomclass.css">
    <title>MediumClassRooms</title>
</head>
<body>
    <?php
    include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
    include "../basic/dbconnect.php";
    $sql="SELECT * FROM `rooms` WHERE `category`='middleclass'AND `book`='available'";
    $result=$conn->query($sql);
    ?>
    <section class="room-menu">
        <div class="container">
            <h2 class="text-center">Medium Class Rooms</h2>

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