<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="includes/style.css" media="all" rel="stylesheet" type="text/css">
    <title>Retrowave</title>
</head>
<body>
<header>
    <nav>
        <label class="site_logo">Retrowave</label>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <?php
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            // User is logged in, show log out button
            echo'<button onclick="window.location.href=\'logout.php\'">Log out</button>';
        } else {
            // User is not logged in, show log in button
            echo'<button onclick="window.location.href=\'login.php\'">Log in</button>';
        }
        ?>
    </nav>
</header>