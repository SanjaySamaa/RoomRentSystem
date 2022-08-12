
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../rooms/roomadd.css">
</head>
<body>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
?>

<div class="form">
<div class="heading">Add Room</div>
    <form method="post" action="roomaddbackend.php" enctype="multipart/form-data" > 
        <div class="title">
            <label for="title">Title:</label>
            <input type="text" class="ititle" name="title" required>
        </div>
        <div class="image">
            <label for="image">Image:</label>
            <input type="file" name="image" class="iimage" required>
        </div>
        <div class="price">
            <label for="price">Price Rs:</label>
            <input type="text" placeholder="price" name="price"class="iprice" required>
        </div>
      
        <div class="description">
            <label for="description">Description:</label>
            <textarea name="description"class="idescription" rows="5" cols="40"> </textarea>
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
</body>
<footer>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/footer/footer.php")
    ?>
</footer>
</html>