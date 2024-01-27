<?php

if(isset($_POST['submit'])){

    include 'config.php';

    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirmpassword"];



    $userType = $_POST["userType"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $dublicate = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE email = '$email'");
    
    if (mysqli_num_rows($dublicate) > 0){
        echo "<script>alert('Username or Email is already taken!')</script>";
    }else{
        if($confirm_pass == $password){

            
            $query = "INSERT INTO CUSTOMER (name, email, password, phone, image) VALUES ('$username', '$email', '$hashed_password', '$phone')";
            $result = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE email = '$email'");
            $row = mysqli_fetch_assoc($result);

           if($userType == "SELLER"){
                $query = "INSERT INTO SELLER (name, email, password, phone, image) VALUES ('$username', '$email', '$hashed_password', '$phone')";
                $result = mysqli_query($conn, "SELECT * FROM SELLER WHERE email = '$email'");
                $row = mysqli_fetch_assoc($result);

            }
           
            
            mysqli_query($conn, $query);
            echo"<script>alert(\"registeration succesfull\");</script>";
                sleep(3);
               
                if($userType == "customer"){
                header("Location: home.html");
                }else{
                    header("Location: home.html");
                }
           

        }else{
            echo '<script>alert("Password does not match!");</script>';
        }
    }

}
?>