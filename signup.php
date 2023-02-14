<?php include_once 'header.php';
// Prevent users from being able to sign up while logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // User is logged in, redirect
        header('location: home.php');
    }
?>
    <main>
    <!--Error messages-->
    <?php
    if (isset($_GET["error"])) {?>
        <div class="window">
            <h2 class="error">Error!</h2>
        <?php switch ($_GET["error"]) {

            // Username errors

            case "invalid_uid_len":
                // Wrong username length
                echo "<p class='content'>This username is too short/too long, try something else.</p>";
                break;

            case "invalid_uid_char":
                // Invalid characters
                echo "<p class='content'>This username contains invalid characters, try something else.</p>";
                break;

            case "existing_uid":
                // Unavailable username
                echo "<p class='content'>This username is not available, try something else.</p>";
                break;

            // Password errors

            case "invalid_pwd_len":
                // Wrong password length
                echo "<p class='content'>This password is too short/too long, try something else.</p>";
                break;

            case "unequal_pwd":
                // Password doesn't match
                echo "<p class='content'>The passwords didn't match, try again.</p>";
                break;

            case "registration_fail":
                // Account registration failed
                echo "<p class='content'>Account registration failed.</p>";
                break;
        }?>
        </div>
    <?php }?>

    <!--Sign-up form-->
    <div class="window">
        <h2 class="title">Create an account</h2>
        <div class="content">
            <a class="input_form">
                <form action="includes/signup_inc.php" method="post" autocomplete="off">
                    <label for="uid">Create username</label>
                    <input type="text" name="uid" id="uid" required>

                    <label for="pwd">Create Password</label>
                    <input type="password" name="pwd" id="pwd" required>

                    <label for="re_pwd">Repeat password</label>
                    <input type="password" name="re_pwd" id="re_pwd" required>

                    <button type="submit" name="signup">Register</button>
                </form>
            </a>
        </div>
    </div>
    </main>
<?php include_once 'footer.php';?>