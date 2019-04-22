<?php
    session_start();
    $error = "";

    $conn = mysqli_connect("shareddb-g.hosting.stackcp.net", "tempodb-3235e640", "YFFtGhhfi.IW42T", "tempodb-3235e640");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    } 

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $passwordReg = $_POST['passwordReg'];

    $firstName1 = mysqli_real_escape_string($conn, $firstName);
    $lastName1 = mysqli_real_escape_string($conn, $lastName);
    $email1 = mysqli_real_escape_string($conn, $email);
    

    $query = "SELECT user_id FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $email1)."' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $error = "An account with that email already exists!";
        echo "An account with that email already exists!";
    } else {
        $salt = "BiggeryDiggeryDoo";
        $encryptPass = sha1(md5($passwordReg).$salt);
        $query = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`) VALUES ('$firstName1','$lastName1','$email1','$encryptPass')";
        mysqli_query($conn, $query);
        echo "Registration Complete! You can now log in to your account!";
    
    }
?>