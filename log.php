<?php
if(isset($_POST['submit'])){
    include 'config.php';

    $emailUser = $_POST["emailUser"];
    $password = $_POST["password"];
    $userType = $_POST["usertype"];

    

    $query = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE CUSTOMER.email = '$emailUser' OR CUSTOMER.name = '$emailUser'");
    
    if($userType == "seller"){
        $query = mysqli_query($conn, "SELECT * FROM SELLER WHERE SELLER.email = '$emailUser' OR SELLER.name = '$emailUser'"); 
    }

    $row = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0){
        if(password_verify($password, $row['password'])){
            $_SESSION["login"] = true;
            $_SESSION["client_id"] = $row["id"];
            $_SESSION["client_name"] = $row["name"];
            header("Location: home.php");
        }else{
            echo "<script>alert(\"incorrect password\")</script>";
        }
    }else{
        echo "<script>alert(\"email or username not exist\")</script>";
    }
}
?>