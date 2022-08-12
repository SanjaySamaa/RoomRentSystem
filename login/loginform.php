
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <div class="userdetails">
        <div class="title">Please login to RoomRentSystem</div>
        <form name="loginform" action="login.php"  method="post" onsubmit="return loginvalidate()" >
        
            <div class="center">
            <div class="email">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="password">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="submit">
            </div>
        </div>
            <p>or</p>
            <div class="signup">
                <p>If you dont have account click here to <a href="../Singup/Signupform.php" target="blank">signup</a> </p>
            </div>
            <p>or</p>
            <div class="admin">
                <p>Login as <a href="adminloginform.php" target="blank">Admin</a> </p>
            </div>
        </form>

        <script>
            function loginvalidate(){
    let emailvalidate = document.forms["loginform"]["email"].value;
    let passwordvalidate = document.forms["loginform"]["password"].value;
    if(emailvalidate==""){
        alert('email cannot be empty');
        return false;
    }
    
    if(passwordvalidate < 8){
        alert('empty or short password size');
        return false;
    }

    


}
        </script>    
    </div>
</body>
</html>