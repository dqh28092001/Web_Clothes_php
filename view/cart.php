<?php
session_start();

$page_title = "Cart";
include('../Functions/cartfunction.php');
include('../includes/header.php');
// include('../Functions/authenticate.php');

?>

<style>
    input[type="number"] {
        width: 6pc;
    }
</style>
<!-- cập nhật số lượng -->
<?php
if (isset($_POST['capnhatprod_qty'])) {

    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $prod_id = $_POST['product_id'][$i];
        $prod_qty = $_POST['prod_qty'][$i];
        if ($prod_qty <= 0) {
            $sql_delete = mysqli_query($con, "DELETE FROM carts WHERE prod_id='$prod_id'");
        } else {
            $sql_update = mysqli_query($con, "UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id'");
        }
    }
}
?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <?php
    $items = getCartItems();

    if (mysqli_num_rows($items) > 0) {

    ?>
        <div class="container">
            <form action="" method="POST">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="shop__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $total = 0;
                                    if (mysqli_num_rows($items) > 0) {
                                        foreach ($items as $citem) {

                                            $subtotal = $citem['prod_qty'] * $citem['selling_price'];
                                            $total += $subtotal;
                                            $i++;
                                    ?>
                                            <tr>
                                                <!-- <td class="invert"><?php echo $i ?></td> -->

                                                <td class="cart__product__item">
                                                    <img src="../uploads/<?= $citem['image']; ?>" alt="" width="100px">
                                                    <div class="cart__product__item__title">
                                                        <h6>Chain bucket bag</h6>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__price"> <?= $citem['selling_price']; ?>.00 $</td>
                                                <td class="cart__quantity">

                                                    <input type="hidden" name="product_id[]" value="<?php echo $citem['prod_id'] ?>">
                                                    <input type="number" min="1" name="prod_qty[]" value="<?php echo $citem['prod_qty'] ?>">

                                                </td>
                                                <td class="cart__total"><?= $subtotal ?>.00 $</td>
                                                <td class="cart__close"> <button class="btn btn-danger btn-sm deteleItem" value="<?= $citem['cid']; ?>"><i class="fa fa-trash"></i> Remove</button></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="submit" class=" btn btn-success" value="Update cart" name="capnhatprod_qty" style="color: #4e3939;
    background-color: #dbdfdc;
    border-color: #eaf7ed;">
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="discount__content">
                            <h6>Discount codes</h6>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <div class="cart__total__procced">
                            <h6>Cart total</h6>
                            <ul>
                                <!-- <li>Subtotal <span>$ 750.0</span></li> -->
                                <li>Total <span><?= $total ?>.00 $</span></li>
                            </ul>
                            <a href="/WEB_CLOTHES_PHP/view/checkout.php" class="btn primary-btn" style="background-color: red;
    color: white;">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
        </div>
        </form>

    <?php
    } else {
    ?>
        <div class="card card-body text-center shadow">
            <h4 class="py-3">Your cart is empty</h4>
        </div>
    <?php
    }

    ?>

</section>


<?php include('../includes/footer.php'); ?>