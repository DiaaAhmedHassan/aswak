<?php

if(isset($_POST['submit'])){

    include 'config.php';

    //accept image
    
    $upload_dir = 'images/uploads/';
    $max_file_size = 5 * 1024 * 1024; // 5 MB
    
    // Check if the file is too large
    if ($_FILES['file-input']['size'] > $max_file_size) {
        echo "<script>alert('File is too large. Maximum allowed file size is $max_file_size bytes.')</script>";
        exit;
    }
    
    // Check if the file is a valid upload file
    if (!is_uploaded_file($_FILES['file-input']['tmp_name'])) {
        echo "<script>alert('File is not a valid upload file.')</script>";
        exit;
    }
    
    // Check if the file name is valid and not too long
    $image_name = $_FILES['file-input']['name'];
    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_ex_lc = strtolower($image_ex);
    $new_image = uniqid("IMG-", true) . '.' . $image_ex_lc;
    $dist = $upload_dir . $new_image;
    // Check if the destination directory exists and is writable
    if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
        mkdir($upload_dir, 0777, true);
        exit;
    }
    
    // Move the file to the destination directory
    if (move_uploaded_file($_FILES['file-input']['tmp_name'], $dist)) {
        echo "<script>alert('File moved to the destination directory.')</script>";
    } else {
        echo "<script>alert('File could not be moved.')</script>";
    }
    //

    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirmpassword"];


    $userType = $_POST["usertype"];

    

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $dublicate = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE email = '$email'");
    
    if (mysqli_num_rows($dublicate) > 0){
        echo "<script>alert('Username or Email is already taken!')</script>";
    }else{
        if($confirm_pass == $password){

            //insertion query
            $query = "";
            if($userType == "customer"){
            $query = "INSERT INTO CUSTOMER (name, email, phone, password, image) VALUES('$username', '$email', '$phone', '$hashed_password', '$dist')";
            }else if($userType == "seller"){
                $query = "INSERT INTO SELLER (name, email, phone, password, image) VALUES('$username', '$email', '$phone', '$hashed_password', $dist)";
            }
            mysqli_query($conn, $query);

            //selection query
            $result = mysqli_query($conn,"SELECT * FROM CUSTOMER WHERE email = '$email'");
            if($userType == "seller"){
                $result = mysqli_query($conn, "SELECT * FROM SELLER WHERE email = '$email'");
            }
            $row = mysqli_fetch_assoc($result);

            $_SESSION['client_id'] = $row["id"];

            
            

            echo"<script>alert(\"registeration succesfull\");</script>";
                sleep(3);
               
                if($userType == "customer"){
                header("Location: home.php");
                }else{
                    header("Location: home.php");
                }
           

        }else{
            echo '<script>alert("Password does not match!");</script>';
        }
    }

}
?>