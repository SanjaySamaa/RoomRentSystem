
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php
include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
?>
<div class="container" >
    <h2 class="text-center mt-5" >WELCOME TO ROOM RENT SYSTEM</h2>
    <div class="row">
        <div class="col-md-4 my-5">
<div class="card" style="width: 18rem;">
  <img src="images/highclass.jpg" class="card-img-top" alt="oops sorry">
  <div class="card-body">
    <h5 class="card-title">High Class</h5>
    <p class="card-text">This is the high class room.You will get premium services in this class and price will be high.</p>
    <a href="../Roomclass/highclass.php" class="btn btn-primary">High class Rooms</a>
  </div>


</div>

</div>
<div class="col-md-4 my-5">
<div class="card" style="width: 18rem;">
  <img src="images/middleclass.jpg" class="card-img-top" alt="oops sorry">
  <div class="card-body">
    <h5 class="card-title">Medium Class</h5>
    <p class="card-text">This is the medium class room.You will get good services in this class and price will also be reasonable.</p>
    <a href="../Roomclass/mediumclass.php" class="btn btn-primary">Medium Class Rooms</a>
  </div>


</div>

</div>
<div class="col-md-4 my-5">
<div class="card" style="width: 18rem;">
  <img src="images/lowclass.jpg" class="card-img-top" alt="oops sorry">
  <div class="card-body">
    <h5 class="card-title">Low Class</h5>
    <p class="card-text">This is the low class room.You will get low services in this class but price will be cheap.</p>
    <a href="../Roomclass/lowclass.php" class="btn btn-primary">Low Class Rooms</a>
  </div>


</div>

</div>

    </div>
</div>
</body>
<footer>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/footer/footer.php")
    ?>
</footer>
</html>