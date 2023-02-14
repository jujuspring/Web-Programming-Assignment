<?php
session_start();
// Unset variables
foreach ($_SESSION as $key => $value) {
    unset($_SESSION[$key]);
}
session_destroy();
// Redirect to the login page
header('Location: home.php');
exit;

?>
