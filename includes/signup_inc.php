<?php
if (isset($_POST["signup"])) {
    // Connect to DB
    require_once 'dbh_inc.php';

    // Initialise variables
    $username = trim($_POST["uid"]);
    $password = $_POST["pwd"];
    $re_password = $_POST["re_pwd"];

    // Registration validation
        // Username validation
    if (strlen($username) < 5 or strlen($username) > 20) {
        // Invalid username length
        header("location: ../signup.php?error=invalid_uid_len");
        exit();
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        // Invalid characters in username
        header("location: ../signup.php?error=invalid_uid_char");
        exit();
    }
        // Checking username availability
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Username unavailable
        header("location: ../signup.php?error=existing_uid");
        exit();
    }

    // Password validation
    if (strlen($password) < 8 or strlen($password) > 50) {
        // Checking password length
        header("location: ../signup.php?error=invalid_pwd_len");
        exit();
    }
    if ($password != $re_password) {
        // Checking passwords match
        header("location: ../signup.php?error=unequal_pwd");
        exit();
    }

    // If code is still running, assume all the validation checks passed

    // Proceed with account registration
        // Injection attack prevention
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
        // Hash password
    $password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare query
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        // Prepare the statement
    $result = mysqli_query($connection, $query);
    if (!$result) {
        // Account not created
        echo "Error: " . mysqli_error($connection);
        header("location: ../signup.php?error=registration_fail");
        exit();
    }else {
        // Account created!
        header("location: ../login.php?success=account_created");
        exit();
    }
    mysqli_close($connection);
}


