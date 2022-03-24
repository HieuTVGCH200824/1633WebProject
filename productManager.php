<?php
require_once('./process.php');
require_once('./header.php');
require_once('./forbidden.php');
if ($run) { ?>
    <script>
        alert("Action completed successfully ʕ •ᴥ•ʔゝ☆ !");
        window.location.href = "productManager.php";
    </script>
<?php }
$result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
?>
<div class="productManager">
    <table class="displayTable">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category ID</th>
                <th>Product Image</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
                <td>
                    <img src="images/data/<?php echo $row['product_img']; ?>" width=150>
                </td>
                <td class="descriptionManager"><?php echo $row['descrip']; ?></td>
                <td><?php echo $row['product_amount']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="productManager.php?edit=<?php echo $row['product_id']; ?>">Edit</a>
                    <a href="productManager.php?delete=<?php echo $row['product_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <body>
        <div class="addForm">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                <div class="form">
                    <label>Product name</label>
                    <input type="text" name="name" required value="<?php echo $name; ?>">
                </div>
                <div class="form">
                    <label>Product category</label>
                    <select name="category">
                        <?php
                        $result = $mysqli->query("SELECT * FROM category");
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $row['category_id']; ?>">
                                <?php echo $row['category_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form">
                    <label>Description</label>
                    <input type="text" name="descrip" required value="<?php echo $descrip; ?>">
                </div>
                <div class="form">
                    <label>Product Amount</label>
                    <input type="number" name="product_amount" required maxlength="50" value="<?php echo $product_amount; ?>">
                </div>
                <div class="form">
                    <label>Product Price</label>
                    <input type="number" step="0.01" name="price" required maxlength="50" value="<?php echo $price; ?>">
                </div>
                <div class="form">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form">
                    <?php
                    if ($update == true) :
                    ?>
                        <button type="submit" name="update">Update</button>
                        <img src="images/data/<?php echo $image; ?>" width=100>
                    <?php else : ?>
                        <button type="submit" name="add">Add</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
</div>

</body>

</html>