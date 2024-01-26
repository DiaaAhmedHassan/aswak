<?php include 'log.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login to aswak</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="background">
    <form method="post">
        <div class="login-form">
            <h2>Welcome to aswak </h2>
            <div class="options">
                
                <input type="radio" id="customer" value="customer" name="usertype" checked="true">
                <label class="labels" for="customer">customer</label>
                <input type="radio" value="seller" name="usertype">
                <label class="labels" for="customer">Seller</label>
            </div>

            <label class="labels">Email or username</label>
            <br>
            <input type="text" name="emailUser" id="emailUser" placeholder="Email or username" class="input-field"/>
            <br><br>
            <label class="labels">password</label>
            <br>
            <input type="password" name="password" id="password" placeholder="password" class="input-field"/>
            <br><br>
            <input type="submit" name="submit" id="submit" value="Login" class="login-btn"/>
            <br><br>
            <label class="labels">Don't have an account yet </label>
            <a class="labels" href="register.php"> register here </a>
        </div>
    </form>
</body>
</html>