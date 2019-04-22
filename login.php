<?php
    session_start();
    $error = 0;

    $conn = mysqli_connect("shareddb-g.hosting.stackcp.net", "tempodb-3235e640", "YFFtGhhfi.IW42T", "tempodb-3235e640");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    } 

    $emailLog = $_POST['emailLog'];
    $passwordLog = $_POST['passwordLog'];

    $query = "SELECT user_id FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $emailLog)."' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) < 1) {
        $error = 3;
    } else {
        $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $emailLog)."'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if (isset($row)) {
            $salt = "BiggeryDiggeryDoo";
            $hashedPassword = sha1(md5($passwordLog).$salt);
            
            if ($hashedPassword == $row['password']) {
                
                $_SESSION['user_id'] = $row['user_id'];
                setcookie("user_id", $row['user_id'], time() + 60*60*24*365);

                $error = 1;
                    
            } else {
 
                $error =  2;
                
            }
            
        } else {
            
            $error = 3;
            
        }
    
    }

    echo $error;
?>