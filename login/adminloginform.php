<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
    <div class="form">
        <form action="adminlogin.php" class="login" method="post">
            <div class="title">Admin login</div>
            <div class="email">
                <label for="email">Email :</label>
                <input type="text" name="email" class="iemail">
            </div>
            <div class="password">
                <label for="password">Password :</label>
                <input type="password" name="password" class="ipassword">
            </div>
            <div class="submit">
                <input type="submit" value="submit">
            </div>
        </form>
    </div>
</body>
</html>