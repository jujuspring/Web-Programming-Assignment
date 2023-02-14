<?php include_once 'header.php'; ?>
<main>
    <!--Error messages-->
    <?php if (isset($_GET["error"])) {?>
    <div class="window">
        <h2 class="error">Error!</h2>
        <?php switch ($_GET["error"]) {
            case "add_fail":
                // Adding product failed
                echo "<p class='content'>Product failed to submit.</p>";
                break;
        }
        }?>
        <!-- Add Product Form -->
        <section class="window">
            <h2 class="title"> Add a new product</h2>
            <div class="content">
                <a class="input_form">
                    <form action="includes/addproduct_inc.php" method="POST">
                        <label for="prod_name">Product Name</label>
                        <input type="text" id="prod_name" name="prod_name" required>

                        <label for="prod_price">Product Price</label>
                        <input type="number" id="prod_price" name="prod_price" min="0" step="0.1" required>

                        <label for="prod_desc">Product Description</label>
                        <textarea id="prod_desc" name="prod_desc" required></textarea>

                        <button type="submit" name="addproduct">Add Product</button>
                    </form>
                </a>
            </div>
        </section>
</main>
<?php include_once 'footer.php'; ?>
