<?php
require_once('./header.php');
?>

<html lang="en">

<body>
    <section class="shoppingCart">
        <div class=title>
            <h3><span class="titleText">S</span>hopping <span class="titleText">C</span>art</h3>
            <div class="cartContainer">
                <h6>My Cart</h6>
                <div class="cartItems">
                    <table>
                        <th>Product name</th>
                        <th>Product Image</th>
                        <th>Amount left</th>
                        <th>Price</th>
                        <th>Action</th>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $total = 0;
                            foreach ($_SESSION['cart'] as $keys => $values) {
                        ?>
                                <tr>
                                    <td><?php echo $values["product_name"]; ?></td>
                                    <td><img class="cartImg" src="images\data\<?php echo $values["product_img"]; ?>"></td>
                                    <td><?php echo $values["product_amount"]; ?></td>
                                    <td>$<?php echo $values["price"]; ?></td>
                                    <?php number_format($values['product_amount'] * $values['price'], 2); ?>
                                    <td><a href="cart.php?action=delete&id=<?php echo $values['product_id']; ?>" class="cartDelete">Remove</></a></td>
                                </tr>
                            <?php
                                $total = $total + (count($values['price']) * $values['price']);
                            }
                            ?>

                            <td class="totalPrice" colspan="5">Total: $<?php echo number_format($total, 2); ?></td>
                        <?php
                        }
                        if (isset($_GET["action"])) {
                            if ($_GET["action"] == "delete") {
                                foreach ($_SESSION["cart"] as $keys => $values) {
                                    if ($values["product_id"] == $_GET["id"]) {
                                        unset($_SESSION['cart'][$keys]);
                                        echo '<script>alert("Item Removed")</script>';
                                        echo '<script>window.location="cart.php"</script>';
                                    }
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div></div>
        </div>
    </section>
</body>

</html>