<?php
session_start();
require_once('./dbconnect.php');
require_once('./header.php');
$result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
$result2 = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
?>

<html lang="en">

<body>
    <section class="productList">
        <div class="title">
            <h3><span class=titleText>C</span>ollections</h3>
        </div>
        <div class="categories">
            <div class="category" id="apple">
                <h2 class="categoryTitle">Apple</h2>
                <div class="categoryContent">
                    <?php while ($row = $result->fetch_assoc()) {
                        if ($row['category_id'] == 1) { ?>
                    <form method="post" class="card">
                        <div class="productName"><?php echo $row['product_name']; ?></div>
                        <img class="productImg" src="images\data\<?= $row['product_img']; ?>">
                        <div class="productDescription"><?php echo $row['descrip']; ?></div>
                        <div class="productCategory"><?php echo  $row['category']; ?></div>
                        <div class="productAmount">In stock: <?php echo $row['product_amount']; ?></div>
                        <div class="productPrice">Price: $<?php echo $row['price']; ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <input type="hidden" name="product_name" value="<?= $row['product_name']; ?>">
                        <input type="hidden" name="product_img" value="<?= $row['product_img']; ?>">
                        <input type="hidden" name="product_amount" value="<?= $row['product_amount']; ?>">
                        <input type="hidden" name="price" value="<?= $row['price']; ?>">
                        <button type="submit" class="button" name="addCart">Add to cart</button>
                    </form>
                    <?php };
                    } ?>
                </div>
            </div>
            <div class="category" id="android">
                <h2 class="categoryTitle">Android</h2>
                <div class="categoryContent">
                    <?php while ($row2 = $result2->fetch_assoc()) {
                        if ($row2['category_id'] == 2) { ?>
                    <form method="post" class="card">
                        <div class="productName"><?php echo $row2['product_name']; ?></div>
                        <img class="productImg" src="images\data\<?= $row2['product_img']; ?>">
                        <div class="productDescription"><?php echo $row2['descrip']; ?></div>
                        <div class="productCategory"><?php echo  $row2['category']; ?></div>
                        <div class="productAmount">In stock: <?php echo $row2['product_amount']; ?></div>
                        <div class="productPrice">Price: $<?php echo $row2['price']; ?></div>
                        <input type="hidden" name="product_id" value="<?= $row2['product_id']; ?>">
                        <input type="hidden" name="product_name" value="<?= $row2['product_name']; ?>">
                        <input type="hidden" name="product_img" value="<?= $row2['product_img']; ?>">
                        <input type="hidden" name="product_amount" value="<?= $row2['product_amount']; ?>">
                        <input type="hidden" name="price" value="<?= $row2['price']; ?>">
                        <button type="submit" class="button" name="addCart">Add to cart</button>
                    </form>
                    <?php };
                    } ?>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['addCart'])) {
            if (isset($_SESSION['cart'])) {
                $item_array_id = array_column($_SESSION['cart'], 'product_id');
                if (in_array($_POST['product_id'], $item_array_id)) {
                    echo "<script>alert('Product is already added in the cart...!')</script>";
                    echo "<script>window.location='collection.php'</script>";
                } else {
                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $_POST['product_id'],
                        'product_name' => $_POST['product_name'],
                        'product_img' => $_POST['product_img'],
                        'product_amount' => $_POST['product_amount'],
                        'price' => $_POST['price']
                    );
                    $_SESSION['cart'][$count] = $item_array;
                    print_r($_SESSION['cart']);
                }
            } else {
                $item_array = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_img' => $_POST['product_img'],
                    'product_amount' => $_POST['product_amount'],
                    'price' => $_POST['price']
                );
                $_SESSION['cart'][0] = $item_array;
                print_r($_SESSION['cart']);
            }
        }
        ?>
    </section>
</body>

</html>