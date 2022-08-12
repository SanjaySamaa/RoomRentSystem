
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../welcome/welcome.css">

</head>
<body style="background-color: #dfe6e9;" > 
<?php
include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
?>
<div class="welcome">
    <h2>ROOM RENT SYSTEM</h2>
</div>
<div class="imagebox">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
  <div class="carousel-inner"  >
    <div class="carousel-item active">
      <img src="../images/sidekix-media-WgkA3CSFrjc-unsplash.jpg" class="d-block w-100" alt="oops sorry" style="height:85vh;">
    </div>
    <div class="carousel-item">
      <img src="../images/img.jpg" class="d-block w-100" alt="oops sorry"style="height:85vh;">
    </div>
    <div class="carousel-item">
      <img src="../images/roomrent2.png" class="d-block w-100" alt="oops sorry"style="height:85vh ; ">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<div class="description">
    <div class="about">
        <h3>About</h3>
        <div class="desc">
            <p>Room Rent System.Our system helps you to rent the room and let you to advertise your room easily!</p>
        </div>
    </div>
    <div class="contact">
        <h3>Contact</h3>
        <div class="email">
            <p>Email:sanjay.bista@thamescollege.edu.np</p>
        </div>
        <div class="insta">
            <p>Instagram:<a href="https://www.instagram.com/g_sanjay1/">Sanjay</a></p>
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