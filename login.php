<?php include_once 'header.php';
//TODO Add way more comments.

// Prevent users from being able to log in ...while logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // User is logged in, redirect
    header('location: home.php');
}
?>
    <main>
        <!--Messages-->
        <?php if (isset($_GET["success"])) {?>
            <section class="window">
                <h2 class="success">Success!</h2>
                <?php switch ($_GET["success"]) {
                    case "account_created":
                        // Account created
                        echo "<p class='content'>Your account has been successfully created, feel free to log in.</p>";
                        break;
                }?>
            </section>
        <?php }
        if (isset($_GET["error"])) {?>
        <section class="window">
            <h2 class="error">Error!</h2>
            <?php
            switch ($_GET["error"]) {
                case "query_fail":
                    // Query didn't execute
                    echo "<p class='content'>Could not log in, try again.</p>";
                    break;
                case "pwd_invalid":
                    // Password is incorrect
                    echo "<p class='content'>Password incorrect.</p>";
                    break;
                case "uid_not_found":
                    // Username not found in database
                    echo "<p class='content'>Username does not exist.</p>";
                    break;
            }
            ?>
        </section>
        <?php }?>

        <!--Login form-->
        <section class="window">
            <h2 class="title">Log into your account</h2>
            <div class="content">
                <p> Don't have an account?</p>
                <button class="login_btn" onclick="window.location.href='signup.php'">Sign Up</button>
                <a class="input_form">
                    <form action="includes/login_inc.php" method="post" autocomplete="on">
                        <label for="uid">Username</label>
                        <input type="text" name="uid" id="uid" required>
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" id="pwd" required>
                        <button type="submit" name="login">Log in</button>
                    </form>
                </a>
            </div>
        </section>
    </main>
<?php include_once 'footer.php';?>