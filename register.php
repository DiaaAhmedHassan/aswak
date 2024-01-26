<?php include 'reg.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <div style="text-align: center;">
            <img src="images/avatar.jpg" class="avatar">
            <br><br>
            <label for="file-input">Select an image</label>
            <input type="file" accept="images/*" style="display: none;" id="file-input">
            <br><br>
        </div>

        <div>
            <label class="labels">Username</label>
            <br>
            <input type="username" id = "username" name="username" placeholder="username" class="input-field"/>
            <br><br>
            <label class="labels">Email</label>
            <br>
            <input type="email" name="email" placeholder="Email" class="input-field"/>
            <br><br>
            <label class="labels">Phone</label>
            <br>
            <input type="text" name="phone" placeholder="phone number" class="input-field"/>
            <br><br>
            <label class="labels">password</label>
            <br>
            <input type="password" name="password" placeholder="password" class="input-field"/>
            <br><br>
       
            <label class="labels">confirm password</label>
            <br>
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="retype password" class="input-field"/>
            <br><br>
            
            <input type="submit" value="Register" name="submit" id="submit" class="login-btn"/>
            <br><br>
            <label class="labels">already have an account </label>
            <a class="labels" href="login.php">login here </a>
        </div>
        </div>
    </form>
</body>
</html>