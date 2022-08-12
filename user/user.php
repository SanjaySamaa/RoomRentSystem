<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../user/user.css">
</head>
<body>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/nav/nav.php");
?>
<div class="user">
    <div class="changepassword">
    <div class="oldpassword"></div>    
    <form action="changepassword.php" method="post" name="passwordform" onsubmit=" return passwordvalidate()">
        <label for="oldpassowrd" class="opassword">OldPassword:</label>
        <input type="password" name="oldpassword" required>
       <div class="newpassword"> 
        <label for="newpassowrd">NewPassword:</label>
        <input type="password" name="newpassword" required></div>  
        <div class="confirmnewpassword">
        <label for="newpassowrd" class="cnewpassword">Confirm NewPassword:</label>
        <input type="password" name="confirmpassword" required></div>   
        <div class="submitpassword">
            <input type="submit" value="change password">
        </div>
    </div>
    </form>
    <div class="changename">
        <form action="changefnamelname.php" method="post" name="nameform" onsubmit="return namevalidate()">
            <div class="fname">
                <label for="changefname">Change FirstName:</label>
                <input type="text"  name="firstname">
            </div>
            <div class="lname">
                <label for="changelname">Change LastName:</label>
                <input type="text"  name="lastname">
            </div>
            <div class="submitname">
            <input type="submit" value="change name">
        </div>
        </form>
    </div>
    <div class="changeemail">
        <form action="changeemail.php" method="post" name="emailform" onsubmit="return emailvalidate()">
            <div class="email" >
                <label for="changeemail">
                    Change Email
                </label>
                <input type="text" name="email" required>
            </div>
            <div class="submitemail">
            <input type="submit" value="change email">
        </div>
        </form>
    </div>
</div>
<script>
function emailvalidate(){
    let emailvalidate = document.forms["emailform"]["email"].value;
    if(emailvalidate==""){
        alert('email cannot be empty');
    
        return false;
    }
    else
    {
        alert('do you want to change your email?');
    }

}
function passwordvalidate(){
    let passwordvalidate = document.forms['passwordform']['newpassword'].value;
    let passwordvalidatee = document.forms['passwordform']['confirmpassword'].value;
    if(passwordvalidate<8){
        alert('short password size');
        return false;
    }
    if(passwordvalidate==""){
        alert('enter the password');
        return false;
    }

    if(passwordvalidate!=passwordvalidatee){
        alert('password not matched');
        return false;
    }
    else
    {
        alert('do you want to change your password?');
    }
}
function namevalidate(){
    let firstname = document.forms['nameform']['firstname'].value;
    if(firstname<5){
        alert('short name size');
        return false;
    }
    let lastname = document.forms['nameform']['lastname'].value;
    if(lastname<5){
        alert('short name size');
        return false;
    }
    else
    {
        alert('do you want to change your name?');
    }
}
</script>
</body>
<footer>
    <?php
include("/software/XAMPP/htdocs/RoomRentSystem/footer/footer.php")
    ?>
</footer>
</html>