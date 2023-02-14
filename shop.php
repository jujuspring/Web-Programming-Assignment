<?php include_once 'header.php'
;?>
    <main>
        <?php
        // Connect to DB
        require_once 'includes/dbh_inc.php';

        // Admin buttons
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            // User is logged in
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                // User is admin, show add product button
                echo '<button onclick="window.location.href=\'addproduct.php\'">Add new products</button>';
            }
        } else{
            // User is not logged in, show message urging to login ?>
            <div class="window">
                <h2 class="error">You are not logged in</h2>
                <p class="content">If you would like to make a purchase, you will need to log in.</p>
            </div>
            <?php }?>

        <div class="window">
            <h2 class="title">Products</h2>
            <div class="content">
                <?php
                $query = "SELECT name, description, price FROM products";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    // Output the products
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="product">
                            <h2><?= $row["name"] ?></h2>
                            <p><?= $row["description"] ?></p>
                            <p>Price: £<?= $row["price"] ?></p>
                            <p>Stock: <?= $row["stock"] ?></p>
                            <!-- <img src="< $row["image"] ?>" alt="Product image"> -->
                        </div>
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            echo '<button onclick="window.location.href=\'purchase_complete.php\'">Buy</button>'; //TODO add purchase complete page
                            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                                // User is admin, show edit button
                                echo '<button onclick="window.location.href=\'editproduct.php\'">Edit</button>';
                            }
                        }
                    }
                } else {
                    echo "Error: Unable to fetch products from the database.";
                }
                // Close the database connection
                mysqli_close($connection);
                ?>
            </div>
        </div>
    </main>
<?php include_once 'footer.php';?>