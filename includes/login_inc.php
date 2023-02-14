<?php
if (isset($_POST["login"])) {
    // Connect to DB
    require_once 'dbh_inc.php';

    // Initialise variables
    $username = trim($_POST["uid"]);
    $password = $_POST["pwd"];

    // Injection attack prevention
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // Search account credentials in DB
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // Initiate login
    if (!$result) {
        // Query failed
        header('location: ../login.php?error=query_fail');
        exit();
    } else{
        // Query succeeded
            // Account exists?
        if (mysqli_num_rows($result) == 1) {
            // Account does exist
                // Verify password
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                // Password verified successfully
                    // Finalise login
                session_start();
                $_SESSION['uid'] = $row['user_ID'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['logged_in'] = true;


                // Check if user is admin
                $query = "SELECT admin_flag FROM users WHERE username = '$username'";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    // Query failed
                    header('location: ../login.php?error=query_fail');
                }
                // Check if the query returned any rows
                if (mysqli_num_rows($result) > 0) {
                    // The query returned at least one row, get the first row
                    $row = mysqli_fetch_assoc($result);
                    // Check if the flag is set to true
                    if ($row['admin_flag'] == 1) {
                        // The user is an admin
                        $_SESSION['admin'] = true;
                    }
                }
                header('location: ../home.php');
                exit();
            } else{
                // Password is incorrect
                header('location: ../login.php?error=pwd_invalid');
                exit();
            }
        } else{
            // Account does not exist
            header('location: ../login.php?error=uid_not_found');
            exit();
        }
    }
    mysqli_close($connection);
}
