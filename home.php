<?php
include 'config.php';

$q = 'SELECT * FROM CUSTOMER WHERE id = "'.$_SESSION["client_id"].'"';
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorys page</title>
    <link rel="stylesheet" href="home.css"/>
</head>
<body>
    <div>
<div class="header">
    <img src="<?php echo $row['image']?>" class="home-avatar"/>
    <label style="vertical-align: middle; font-size: 30px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    Welcome <?php echo $row["Name"];?>
    </label>
    <div class="nav-items">
        <label>Logout</label>
    </div>
</div>
</div>
    <div>

    <div class="row">

        <div class="column">
            <div class="card">
                <img class="card-image" src="images/men-clothes.jpg"/>
                <div>
                    <span>
                        <label class="label-title">Men clothes</label>
                    </span>
                    <br><br>
                    <input type="submit" value="check" class="btn-check"/>
                </div>        
            </div>
        </div>
   
    </div>
</div>

</body>
</html>