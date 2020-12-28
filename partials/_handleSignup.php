<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // Check whether this email exists
    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email already in use";
    }
    else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
        }
        else {
            $showError = "Passwords don't match";
        }
    }

}

?>